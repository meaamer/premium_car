<?php

class DashboardModel extends CI_Model {

	

	public function LocalCount(){

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		$this->db->where('type','local');
		$this->db->where('vendor_status',0);
		$result=$this->db->get();
		return $result->num_rows();
		
}

	

	public function OSCount(){

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		$this->db->where('type','outstation');
		$this->db->where('vendor_status',0);
		$result=$this->db->get();
		return $result->num_rows();
	}

	

	public function TRCount(){

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		$this->db->where('type','transfer');
		$this->db->where('vendor_status',0);
		$result=$this->db->get();
		return $result->num_rows();

	}

	

	public function MothCount(){

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->like('traveling_date',date("m-Y"));
		$this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		$result=$this->db->get();
		return $result->num_rows();
		
		

	}

	

	

}

?>