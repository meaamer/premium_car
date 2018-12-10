<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyModel extends CI_Model {
	
		
	// fetch all company details
	public function CompanyList($id=null){
		
		$this->db->select('*');
		$this->db->from('company');
		if($id!=null){
			$this->db->where('company_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	
	
	
	
	
	//add new company details
	public function AddCompany($data){
		$this->db->insert('company',$data);
		return true;
	}
	
	//check same user exist or not
	public function IfUaserExist($username){
		$this->db->select('*');
		$this->db->from('company');
		$this->db->where('company_username',$username);
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
	
	
	public function UpdateCompany($id){
		
			$data=array(
			'company_name' => $this->input->post('c_name'),
			'company_person_name' => $this->input->post('owner_name'),
			'company_username' => $this->input->post('c_username'),
			'company_password' => $this->input->post('c_password'),
			'company_contact_no' => $this->input->post('c_contact'),
			'company_city' => $this->input->post('c_city'));
			
		$this->db->where('company_id',$id);
		$this->db->update('company',$data);
		return true;
		
	}
	
	// to delete Vandor from database
	public function DeleteCompany($id){
		
		$this->db->where('company_id',$id);
		$this->db->delete('company');
		return true;
	}
	
		
/***************function for datatable pligins**********************/
	
	var $table="company";

	var $selectColoum=array("company_id","company_name","company_person_name","company_contact_no","company_city",
	"company_username","company_password");
		
	var $order_column=array("company_id","company_name","company_person_name","company_contact_no","company_city",
	"company_username",null);


/*******Function for Search Query****/
	public function SearchQuery(){
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("company_id",$_POST["search"]["value"]);
			$this->db->or_like("company_name",$_POST["search"]["value"]);
			$this->db->or_like("company_person_name",$_POST["search"]["value"]);
			$this->db->or_like("company_contact_no",$_POST["search"]["value"]);
			$this->db->or_like("company_city",$_POST["search"]["value"]);
			$this->db->or_like("company_username",$_POST["search"]["value"]);
			
		}
		
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('company_id', 'DESC');  
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