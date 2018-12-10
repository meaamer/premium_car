<?php 
class CloseBookingModel extends CI_Model{
	
	public function CheckCloseBooking(){
		$this->db->select('*');
		$this->db->from('close_outstation');
		$this->db->where('booking_id','152');
		$result=$this->db->get();
		return $result->result_array();
	}
	
	
	public function CloseBooking($data){
		$this->db->insert('close_outstation',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	
	public function Delete($id){
		$this->db->where('close_id', $id);
   		if($this->db->delete('close_outstation')){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
		
	//close local Outstation
	public function OSClosing($booking_id){
		date_default_timezone_set("Asia/Calcutta");
		$data1=array(
		'opening_km' => $this->input->post('open_km'),
		'closing_km' => $this->input->post('close_km'),
		//'assign_timestamp'=>date('d-m-y h:i A'),
		'vendor_status' => 3);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$data1);


		$data2=array(
		'extra_kilometer' =>0,
		'other_charges' => $this->input->post('other_charges'),
		'da' => $this->input->post('da'),
		'totat_kilometer' => $this->input->post('total_km'));

		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__outstaion',$data2);

		$data3=array(
		'reason' => $this->input->post('reason'),
		'credit' => $this->input->post('advance'),
		'vendor_id' => $this->input->post('vendor_id'),
		'booking_id' =>$booking_id,
		'date' => date('d-m-y'));
		$this->db->insert('advance_amount',$data3);
		
		return true;
		
	}

	//close local Outstation
	public function LocalClosing($booking_id){

		$data1=array(
		'opening_km' => $this->input->post('open_km'),
		'closing_km' => $this->input->post('close_km'),
		'vendor_status' => 3);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$data1);


		$data2=array(
		'extra_kilometer' => $this->input->post('extra_km'),
		'other_charges' => $this->input->post('other_charges'),
		'totat_kilometer' => $this->input->post('total_km'),
		'extra_hour' => $this->input->post('extra_hour'));
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__local',$data2);

		$data3=array(
		'reason' => $this->input->post('reason'),
		'credit' => $this->input->post('advance'),
		'vendor_id' => $this->input->post('vendor_id'),
		'booking_id' =>$booking_id,
		'date' => date('d-m-y'));
		$this->db->insert('advance_amount',$data3);

		return true;
		
	}



	//close local Outstation
	public function TRClosing($booking_id){

		$data1=array(
		'opening_km' => $this->input->post('open_km'),
		'closing_km' => $this->input->post('close_km'),
		'vendor_status' => 3);

		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$data1);


		$data2=array(
		'extra_kilometer' => 0,
		'other_charges' => $this->input->post('other_charges'),
		'totat_kilometer' => $this->input->post('total_km'));
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__transfer',$data2);


		$data3=array(
		'reason' => $this->input->post('reason'),
		'credit' => $this->input->post('advance'),
		'vendor_id' => $this->input->post('vendor_id'),
		'booking_id' =>$booking_id,
		'date' => date('d-m-y'));
		$this->db->insert('advance_amount',$data3);
		return true;
		
	}


	//show all the details of outstaion closed booking 
	public function ClosedBookingDetails($booking_id=null,$vendor_id=null){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('booking__outstaion','booking__outstaion.booking_id = booking.booking_id','left');
		$this->db->join('close_outstation','close_outstation.booking_id = booking.booking_id','left');
		$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
		$this->db->where('booking.booking_id',$booking_id);
		$result=$this->db->get();
		return $result->result_array()[0];

	}

	public function CloseOutsation($booking_id=null,$vendor_id=null){
		$this->db->select('*');
		$this->db->from('close_outstation');
		$this->db->where('booking_id',$booking_id);
		$this->db->where('vendor_id',$vendor_id);
		$result=$this->db->get();
		return $result->result_array();

	}


	//show all the details of Transfer closed booking 
	public function TRClosedBooking($booking_id=null,$vendor_id=null){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('booking__transfer','booking__transfer.booking_id = booking.booking_id','left');
		$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
		$this->db->where('booking.booking_id',$booking_id);
		$result=$this->db->get();
		return $result->result_array()[0];
		

	}


	//show all the details of local closed booking 
	public function LocalClosedBooking($booking_id=null,$vendor_id=null){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('booking__local','booking__local.booking_id = booking.booking_id','left');
		$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
		$this->db->where('booking.booking_id',$booking_id);
		$result=$this->db->get();
		return $result->result_array()[0];
		

	}


	


	
	
	
	
	

}

 ?>