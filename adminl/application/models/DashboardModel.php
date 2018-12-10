<?php
class DashboardModel extends CI_Model {
	
	public function LocalCount(){
		
		$this->db->select('*');
		$this->db->from('booking__local');
		$this->db->join('booking','booking.booking_id = booking__local.booking_id','left');
		$this->db->where('booking.traveling_date',date("d-m-Y"));
		$this->db->where('booking.type','local');
		$result=$this->db->get();
		return $result->num_rows();
		
		
	}
	
	public function OSCount(){
		
		$this->db->select('*');
		$this->db->from('booking__outstaion');
		$this->db->join('booking','booking.booking_id = booking__outstaion.booking_id','left');
		$this->db->where('booking.type','outstation');
		$this->db->where('booking.traveling_date',date("d-m-Y"));
		$result=$this->db->get();
		return $result->num_rows();
		
		
	}
	
	public function TRCount(){
		
		$this->db->select('*');
		$this->db->from('booking__transfer');
		$this->db->join('booking','booking.booking_id = booking__transfer.booking_id','left');
		$this->db->where('booking.traveling_date',date("d-m-Y"));
		$this->db->where('booking.type','transfer');
		$result=$this->db->get();
		return $result->num_rows();
		
		
	}
	
	public function MothCount(){
		
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->like('traveling_date',date('m-Y'));
		$result=$this->db->get();
		return $result->num_rows();
		
		
	}
	
	
}
?>