<?php
class Adminmodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		public function getpassat($date)
	{
		$return="<tr><td colspan='6' class='alert alert-info'>No Records Found On (".$date.")</td></tr>";
	$rows=$this->db->query("SELECT * FROM tbl_order_parent_master WHERE uon like '%".$date."%' AND `status`='delivered'")->result();
	if (!empty($rows)) {
	$return="";
	foreach ($rows as $key) {
		$product=$this->db->query("SELECT * FROM tbl_product_master WHERE `id`='".$key->titems."'")->row_array();
		$return.="<tr>
              <th>".$key->oid."</th>
              <th>".$product['name']."(".$key->qnt.")</th>
              <th>".$key->rname."<br>".$key->addressline.",".$key->pin_code.",".$key->city.",".$key->state."<br>".$key->mobile."</th>
              <th>".$key->tamount."</th>
              <th>".$key->odate."</th>
              <th>".$key->uon."</th>
            </tr>";
	}
	}
	return $return;
	}
	public function get_admin($id)
	{
	 $query=$this->db->get_where('tbl_admin_master',array('id'=>$id));
return $query->row_array();
	}
	public function allunit(){
	   $this->db->select('*');
		$this->db->from('tbl_unit');
		return $this->db->get()->result(); 
	}
	public function categories()
	{
		$this->db->select('a.*,b.id as unit');
		$this->db->from('tbl_category_master AS a');
		$this->db->join('tbl_unit AS b','a.unit_id=b.id');
		return $this->db->get()->result();
	}
	public function addcat($name,$unit_id)
	{
		$email=$this->session->userdata('admin')['email'];
		$data = array(
        'name'=>$name,
        'unit_id'=>$unit_id,
        'cby'=>$email
    );
		$query=$this->db->insert('tbl_category_master',$data);
		 if($query){
		 	return true;
		 }
		 else{
		 	return false;
		 }
	}
	public function editcat($id,$name,$unit_id)
	{
		$data = array(
        'name'=>$name,
        'unit_id'=>$unit_id,
        'uby'=>$this->session->userdata('admin')['email']
    );
		$this->db->where('id', $id);
        $this->db->update('tbl_category_master', $data);
		 	return true;
	}
	public function product()
	{
		$this->db->select('a.*,b.name as cat');
		$this->db->from('tbl_product_master AS a');
		$this->db->join('tbl_category_master AS b','a.catid=b.id');
		return $this->db->get()->result();
	}
