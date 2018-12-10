<?php 

class Dashboard extends CI_Controller{
		
		public function index(){
			$this->load->view('includes/header');
			$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
			$this->load->model('DashboardModel');
			$data1=$this->DashboardModel->LocalCount();
			$data2=$this->DashboardModel->OSCount();
			$data3=$this->DashboardModel->TRCount();
			$data4=$this->DashboardModel->MothCount();
			
			$data['count']=array("local"=>$data1,"os"=>$data2,"tr"=>$data3,'mothly'=>$data4);
			$this->load->view('dashboard/DashboardView',$data);
			$this->load->view('includes/footer');
		}
}
?>