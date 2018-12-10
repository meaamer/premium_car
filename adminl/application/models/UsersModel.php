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
			$this->db->from("admin");
			$this->db->where("username",$username);
			$this->db->where("password",$password);
			$query=$this->db->get();
			if($query->num_rows())
			{
				$row = $query->result_array()[0];
				$this->session->set_userdata('userid',$row["admin_id"]);
				$this->session->set_userdata('admin_name',$row["admin_name"]);
				$this->session->set_userdata('username',$row["username"]);
				$this->session->set_userdata('password',$row["password"]);
				return true;
			}
			else
			{
				return false;
			}
	}
	
}
 ?>