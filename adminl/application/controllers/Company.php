<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
	
	
	
	
	// show the all list of company in table
	public function CompanyList($id=null){
		
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CompanyModel');
		if( $id!=null ){
			
			$data['rows']=$this->CompanyModel->CompanyList($id)[0];
			$this->load->view('company/forms/RegistrationView',$data);
		}
		else{
			
			$data['companies']=$this->CompanyModel->CompanyList();
			$this->load->view('company/tables/CompanyListView',$data);
			
		}
		$this->load->view('includes/footer');
		
		
	}
	
		
/**********Function for Getting Bookings through datatable method*************/	
	public function CompanyListX(){
		$this->load->model('CompanyModel');  
		$fetch_data = $this->CompanyModel->MakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->company_id;
			$sub_array[]=$row->company_name;
			$sub_array[]=$row->company_person_name;
			$sub_array[]=$row->company_contact_no;
			$sub_array[]=$row->company_city;
			$sub_array[]=$row->company_username;
			$sub_array[]=$row->company_password;
			
		
			$sub_array[]='<a href="'.base_url().'Company/CompanyList/'.$row->company_id.'" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>';
			$sub_array[]='<button id="'.$row->company_id.'" onclick="delete_company('.$row->company_id.')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>';
			
			$sub_array[]=$row->company_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->CompanyModel->GetAllData(),  
            "recordsFiltered"       =>     $this->CompanyModel->GetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}
	
	
	
	//function show the form of Company ragistration
	public function Register(){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CompanyModel');
		$data['companies']=$this->CompanyModel->CompanyList();
		$this->load->view('company/forms/RegistrationView',$data);
		$this->load->view('includes/footer');
	}
	
	
	// this function insert company details in databaase
	public function AddCompany(){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		
		$this->form_validation->set_rules('c_name', 'Company Name', 'required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
		$this->form_validation->set_rules('c_username', 'Username', 'required');
		$this->form_validation->set_rules('c_password', 'Password', 'required');
		$this->form_validation->set_rules('c_contact', 'Contact No', 'required');
		$this->form_validation->set_rules('c_city', 'City Name', 'required');
		
		
		if($this->form_validation->run())
		{
			
			$this->load->model('CompanyModel');
			$exist =$this->CompanyModel->IfUaserExist($this->input->post('c_username'));
			
			if( $exist==true ){
				die ('<div class="" > Uesrname Exist 
					</div>');
			}else{
				
			
			$data=array('company_name' => $this->input->post('c_name'),
						'company_person_name' => $this->input->post('owner_name'),
						'company_username' => $this->input->post('c_username'),
						'company_password' => $this->input->post('c_password'),
						'company_contact_no' => $this->input->post('c_contact'),
						'company_city' => $this->input->post('c_city')
						);
						
			}			

			
			
			$result =$this->CompanyModel->AddCompany($data);
			if ($result == true) 
			{	
				
					die ('<div class="alert alert-success pull-left">
					Submited successfully</div>
					<script>$("#company_form")[0].reset();</script>');
			} 
			else 
			{
				die ('Please Resubmit');
			}
		}
		else 
		{
			echo validation_errors();
		}
	}
	
	// this function update company details
	public function UpdateCompany($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger 
		style="font-size:px;" >','</div>');
		
		$this->form_validation->set_rules('c_name', 'Company Name', 'required');
		$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
		$this->form_validation->set_rules('c_username', 'Username', 'required');
		$this->form_validation->set_rules('c_password', 'Password', 'required');
		$this->form_validation->set_rules('c_contact', 'Contact No', 'required');
		$this->form_validation->set_rules('c_city', 'City Name', 'required');
		
		
		if($this->form_validation->run())
		{
			
			$this->load->model('CompanyModel');
			$result =$this->CompanyModel->UpdateCompany($id);	
			//$exist =$this->CompanyModel->IfUaserExist($this->input->post('c_username'));
			
			
					
			if ($result == true) 
			{	
				
					die ('<div class="alert alert-success pull-left">
					Submited successfully</div> <script type="text/javascript">history.back();</script>');
			} 
			else 
			{
				die ('Please Resubmit');
			}		
						
					

		}
		else 
		{
			echo validation_errors();
		}
		
	}
	
	
	// this function is use to delete Company rows
	public function DeleteCompany($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('Companymodel');
		$final = $this->Companymodel->DeleteCompany($id);
		if ($final== true) 
		{
			die('Delete successfully');
		}
		else
		{
			die('Error');
		}
	}
}
?>