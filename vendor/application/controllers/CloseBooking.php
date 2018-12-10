<?php 
class CloseBooking extends CI_Controller{
	public function CheckCloseBooking(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
		
		$this->load->model('CloseBookingModel');
		$data=$this->CloseBookingModel->CheckCloseBooking($booking_id);
		
			
			
				#echo "<script>$('#open_kmx').val(".$data[0]['open_km'].").prop('disabled', true);</script>";
			$total_km = 0;
			foreach($data as $rows):
			$total_km +=$rows['day_total_kms'];
			echo '	
			  <tr id="'.$rows['close_id'].'">
					<td>'.$rows['day'].'</td>
					<td>'.$rows['open_km'].'</td>
					<td>'.$rows['open_place'].'</td>
					<td>'.$rows['close_km'].'</td>
					<td>'.$rows['close_place'].'</td>
					<td>'.$rows['day_total_kms'].'</td>
					<td>
					<script>
					$("#close_km_form").val('.$rows['close_km'].').prop("disabled", true);
					$("#open_kmx").val('.$data[0]['open_km'].').prop("disabled", true);</script>
						<a onClick="Remove('.$rows['close_id'].')"> <li class="fa fa-edit" style="color:red;" ></li> </a> 
					</td>
						
				</tr>';
				
				endforeach;
		
	}


	
		
	
	
	public function ClosingData(){
		header('Access-Control-Allow-Origin:*');	
		$data=array(
			 'booking_id'=>$this->input->post('booking_id'),
			 'cab_id'=>$this->input->post('cab_id'),
			 'vendor_id'=>$this->input->post('vendor_id'),
			 'company_id'=>$this->input->post('company_id'),
			 'day'=>$this->input->post('day'),		  	
			 'open_km'=>$this->input->post('open_km'),		  	
			 'open_place'=>$this->input->post('open_place'),		  	
			 'close_km'=>$this->input->post('close_km'),		  	
			 'close_place'=>$this->input->post('close_place'),		  	
			 'day_total_kms'=>$this->input->post('day_total_kms')		  	
		);
		
		//die(print_r($this->input->post('close_place')));
		
		$this->load->model('CloseBookingModel');
		$id=$this->CloseBookingModel->CloseBooking($data);
		
		echo '	
			  <tr id="'.$id.'">
					<td>'.$this->input->post('day').'</td>
					<td>'.$this->input->post('open_km').'</td>
					<td>'.$this->input->post('open_place').'</td>
					<td>'.$this->input->post('close_km').'</td>
					<td>'.$this->input->post('close_place').'</td>
					<td>'.$this->input->post('day_total_kms').'</td>
					<td>
						<a onClick="Remove('.$id.')"> <li class="fa fa-edit" style="color:red;" ></li> </a> 
					</td>
						
				</tr>
				
				<script>$("#date").val("");$("#open_km").val("");$("#open_place").val("");$("#close_place").val("");$("#close_km").val("");$("#day_total_kms").val("");</script>
						
						';
		
	}
	
	
	public function Remove(){
		header('Access-Control-Allow-Origin:*');
		$this->load->helper(array('url','form'));
		$this->load->model('CloseBookingModel');
		$id=$this->input->post('id');
		if($this->CloseBookingModel->Delete($id)==TRUE){
			echo "DELETED";
		}else{
			echo "FAILED";
		}
	}
	
	
	
	//close local Outstation
	public function OSClosing($booking_id){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary">','</div>');
		$this->form_validation->set_rules('open_km', 'Opening Kilometer', 'required');
		$this->form_validation->set_rules('close_km', 'Closing Kilometer', 'required');
		//$this->form_validation->set_rules('extra_km', 'Extra Kilometer', 'required');
		$this->form_validation->set_rules('other_charges', 'Other Charges', 'required');
		$this->form_validation->set_rules('da', 'Night Charges', 'required');
		$this->form_validation->set_rules('reason', 'Reason', 'required');
		$this->form_validation->set_rules('advance', 'Advance', 'required');
		$this->form_validation->set_rules('total_km', 'Totat Kilometer', 'required');
		//$this->form_validation->set_rules('total_amount', 'Totat Amount', 'required');
		
		if($this->form_validation->run())
		{
			header('Access-Control-Allow-Origin:*');
			$this->load->model('CloseBookingModel');
			$final = $this->CloseBookingModel->OSClosing($booking_id);
			if ($final== true) 
				{
					die('<div class="alert alert-primary">Booking Closed</div><script>$("#form_data")[0].reset();window.location.reload();</script>');
				}
				else
				{
					die('<div class="alert alert-primary">Error</div>');
				}
			
		}			
		else 
		{
			echo validation_errors();
		}
		
		
	}


