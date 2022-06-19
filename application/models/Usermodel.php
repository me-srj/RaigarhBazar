<?php
class Usermodel extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function userdetails()
	{
		$query=$this->db->get_where('tbl_customer_master',array('id'=>$this->session->userdata('user')->id));
        return $query->row();
	}
	public function addressdetails()
	{
		$query=$this->db->get_where('tbl_address_master',array('cid'=>$this->session->userdata('user')->id));
        return $query->row();
	}
	public function Edit_Profile_Photo($photo)
	{
		if (!empty($photo)){
		$img=$photo;
		$fname=uniqid().".jpeg";
		$fileData = base64_decode($img);
		$fileName =  'app-assets/user/img/bg-img/'.$fname;
		if(file_put_contents($fileName, $fileData))
		{
			$this->db->set('image',$fname);
			$this->db->where('id',$this->session->userdata('user')->id);
			$query=$this->db->update('tbl_customer_master');
	if($query)
 	{
 		$return['message']="Profile Photo Updated";
 		$return['status']=1;
 	}
 	else{
	$return['message']="Failed to Update";
	$return['status']=0;

		}
		
			
	}
}
     return $return;
}
	public function Edit_Profile($name,$email)
	{
		$data=array('Name'=>$name,'email'=>$email);
		$this->db->where('id',$this->session->userdata('user')->id);
 	$query = $this->db->update('tbl_customer_master',$data);
 	if($query)
 	{
 		$return['message']="Updated Successfully !!";
 		$return['status']=1;
 	}
 	else{
	$return['message']="Failed to Update";
	$return['status']=0;
}
return $return;

	}
	public function Edit_Address($rname,$pincode,$PostOffice,$state,$address)
	{
		$query=$this->db->get_where('tbl_address_master',array('cid'=>$this->session->userdata('user')->id));
        $res=$query->row();
        if(!empty($res))
        {
        	$data=array('rname'=>$rname,'addressline'=>$address,'pin_code'=>$pincode,'city'=>$PostOffice,'state'=>$state);
		$this->db->where('cid',$this->session->userdata('user')->id);
 	$query = $this->db->update('tbl_address_master',$data);
 	if($query)
 	{
 		$return['message']="Updated Successfully !!";
 		$return['status']=1;
 	}
 	else{
	$return['message']="Failed to Update";
	$return['status']=0;
}
return $return;          
        }
        else
        {
        	$data=array(
        		'cid'=>$this->session->userdata('user')->id,
        		'rname' =>$rname,
        		'addressline'=>$address,
        		'pin_code'=>$pincode,
        		'city'=>$PostOffice,
        		'state'=>$state,
        		'mobile'=>$this->session->userdata('user')->mobile
        	 );
        	$this->db->insert('tbl_address_master',$data);
        	if($this->db->affected_rows($query)>0){
			$return['status']=true;
			$return['message']="Added Successfully !!";
			}
			else
			{   $return['status']=false;
				$return['message']="Failed to Register";
			}
			return $return;
        }
	}
	public function AddToWishlist($pid)
	{		
     $book=$this->db->query("SELECT id FROM tbl_wishlist WHERE pid='".$pid."' AND cid='".$this->session->userdata('user')->id."'")->row_array();

		if(empty($book))
		{
			$data=array(
				'cid'=>$this->session->userdata('user')->id,
				'pid'=>$pid
			);
			$this->db->insert('tbl_wishlist',$data);
			$return['msg']="Book Added to Wishlist";
			$return['status']=true;
		}
		else
		{
			$this->remove_wishlist_item($book["id"]);
			$return['msg']="Book Remove from Your Wishlist";
			$return['status']=true;
		}
		return $return;
	}
	public function check_wishlist()
	{
		return $book=$this->db->query("SELECT pid FROM tbl_wishlist WHERE cid='".$this->session->userdata('user')->id."'")->result();

		// if(empty($book))
		// {
		// 	$data=array(
		// 		'cid'=>$this->session->userdata('user')->id,
		// 		'pid'=>$pid
		// 	);
		// 	$this->db->insert('tbl_wishlist',$data);
		// 	$return['msg']="Book Added to Wishlist";
		// 	$return['status']=true;
		// }

	}
	
		public function get_wishlist_Books($limit,$start)
	{ 
		
		
		 $query = "SELECT *,p.id as book_id,w.id as wid from tbl_wishlist as w join tbl_product_master as p on w.pid=p.id WHERE w.cid='".$this->session->userdata('user')->id."' ORDER BY w.id DESC LIMIT ".$start.", ".$limit."";
		 return $this->db->query($query)->result();

    }
    public function remove_wishlist_item($wid)
    {
    	$this->db->where('id',$wid);
        $query=$this->db->delete('tbl_wishlist');
        if($query)
        {
        	$return['msg']="Book Removed From Wishlist";
        	$return['status']=true;
        }
        else{
        	$return['msg']="Failed To delete";
        	$return['status']=false;

        }
        return $return;

    }
	function ordersub($oid,$ptype,$addressline,$city,$pin_code,$state){
		$shopcat=$this->session->userdata('shopping_cart');
		foreach ($shopcat as $book) {
			$pp=$book['price']*$book['quantity'];
			 $data=array(
        		'oid'=>$oid,
        		'cid' =>$this->session->userdata('user')->id,
        		'titems' =>$book['id'],
        		'qnt' =>$book['quantity'],
        		'size' =>$book['size'],
        		'tamount' =>$pp,
        		'ptype' =>$ptype,
        		'rname' =>$this->session->userdata('user')->Name,
        		'addressline'=>$addressline,
        		'pin_code'=>$pin_code,
        		'city'=>$city,
        		'state'=>$state,
        		'mobile'=>$this->session->userdata('user')->mobile,
        		'email'=>$this->session->userdata('user')->email
        	 );
        	  $select=$this->db->get_where('tbl_product_master',array('id' =>$book['id']))->result();
        	  $uqnt= $select[0]->stock-$book['quantity'];
        $this->db->set('stock',$uqnt);
	    $this->db->where('id',$book['id']);
		 $query=$this->db->update('tbl_product_master');
		 if($query){
        	 $this->db->insert('tbl_order_parent_master',$data);
        	 $this->session->unset_userdata('shopping_cart');
		 }
		}
 		return true;
	}
	function checkfab($pid){
		$query=$this->db->query("SELECT * FROM `tbl_wishlist` WHERE pid='".$pid."' AND cid='".$this->session->userdata('user')->id."'");
        if($query->num_rows()>0)
        {
        	return true;
        }
        else{
        	return false;
        }
	}
	function getOrder(){
		$this->db->select('a.*,b.img1,b.img2,b.name as prname');
		$this->db->from('tbl_order_parent_master AS a');
		$this->db->join('tbl_product_master AS b','a.titems=b.id');
		$this->db->where('a.cid',$this->session->userdata('user')->id);
		$this->db->order_by('id',"DESC");
		return $this->db->get()->result();
	}
	function getorderlarge($oid){
		$this->db->select('*,a.status as dlrp');
		$this->db->from('tbl_order_parent_master AS a');
		$this->db->join('tbl_product_master AS b','a.titems=b.id');
		$this->db->where('oid',$oid);
		return $this->db->get()->result_array();
	}
	function cancelorder($oid){
	    $getdata=$this->getorderlarge($oid);
	    foreach($getdata as $get){
	        $uqnt=$get['qnt']+$get['stock'];
	        $this->db->set('stock',$uqnt);
	    $this->db->where('id',$get['titems']);
		 $query=$this->db->update('tbl_product_master');
		 if($query){
		$this->db->set('status','cancel');
	    $this->db->where('oid',$oid);
		$this->db->update('tbl_order_parent_master');
		 }
	    }
 		return true;
	}
}