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
			$this->db->from("vendor");
			$this->db->where("vendor_username",$username);
			$this->db->where("vendor_password",$password);
			$query=$this->db->get();
			if($query->num_rows())
			{
				$row = $query->result_array()[0];
				$this->session->set_userdata('vendor_id',$row["vendor_id"]);
				$this->session->set_userdata('vendor_name',$row["vendor_name"]);
				$this->session->set_userdata('vendor_username',$row["vendor_username"]);
				$this->session->set_userdata('vendor_password',$row["vendor_password"]);
				return true;
			}
			else
			{
				return false;
			}
	}


	public function CheckCurrentPassword($current) {
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->where('vendor_password',$current);
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
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
		$data=array('vendor_password' => $pass);
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		$this->db->update('vendor',$data);
		return true;
	}
	
	
}
 ?>