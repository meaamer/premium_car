<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
	
	
	
	// show the all bookings to admin
	public function index($id=null){
		$this->load->view('includes/header');
		$this->load->Model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		
		$this->load->view('includes/aside',$datax);
		$this->load->model('BookingModel');
		
		$data['bookings']=$this->BookingModel->BookingList();
		
		$this->load->view('booking/BookingView',$data);
		$this->load->view('includes/footer');
	}
	 
	
	public function UnClosed($id=null){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('BookingModel');
		
		//$data['bookings']=$this->BookingModel->BookingList();
		
		$this->load->view('booking/Unclosed/UnclosedBooking');
		$this->load->view('includes/footer');
	}

	public function Closed($id=null){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('BookingModel');
		$this->load->view('booking/Unclosed/ClosedBooking');
		$this->load->view('includes/footer');
	}
		
		
		
	
	//***********show each Booking details
	
	public function BookingDetail($booking_id,$type,$vendor_id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');		
		$this->BookingModel->ReadStatus($booking_id);
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		
		$data['booking_id']=$booking_id;
		
		$data['details']=$this->BookingModel->BookingDetail($booking_id,$type)[0];
		if ($vendor_id!="") {
			$data['rates']=$this->BookingModel->PerKmRate($vendor_id,$type);
		$data['totaldebit']=$this->BookingModel->TotalDebit($booking_id,$vendor_id);
		}
		
		if ($type=='local'){
			
			$this->load->view('booking/LocalBookingDetail',$data);
			
		}elseif($type=='outstation'){
			
			$this->load->view('booking/OSBookingDetail',$data);
			
		}elseif($type=='transfer'){
			
			$this->load->view('booking/TRBookingDetail',$data);
		}
		
		$this->load->view('includes/footer');
		
	}
	
	
	
