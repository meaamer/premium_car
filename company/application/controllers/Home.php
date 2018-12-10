<?php 
class Home extends CI_Controller{
	public function Index(){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		//$this->load->model('BookingModel');
		$this->load->view('Home');
		$this->load->view('includes/footer');	
	}
	
	
}

?>