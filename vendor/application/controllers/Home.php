<?php 
class Home extends CI_Controller{
	
	public function Index(){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('DashboardModel');
			$data1=$this->DashboardModel->LocalCount();

			$data2=$this->DashboardModel->OSCount();

			$data3=$this->DashboardModel->TRCount();

			$data4=$this->DashboardModel->MothCount();

			

			$data['count']=array("local"=>$data1,"os"=>$data2,"tr"=>$data3,'mothly'=>$data4);

			//die(print_r($data));
		
		$this->load->view('Home',$data);
		$this->load->view('includes/footer');	
	}





}

?>