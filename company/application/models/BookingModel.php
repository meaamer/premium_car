<?php
class BookingModel extends CI_Model {
	
	//use to fetech cabs list to select user
	public function CabList(){
		$this->db->select('*');
		$this->db->from('cabs');
		$result=$this->db->get();
		return $result->result_array();
	}
	
	
/******###################*Function For Getting estimated Rate ####################*********/

	
	public function GetOsRate($company_id,$cab_id){
		$this->db->select('*');
		$this->db->from('company__outstation');
		$this->db->join('cabs','cabs.cab_id=company__outstation.cab_id','left');
		$this->db->where('company_id',$company_id);
		$this->db->where('company__outstation.cab_id',$cab_id);
		$this->db->order_by('company_outstation_id','DESC');
		$q=$this->db->get();
		return $q->result_array()[0];
	}
	
	
	public function GetLocalEstimation($company_id,$cab_id){
		$this->db->select('*');
		$this->db->from('company__local');
		$this->db->join('cabs','cabs.cab_id=company__local.cab_id','left');
		$this->db->where('company_id',$company_id);
		$this->db->where('company__local.cab_id',$cab_id);
		$this->db->order_by('company_local_id','DESC');
		$q=$this->db->get();
		return $q->result_array()[0];
	}
	
	public function GetTREstimation($company_id,$cab_id){
		$this->db->select('*');
		$this->db->from('company__transfer');
		$this->db->join('cabs','cabs.cab_id=company__transfer.cab_id','left');
		$this->db->where('company_id',$company_id);
		$this->db->where('company__transfer.cab_id',$cab_id);
		$this->db->order_by('company_transfer_id','DESC');
		$q=$this->db->get();
		return $q->result_array()[0];
	}
	
	########################### Getting estimated Rate ends #######################
	
	// store outstion form details
	public function OSBooking(){

		date_default_timezone_set("Asia/Calcutta");
		$data=array(
		'type' => $this->input->post('type'),
		'cab_id' => $this->input->post('cab'),
		'company_id' =>$this->session->userdata('company_id'),
		'from_city' => $this->input->post('from_city'),
		'traveling_date' => $this->input->post('date'),
		'traveling_time' => $this->input->post('time'),
		'no_of_days' => $this->input->post('day'),
		'pickup_address' => $this->input->post('address'),
		'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'mobile_number' => $this->input->post('mobile'),
		'alternate_number' => $this->input->post('alt_mobile'),
		'booking_timestamp'=>date('d-m-y h:i A'));
		
		$this->db->insert('booking',$data);
		
		$cab_id= $this->input->get_post('cab');
		$company_id=$this->session->userdata('company_id');
		$last_id = $this->db->insert_id();
		
		if( $this->input->post('type')=="outstation" ){
			
			$OS_price=$this->CompanyOSPrice($cab_id,$company_id);
			
			$data=array(
			'booking_id' => $last_id,
			'cab_id' => $this->input->post('cab'),
			'to_city' => $this->input->post('to_city'),
			'outstation_per_kilometer' => $OS_price['outstation_per_kilometer'],
			'extra_per_kilometer' => $OS_price['extra_per_kilometer'],
			'average_per_kilometer' => $OS_price['average_per_kilometer']);
			
			$this->db->insert('booking__outstaion',$data);
		}
		return true;
		
	}
	
	
	// store transfer form details
	public function TRBooking(){
		date_default_timezone_set("Asia/Calcutta");
		$data=array(
		'type' => $this->input->post('type'),
		'cab_id' => $this->input->post('cab'),
		'company_id' =>$this->session->userdata('company_id'),
		'from_city' => $this->input->post('from_city'),
		
		'traveling_date' => $this->input->post('date'),
		'traveling_time' => $this->input->post('time'),
		
		'pickup_address' => $this->input->post('address'),
		'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'mobile_number' => $this->input->post('mobile'),
		'alternate_number' => $this->input->post('alt_mobile'),
		'booking_timestamp'=>date('d-m-y h:i A'));
		
		$this->db->insert('booking',$data);
		
		
		$cab_id= $this->input->get_post('cab');
		$company_id=$this->session->userdata('company_id');
		
		$last_id = $this->db->insert_id();
		
		if( $this->input->post('type')=="transfer" ){
			
			$TR_price=$this->CompanyTRPrice($cab_id,$company_id);
		//die($cab_id."".$company_id);
		$data=array(
		'booking_id' => $last_id,
		'cab_id' => $this->input->post('cab'),
		
		'pickup_point' => $this->input->post('address'),
		'drop_point' => $this->input->post('drop_address'),
		'transfer_rate' => $TR_price['transfer_rate'],
		'waiting_charges' => $TR_price['waiting_charges']);
			
			$this->db->insert('booking__transfer',$data);
		}
		
		return true;
		
	}
	
	
	// store Local form details
	public function LocalBooking(){
		
		date_default_timezone_set("Asia/Calcutta");
		$data=array(
		'type' => $this->input->post('type'),
		'sub_type' => $this->input->post('duration'),
		'cab_id' => $this->input->post('cab'),
		'company_id' =>$this->session->userdata('company_id'),
		'from_city' => $this->input->post('from_city'),
		'traveling_date' => $this->input->post('date'),
		'traveling_time' => $this->input->post('time'),
		'pickup_address' => $this->input->post('address'),
		'first_name' => $this->input->post('first_name'),
		'last_name' => $this->input->post('last_name'),
		'mobile_number' => $this->input->post('mobile'),
		'alternate_number' => $this->input->post('alt_mobile'),
		'booking_timestamp'=>date('d-m-y h:i A'));
		
		$this->db->insert('booking',$data);
		
		
		
		$cab_id= $this->input->get_post('cab');
		$company_id=$this->session->userdata('company_id');
		
		
		$last_id = $this->db->insert_id();
		
		if($this->input->post('type')=="local" ){
			
		$local_price=$this->CompanyLocalPrice($cab_id,$company_id);
			
		$data=array(
		'booking_id' => $last_id,
		'cab_id' => $this->input->post('cab'),
		
		'full_day' => $local_price['full_day'],
		'half_day' => $local_price['half_day'],
		'extra_kilometer' => $local_price['extra_kilometer'],
		'extra_hour' => $local_price['extra_hour']);
		
			
			$this->db->insert('booking__local',$data);
		}
		
		return true;
		
	}
	
	
	
	
	################################# Get all companY Local ,OS ,TR PRCEs #########################
	public function CompanyLocalPrice($cab_id,$company_id){
		$this->db->select('*');
		$this->db->from('company__local');
		$this->db->where('cab_id',$cab_id);
		$this->db->where('company_id',$company_id);
		$result=$this->db->get();
		return $result->result_array()[0];
	}
	
	public function CompanyOSPrice($cab_id,$company_id){
		$this->db->select('*');
		$this->db->from('company__outstation');
		$this->db->where('cab_id',$cab_id);
		$this->db->where('company_id',$company_id);
		$result=$this->db->get();
		return $result->result_array()[0];
	}
	
	public function CompanyTRPrice($cab_id,$company_id){
	
		$this->db->select('*');
		$this->db->from('company__transfer');
		$this->db->where('cab_id',$cab_id);
		$this->db->where('company_id',$company_id);
		$result=$this->db->get();
		return $result->result_array()[0];
	}
	
}
?>