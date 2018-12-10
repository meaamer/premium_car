<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	
	//this function load the vandor form view
	public function Register(){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->view('vendor/forms/RegistrationView');
		$this->load->view('includes/footer');
	}
	
	
	
	// show the all list of vandor in table
	public function VendorList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('VendorModel');
		if( $id!=null ){
			
			$data['rows']=$this->VendorModel->VendorList($id)[0];
			$this->load->view('vendor/forms/RegistrationView',$data);
		}
		else{
			
			$data['vendors']=$this->VendorModel->VendorList();
			$this->load->view('vendor/tables/VendorListView',$data);
			
		}
		$this->load->view('includes/footer');
		
		
	}
	
		
/**********Function for Getting Bookings through datatable method*************/	
	public function VendorListX(){
		$this->load->model('VendorModel');  
		$fetch_data = $this->VendorModel->MakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->vendor_id;
			$sub_array[]=$row->vendor_name;
			$sub_array[]=$row->vendor_person_name;
			$sub_array[]=$row->vendor_contact_no;
			$sub_array[]=$row->vendor_city;
			$sub_array[]=$row->vendor_username;
			$sub_array[]=$row->vendor_password;
			
		
			$sub_array[]='<a href="'.base_url().'Vendor/VendorList/'.$row->vendor_id.'" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>';
			$sub_array[]='<button id="'.$row->vendor_id.'" onclick="delete_vendor('.$row->vendor_id.')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>';
			
			$sub_array[]=$row->vendor_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->VendorModel->GetAllData(),  
            "recordsFiltered"       =>     $this->VendorModel->GetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}
	
	
	
	
	
	public function AddVendor(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		
		$this->form_validation->set_rules('v_name', 'Vendor Name', 'required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
		$this->form_validation->set_rules('v_username', 'Username', 'required');
		$this->form_validation->set_rules('v_password', 'Password', 'required');
		$this->form_validation->set_rules('v_contact', 'Contact No', 'required');
		$this->form_validation->set_rules('v_city', 'City Name', 'required');
		
		
		if($this->form_validation->run())
		{
			
			$this->load->model('VendorModel');
			$exist =$this->VendorModel->IfUaserExist($this->input->post('v_username'));
			
			if( $exist==true ){
				die ('<div class="" > Uesrname Exist 
					</div>');
			}else{
				
			
			$data=array('vendor_name' => $this->input->post('v_name'),
						'vendor_person_name' => $this->input->post('owner_name'),
						'vendor_username' => $this->input->post('v_username'),
						'vendor_password' => $this->input->post('v_password'),
						'vendor_contact_no' => $this->input->post('v_contact'),
						'vendor_city' => $this->input->post('v_city')
						);
						
			}			

			
			
			$result =$this->VendorModel->AddVendor($data);
			if ($result == true) 
			{	
				
					die ('<div class="alert alert-success" > Submit successfully 
					</div>');
			} 
			else 
			{
				die ('<div class="alert alert-danger" > Please Resubmit</div>');
			}
		}
		else 
		{
			echo validation_errors();
		}
	}
	
	// this function is use to Vandor details
	public function UpdateVendor($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		
		$this->form_validation->set_rules('v_name', 'Vendor Name', 'required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
		$this->form_validation->set_rules('v_username', 'Username', 'required');
		$this->form_validation->set_rules('v_password', 'Password', 'required');
		$this->form_validation->set_rules('v_contact', 'Contact No', 'required');
		$this->form_validation->set_rules('v_city', 'City Name', 'required');
		
		
		if($this->form_validation->run())
		{
			
			$this->load->model('VendorModel');
			//$exist =$this->VendorModel->IfUaserExist($this->input->post('v_username'));
		
			
			$data=array('vendor_name' => $this->input->post('v_name'),
						'vendor_person_name' => $this->input->post('owner_name'),
						'vendor_username' => $this->input->post('v_username'),
						'vendor_password' => $this->input->post('v_password'),
						'vendor_contact_no' => $this->input->post('v_contact'),
						'vendor_city' => $this->input->post('v_city')
						);
						
					

			
			
			$result =$this->VendorModel->UpdateVendor($data,$id);
			if ($result == true) 
			{	
				
					die ('<div class="alert alert-success" > Submit successfully </div>');
			} 
			else 
			{
				die ('<div class="alert alert-danger" > Please Resubmit</div>');
			}
		}
		else 
		{
			echo validation_errors();
		}
		
	}
	
	
	// this function is use to delete Vandor rows
	public function DeleteVendor($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('VendorModel');
		$final = $this->VendorModel->DeleteVendor($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
	}


	// show the all list of vandor to assign vendor
	
/***************Function to show VendorList************/	
	public function GetVendors($id=null){
		$this->load->model('VendorModel');
		$data['vendors']=$this->VendorModel->VendorList();
		$data['bookings']=$this->VendorModel->BookingList();
		$data['booking_id']=$id;
		//die(print_r($data));
		echo $this->load->view('booking/vendor_assign/VendorList',$data,true);
	}
	
	


	public function AssignVendor($vendor_id,$company_id){
		$data=array('vendor_id' =>$vendor_id,'vendor_status'=>'0');
		$this->load->model('VendorModel');
		$final=$this->VendorModel->AssignVendor($data,$company_id);
		if ($final==true) {
			die('Vendor Assign Successfully');
		}else{die('Please Retry');}
		
		
	}

		
}
?>