<?php 
class Booking extends CI_Controller{
	
	// show the local booking form
	public function Local(){
		
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('BookingModel');
		$data['cabs']=$this->BookingModel->CabList();
		$this->load->view('booking/LocalBookngView',$data);
		$this->load->view('includes/footer');
	}

	// show the outstation booking form
		public function Outstation(){
		
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('BookingModel');
		$data['cabs']=$this->BookingModel->CabList();
		$this->load->view('booking/OSBookingView',$data);
		$this->load->view('includes/footer');
	}	
	
	
	// show the transfer booking form
	public function Transfer(){
		
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('BookingModel');
		$data['cabs']=$this->BookingModel->CabList();
		$this->load->view('booking/TRBookingView',$data);
		$this->load->view('includes/footer');
		
	}
	############################### showing estimated price################################
	
	

		public function GetOSEstimation(){
			
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('to_city', 'To City', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('day', 'Days', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]');
		
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'min_length[10]');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'min_length[10]');
		if($this->form_validation->run()){
			
			
			
		$this->load->library("uni");
		$data['distance'] = $this->uni->GetDistance($this->input->post('from_city'),$this->input->post('to_city'));
		$distance = $data['distance']['distance']['text'];
		$distancex = substr($distance, 0, -3);
		$data['distancex']=$distancex;
		//$data['total_kms']=$distance;
		$this->load->model('BookingModel');
		$data['rates']=$this->BookingModel->GetOsRate($this->session->userdata('company_id'),
		$this->input->post('cab'));
		$data['no_of_day']=$this->input->post('day');
		
		//die(print_r($data['no_of_day']));
		
		echo $this->load->view('FareDetails/OsDetails',$data,true);
		
		
		echo '<script>$("#estimate_card").css("display","inherit");$("#thisbook").removeClass("in");</script>';
			
			
			
		}
		else {
			echo validation_errors();
		}
		
}



	
	public function GetLocalEstimation(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('duration', 'Type', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		if($this->form_validation->run()){
		
		echo '<script>$("#thisbook").removeClass("in");$("#estimate_card").css("display","inherit");</script>';	
		
			$this->load->model('BookingModel');
			
			$data['rates']=$this->BookingModel->GetLocalEstimation($this->session->userdata('company_id'),
			
			$this->input->post('cab'));
			
			$data['type']=$this->input->post('duration');
			
			echo $this->load->view('FareDetails/LocalDetails',$data,true);
		
		}
		else {
			echo validation_errors();
		}
	}
	
	
	
	/*public function GetTREstimation(){
		
		$this->load->model('BookingModel');
		$data['rates']=$this->BookingModel->GetTREstimation($this->session->userdata('company_id'),
		$this->input->post('cab_id'));
		echo $this->load->view('FareDetails/TRDetails',$data,true);
		
	}*/
	
	public function GetTREstimation(){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('drop_address', 'Address', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		
		if($this->form_validation->run()){
			
		echo '<script>$("#estimate_card").css("display","inherit");$("#thisbook").removeClass("in");</script>';	
		$this->load->model('BookingModel');
		$data['rates']=$this->BookingModel->GetTREstimation($this->session->userdata('company_id'),
		$this->input->post('cab'));
		echo $this->load->view('FareDetails/TRDetails',$data,true);
		}
		else {
			echo validation_errors();
		}
	}
	
	
	
	#######################estimated price end#####################
	
	
	
	
	
	
	
	
	
	
	//add outstion Booking 
	public function OSBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('to_city', 'To City', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('day', 'Days', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'max_length[10]');
		
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'min_length[10]');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'max_length[10]');
		
		
		
		if($this->form_validation->run()){
			$this->load->model('BookingModel');
			$result=$this->BookingModel->OSBooking();
			//die(print_r($result));
			if($result==true){	
					die('Booking success');	
				//echo '<script>window.location="http://192.168.0.101/PremiumCars/company/Booking/Thanks";</script>';
			} 
			else {
				die ('<div class="alert alert-primary style="font-size:px;" >Please Resubmit</div>');
			}
		}
		else {
			echo validation_errors();
		}
	}
	
	
	//add transfer Booking 
	public function TRBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		$this->form_validation->set_rules('drop_address', 'Address', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'max_length[10]');
		
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'min_length[10]');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'max_length[10]');
		
		if($this->form_validation->run()){
			
			$this->load->model('BookingModel');
			$result =$this->BookingModel->TRBooking();
			if ($result == true) {	
				
					echo '<script>window.location="http://192.168.0.103/PremiumCars/company/Booking/Thanks";</script>';
			} 
			else {
				die ('<div class="alert alert-primary style="font-size:px;" >Plrase Resubmit</div>');
			}
		}
		else {
			echo validation_errors();
		}
	}
	
	//add transfer Booking 
	public function LocalBooking(){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('cab', 'Cab', 'required');
		$this->form_validation->set_rules('from_city', 'From City', 'required');
		$this->form_validation->set_rules('duration', 'Type', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'max_length[10]');
		
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'required');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'max_length[10]');
		$this->form_validation->set_rules('alt_mobile', 'Alternate Mobile', 'min_length[10]');
		
		if($this->form_validation->run()){
			
			$this->load->model('BookingModel');
			$result =$this->BookingModel->LocalBooking();
			if ($result == true) {	
				
					echo '<script>window.location="http://192.168.0.103/PremiumCars/company/Booking/Thanks";</script>';
			} 
			else {
				die ('<div class="alert alert-primary style="font-size:px;" >Plrase Resubmit</div>');
			}
		}
		else {
			echo validation_errors();
		}
	}
	
	
	//SHOW the thanks page after booking
	public function Thanks(){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('thanks/ThanksView');
		$this->load->view('includes/footer');	
	}
}
?>






		
		
		
		
		
		
		

