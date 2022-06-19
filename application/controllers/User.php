<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
class User extends CI_Controller {

public $return=array();
public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Commonmodel');
		$this->load->model('Usermodel');
		if (empty($this->session->userdata('user'))) {
		if (!empty(get_cookie('cookie'))&&!empty(get_cookie('cookiepass'))) 
		{
			if ($this->Commonmodel->checkusercookies()) {
				
			}
			else
			{
			$this->return['status']=-1;
			$this->return['message']="invalid Cookies!!";
			print_r(json_encode($this->return));
			die;
			}
		}
		}
	}
	public function Edit_Profile_Photo()
	{
		 $photo=$this->input->post('photo');
		$res=$this->Usermodel->Edit_Profile_Photo($photo);
		print_r(json_encode($res));

	}
	public function Edit_Profile()
	{	
	    $name=$this->input->post('fullname');
		$email=$this->input->post('email');
		$res=$this->Usermodel->Edit_Profile($name,$email);
		print_r(json_encode($res));
	}
	public function orders()
	{	
		$data['Home']='active';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/topnav2.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/orders/index.php');
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	public function getorders()
	{
		$data=$this->Usermodel->getOrder();
		foreach ($data as $key) {
			// print_r($key->id);
			$dil="";
			if($key->status=="ordered"){
				$dil="<li class='text-warning'>Delivery expected ". date('M d,Y', strtotime($key->odate.'+ 2 days'))."</li>";
			}
			elseif($key->status=="cancel"){
				$dil="<li class='text-danger'>Canceled</li>";
			}
			elseif($key->status=="delivered"){
				$dil="<li class='text-success'>Delivered on ".date('M d,Y', strtotime($key->d_date))."</li>";
			}
			echo '<div class="card shadow mt-2"><a href="'.base_url().'myorders?oid='.$key->oid.'">
<div class="card-body">
	<div class="row">
	<div class="col-md-3 col-3">
		<img src="'.base_url().'/app-assets/product/img/'.$key->img1.'" style="height: 60px;width: 60px;">
	</div>
	<div class="col-md-9 col-9">
		<h6>'.$key->prname.'</h6>
		<p>&#8377; '.$key->tamount.' <br/>
		 '.$dil.'</p>
	</div>
</div>
</div></a>
</div>';
		}
	}
	public function Edit_Address()
	{   
		$rname=$this->input->post('rname');
		$pincode=$this->input->post('pincode');
		$PostOffice=$this->input->post('PostOffice');
		$state=$this->input->post('state');
		$address=$this->input->post('address');
		$res=$this->Usermodel->Edit_Address($rname,$pincode,$PostOffice,$state,$address);
		print_r(json_encode($res));

	}
	public function get_wishlist()
	{
		$limit=$this->input->post('limit');
		$start=$this->input->post('start');
		$result=$this->Usermodel->get_wishlist_Books($limit,$start);

		foreach ($result as $row) {
			echo '
			
  <div class="col-6 col-sm-4 col-lg-3">
              <div class="card single-product-card">
                <div class="card-body p-3">
                  <!-- Product Thumbnail-->
                  <a class="product-thumbnail d-block" href="'.base_url().'viewproduct?id='.base64_encode($row->book_id).'"><img src="'.base_url().'app-assets/product/img/'.$row->img1.'" alt="">
                   </a>
                  <!-- Product Title-->
                  <a class="product-title d-block text-truncate" href="#">'.$row->name.'</a>
                  <!-- Product Price-->
                  <p class="sale-price">&#8377;'.$row->selling_price.'</p>
                  <a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart('.$row->book_id.')">Add to Cart</a>
                  <a class="btn btn-danger btn-sm" id="remove'.$row->wid.'" onclick="remove_wishlist('.$row->wid.')"><i class="fa fa-trash-o"></i></a>
                </div>
              </div>
            </div>';
		}


	}
	public function remove_wishlist_item()
	{		
		$res=$this->Usermodel->remove_wishlist_item($this->input->post("wid"));
		print_r(json_encode($res));
	}
	/**
	 * This function creates order and loads the payment methods
	 */
	public function pay()
	{
		if(empty($this->session->userdata("user"))){
			$data='';
			print_r(json_encode($data));
		}
		else{
		$api = new Api(RAZOR_KEY, RAZOR_SECRET_KEY);
		/**
		 * You can calculate payment amount as per your logic
		 * Always set the amount from backend for security reasons
		 */
		$name = $this->input->post("name");
		$amountm = $this->input->post("amount");
		

		$razorpayOrder = $api->order->create(array(
			'receipt'         => rand(),
			'amount'          => $amountm * 100, // 2000 rupees in paise
			'currency'        => 'INR',
			'payment_capture' => 1 // auto capture
		));


		$amount = $razorpayOrder['amount'];

		$razorpayOrderId = $razorpayOrder['id'];

		$this->session->set_userdata('razorpay_order_id',$razorpayOrderId);
		 $data = $this->prepareData($amount,$razorpayOrderId,$name);
	print_r(json_encode($data));
		// $this->load->view('rezorpay',array('data' => $data));
	}
}
	/**
	 * This function verifies the payment,after successful payment
	 */
	/**
	 * This function preprares payment parameters
	 * @param $amount
	 * @param $razorpayOrderId
	 * @return array
	 */
	public function prepareData($amount,$razorpayOrderId,$name)
	{
		$data = array(
			"key" => RAZOR_KEY,
			"amount" => $amount,
			"currency"=> "INR",
			"name" => $name,
			"description" => "Learn To Code",
			"image" => "https://img.icons8.com/color/48/000000/car-sale.png",
			"notes"  => array(
				"address"  => "Hello World",
				"merchant_order_id" => rand(),
			),
			"theme"  => array(
				"color"  => "#F37254"
			),
			"order_id" => $razorpayOrderId,
		);
		return $data;
	}

	/**
	 * This is a function called when payment successfull,
	 * and shows the success message
	 */
	 
	public function paysuccesspaid(){
		$oid=$this->input->post('oid');		
		$addressline=$this->input->post('addressline');
		$city=$this->input->post('city');
		$pin_code=$this->input->post('pin_code');
		$state=$this->input->post('state');
		$ptype="PAID";
		$data=$this->Usermodel->ordersub($oid,$ptype,$addressline,$city,$pin_code,$state);
		//print_r($data);
		if($data){
		    $this->send_mail($this->session->userdata('user')->email,$oid);
			echo '<!-- Order/Payment Success-->
    <div class="order-success-wrapper">
      <div class="order-done-content"><svg width="60" height="60" viewBox="0 0 16 16" class="bi bi-check-circle-fill text-success mb-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
        <h4>Your Order is Confirmed!</h4>
        <p>Your order ID is #'.$oid.'. Keep this ID remember for further assistance. Thank you!</p><a class="btn btn-warning mt-3" href="'.base_url().'">Go to Shop</a>
      </div>
    </div>';
		}
		else{
			echo "";
		}
	}
	public function paylater(){
		$oid='ORD-'.rand();		
		$addressline=$this->input->post('addressline');
		$city=$this->input->post('city');
		$pin_code=$this->input->post('pin_code');
		$state=$this->input->post('state');
		$ptype="UNPAID";
		$data=$this->Usermodel->ordersub($oid,$ptype,$addressline,$city,$pin_code,$state);
		//print_r($data);
		if($data){
		    $this->send_mail($this->session->userdata('user')->email,$oid);
			echo '<!-- Order/Payment Success-->
    <div class="order-success-wrapper">
      <div class="order-done-content"><svg width="60" height="60" viewBox="0 0 16 16" class="bi bi-check-circle-fill text-success mb-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
        <h4>Your Order is Confirmed!</h4>
        <p>Your order ID is #'.$oid.'. Keep this ID remember for further assistance. Thank you!</p><a class="btn btn-warning mt-3" href="'.base_url().'">Go to Shop</a>
      </div>
    </div>';
		}
		else{
			echo "";
		}
	}
	public function send_mail($toemail,$orderid)
	{
        $to=$toemail; 
        
        $subject ='Order Confirmation'; 
        
        $message = 'Your Order is confirmed for shopping at Raigarh Bazar Your Order-ID is "'.$orderid.'"'; 
        
        $headers = 'From: supportteam@raigarhbazar.in' . "\r\n" . 
        
            'Reply-To: supportteam@raigarhbazar.in' . "\r\n" . 
        
            'X-Mailer: PHP/' . phpversion(); 
        
        mail($to, $subject, $message, $headers);
	}
	public function orderlarge(){
		$oid=$_GET['oid'];
		$data['data']=$this->Usermodel->getorderlarge($oid);
		$data['Home']='active';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/topnav2.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/orders/index2.php',$data);
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');

	}
	public function orderCancel(){
		$oid=$this->input->post('oid');
		$data=$this->Usermodel->cancelorder($oid);
		print_r($data);
	}
}