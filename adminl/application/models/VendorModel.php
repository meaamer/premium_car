<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorModel extends CI_Model {
	
	// fetch all company details
	public function VendorList($id=null){
		
		$this->db->select('*');
		$this->db->from('vendor');
		if($id!=null){
			$this->db->where('vendor_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	
	//add new company details
	public function AddVendor($data){
		$this->db->insert('vendor',$data);
		return true;
	}
	
	
	
	//check same user exist or not
	public function IfUaserExist($username){
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where('vendor_username',$username);
		$query=$this->db->get();
			if($query->num_rows()>0)
			{
				
				return true;
			}
			else
			{
				return false;
			}
		
		
	}
	
	public function UpdateVendor($data,$id){
		
		$this->db->where('vendor_id',$id);
		$this->db->update('vendor',$data);
		return true;
	}
	
	
	// to delete Vandor from database
	public function DeleteVendor($id){
		
		$this->db->where('vendor_id',$id);
		$this->db->delete('vendor');
		return true;
	}
	
	// fetch all bookig details for checking v
	public function BookingList(){
		
		$this->db->select('*');
		$this->db->from('booking');
		$result = $this->db->get();
		return $result->result_array();
		
	}
	
	public function AssignVendor($data,$id){
		$this->db->where('booking_id',$id);
		$this->db->update('booking',$data);
		return true;
	}
	
			
/***************function for datatable pligins**********************/
	
	var $table="vendor";

	var $selectColoum=array("vendor_id","vendor_name","vendor_person_name","vendor_contact_no","vendor_city",
	"vendor_username","vendor_password");
		
	var $order_column=array("vendor_id","vendor_name","vendor_person_name","vendor_contact_no","vendor_city",
	"vendor_username",null);


/*******Function for Search Query****/
	public function SearchQuery(){
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("vendor_id",$_POST["search"]["value"]);
			$this->db->or_like("vendor_name",$_POST["search"]["value"]);
			$this->db->or_like("vendor_person_name",$_POST["search"]["value"]);
			$this->db->or_like("vendor_contact_no",$_POST["search"]["value"]);
			$this->db->or_like("vendor_city",$_POST["search"]["value"]);
			$this->db->or_like("vendor_username",$_POST["search"]["value"]);
			
		}
		
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('vendor_id', 'DESC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function MakeTable(){
		$this->SearchQuery();  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function GetFilterData(){
		$this->SearchQuery();  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function GetAllData(){
		$this->db->select("*");  
        $this->db->from($this->table);  
        return $this->db->count_all_results();  
	}
}




?>