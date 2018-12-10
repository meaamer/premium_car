<?php 
/**
* 
*/
class ExcelReport extends CI_Controller
{
	public function index(){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->view('excel/ReportForm');
		$this->load->view('includes/footer');
	}

	public function GetReport(){
		
			$this->load->model('ExcelReportModel');
        	$data['reports']=$this->ExcelReportModel->GetReport();
			$this->load->view('excel/ReportView',$data);
	}
	
}


 ?>