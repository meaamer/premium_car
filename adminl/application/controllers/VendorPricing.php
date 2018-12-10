<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorPricing extends CI_Controller {
	########## FORMS #########################################
	 public function Local($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('VendorModel');
		$data['vendors']=$this->VendorModel->VendorList();
		$data['cabs']=$this->CabModel->CabList();
		$this->load->view('vendor/forms/LocalFormView',$data);
		$this->load->view('includes/footer');
		
	}
	public function OS($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('VendorModel');
		$data['vendors']=$this->VendorModel->VendorList();
		$data['cabs']=$this->CabModel->CabList();
		$this->load->view('vendor/forms/OSFormView',$data);
		$this->load->view('includes/footer');
		
	}
	public function TR($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('VendorModel');
		$data['vendors']=$this->VendorModel->VendorList();
		$data['cabs']=$this->CabModel->CabList();
		$this->load->view('vendor/forms/TRFormView',$data);
		$this->load->view('includes/footer');
		
	}
	
	############### Select List ######################################
	
	public function LocalList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('VendorPricingModel');
		if( $id!=null ){
			$this->load->model('VendorModel');
			$this->load->model('CabModel');
			$data['vendors']=$this->VendorModel->VendorList();
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->VendorPricingModel->LocalList($id)[0];
			$this->load->view('vendor/forms/LocalFormView',$data);
		}
		else{
			
			$data['locals']=$this->VendorPricingModel->LocalList();
			$this->load->view('vendor/tables/LocalPriceListView',$data);
		}
		$this->load->view('includes/footer');
		
	}
	
	
	public function OSList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('VendorPricingModel');
		if( $id!=null ){
			$this->load->model('VendorModel');
			$this->load->model('CabModel');
			$data['vendors']=$this->VendorModel->VendorList();
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->VendorPricingModel->OSList($id)[0];
			$this->load->view('vendor/forms/OSFormView',$data);
		}
		else{
			
			$data['outstations']=$this->VendorPricingModel->OSList();
			$this->load->view('vendor/tables/OSPriceListView',$data);
		}
		$this->load->view('includes/footer');
		
		
		
	}
	public function TRList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('VendorPricingModel');
		if( $id!=null ){
			$this->load->model('VendorModel');
			$this->load->model('CabModel');
			$data['vendors']=$this->VendorModel->VendorList();
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->VendorPricingModel->TRList($id)[0];
			$this->load->view('vendor/forms/TRFormView',$data);
		}
		else{
			
			$data['transfers']=$this->VendorPricingModel->TRList();
			
			$this->load->view('vendor/tables/TRPriceListView',$data);
		}
		$this->load->view('includes/footer');
		
		
	}
	
	
	############### ADD ######################################
	
	public function AddLocal(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('fullday', 'Fullday Charges', 'required');
		$this->form_validation->set_rules('halfday', 'Halfday Charges', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('extrahour', 'Extra Hours Charges', 'required');
		$this->form_validation->set_rules('extrakm', 'Extra Kilometer', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->AddLocal();
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
		
		
	}
	
	public function AddOS($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('os_per_km', 'Outstation Per Kilometer', 'required');
		$this->form_validation->set_rules('extra_per_km', 'Extra Per Kilometer', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('avg_per_km', 'Average Per Kilometer', 'required');
		
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->AddOS();
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
		
	}
	public function AddTR($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('tr_rate', 'Transfer Rate', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		//$this->form_validation->set_rules('waiting_charges', 'Waiting Charges', 'required');
		
		
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->AddTR();
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
		
	}
	
	################# UPDATE ##########################
	
	public function UpdateLocal($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('fullday', 'Fullday Charges', 'required');
		$this->form_validation->set_rules('halfday', 'Halfday Charges', 'required');
		$this->form_validation->set_rules('extrahour', 'Extra Hours Charges', 'required');
		$this->form_validation->set_rules('city', 'City ', 'required');
		$this->form_validation->set_rules('extrakm', 'Extra Kilometer', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->UpdateLocal($id);
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
	}
	public function UpdateOS($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('os_per_km', 'Outstation Per Kilometer', 'required');
		$this->form_validation->set_rules('extra_per_km', 'Extra Per Kilometer', 'required');
		$this->form_validation->set_rules('avg_per_km', 'Average Per Kilometer', 'required');
		
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->UpdateOS($id);
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
	}
	public function UpdateTR($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required');
		$this->form_validation->set_rules('tr_rate', 'Transfer Rate', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('waiting_charges', 'Waiting Charges', 'required');
		
		
		
		if($this->form_validation->run()){
			$this->load->model('VendorPricingModel');
			$result =$this->VendorPricingModel->UpdateTR($id);
			if ($result == true) {	
				
					die (' Submited successfully');
			} 
			else {
				die ('Please Resubmit');
			}
		}
		else {
			echo validation_errors();
		}
	}
	
	################# DELETE ##########################
	
	public function DeleteLocal($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$final = $this->VendorPricingModel->DeleteLocal($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
	}
	public function DeleteOS($id=null){
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$final = $this->VendorPricingModel->DeleteOS($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
		
	}
	public function DeleteTR($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$final = $this->VendorPricingModel->DeleteTR($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
	}
	
	#########################Get Cabas and vendor pricing details##################################
	
	public function GetLocalPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$data=$this->VendorPricingModel->GetLocalPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Vendor Name</th>
                  <th>City</th>
                  <th>Cab Name</th>
                  <th>8 Hourse 80 KM</th>
                  <th>4 Hourse 40 KM</th>
                  <th>Extra Hours Charges</th>
                  <th>Extra KM Charges</th>
                  <th>Actions</th>
             </tr>
            </thead>
            <tbody >';
		$i=0;
		foreach($data as $row){
			$i++;
			echo '<tr id="'.$row['vendor_local_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['vendor_name'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['full_day'].'</td>
					<td>'.$row['half_day'].'</td>
					<td>'.$row['extra_hours'].'</td>
					<td>'.$row['extra_kilometer'].'</td>
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'VendorPricing/LocalList/'.$row['vendor_local_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_local('.$row['vendor_local_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
	
	
	public function GetOSPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$data=$this->VendorPricingModel->GetOSPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Vendor Name</th>
                  <th>City</th>
                  <th>Cab Name</th>
                  <th>Outstation Per Kilometer</th>
                  <th>Extra Per Kilometer</th>
                  <th>Average Per Kilometer</th>
                  
                  <th>Actions</th>
             </tr>
            </thead>
            <tbody >';
		$i=0;
		foreach($data as $row){
			$i++;
			echo '<tr id="'.$row['vendor_outstation_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['vendor_name'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['outstation_per_kilometer'].'</td>
					<td>'.$row['extra_per_kilometer'].'</td>
					<td>'.$row['average_per_kilometer'].'</td>
					
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'VendorPricing/OSList/'.$row['vendor_outstation_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_OS('.$row['vendor_outstation_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
	public function GetTRPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorPricingModel');
		$data=$this->VendorPricingModel->GetTRPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Vendor Name</th>
                  <th>City</th>
                  <th>Cab Name</th>
                  <th>Transfer Rate</th>
                  <th>Waiting Charges</th>
                  <th>Actions</th>
             </tr>
            </thead>
            <tbody >';
		$i=0;
		foreach($data as $row){
			$i++;
			echo '<tr id="'.$row['vendor_transfer_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['vendor_name'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['transfer_rate'].'</td>
					<td>'.$row['waiting_charges'].'</td>
					
					
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'VendorPricing/TRList/'.$row['vendor_transfer_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_TR('.$row['vendor_transfer_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
}	
?>