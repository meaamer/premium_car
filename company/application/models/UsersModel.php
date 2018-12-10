<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class UsersModel extends CI_Model
{
	// check username password and create session here
	public function CheckUserDetail($username,$password) {

			
			$this->db->select("*");
			$this->db->from("company");
			$this->db->where("company_username",$username);
			$this->db->where("company_password",$password);
			$query=$this->db->get();
			if($query->num_rows())
			{
				$row = $query->result_array()[0];
				$this->session->set_userdata('company_id',$row["company_id"]);
				$this->session->set_userdata('company_name',$row["company_name"]);
				$this->session->set_userdata('company_username',$row["company_username"]);
				$this->session->set_userdata('company_password',$row["company_password"]);
				return true;
			}
			else
			{
				return false;
			}
	}

	public function CheckCurrentPassword($current) {
		$this->db->select('*');
		$this->db->from('company');
		$this->db->where('company_password',$current);
		$this->db->where('company_id',$this->session->userdata('company_id'));
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

	public function ResetPassword($pass){
		$data=array('company_password' => $pass);
		$this->db->where('company_id',$this->session->userdata('company_id'));
		$this->db->update('company',$data);
		return true;
	}
	
}
 ?>