	public function LocalClosing($booking_id){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary">','</div>');
		$this->form_validation->set_rules('open_km', 'Opening Kilometer', 'required');
		$this->form_validation->set_rules('close_km', 'Closing Kilometer', 'required');
		$this->form_validation->set_rules('extra_hour', 'Extra Hourse', 'required');
		$this->form_validation->set_rules('other_charges', 'Other Charges', 'required');
		$this->form_validation->set_rules('reason', 'Reason', 'required');
		$this->form_validation->set_rules('advance', 'Advance', 'required');
		$this->form_validation->set_rules('total_km', 'Totat Kilometer', 'required');
		
		
		if($this->form_validation->run())
		{
			header('Access-Control-Allow-Origin:*');
			$this->load->model('CloseBookingModel');
			$final = $this->CloseBookingModel->LocalClosing($booking_id);
			if ($final== true) 
				{
					die('<div class="alert alert-primary">Booking Closed</div><script>$("#form_data")[0].reset();window.location.reload();</script>');
				}
				else
				{
					die('<div class="alert alert-primary">Error</div>');
				}
			
		}			
		else 
		{
			echo validation_errors();
		}
		
		
	}


	public function TRClosing($booking_id){
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-primary">','</div>');
		$this->form_validation->set_rules('open_km', 'Opening Kilometer', 'required');
		$this->form_validation->set_rules('close_km', 'Closing Kilometer', 'required');
		//$this->form_validation->set_rules('extra_km', 'Extra Kilometer', 'required');
		$this->form_validation->set_rules('other_charges', 'Other Charges', 'required');
		$this->form_validation->set_rules('reason', 'Reason', 'required');
		$this->form_validation->set_rules('advance', 'Advance', 'required');
		$this->form_validation->set_rules('total_km', 'Totat Kilometer', 'required');
		// $this->form_validation->set_rules('Waiting_charg', 'Waiting Charges', 'required');
		
		
		if($this->form_validation->run())
		{
			header('Access-Control-Allow-Origin:*');
			$this->load->model('CloseBookingModel');
			$final = $this->CloseBookingModel->TRClosing($booking_id);
			if ($final== true) 
				{
					die('<div class="alert alert-primary">Booking Closed</div><script>$("#form_data")[0].reset();window.location.reload();</script>');
				}
				else
				{
					die('<div class="alert alert-primary">Error</div>');
				}
			
		}			
		else 
		{
			echo validation_errors();
		}
		
		
	}


	// show the outstaition closed booking details
	public function ClosedBookingDetails(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
		$vendor_id=$this->input->post('vendor_id');
		$this->load->model('CloseBookingModel');
		$data['closes']=$this->CloseBookingModel->CloseOutsation($booking_id,$vendor_id);
		$data['details']=$this->CloseBookingModel->ClosedBookingDetails($booking_id,$vendor_id);
		$this->load->view('closedbooking/OsClosed',$data);
	}

	// show the Transfer closed booking details
	public function TRClosedBooking(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
		$vendor_id=$this->input->post('vendor_id');
		$this->load->model('CloseBookingModel');
		
		$data['details']=$this->CloseBookingModel->TRClosedBooking($booking_id,$vendor_id);
		$this->load->view('closedbooking/TrClosed',$data);
	}


	// show the local closed booking details
	public function LocalClosedBooking(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
		$vendor_id=$this->input->post('vendor_id');
		$this->load->model('CloseBookingModel');
		$data['details']=$this->CloseBookingModel->LocalClosedBooking($booking_id,$vendor_id);
		$this->load->view('closedbooking/LocalClosed',$data);
	}
}

 ?>