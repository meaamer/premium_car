<?php
class Reports extends CI_Controller{
	
	function GetReports(){
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('VendorModel');		
		$this->load->model('CabModel');		
		$this->load->model('CompanyModel');		
		$data['vendor_list']=$this->VendorModel->VendorList();	
		$data['cab_list']=$this->CabModel->CabList();	
		$data['company_list']=$this->CompanyModel->CompanyList();	
		$this->load->view('Reports/GenerateReport',$data);
		$this->load->view('includes/footer');	
	}
	
	public function GetGeneratedReport(){
		header('Access-Control-Allow-Origin:*');
		$this->load->model('ReportModel');
		$data['total_reports']=$this->ReportModel->GetReports();
		$this->load->view('Reports/GeneratedReport',$data);
		
	}
	 
	
	
	
	
	



}




?>