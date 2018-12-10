<?php
class LocalCompanyModel extends CI_Model {
	
	// fetch all company local table details
	public function CompanyLocalList($id=null){
		
		
		
	}
	
	public function DeleteLocalCompany($id){
		
		$this->db->where('company_local_id',$id);
		$this->db->delete('company__local');
		return true;
	}
	
	public function AddLocalCompany($data){
		$this->db->insert('company__local',$data);
		
		
	}
	
}
?>