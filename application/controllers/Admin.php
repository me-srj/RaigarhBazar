<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public	$return=array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Adminmodel');
		$admin=$this->session->userdata('admin');
		if(!empty($admin))
		{
			$ag['admin']=$this->Adminmodel->get_admin($admin['id']);
			if (empty($ag)) 
			{
				redirect("Admin-Login");
			}
		}
		else
		{
redirect("Admin-Login");
		}
	}
		public function passbookajax()
	{
	$month=$this->input->post('month');
	$year=$this->input->post('year');
	$rdate=$year."-".$month;
	if (isset($_POST['date'])) 
	{
		$date=$this->input->post('date');
	$rdate.="-".$date;
	}
	echo $this->Adminmodel->getpassat($rdate);
	}
	public function passbook()
	{
		$data['admin']=$this->get_admin_data();
		$data['passstring']=$this->Adminmodel->getpassat(date("Y-m-d"));
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view('admin/passbook/index.php',$data);
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function index()
	{
		
	}
	function log_out_admin(){
    $this->session->unset_userdata('admin');
    redirect("Admin-Login");
}
	public function get_admin_data(){
		$admin=$this->session->userdata('admin');
		return $this->Adminmodel->get_admin($admin['id']);
	}
    public function get_number($number)
    {
    // $length=strlen($number);
    if ($number < 999) {
    // Anything less than a thousand
    return   $format = number_format($number);
    } 
    else if ($number < 999999) {
    return   $format = ($number / 1000).'K';
    } 
    else if ($number < 999999999) 
    {
    return  $format = number_format($number / 1000000,2).'M';
    } 
    else 
    {
    return  $format = number_format($number / 1000000000,2). 'B';
    }	
    }
	public function dashboard()
	{
		$data['admin']=$this->get_admin_data();
		$data['sales']=$this->get_number(1555000000);
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Dashboard/index.php",$data);
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function categories()
	{
		$data['admin']=$this->get_admin_data();
		$data['allunit']=$this->Adminmodel->allunit();
		$data['cate']=$this->Adminmodel->categories();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view('admin/Categorys/index.php');
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function neworders()
	{
		$data['admin']=$this->get_admin_data();
		$data['data']=$this->Adminmodel->neworder();
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view('admin/Orders/new/index.php');
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    public function deliveredord(){
        $oid=$this->input->post('id');
        $data=$this->Adminmodel->deliveredordmodal($oid);
        if($data)
        {
        $to      =$this->input->post('email');
        $subject = 'Ordere Delievered';
        $message = 'Your order is delievered Successfull for order-id "'.$oid.'"'; 
        $headers = 'From: supportteam@raigarhbazar.in' . "\r\n" .
        'Reply-To: supportteam@raigarhbazar.in' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers); 
                print_r($data);
        
            
        }
       
    }
    public function orderlist(){
    	if(isset($_GET['oid']))
		{
	      $Oid=base64_decode($_GET['oid']);
	     $data['data']=$this->Adminmodel->orderlist($Oid);
		$data['admin']=$this->get_admin_data();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view('admin/Orders/new/index2.php');
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    }
	public function oldorders()
	{
		$data['admin']=$this->get_admin_data();
		$data['data']=$this->Adminmodel->oldorder();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Orders/old/index.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    public function oldorderlist(){
    	if(isset($_GET['oid']))
		{
	      echo $Oid=base64_decode($_GET['oid']);
	     $data['data']=$this->Adminmodel->oldorderlistdata($Oid);
		$data['admin']=$this->get_admin_data();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Orders/old/index2.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    }
    public function canceloldorders()
	{
		$data['admin']=$this->get_admin_data();
		$data['data']=$this->Adminmodel->cancelorder();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Orders/cancel/index.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    public function cancelorderlist(){
    	if(isset($_GET['oid']))
		{
	      $Oid=base64_decode($_GET['oid']);
	     $data['data']=$this->Adminmodel->cancelorderlistdata($Oid);
		$data['admin']=$this->get_admin_data();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Orders/cancel/index2.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
    }
	public function addcategorys()
	{
		$name=$this->input->post('name');
		$unit_id=$this->input->post('unit');
		$data=$this->Adminmodel->addcat($name,$unit_id);
		if($data){
	$return['status']=1;
	$return['message']="Successfully Added";
	print_r(json_encode($return));
		}
	}
	public function editcategory()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$unit_id=$this->input->post('unit');
		$data=$this->Adminmodel->editcat($id,$name,$unit_id);
		if($data){
	$return['status']=1;
	$return['message']="Successfully Added";
	print_r(json_encode($return));
		}
	}
	public function stocks()
	{
		$data['admin']=$this->get_admin_data();
		$data['Categorys']=$this->Adminmodel->categories();
		$data['product']=$this->Adminmodel->product();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Stocks/index.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function addpro()
	{
		$name=$this->input->post('name');
		$description=$this->input->post('description');
		$stock=$this->input->post('stock');
		$mrp=$this->input->post('mrp');
		$catid=$this->input->post('catid');
		$selling_price=$this->input->post('selling_price');
		$mfg_details=$this->input->post('mfg_details');
		$author=$this->input->post('author');
		$writer=$this->input->post('writer');
		$publisher=$this->input->post('publisher');
		$disclaimer=$this->input->post('disclaimer');
		$img1=$this->input->post('img1');
		$img2=$this->input->post('img2');
		$minalert=$this->input->post('minalert');
		$data=$this->Adminmodel->addproducts($name,$description,$stock,$mrp,$catid,$selling_price,$mfg_details,$author,$writer,$publisher,$disclaimer,$minalert,$img1,$img2);
		if($data){
	$return['status']=1;
	$return['message']="Successfully Added";
	print_r(json_encode($return));
		}else{
			$return['status']=0;
	$return['message']="Failed to Add!";
	print_r(json_encode($return));
		}
	}
	public function getpro(){
		$id=$this->input->post('id');
		$data=$this->Adminmodel->editgetpro($id);
		print_r(json_encode($data));
	}
	public function editpro()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$description=$this->input->post('description');
		$stock=$this->input->post('stock');
		$mrp=$this->input->post('mrp');
		$catid=$this->input->post('catid');
		$selling_price=$this->input->post('selling_price');
		$mfg_details=$this->input->post('mfg_details');
		$author=$this->input->post('author');
		$writer=$this->input->post('writer');
		$publisher=$this->input->post('publisher');
		$disclaimer=$this->input->post('disclaimer');
		$img1=$this->input->post('img1');
		$img2=$this->input->post('img2');
		$minalert=$this->input->post('minalert');
		$data=$this->Adminmodel->updateproducts($id,$name,$description,$stock,$mrp,$catid,$selling_price,$mfg_details,$author,$writer,$publisher,$disclaimer,$minalert,$img1,$img2);
		if($data){
	$return['status']=1;
	$return['message']="Successfully Updated";
	print_r(json_encode($return));
		}else{
			$return['status']=0;
	$return['message']="Failed to Update!";
	print_r(json_encode($return));
		}
	}
	public function profile(){
		$data['admin']=$this->get_admin_data();
		$this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/edit_profile/index.php");
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function edit_profile_data(){
		$name=$this->input->post('name');
		$mobile=$this->input->post('mobile');
		$image=$this->input->post('image');
		print_r($name);
	}
	public function addproductqnt(){
		$id=$this->input->post('id');
		$addqnt=$this->input->post('addqnt');
		$data=$this->Adminmodel->addproqnt($id,$addqnt);
		print_r($data);
	}
	public function inbox()
	{   $data['admin']=$this->get_admin_data();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/inbox/index.php",$data);
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');
	}
	public function get_chats()
	{
	    $data=$this->Adminmodel->get_chats();
	    foreach ($data as $chats)
	    {
	        $seendata=$this->Adminmodel->countunseen($chats->mobile);
	      if($seendata[0]->cn>0){$status='<span class="badge badge-danger badge-pill float-right">'.$seendata[0]->cn.'</span>';}
	      else
	      {
	          $status='';
	      }
	      echo '<li onclick="viewmsg(\''.$chats->mobile.'\',\''.$chats->name.'\',\''.$chats->email.'\')" ><span class="avatar"
          ><img
            src="'.base_url().'/app-assets/admin/images/avatars/default.png"
            height="42"
            width="42"
            alt=""
          />
        </span>
        <div class="chat-info flex-grow-1">
          <h5 class="mb-0">'.$chats->name.'</h5>
          <p class="card-text text-truncate">
            '.$chats->msg.'
          </p>
        </div>
        <div class="chat-meta">
          <small class="float-right mb-25 chat-time">'.date('h:iA', strtotime($chats->con)).'</small>
          '.$status.'
        </div>
      </li>';
	    }
	}
	public function get_chats_msg(){
	 $mobile=$this->input->post('mobile');
	 $data=$this->Adminmodel->get_msgs($mobile);
	 $date='';
	 $msg1='';
	 foreach($data as $msgdata){
	 $msg2='';
	 $div='';
	     if($date===date('Ymd', strtotime($msgdata->con))){
	         $msg2='<div class="chat-content">
              <p>'.$msgdata->msg.'</p>
            </div>';
            $date='';
            $date=date('Ymd', strtotime($msgdata->con));
	     }
	     else{
	         $date='';
	         $date=date('Ymd', strtotime($msgdata->con));
        $div='<div class="divider">
          <div class="divider-text">'.date('M d,Y', strtotime($msgdata->con)).'</div>
        </div>';
	     }
          $msg1.=$div.'<div class="chat chat-left">
          <div class="chat-avatar">
            <span class="avatar box-shadow-1 cursor-pointer">
              <img src="'.base_url().'/app-assets/admin/images/avatars/default.png" alt="avatar" height="36" width="36">
            </span>
          </div>
          <div class="chat-body"><div class="chat-content">
              <p>'.$msgdata->msg.'</p>
            </div>'.$msg2.'</div>
        </div>';
	 }
	 echo $msg1;
	}
	
	public function Banners()
	{
	    $data['admin']=$this->get_admin_data();
	    $data['banners']=$this->Adminmodel->get_banners();
	    $this->load->view('admin/public/h1_header.php');
		$this->load->view('admin/public/h2_sidebar.php');
		$this->load->view('admin/public/h3_topnavbar.php',$data);
		$this->load->view("admin/Banners/index.php",$data);
		$this->load->view('admin/public/h4_customizer.php');
		$this->load->view('admin/public/h5_footer.php');   
	}
	public function updatecover()
	{
	    $id=$this->input->post('id');
	    $banner=$this->input->post('banner');
	    $line1=$this->input->post('line1');
	    $line2=$this->input->post('line2');
	    $data=$this->Adminmodel->edit_banners($id,$banner,$line1,$line2);
	    print_r(json_encode($data));
	}
	public function get_dash_table()
	{
	    $table=$this->Adminmodel->get_dash_table();
                $i=0;
	    foreach($table as $data){
	        if($this->get_number($data->quantity>0)){
	            $qty='<span class="font-weight-bolder mb-25">'.$this->get_number($data->quantity).'</span>';
	        }
	        else{
	            $qty='<span class="font-weight-bolder text-danger mb-25">'.$this->get_number($data->quantity).'</span>';
	        }
	        echo '<tr>
	             <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar rounded">
                        <div class="avatar-content text-dark">
                          '.++$i.'
                        </div>
                      </div>
                      <div>
                        <div class="font-weight-bolder">'.$data->product.'</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span>'.$data->category.'</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      '.$qty.'
                    </div>
                  </td>
                  
                </tr>
                ';
	    }
	    }
	public function count_dashboard_data()
	{
	    $sale=$this->Adminmodel->count_sale();
	    $data['sale']=$this->get_number($sale['sale']);
	    $customer=$this->Adminmodel->count_user();
	    $data['customer']=$this->get_number($customer['customer']);
	    $product=$this->Adminmodel->count_product();
	    $data['product']=$this->get_number($product['product']);
	    $revenue=$this->Adminmodel->count_revenue();
	    $data['revenue']=$this->get_number($revenue['revenue']);
	    $orders=$this->Adminmodel->count_all_orders();
	    $data['orders']=$this->get_number($orders['orders']);
	    $profit=$this->Adminmodel->count_profit();
	    $data['profit']=$this->get_number($profit['profit']);
	    $month_income=$this->Adminmodel->month_income();
	    $data['month_income']=$this->get_number($month_income['month_income']);
	    $compareincome=$this->Adminmodel->lastmonth_income();
	    if($compareincome>=0){
	    $data['compareincome']=$compareincome."% more earnings than last month";
	    }else{
	       $data['compareincome']="'.$compareincome.'% less earnings than last month";
	    }
	    print_r(json_encode($data));
	   
	}
}