/**********Function for Getting Bookings through datatable method*************/	
	public function BookingList($para){
		$this->load->model('BookingModel');  
		$fetch_data = $this->BookingModel->MakeTable($para);  
		$data = array();
		
		foreach($fetch_data as $row){
			$sub_array= array();
			$sub_array[]="<b>".$row->booking_id."</b><small>(".$row->booking_timestamp.")</small>";
			$sub_array[]=$row->cab_name;
			$sub_array[]=$row->company_name;
			$sub_array[]=$row->traveling_date;
			$sub_array[]=$row->type;
			
			if($row->vendor_id==0):
				$sub_array[]= "<li class='fa fa-window-close-o'  style='color:red'></li>";
			else:
				$sub_array[]="<li class='fa fa-check-square-o'  style='color:green'></li><small>(".$row->assign_timestamp.")(<b>".$row->vendor_name."</b>)</small>";
			endif;
			
			if($row->vendor_status==0):
				$sub_array[]= "<li class='fa fa-window-close-o' style='color:red'></li>";
			else:
				$sub_array[]="<li class='fa fa-check-square-o'  style='color:green'></li><small>(".$row->accept_timestamp.")</small>";
			endif;
			
			$sub_array[]='<a href="'.base_url().'Booking/BookingDetail/'.$row->booking_id.'/'.$row->type.'/'.$row->vendor_id.'" class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>';
			//$sub_array[]=$row->vendor_id;
			$sub_array[]=$row->read_status;
		    
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
	
	
	
/***************Function to show VendorList************/	
	public function GetVendor($id=null){
		header('Access-Control-Allow-Origin:*');
		$this->load->model('BookingModel');
		$data['booking_id']=$this->input->post('booking_id');
		$data['vendor_id']=$this->input->post('vendor_id');
		$data['vendors']=$this->BookingModel->GetVendorOS($this->input->post('city'),$this->input->post('cab'),$this->input->post('type'));

		 $data['companies']=$this->BookingModel->GetCompanyOS($this->input->post('booking_id'),$this->input->post('type'));
		
		if($this->input->post('type')=="outstation"){
			echo $this->load->view('booking/vendor_assign/VendorLists',$data,true);
		} else if($this->input->post('type')=="local"){
			echo $this->load->view('booking/vendor_assign/VendorLocal',$data,true);
		} else if($this->input->post('type')=="transfer"){
			echo $this->load->view('booking/vendor_assign/VendorTransfer',$data,true);
		}
		
		
		
	}
	
/***************Function to Assign Booking To Vendors************/
	public function AssignBooking(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->get_post('booking_id');
		date_default_timezone_set("Asia/Calcutta");
		//die(print_r($this->input->get_post('vendor_id')));
		
		if($this->input->get_post('vendor_id')==0){
			$data=array('vendor_id'=>$this->input->get_post('vendor_id'),'vendor_status'=>'0','assign_timestamp'=>0);
		}else{
			$data=array('vendor_id'=>$this->input->get_post('vendor_id'),'vendor_status'=>'0','assign_timestamp'=>date('d-m-y h:i A'));	
		}
		
		
		$this->load->model('BookingModel');
		if($this->BookingModel->AssignVendor($booking_id,$data)){
			echo "Booking Assigned Successfully";
		}else{
			echo "Booking Not Assigned";
		}
		
		
	}
	


/*****Function for getting closing Details******/
	public function GetClosingDetails(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->get_post('booking_id');
		date_default_timezone_set("Asia/Calcutta");
		$this->load->model('BookingModel');
		$details=$this->BookingModel->GetClosingDetails($booking_id);
		//$othercharges=$this->BookingModel->GetClosingDetailsos($booking_id);
		//$finalkms=$this->BookingModel->GetClosingDetailsb($booking_id);
		//die(print_r($finalkms));
		echo "<tr>
				<th>Day</th>
				<th>Open Km</th>
				<th  colspan='2'>Open Place</th>
				<th>Close Km</th>
				<th colspan='2'>Close Place</th>
				<th>Update</th>
			 </tr>";
		foreach($details as $row){
		echo '<tr>
			
			<td>
			 <form id="form_update">
			 
			 <input type="number" class="form-control col-lg-1" name="day" id="day'.$row['close_id'].'"  value="'.$row['day'].'" />
			</td>
			
			<td>
			
			 <input type="number" class="form-control col-lg-2" name="open_km" id="open_km'.$row['close_id'].'"  value="'.$row['open_km'].'" />
			</td>
			
			<td colspan="2">
			
			 <input type="text" class="form-control col-lg-3" name="open_place" id="open_place'.$row['close_id'].'"  value="'.$row['open_place'].'" />
			</td>
			
			<td>
			
			 <input type="text" class="form-control col-lg-2" name="close_km" id="close_km'.$row['close_id'].'"  value="'.$row['close_km'].'" />
			</td>
			
			<td colspan="2">
			
			
			 <input type="text" class="form-control col-lg-3" name="close_place" id="close_place'.$row['close_id'].'"  value="'.$row['close_place'].'" />
			</td>
			
			<td> 
				<a onClick="UpdateTwo('.$row['close_id'].')"> <li class="fa fa-edit" ></li> </a> 
			</td>
			</tr>
			';
				
			
		}
		
	}
	
	
/******Function for updating booking table********************/	
	public function UpdateOne(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
		$vendor_id=$this->input->post('vendor_ids');

		
		$dataone=array(
			    'extra_kilometer'=>$this->input->post('extra_kilometer'),
				'other_charges'=>$this->input->post('other_charges'),
				'da'=>$this->input->post('da'),
				'totat_kilometer'=>$this->input->post('total_km'));
			
			$datatwo=array(
				'opening_km'=>$this->input->post('opening_km'),
				'closing_km'=>$this->input->post('closing_km'));


			$datathree=array(
				'debit'=>$this->input->post('debit'),
				'booking_id'=>$booking_id,
				'vendor_id'=>$vendor_id,
				'credit'=>0,
				'date'=>date('d-m-y'));
		
		$this->load->model('BookingModel');
		
		$this->BookingModel->UpdateOne($dataone,$booking_id);
		$this->BookingModel->UpdateTwo($datatwo,$booking_id);
		$final = $this->BookingModel->UpdateThree($datathree);
		if ($final==true) {
			echo "Updated";
		}else{echo "Not";}

		
	}
	
	
	
/******Function for updating close_os table********************/	
	public function UpdateTwo($close_id){
		header('Access-Control-Allow-Origin:*');
		//die(print_r($close_id));
		//$booking_id=$this->input->post('booking_id');
		$data=array(
			    'day'=>$this->input->post('day'),
				'open_km'=>$this->input->post('open_km'),
				'open_place'=>$this->input->post('open_place'),
				'close_km'=>$this->input->post('close_km'),
				'close_place'=>$this->input->post('close_place'));
			
			
		
		$this->load->model('BookingModel');
		
		if($this->BookingModel->UpdateClose($data,$close_id)){
			echo 'Updated';
		}
		
		
	}

	/******Function for updating local booking table********************/	
	public function UpdateLocal($id){
		header('Access-Control-Allow-Origin:*');
		$this->load->model('BookingModel');
		$this->BookingModel->LocalPay($id);
		$final=$this->BookingModel->UpdateLocal($id);
		if ($final==true) {
			echo"Updated";
		}else{echo "Unable to Update";}
		
	}

	public function UpdateTransfer($id){
		$vendor_id=$this->input->post('vendor_id');
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('BookingModel');
		$this->BookingModel->TransferPay($id,$vendor_id);
		$final=$this->BookingModel->UpdateTransfer($id);
		if ($final==true) {
			echo"Updated";
		}else{echo "Unable to Update";}
		
	}
		
		
		
		
		
/*******Function for Approving Booking********/	
	public function Approved(){
		header('Access-Control-Allow-Origin:*');
		$booking_id=$this->input->post('booking_id');
			$data=array(
				'vendor_status'=>'4'
			);
			
			$this->load->model('BookingModel');
			if($this->BookingModel->Approve($data,$booking_id)){
				echo 'Booking Close Successfull';
			}
		
	}
	

/*******Function for Total Number of UnRead Booking********/	
	public function UnReadBookings(){
		header('Access-Control-Allow-Origin:*');
		$this->load->Model('BookingModel');
		$data=$this->BookingModel->UnReadBookings();
		echo $data;
			
		
	}	
	
}

?>