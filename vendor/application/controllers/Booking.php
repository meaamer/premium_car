<?php 
class Booking extends CI_Controller{
	
	
	//show Outstation booking list
	// public function Index($id=null){
	// 	header('Access-Control-Allow-Origin:*');
	// 	$this->load->view('includes/header');
	// 	$this->load->view('includes/aside');
	// 	$this->load->model('BookingModel');
	// 	$data['bookings']=$this->BookingModel->BookingList();
	// 	$this->load->view('booking/BookingList',$data);
	// 	$this->load->view('includes/footer');
	// }
	
	public function NewBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('booking/NewBooking');
		$this->load->view('includes/footer');
	}
	
	public function UnsettledBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('booking/UnsettledBooking');
		$this->load->view('includes/footer');
	}
	
	public function SettledBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('booking/SettledBooking');
		$this->load->view('includes/footer');
	}
	
	
	public function BookingDetail($booking_id,$type){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('BookingModel');
		$data['pricings']=$this->BookingModel->VendorPricing($type);
		$data['details']=$this->BookingModel->BookingDetail($booking_id,$type)[0];
		if ($type=='local'){
			$this->load->view('booking/LocalBookingDetail',$data);
			
		}elseif($type=='outstation'){
			
			$this->load->view('booking/OSBookingDetail',$data);
			
		}elseif($type=='transfer'){
			$this->load->view('booking/TRBookingDetail',$data);
		}
		
		$this->load->view('includes/footer');
		
	}
	
	
	//**
	public function BookingList($para){
		//die(print_r($para));
		header('Access-Control-Allow-Origin:*');
		$this->load->model('BookingModel');  
		$fetch_data = $this->BookingModel->MakeTable($para);  
		$data = array();
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->booking_id;
			$sub_array[]=$row->type;
			$sub_array[]=$row->from_city;
			$sub_array[]=$row->traveling_date;
			$sub_array[]=$row->traveling_time;
			$sub_array[]='<a href="'.base_url().'Booking/BookingDetail/'.$row->booking_id.'/'.$row->type.'"
			 class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>';
			
			$sub_array[]=$row->vendor_status;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->BookingModel->GetAllData($para),  
            "recordsFiltered"       =>     $this->BookingModel->GetFilterData($para),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}



/******************Accept Booking****************/
		public function AcceptBooking($booking_id){

		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('d_name', 'Driver Name', 'required');
		$this->form_validation->set_rules('d_no', 'Number', 'required');
		$this->form_validation->set_rules('cab_no', 'Cab Number', 'required');
		
		
		if($this->form_validation->run()){

			$this->load->model('BookingModel');
			if($this->BookingModel->AcceptBooking($booking_id)){
				echo "You Have Accepted the Booking";
			} else {
				echo "Booking Not Accepted";
			}
			
			
		}
		else {
			echo validation_errors();
		}

		
			


			
			
			
		}
		
		public function RejectBooking(){
		header('Access-Control-Allow-Origin:*');
			$booking_id=$this->input->get_post('booking_id');
			$vendor_id=$this->input->get_post('vendor_id');
			$this->load->model('BookingModel');
			if($this->BookingModel->RejectBooking($booking_id)){
				echo "You Have Rejected the Booking";
			} else {
				echo "Booking Not Rejected";
			}
			
			
		}

}

?>

