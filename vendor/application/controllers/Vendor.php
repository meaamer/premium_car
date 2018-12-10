<?php 
class Vendor extends CI_Controller{
	
	
	public function Local(){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		
		$this->load->view('vendor/VendorView',$data);
		$this->load->view('includes/footer');
		
	}

	
}

?>