public function addproducts($name,$description,$stock,$mrp,$catid,$selling_price,$mfg_details,$author,$writer,$publisher,$disclaimer,$minalert,$image1,$image2)
	{
		if (!empty($image1) and !empty($image2)) {
		$img=$image1;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/product/img/'.$fname;
		// dimg
		$img2=$image2;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/product/img/'.$fname2;
		$admid=$this->session->userdata('admin')['name'];
		if (file_put_contents($fileName, $fileData) && file_put_contents($fileName2, $fileData2)){
		$data=array(
			'name'=>$name,
			'description'=>$description,
			'stock'=>$stock,
			'mrp'=>$mrp,
			'catid'=>$catid,
			'selling_price'=>$selling_price,
			'mfg_details'=>$mfg_details,
			'author'=>$author,
			'writer'=>$writer,
			'publisher'=>$publisher,
			'disclaimer'=>$disclaimer,
			'minalert'=>$minalert,
			'img1'=>$fname,
			'img2'=>$fname2,
			'cby'=>$admid
	);
		$query=$this->db->insert('tbl_product_master',$data);
if($this->db->affected_rows($query)>0){
	return true;
}else{
	return false;
	}
}
}
}
public function editgetpro($id){
	$query=$this->db->get_where('tbl_product_master',array('id'=>$id));
    return $query->row_array();
}
public function updateproducts($id,$name,$description,$stock,$mrp,$catid,$selling_price,$mfg_details,$author,$writer,$publisher,$disclaimer,$minalert,$image1,$image2)
	{
		$admid=$this->session->userdata('admin')['name'];
		if (!empty($image1) and !empty($image2)) {
		$img=$image1;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/product/img/'.$fname;
		// dimg
		$img2=$image2;
		$fname2=uniqid().".jpeg";
		$fileData2 = base64_decode($img2);
		$fileName2 =  'app-assets/product/img/'.$fname2;
		if (file_put_contents($fileName, $fileData) && file_put_contents($fileName2, $fileData2)){
		$imagedata=array(
			'img1'=>$fname,
			'img2'=>$fname2,
			'uby'=>$admid
	);
		$this->db->where('id',$id);
 	    $this->db->update('tbl_product_master',$imagedata);
}
}
$data=array(
			'name'=>$name,
			'description'=>$description,
			'stock'=>$stock,
			'mrp'=>$mrp,
			'catid'=>$catid,
			'selling_price'=>$selling_price,
			'mfg_details'=>$mfg_details,
			'author'=>$author,
			'writer'=>$writer,
			'publisher'=>$publisher,
			'disclaimer'=>$disclaimer,
			'minalert'=>$minalert,
			'uby'=>$admid
	);
		$this->db->where('id',$id);
 	$query = $this->db->update('tbl_product_master',$data);
 	if($this->db->affected_rows($query)>0){
	return true;
}else{
	return false;
	}
}
function addproqnt($id,$addqnt){
	$admid=$this->session->userdata('admin')['name'];
	$getdata=$this->editgetpro($id);
	$stock=$getdata['stock'] + $addqnt;
	$data=array(
			'stock'=>$stock,
			'uby'=>$admid
		);
	$this->db->where('id',$id);
 	$query = $this->db->update('tbl_product_master',$data);
 	if($this->db->affected_rows($query)>0){
	return true;
}else{
	return false;
	}
}
function neworder(){
	$query=$this->db->query("SELECT *,COUNT(*) AS total_items,SUM(tamount) AS totalamt FROM `tbl_order_parent_master` WHERE `status`='ordered' GROUP BY oid ORDER BY `id`");
	return $query->result();
}
function orderlist($oid){
	$this->db->select('*,b.name as prname');
	$this->db->from('tbl_order_parent_master AS a');
	$this->db->join('tbl_product_master AS b','a.titems=b.id');
	$this->db->where('a.oid',$oid);
	$this->db->where('a.status','ordered');
	return $this->db->get()->result();
}
function oldorder(){
	$query=$this->db->query("SELECT *,COUNT(*) AS total_items,SUM(tamount) AS totalamt FROM `tbl_order_parent_master` WHERE `status`='delivered' GROUP BY oid ORDER BY `id` DESC");
	return $query->result();
}
function oldorderlistdata($oid){
	$this->db->select('*,b.name as prname');
	$this->db->from('tbl_order_parent_master AS a');
	$this->db->join('tbl_product_master AS b','a.titems=b.id');
	$this->db->where('a.oid',$oid);
	$this->db->where('a.status','delivered');
	return $this->db->get()->result();
}
function cancelorder(){
	$query=$this->db->query("SELECT *,COUNT(*) AS total_items,SUM(tamount) AS totalamt FROM `tbl_order_parent_master` WHERE `status`='cancel' GROUP BY oid ORDER BY `id` DESC");
	return $query->result();
}
function cancelorderlistdata($oid){
	$this->db->select('*,b.name as prname');
	$this->db->from('tbl_order_parent_master AS a');
	$this->db->join('tbl_product_master AS b','a.titems=b.id');
	$this->db->where('a.oid',$oid);
	$this->db->where('a.status','cancel');
	return $this->db->get()->result();
}
function deliveredordmodal($oid){
    $data = array(
        'ptype'=>'PAID',
        'status'=>'delivered',
        'uby'=>$this->session->userdata('admin')['email']
    );
		$this->db->where('oid', $oid);
        $this->db->update('tbl_order_parent_master', $data);
		 	return true;
}
 function get_chats(){
     $query=$this->db->query("SELECT * FROM tbl_contact_master WHERE id IN (SELECT MAX(id) FROM tbl_contact_master  GROUP BY email ) ORDER BY id desc");
	return $query->result();
 }
 function countunseen($mobile){
     $query=$this->db->query("SELECT COUNT(*) as cn FROM tbl_contact_master WHERE status='unseen' AND mobile='".$mobile."'");
	return $query->result();
 }
 function get_msgs($mobile){
     $query=$this->db->query("SELECT * FROM `tbl_contact_master` WHERE `mobile`='".$mobile."' ORDER BY con");
     $this->db->where('mobile',$mobile);
     $this->db->update('tbl_contact_master',array("status"=>"seen"));
     return $query->result();
 }
 function get_banners()
 {
   $query=$this->db->query("SELECT * FROM tbl_banner_master ORDER BY id desc");
	return $query->result();  
 }
 function edit_banners($id,$banner,$line1,$line2)
 {
     if (!empty($banner)){
		$img=$banner;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/admin/Banners/'.$fname;
		if(file_put_contents($fileName, $fileData))
		{
		    $data = array(
        'banner'=>$fname,
        'line1'=>$line1,
        'line2'=>$line2
    );
		$this->db->where('id', $id);
        $query=$this->db->update('tbl_banner_master', $data);
	if($query)
 	{
 		$return['message']="Banner Changed";
 		$return['status']=true;
 	}
 	else{
	$return['message']="Banner Can't Be Empty";
	$return['status']=false;
		}
	}
	return $return;
}
 
 }
 function count_sale(){
     $query=$this->db->query("SELECT count(*) as sale FROM `tbl_order_parent_master` where status='delivered'");
	return $query->row_array();
 }
 function count_all_orders(){
     $query=$this->db->query("SELECT count(*) as orders FROM `tbl_order_parent_master` where status<>'cancel'");
	return $query->row_array();
 }
 function count_user(){
     $query=$this->db->query("SELECT count(*) as customer FROM `tbl_customer_master` where status='1'");
	return $query->row_array();
 }
 function count_product(){
     $query=$this->db->query("SELECT count(*) as product FROM `tbl_product_master` where stock > '0'");
	return $query->row_array();
 }
 function count_revenue(){
     $query=$this->db->query("SELECT SUM(tamount) as revenue FROM `tbl_order_parent_master` where status='delivered'");
	return $query->row_array();
 }
 function get_dash_table()
 {
    $query=$this->db->query("SELECT p.name as product, c.name as category,p.stock as quantity FROM `tbl_product_master` as p join tbl_category_master as c on p.catid=c.id LIMIT 7");
	return $query->result(); 
 }
 function count_profit(){
     $query=$this->db->query("SELECT SUM(b.tamount-b.qnt*a.mrp) AS profit FROM `tbl_product_master` AS a RIGHT JOIN tbl_order_parent_master AS b ON a.id=b.titems WHERE b.status='delivered'");
	return $query->row_array();
 }
 function month_income(){
     $query=$this->db->query("SELECT SUM(b.tamount-b.qnt*a.mrp) AS month_income FROM `tbl_product_master` AS a RIGHT JOIN tbl_order_parent_master AS b ON a.id=b.titems WHERE b.status='delivered' AND MONTH(b.d_date)=MONTH(CURRENT_DATE())");
	return $query->row_array();
 }
 function lastmonth_income(){
     $last_month=$this->db->query("SELECT SUM(b.tamount-b.qnt*a.mrp) AS lastmonth_income FROM `tbl_product_master` AS a RIGHT JOIN tbl_order_parent_master AS b ON a.id=b.titems WHERE b.status='delivered' AND MONTH(b.d_date)=MONTH(CURRENT_DATE())-1")->row_array();
	 $this_month=$this->month_income();
	return $return=$this_month['month_income']-$last_month['lastmonth_income'];
 }
 
}