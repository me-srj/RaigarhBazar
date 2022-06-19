<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public $return=array();
public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Commonmodel');
		$this->load->model('Usermodel');
// 		if (empty($this->session->userdata('user'))) 
// 		{
//     if (!empty(get_cookie('cookie'))&&!empty(get_cookie('cookiepass'))) 
//     {
//       if ($this->Commonmodel->checkusercookies()) {
        
//       }
//     }
//     }
	}
	public function get_Book_with_name()
{
 $search=$this->input->post("search");
 $result=$this->Commonmodel->get_Book_w_name($search);
 foreach ($result as $row) {
      $animate="";
      if(!empty($this->session->userdata('user')))
                    {
                      $animate="";
                      $chkfb=$this->Usermodel->checkfab($row->id);
                      if($chkfb){
                        $animate="animate";
                      }
                    }
                    if($row->unit==='size'){
                      $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart2('.$row->id.')">Add to Cart</a>';
          }
          else{
            $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart('.$row->id.',0)">Add to Cart</a>';
          }

      echo '
      <style>.HeartAnimation'.$row->id.' {
  padding-top: 2em;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png");
  background-repeat: no-repeat;
  background-size: 2900%;
  background-position: left;
  height: 75px;
  width: 85px;
  margin: 0 auto;
  cursor: pointer;
}</style>
  <div class="col-6 col-sm-4 col-lg-3">
              <div class="card single-product-card">
                <div class="card-body p-3">
                  <!-- Product Thumbnail-->
                  <a class="product-thumbnail d-block"><img src="'.base_url().'app-assets/product/img/'.$row->img1.'" alt="">
                    <span class="badge"><div class="HeartAnimation'.$row->id.' '.$animate.'" onclick="AddToWishlist('.$row->id.')"></div></span></a>
                  <!-- Product Title-->
                  <a class="product-title d-block text-truncate" href="'.base_url().'viewproduct?id='.base64_encode($row->id).'">'.$row->name.'</a>
                  <!-- Product Price-->
                  <p class="sale-price">&#8377;'.$row->selling_price.'</p>
                  '.$btn.'
                </div>
              </div>
            </div>
            <script>$(".HeartAnimation'.$row->id.'").click(function() {
    $(this).toggleClass("animate");
  });
</script>';
    }
}
  public function autocompleteproduct()
  {
 if ($this->input->post('search')) {
print_r(json_encode($this->Commonmodel->getautoproduct($this->input->post('search'))));
 }
  }
	public function search_product()
	{
	if ($this->input->post('search')) 
	{
	print_r(json_encode($this->Commonmodel->searchproducts($this->input->post('search'),$this->input->post('lastrow'))));
	}
	}
	public function index()
	{
		$this->session->set_userdata('lastrow',0);
		$data['banners']=$this->Commonmodel->get_banners();
		$data['Home']='active';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/Home/index.php',$data);
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}

	public function get_Books()
	{
		$limit=$this->input->post('limit');
		$start=$this->input->post('start');
		$result=$this->Commonmodel->get_Books($limit,$start);
		foreach ($result as $row) {
			$animate="";
			if(!empty($this->session->userdata('user')))
                  	{
                  		$animate="";
                  		$chkfb=$this->Usermodel->checkfab($row->id);
                  		if($chkfb){
                  			$animate="animate";
                  		}
                  	}
                  	if($row->stock>0){
                    if($row->unit==='size'){
                      $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart2('.$row->id.')">Add to Cart</a>';
          }
          else{
            $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart('.$row->id.',0)">Add to Cart</a>';
          }
                  	}else{
                  	    $btn='<a class="btn btn-danger btn-sm" id="cartbtn'.$row->id.'" style="font-size:10px;">Out of Stock</a>';
                  	}

			echo '
			<style>.HeartAnimation'.$row->id.' {
  padding-top: 2em;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png");
  background-repeat: no-repeat;
  background-size: 2900%;
  background-position: left;
  height: 75px;
  width: 85px;
  margin: -52px 0 -20px 65px;
  cursor: pointer;
}</style>
  <div class="col-6 col-sm-4 col-lg-3">
              <div class="card single-product-card">
                <div class="card-body p-3">
                  <!-- Product Thumbnail-->
                  <a class="product-thumbnail d-block" href="'.base_url().'viewproduct?id='.base64_encode($row->id).'"><img src="'.base_url().'app-assets/product/img/'.$row->img1.'" alt=""></a>
                  <!-- Product Title-->
                  <a class="product-title d-block text-truncate" href="'.base_url().'viewproduct?id='.base64_encode($row->id).'">'.$row->name.'</a>
                  <!-- Product Price-->
                  <p class="sale-price">&#8377;'.$row->selling_price.'</p>
                  '.$btn.'<div class="HeartAnimation'.$row->id.' '.$animate.'" onclick="AddToWishlist('.$row->id.')"></div>
                </div>
              </div>
            </div>
            <script>$(".HeartAnimation'.$row->id.'").click(function() {
    $(this).toggleClass("animate");
  });
</script>';
		}

	}

	public function get_cat_Books()
	{
		if(isset($_GET['cat_id']))
		{
			    $data['id']=base64_decode($_GET['cat_id']);
				$data['Home']='';
				$data['Categories']='active';
				$data['Wishlist']='';
				$data['Contact_Us']='';
				$data['user_profile']='';
			    $data['cat_book']=$this->Commonmodel->get_cat_name($data['id']); 
				$this->load->view('user/public/h1_header.php');
				$this->load->view('user/public/h2_topnavbar.php');
				$this->load->view('user/public/h3_sidebar.php');
				$this->load->view('user/category_books/index.php',$data);
				$this->load->view('user/public/h4_bottomfooter.php',$data);
				$this->load->view('user/public/h5_footer.php');
		}
		
	}
	public function get_cat_wise_Books()
	{
		$limit=$this->input->post('limit');
		$start=$this->input->post('start');
		$id=$this->input->post('id');
		$result=$this->Commonmodel->get_cat_Books($limit,$start,$id); 
		foreach ($result as $row) {
		    $animate="";
			if(!empty($this->session->userdata('user')))
                  	{
                  		$animate="";
                  		$chkfb=$this->Usermodel->checkfab($row->id);
                  		if($chkfb){
                  			$animate="animate";
                  		}
                  	}
                  	if($row->stock>0){
                    if($row->unit==='size'){
                      $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart2('.$row->id.')">Add to Cart</a>';
          }
          else{
            $btn='<a class="btn btn-primary btn-sm" id="cartbtn'.$row->id.'" onclick="AddToCart('.$row->id.',0)">Add to Cart</a>';
          }
                  	}else{
                  	    $btn='<a class="btn btn-danger btn-sm" id="cartbtn'.$row->id.'" style="font-size:10px;">Out of Stock</a>';
                  	}
			echo '
			<style>.HeartAnimation'.$row->bid.' {
  padding-top: 2em;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png");
  background-repeat: no-repeat;
  background-size: 2900%;
  background-position: left;
  height: 75px;
  width: 85px;
  margin:-52px 0 -20px 65px;
  cursor: pointer;
}</style>
  <div class="col-6 col-sm-4 col-lg-3">
              <div class="card single-product-card">
                <div class="card-body p-3">
                  <!-- Product Thumbnail-->
                  <a class="product-thumbnail" href="'.base_url().'viewproduct?id='.base64_encode($row->id).'" d-block"><img src="'.base_url().'app-assets/product/img/'.$row->img1.'" alt=""></a>
                  <!-- Product Title-->
                  <a class="product-title d-block text-truncate" href="'.base_url().'viewproduct?id='.base64_encode($row->id).'">'.$row->name.'</a>
                  <!-- Product Price-->
                  <p class="sale-price">&#8377;'.$row->selling_price.'</p>
                  '.$btn.'<div class="HeartAnimation'.$row->bid.' '.$animate.'" onclick="AddToWishlist('.$row->bid.')"></div>
                </div>
              </div>
            </div><script>$(".HeartAnimation'.$row->bid.'").click(function() {
    $(this).toggleClass("animate");
  });
</script>';
		}
	}
	public function check_wishlist()
	{
		if(!empty($this->session->userdata('user')))
		{
             return $this->Usermodel->check_wishlist();
		}		
	}
	public function AddToCart()
	{
    if(!empty($this->input->post('qnt'))){
      $qnt=$this->input->post('qnt');
    }
    else{
      $qnt=1;
    }
		$size=$this->input->post('size');
		$this->db->select('a.*,c.name as unitname');
		$this->db->from('tbl_product_master AS a');
		$this->db->join('tbl_category_master AS b','a.catid=b.id');
		$this->db->join('tbl_unit AS c','b.unit_id=c.id');
		$this->db->where('a.id',$this->input->post('pid'));
        $res=$this->db->get()->row();
        //print_r($res);
         $id=$res->id;
         $array_id='id'.$res->id;
        $book_name=$res->name;
        $description=$res->description;
        $image=$res->img1;
        $unit=$res->unitname;
        $price=$res->selling_price;
        
     $cartArray = array(
	$array_id=>array(
	'name'=>$book_name,
  'description'=>$description,
	'id'=>$id,
	'price'=>$price,
	'quantity'=>$qnt,
	'unit'=>$unit,
  'size'=>$size,
	'image'=>$image)
);
     // $this->session->unset_userdata('shopping_cart');
     // die;
     if(empty($this->session->userdata('shopping_cart'))) {
	 $this->session->set_userdata('shopping_cart',$cartArray);
	$return['msg']="Product Added To Your Cart";
	$return['status']=true;
}else{
	 $array_keys = array_keys($this->session->userdata('shopping_cart'));
	if(in_array($array_id,$array_keys)) {
         $return['status']=false;
		$return['msg']="Product Already in your Cart";
	} 
	 else {
		$old=$this->session->userdata('shopping_cart');
		$new=array_merge($old,$cartArray);
	 $session=$this->session->set_userdata('shopping_cart',$new);
	$return['msg']="Product Added To Your Cart";
	$return['status']=true;
	}
	}
print_r(json_encode($return));
	}	
	public function count_cart_item()
	{
		if(!empty($this->session->userdata('shopping_cart'))) {
echo $cart_count = count(array_keys($_SESSION["shopping_cart"]));
}
else{
  echo "0";
}
	}
	public function count_cart_item2()
	{
		$data['table']='';
		if(!empty($this->session->userdata('shopping_cart'))) {
$data['cart_count'] = count(array_keys($_SESSION["shopping_cart"]));
$totalSubAmount=0;
$i=0;
 foreach($this->session->userdata('shopping_cart') as $book)
                  {
                 $id=++$i;
                 $selected05="";
                 $selected1="";
                 $selected15="";
                 $selected2="";
                 $selected25="";
                 $selected3="";
                 $selected35="";
                 $selected4="";
                 $selected45="";
                 $selected5="";
                 $pp=$book['price']*$book['quantity'];
                 $totalSubAmount+=$pp;
                 if($book['quantity']=="1"){
                  $selected1="selected";
                 }
                 elseif($book['quantity']=="0.5"){
                  $selected05="selected";
                 }
                 elseif($book['quantity']=="1.5"){
                  $selected15="selected";
                 }
                 elseif($book['quantity']=="2"){
                  $selected2="selected";
                 }
                 elseif($book['quantity']=="2.5"){
                  $selected25="selected";
                 }
                 elseif($book['quantity']=="3"){
                  $selected3="selected";
                 }
                 elseif($book['quantity']=="3.5"){
                  $selected35="selected";
                 }
                 elseif($book['quantity']=="4"){
                  $selected4="selected";
                 }
                 elseif($book['quantity']=="4.5"){
                  $selected45="selected";
                 }
                 elseif($book['quantity']=="5"){
                  $selected5="selected";
                 }
                 if($book['unit']=="kg"){
                $otpin='<option value="0.5" '.$selected05.'>0.5 kg</option>
                <option value="1" '.$selected1.'>1 kg</option>
                <option value="1.5" '.$selected15.'>1.5 kg</option>
                <option value="2" '.$selected2.'>2 kg</option>
                <option value="2.5" '.$selected25.'>2.5 kg</option>
                <option value="3" '.$selected3.'>3 kg</option>
                <option value="3.5" '.$selected35.'>3.5 kg</option>
                <option value="4" '.$selected4.'>4 kg</option>
                <option value="4.5" '.$selected45.'>4.5 kg</option>
                <option value="5" '.$selected5.'>5 kg</option>';
                 } elseif($book['unit']=="dozen"){
                $otpin='<option value="1" '.$selected1.'>1 dozen</option>
                <option value="2" '.$selected2.'>2 dozen</option>
                <option value="3" '.$selected3.'>3 dozen</option>
                <option value="4" '.$selected4.'>4 dozen</option>
                <option value="5" '.$selected5.'>5 dozen</option>';
                 } else{
                $otpin='<option value="1" '.$selected1.'>1</option>
                <option value="2" '.$selected2.'>2</option>
                <option value="3" '.$selected3.'>3</option>
                <option value="4" '.$selected4.'>4</option>
                <option value="5" '.$selected5.'>5</option>';
                }
                $data['table'].='<tr id="trid'.$id.'" class="pp'.$pp.'">
                    <th scope="row"><img src="'.base_url().'app-assets/product/img/'.$book['image'].'" alt=""></th>
                    <td>
                      <h6 class="mb-1">'.$book['name'].'</h6>
                      <p>'.$book['description'].'</p>
                    </td>
                    <td>
                      <div class="quantity">
                        <select class="qty-text" id="quantity'.$id.'" name="qnt">
                        '.$otpin.'
                        </select>
                       
                      </div>
                    </td>
                     <td>
                      <h6 class="mb-1">&#8377;'.$book['price'].'</h6>
                    </td>
                    <td><a class="remove-product text-danger" onclick="remove_book('.$id.','.$book["id"].')"><i class="fa fa-close"></i></a></td>
                  </tr><script> var price'.$id.'=0;
        $("#quantity'.$id.'").change(function(){
          var quantity=$("#quantity'.$id.'").val();
          $.ajax({
  url:"'.base_url().'Welcome/changeqnt",
  method: "POST",
  cache:false,
  data:{"id":"'.$book['id'].'","quantity" : quantity},
    beforeSend: function(){
  $("#checkout").html(\'<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait\');
    $("#checkout").attr("disabled","disabled");},
  success:function(data){
    cart_item();
  }
  })
        });
        </script>';
}
if($totalSubAmount >= 500){
    $totalSubAmount=$totalSubAmount;
    $delivery_charge="<p>Free Delivery.</p>";
}else{
    $totalSubAmount=$totalSubAmount;
    $delivery_charge="<p>Free Delivery.</p>";
    //$delivery_charge="<p>Delivery Charge &#8377; 50.</p>";
}
if(!empty($this->session->userdata('user'))){
$add=$this->Usermodel->addressdetails();
if(!empty($add)){
              $data['place_order']='<p>Delivery Address</p>
              <div class="apply-coupon">
              <p class="mb-0"><label> <input type="radio" name="add" checked> '.$add->addressline.' ,'.$add->city.','.$add->pin_code.','.$add->state.'</label></p>
              <input type="hidden" id="addressline" value="'.$add->addressline.'">
              <input type="hidden" id="city" value="'.$add->city.'">
              <input type="hidden" id="pin_code" value="'.$add->pin_code.'">
              <input type="hidden" id="state" value="'.$add->state.'">
                <p class="mb-0"><hr>
                <p>Payment Method</p>
                <!--  <label> <input type="radio" name="method" value="0"> Pay Now </label>
                  <br> -->
                  <label> <input type="radio" name="method" value="1" checked> Cash on Delivery </label>
                </p>'.$delivery_charge.'
                <!-- <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p> -->
                <div class="coupon-form">
                  <form action="#">
                    <div class="input-group">
                    </div>
                    <!-- Checkout-->
                    <button class="btn btn-danger w-100 mt-4" id="checkout">&#8377; '.$totalSubAmount.' Place Order</button>
                  </form>
                </div>
              </div>
              <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
              <script>
              var totalSubAmount='.$totalSubAmount.';
$("#checkout").click(function(){
    if($("input:radio[name=method]:checked").val()=="0"){
  $.ajax({
  url:"'.base_url().'user/pay",
  method: "POST",
  cache:false,
  data:{"amount" : totalSubAmount,"name" : "try"},
  success:function(data)
  {
  	console.log(data);
  var options = JSON.parse(data);
    	 console.log(options);
    	 if(options === ""){
    	 	location.href="'.base_url().'User-Login";
    	 }
    	 else{
  options.handler = function (response){
$.ajax({
  url:"'.base_url().'user/paysuccesspaid",
  method: "POST",
  cache:false,
  data:{"oid" : response.razorpay_payment_id,"addressline" : $("#addressline").val(),"city" : $("#city").val(),"pin_code" : $("#pin_code").val(),"state":$("#state").val()},
  success:function(data){
  	console.log(data);
  	if(data===""){
  		alert("Payment Failed!");
  		$("#checkout").html(\'+totalSubAmount+ Place Order\');
          $("#checkout").attr("disabled",false);
  	}
  	else{
  		$("#cartdata").html(data);
  	}
  	}
  	});
  };
  
  var rzp1 = new Razorpay(options);
  rzp1.open();
//     e.preventDefault();
}
    }
  });
}
else
{
$.ajax({
  url:"'.base_url().'user/paylater",
  method: "POST",
  cache:false,
  data:{"addressline" : $("#addressline").val(),"city" : $("#city").val(),"pin_code" : $("#pin_code").val(),"state":$("#state").val()},
  beforeSend: function(){
  $("#checkout").html(\'<div class="spinner-border spinner-border-sm text-dark" role="status"></div> Please Wait\');
  $("#checkout").attr("disabled","disabled");},
  success:function(data)
  {
  	if(data===""){
  		alert("Payment Failed!");
  		$("#checkout").html(\'+totalSubAmount+ Place Order\');
          $("#checkout").attr("disabled",false);
  	}
  	else{
  		$("#cartdata").html(data);
  	}
  }
  });	
}
});
</script>';
}else{
    $data['place_order']='<a href="'.base_url().'user-profile" class="btn btn-danger btn-sm">Add Billing Address!</a>';
}
}
else{
  $data['place_order']='<a href="'.base_url().'User-Login" class="btn btn-danger btn-sm">Login First!</a>';
}
}
else{
  $data['cart_count']="0";
  $data['place_order']='';
  $data['table']='<tr class="text-center"><td class="mt-2" colspan="5" align="center"><h6 class="text-danger"><br>Your Cart Is Empty</h6><br><a href="'.base_url().'" class="btn btn-sm btn-primary">Shop Now</a></td></tr>';
}

print_r(json_encode($data));
	}
	public function remove_cart_item()
	{
		
    if (isset($_POST['action']) && $_POST['action']=="remove"){
      if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		$book_id="id".$_POST["book_id"];
		if($book_id == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$return['msg']="Product removed";
		$return['status']=true;
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
      }
      print_r(json_encode($return));
	}
  public function changeqnt()
  {
    $id="id".$_POST['id'];
    $quantity=$_POST['quantity'];
    array_push($_SESSION["shopping_cart"][$id]["quantity"]=$quantity);
    print_r($_SESSION["shopping_cart"][$id]);
  }
	public function Categories()
	{
		$data['Home']='';
		$data['Categories']='active';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$data['cat']=$this->Commonmodel->get_categories();
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/Categories/index.php',$data);
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	public function Wishlist()
	{
	    		if(empty($this->session->userdata('user')))
		{
           $this->userlogin();
		}
		else
		{
				$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='active';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/Wishlist/index.php');
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
		}
	}
	public function Cart_view()
	{
		$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/Cart/index.php');
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	public function Contact_Us()
	{
		$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='active';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/Contact_Us/index.php');
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	public function privacy()
	{
		$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/privacy_policy/index.php');
		$this->load->view('user/public/h5_footer.php');
	}
	public function user_profile()
	{
		if(empty($this->session->userdata('user')))
		{
           $this->userlogin();
		}
		else
		{
		$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='active';
		$data['userdetails']=$this->Usermodel->userdetails();
		$data['addressdetails']=$this->Usermodel->addressdetails();
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/User_Profile/index.php',$data);
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	}
public function admin(){
	$this->load->view('admin/adminlogin.php');
}
public function adminlogin(){
	$username= $this->input->post("username");
	$password= $this->input->post("password");
	if (!empty($username)&&!empty($password)) {
	$rev=$this->Commonmodel->adminloginmodal($username,$password);
	if($rev){
	$return['status']=1;
	$return['message']="Successfull";
	print_r(json_encode($return));
  }else{
	$return['status']=0;
	$return['message']="Worng Username/Password!!";
	print_r(json_encode($return));
}
}
else{
	$return['status']=-1;
	$return['message']="Invalid Data!!";
	print_r(json_encode($return));
}
}
public function userlogin()
	{
		if (!empty($this->session->userdata('user'))) 
		{
		echo "<script>window.location.href='".base_url()."'</script>";
		}
		$data['Home']='';
		$data['Categories']='';
		$data['Wishlist']='';
		$data['Contact_Us']='';
		$data['user_profile']='active';
		$this->load->view('user/public/h1_header.php');
		$this->load->view('user/public/h2_topnavbar.php');
		$this->load->view('user/public/h3_sidebar.php');
		$this->load->view('user/login.php');
		$this->load->view('user/public/h4_bottomfooter.php',$data);
		$this->load->view('user/public/h5_footer.php');
	}
	public function userloginbackend()
	{
	$username= $this->input->post("username");
	$password= $this->input->post("password");
	if (!empty($username)&&!empty($password)) {
	$this->return=$this->Commonmodel->checkuserlogin($username,$password);
	if ($this->return['return']) 
	{
		print_r(json_encode($this->return));
	}
	else
	{
		print_r(json_encode($this->return));
	}
	}
	else
	{
		$this->return['status']=-1;
		$this->return['message']="Invalid Data!!";
		print_r(json_encode($this->return));
	}
	}
	public function userlogout()
	{
		if (!empty(get_cookie('cookie'))&&!empty(get_cookie('cookiepass'))) 
		{
		$this->Commonmodel->decusercookies();
		}
		$this->session->unset_userdata('user');
		delete_cookie('cookie');
		delete_cookie('cookiepass');
echo '<script type="text/javascript">window.location.href="'.base_url().'";</script>';
	}
	public function userregistration()
	{
		
	$mobile= $this->input->post("mobile");
	$password= $this->input->post("password");
	$email= $this->input->post("email");
	if (!empty($mobile)&&!empty($password)) {
	if ($this->Commonmodel->register_user($mobile,$password,$email)) 
	{
	$this->return['status']=1;
	$this->return['message']="Registration Successfull";
	print_r(json_encode($this->return));
	}
	else
	{
		$this->return['status']=0;
		$this->return['message']="Failed To Register!!";
		print_r(json_encode($this->return));
	}
	}
	else
	{
		$this->return['message']="Initial";
		$this->return['status']=-1;
		print_r(json_encode($this->return));		
	}
	}
	public function AddToWishlist()
	{
	  if(!empty($this->session->userdata('user')))
		{   
			 $pid=$this->input->post('pid');
			$return=$this->Usermodel->AddToWishlist($pid);
   //           $return['msg']="Product Added to Wishlist";
			// $return['status']=true;
		}
		else
		{
			$return['msg']="You have to Login first";
			$return['status']=false;
		}
		print_r(json_encode($return));
	}
	public function contact_admin()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$msg=$this->input->post('msg');
		$data=array(
			'name' =>$name,
			'email'=>$email,
			'mobile'=>$mobile,
			'msg'=>$msg
			 );
		if($res=$this->Commonmodel->contact_admin($data))
		{
	$this->return['status']=true;
	$this->return['message']="Query Recieved";
	print_r(json_encode($this->return));
	}
	}
	public function get_Books_search(){
		$data=$this->Commonmodel->get_books_search();
		$value=[];
		foreach ($data as $key) {
			$value[].=$key->name;
		}
		print_r(json_encode($value));
	}
  public function viewproduct(){
    $id=base64_decode($_GET['id']);
    $data['data']=$this->Commonmodel->getproductlarge($id);
    $catid=$data['data'][0]->catid;
    $product=$data['data'][0]->id;
    $data['related_product']=$this->Commonmodel->related_product($catid,$product);
    $data['Home']='active';
    $data['Categories']='';
    $data['Wishlist']='';
    $data['Contact_Us']='';
    $data['user_profile']='';
    $this->load->view('user/public/h1_header.php');
    $this->load->view('user/public/topnav3.php');
    $this->load->view('user/public/h3_sidebar.php');
    $this->load->view('user/Home/index2.php',$data);
    $this->load->view('user/public/h4_bottomfooter.php',$data);
    $this->load->view('user/public/h5_footer.php');
  }
  public function userforgetpass(){
      $toemail=$this->input->post('email');
      if($this->Commonmodel->user_check($toemail)){
	  $rndno=rand(1000, 9999);
	  $subject = 'OTP to Reset Your Raigarh Bazar Password.';
	  $message = "Your OTP is ".$rndno;
      $headers = 'From: supportteam@raigarhbazar.in' . "\r\n" .
            'Reply-To: supportteam@raigarhbazar.in' . "\r\n" . 
            'X-Mailer: PHP/' . phpversion();
	    if(mail($toemail, $subject, $message, $headers)){
	        $data['status']=1;
	    	$data['msg']="Check Your Register Email and verrify OTP.";
	    	$this->session->set_userdata('email', $toemail);
	    	$this->session->set_userdata('OTP', $rndno);
	    }
	    else{
	        $data['status']=2;
	    	$data['msg']="try angain";
	    }
  }
  else{
      $data['status']=3;
	  $data['msg']="Email Doesn't Matched!";
  }
  print_r(json_encode($data));
  }
  public function verifyotp(){
      $otp=$this->input->post('otp');
      if($otp==$this->session->userdata('OTP')){
          $data['status']=1;
	      $data['msg']="OTP Matched!";
      }
      else{
          $data['status']=2;
	      $data['msg']="OTP Doesn't Matched!";
      }
      print_r(json_encode($data));
  }
  public function resetpass(){
      $pass=$this->input->post('password');
      $data=$this->Commonmodel->user_resetpass($pass);
      if($data){
          $this->session->unset_userdata('email');
      print_r($data);
      }
  }
}
