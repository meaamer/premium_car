<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyPricing extends CI_Controller {
	
	
	
########## FORMS #########################################
	public function Local($id=null){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('Companymodel');
		$data['cabs']=$this->CabModel->CabList();
		$data['companies']=$this->Companymodel->CompanyList();
		$data['companies']=$this->Companymodel->CompanyList();
		if($id!=null){
			$this->load->model('CompanyPricingModel');
			$data['rows']=$this->CompanyPricingModel->GetLocalPricing($id)[0];
		}
		$this->load->view('company/forms/LocalFormView',$data);
		$this->load->view('includes/footer');
	}
	
	
	public function OS(){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('Companymodel');
		$data['cabs']=$this->CabModel->CabList();
		$data['companies']=$this->Companymodel->CompanyList();
		$this->load->view('company/forms/OSFormView',$data);
		$this->load->view('includes/footer');
		
	}
	public function TR(){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		$this->load->model('Companymodel');
		$data['companies']=$this->Companymodel->CompanyList();
		$data['cabs']=$this->CabModel->CabList();
		$this->load->view('company/forms/TRFormView',$data);
		$this->load->view('includes/footer');
		
	}
	
	
	
################## Select List ######################################
	
	public function LocalList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CompanyPricingModel');
		if( $id!=null ){
			$this->load->model('Companymodel');
			$data['companies']=$this->Companymodel->CompanyList();
			$this->load->model('CabModel');
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->CompanyPricingModel->LocalList($id)[0];
			$this->load->view('company/forms/LocalFormView',$data);
		}
		else{
			
			$data['locals']=$this->CompanyPricingModel->LocalList();
			$this->load->view('company/tables/LocalPriceListView',$data);
		}
		$this->load->view('includes/footer');
		
	}
	
	
	public function OSList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CompanyPricingModel');
		if( $id!=null ){
			$this->load->model('Companymodel');
			$data['companies']=$this->Companymodel->CompanyList();
			$this->load->model('CabModel');
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->CompanyPricingModel->OSList($id)[0];
			$this->load->view('company/forms/OSFormView',$data);
		}
		else{
			
			$data['outstations']=$this->CompanyPricingModel->OSList();
			
			$this->load->view('company/tables/OSPriceListView',$data);
		}
		$this->load->view('includes/footer');
		
	}
	public function TRList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CompanyPricingModel');
		if( $id!=null ){
			$this->load->model('Companymodel');
			$data['companies']=$this->Companymodel->CompanyList();
			$this->load->model('CabModel');
			$data['cabs']=$this->CabModel->CabList();
			$data['rows']=$this->CompanyPricingModel->TRList($id)[0];
			$this->load->view('company/forms/TRFormView',$data);
		}
		else{
			
			$data['transfers']=$this->CompanyPricingModel->TRList();
			
			$this->load->view('company/tables/TRPriceListView',$data);
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
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('fullday', 'Fullday Charges', 'required');
		$this->form_validation->set_rules('halfday', 'Hallday Charges', 'required');
		$this->form_validation->set_rules('extrahour', 'Extra Hours Charges', 'required');
		$this->form_validation->set_rules('extrakm', 'Extra Kilometer Charges', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->AddLocal();
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
	public function AddOS(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('os_per_km', 'Outstation Per Kilometer', 'required');
		$this->form_validation->set_rules('extra_per_km', 'Extra Per Kilometer', 'required');
		$this->form_validation->set_rules('avg_per_km', 'Average Per Kilometer', 'required');
		$this->form_validation->set_rules('driver_chrages', 'Driver Charges', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->AddOS();
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
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('tr_rate', 'Transfer Rate', 'required');
		//$this->form_validation->set_rules('waiting_charges', 'Waiting Charges', 'required');
		
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->AddTR();
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
	
	################# UPDATE ######################################################
	
	public function UpdateLocal($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		$this->form_validation->set_rules('cab_id', 'Cab', 'required');
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('fullday', 'Fullday Charges', 'required');
		$this->form_validation->set_rules('halfday', 'Hallday Charges', 'required');
		$this->form_validation->set_rules('extrahour', 'Extra Hours Charges', 'required');
		$this->form_validation->set_rules('extrakm', 'Extra Kilometer Charges', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->UpdateLocal($id);
			if ($result == true) {	
				
					die (' Updated successfully');
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
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('os_per_km', 'Outstation Per Kilometer', 'required');
		$this->form_validation->set_rules('extra_per_km', 'Extra Per Kilometer', 'required');
		$this->form_validation->set_rules('avg_per_km', 'Average Per Kilometer', 'required');
		$this->form_validation->set_rules('driver_chrages', 'Driver Charges', 'required');
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->UpdateOS($id);
			if ($result == true) {	
				
					die (' Updated successfully');
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
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_rules('tr_rate', 'Transfer Rate', 'required');
		$this->form_validation->set_rules('waiting_charges', 'Waiting Charges', 'required');
		
		
		if($this->form_validation->run()){
			$this->load->model('CompanyPricingModel');
			$result =$this->CompanyPricingModel->UpdateTR($id);
			if ($result == true) {	
				
					die (' Updated successfully');
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
		$this->load->model('CompanyPricingModel');
		$final = $this->CompanyPricingModel->DeleteLocal($id);
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
		$this->load->model('CompanyPricingModel');
		$final = $this->CompanyPricingModel->DeleteOS($id);
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
		$this->load->model('CompanyPricingModel');
		$final = $this->CompanyPricingModel->DeleteTR($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
		
	}
	
	#########################Get Cabas and company pricing details##################################
	
	public function GetLocalPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CompanyPricingModel');
		$data=$this->CompanyPricingModel->GetLocalPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Company Name</th>
                  <th>Cab Name</th>
                  <th>8 Hours 80 KM Charges</th>
                  <th>4 Hours 40 KM Charges</th>
                  <th>Extra Hours Charges</th>
                  <th>Extra Hours KM</th>
                  <th>Actions</th>
             </tr>
            </thead>
            <tbody >';
		$i=0;
		foreach($data as $row){
			$i++;
			echo '<tr id="'.$row['company_local_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['company_name'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['full_day'].'</td>
					<td>'.$row['half_day'].'</td>
					<td>'.$row['extra_hour'].'</td>
					<td>'.$row['extra_kilometer'].'</td>
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'CompanyPricing/LocalList/'.$row['company_local_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_local('.$row['company_local_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
	
	public function GetOSPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CompanyPricingModel');
		$data=$this->CompanyPricingModel->GetOSPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Company Name</th>
                  <th>Cab Name</th>
                  <th>Outstation Per Kilometer</th>
                  <th>Extra Per Kilometer</th>
                  <th>Average Per Kilometer</th>
                  <th>Driver Charges</th>
                  <th>Actions</th>
             </tr>
            </thead>
            <tbody >';
		$i=0;
		foreach($data as $row){
			$i++;
			echo '<tr id="'.$row['company_outstation_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['company_name'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['outstation_per_kilometer'].'</td>
					<td>'.$row['extra_per_kilometer'].'</td>
					<td>'.$row['average_per_kilometer'].'</td>
					<td>'.$row['driver_charges'].'</td>
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'CompanyPricing/OSList/'.$row['company_outstation_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_OS('.$row['company_outstation_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
	
	public function GetTRPricing(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CompanyPricingModel');
		$data=$this->CompanyPricingModel->GetTRPricing();
		echo '<div class="row"><div class="col-xs-12"><div class="box">
              <div class="box-body" >
              <table id="" class="table table-bordered table-striped">
              <thead id="tableResponse">
              <tr>
                  <th>No</th>
                  <th>Company Name</th>
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
			echo '<tr id="'.$row['company_transfer_id'].'" >
					<td>'.$i.'</td>
					<td>'.$row['company_name'].'</td>
					<td>'.$row['cab_name'].'</td>
					<td>'.$row['transfer_rate'].'</td>
					<td>'.$row['waiting_charges'].'</td>
					
					<td> 
					<a class="btn btn-danger" 
					href="'.base_url().'CompanyPricing/TRList/'.$row['company_transfer_id'].'">
					<li class="fa fa-edit"></li></a> 
					<a class="btn btn-danger" href="#" 
					onClick="delete_TR('.$row['company_transfer_id'].')"><li class="fa fa-trash"></li>
					</a> 
					</td>
				  </tr>';
		}
		echo ' </tbody></table></div></div></div></div>';
		
	}
	
}	
?>