<?php
class Commonmodel extends CI_Model 
{
	public $return=array();
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		public function getautoproduct($search)
	{
	$query="SELECT * FROM tbl_product_master WHERE (`name` LIKE '%".$search."%' OR `author` LIKE '%".$search."%' OR `publisher` LIKE '%".$search."%' OR `description` LIKE '%".$search."%') AND `status`='1' limit 15";
$returns=	$this->db->query($query)->result();
	return $returns;
	}
		public function get_Book_w_name($search)
	{ 
 $query = "SELECT p.*,u.name as unit FROM `tbl_product_master` as p join tbl_category_master as c on p.catid=c.id JOIN tbl_unit as u on u.id=c.unit_id WHERE (p.name LIKE '%".$search."%' OR p.author LIKE '%".$search."%' OR p.publisher LIKE '%".$search."%' OR p.description LIKE '%".$search."%') AND p.status='1' limit 15";
 return $this->db->query($query)->result();

}
	public function searchproducts($search,$lastrow)
	{
echo	$query="SELECT * FROM tbl_product_master WHERE (`name` LIKE '%".$search."%' OR `author` LIKE '%".$search."%' OR `publisher` LIKE '%".$search."%' OR `description` LIKE '%".$search."%') AND `status`='1' WHERE `id`>'".$lastrow."' limit 15";
	}
	public function checkusercookies()
	{
echo	$cookie=get_cookie('cookie');
echo	$cpass=get_cookie('cookiepass');
die;
	$query="SELECT * FROM tbl_customer_cookies_master WHERE `cookie`='".$cookie."' AND `cookiepass`='".$cpass."' AND `status`='active'";
	$row=$this->db->query($query)->row();
	if (!empty($row)) {
	$userquery="SELECT * FROM tbl_customer_master WHERE `id`='".$row->cid."'";
	$userrow=$this->db->query($userquery)->row();
	$this->session->set_userdata('user',$userrow);
	return true;
	}
	else
	{
		return false;
	}
	}
	public function get_Books($limit,$start)
	{ 
 $query = "SELECT p.*,u.name as unit FROM `tbl_product_master` as p join tbl_category_master as c on p.catid=c.id JOIN `tbl_unit` as u on u.id=c.unit_id ORDER BY id DESC LIMIT ".$start.", ".$limit."";
 return $this->db->query($query)->result();

}
public function get_categories()
  {
  	$query = "SELECT * FROM tbl_category_master ORDER BY id DESC ";
    return $this->db->query($query)->result();
  }
  public function get_cat_name($id)
  {
  	$query = "SELECT * FROM tbl_category_master where id='".$id."' ORDER BY id DESC ";
    return $this->db->query($query)->row();
  }

  public function get_cat_Books($limit,$start,$id)
    {
    	$query = "SELECT p.*,u.name as unit, p.id as bid FROM `tbl_product_master` as p join tbl_category_master as c on p.catid=c.id JOIN `tbl_unit` as u on u.id=c.unit_id WHERE p.catid='".$id."' ORDER BY id DESC LIMIT ".$start.", ".$limit."";
 return $this->db->query($query)->result();
    }
	public function decusercookies()
	{
	$user=$this->session->userdata('user');
//	print_r($this->session->userdata('user'));
$query="UPDATE `tbl_customer_cookies_master` SET `status`='logout' WHERE `cookie`='".get_cookie('cookie')."' AND `cookie_pass`='".get_cookie('cookiepass')."' AND `cid`='".$user->id."'";
 $this->db->query($query);
	}
	public function checkuserlogin($username,$password)
	{
	$query="SELECT * FROM tbl_customer_master WHERE `email`='".$username."' OR `mobile`='".$username."'";
$res=$this->db->query($query)->row();
if (!empty($res)) {
	if ($res->password==md5($password)) {
	$cookie=md5($username.uniqid());
	$cookiepass=md5($password.uniqid());
	$cookierow=array('cookie'=>$cookie,'cookie_pass'=>$cookiepass,'cid'=>$res->id);
	$query=$this->db->insert("tbl_customer_cookies_master",$cookierow);
	if ($this->db->affected_rows($query)>0) 
	{
		$logincookie = array(
                        'name'   => 'cookie',
                        'value'  => $cookie,                            
                        'expire' => 86400 * 30,                                                                                   
                        'secure' => TRUE
                        );
$logincookiepass=array(
                        'name'   => 'cookiepass',
                        'value'  => $cookiepass,                            
                        'expire' => 86400 * 30,                                                                                   
                        'secure' => TRUE
                        );
$this->input->set_cookie($logincookie);
$this->input->set_cookie($logincookiepass);
$this->session->set_userdata('user',$res);
		$this->return['status']=1;
		$this->return['message']="Login Successfull!!";
		$this->return['return']=true;
	}
	else
	{
		$this->return['status']=0;
		$this->return['message']="Failed To set Cookies!!!!";
		$this->return['return']=false;
	}
	}
	else
	{
		$this->return['status']=0;
		$this->return['message']="Password Not Matched!!";
		$this->return['return']=false;
	}
}
else
{
		$this->return['status']=0;
		$this->return['message']="Invalid Username!!";
		$this->return['return']=false;
}
return $this->return;
	}
	public function register_user($mobile,$password,$email)
	{
		$data=array('mobile'=>$mobile,'password'=>md5($password), 'email'=>$email);
		$query=$this->db->insert('tbl_customer_master', $data);
	if($this->db->affected_rows($query)>0)
	{
	return true;
	}
	else
	{
	return false;
	}
	}
	public function adminloginmodal($username,$password)
	{
	 $query=$this->db->get_where('tbl_admin_master',array('email'=>$username,'password'=>md5($password)));
 if($query->num_rows()>0){
 	$res=$query->row_array();
 	$this->session->set_userdata('admin',$res);
 	return true;
 }
 else{
 	return false;
 }
 }
 public function contact_admin($data)
 {
 	$query=$this->db->insert('tbl_contact_master',$data);
 	if($this->db->affected_rows($query)>0)
	{
	return true;
	}
	else
	{
	return false;
	}
 	
 }
 public function get_books_search(){
 	$query = "SELECT name FROM tbl_product_master ORDER BY id";
    return $this->db->query($query)->result();
 }
 public function getproductlarge($id){
 	$this->db->select('a.*,c.name as unitname');
		$this->db->from('tbl_product_master AS a');
		$this->db->join('tbl_category_master AS b','a.catid=b.id');
		$this->db->join('tbl_unit AS c','b.unit_id=c.id');
		$this->db->where('a.id',$id);
		return $this->db->get()->result();
 }
 public function related_product($catid,$product){
 	$query = "SELECT p.*,u.name as unit FROM `tbl_product_master` as p join tbl_category_master as c on p.catid=c.id JOIN `tbl_unit` as u on u.id=c.unit_id WHERE p.id<>'".$product."' AND p.catid='".$catid."' ORDER BY id DESC LIMIT 2";
    return $this->db->query($query)->result();
 }
 function get_banners()
 {
   $query=$this->db->query("SELECT * FROM tbl_banner_master ORDER BY id desc");
	return $query->result();  
 }
 public function user_check($email){
     $query=$this->db->get_where('tbl_customer_master',array('email'=>$email));
	if($query->num_rows()>0){
	    return true;
	}else{
	    return false;
	}
 }
 public function user_resetpass($pass){
     $this->db->set('password',md5($pass));
	$this->db->where('email',$this->session->userdata('email'));
	$query=$this->db->update('tbl_customer_master');
     if($query){
         return true;
     }else{
         return false;
     }
 }
} 