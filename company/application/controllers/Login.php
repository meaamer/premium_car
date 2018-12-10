<?php 

class Login extends CI_Controller{
	
	public function Index(){
		
	$this->load->view('users/LoginView');
	}

    //show the update password view
    public function Update(){
        $this->load->view('includes/header');
        $this->load->view('includes/aside');
        $this->load->view('users/UpdatePassword');
        $this->load->view('includes/footer');
    }


	
	// checking username and password
	public function CheckUserDetail(){  

		header('Access-Control-Allow-Origin:*');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-primary" ><strong> ','!</strong></div>');
        $this->form_validation->set_rules('user-name', 'Username', 'required');
        $this->form_validation->set_rules('user-password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $this->load->model('UsersModel');
            if($data=$this->UsersModel->CheckUserDetail($this->input->post('user-name'),
            $this->input->post('user-password')))
            {
 
               die('<div class="alert alert-success" >Login success please wait while we redirect</div>'."<script>window.location='".base_url()."Booking/Outstation'</script>");
            }
            else
            {
                die('<div class="alert alert-primary" >Check username and password</div>');            
            }
        }
        else 
        {
            echo validation_errors();
        }
	}



    public function ResetPassword(){

        header('Access-Control-Allow-Origin:*');
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<div class="alert alert-primary" ><strong> ','!</strong></div>');
        $this->form_validation->set_rules('current_pass', 'Current Password', 'required');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required');
         $this->form_validation->set_rules('confirm_pass', 'Confirm password', 'required');

        if($this->form_validation->run())
        {
            $this->load->model('UsersModel');
            $exit=$this->UsersModel->CheckCurrentPassword($this->input->post('current_pass'));
            if ($exit==true) {
                
                if ($this->input->post('new_pass')==$this->input->post('confirm_pass')) {
                   
                    $final=$this->UsersModel->ResetPassword($this->input->post('confirm_pass'));
                        if($final==true){ 
                                die('<div class="alert alert-primary"> Password has been changed </div>');
                        }else
                            {die('<div class="alert alert-primary"></div>');}

                    }
                        else{die('<div class="alert alert-primary" > confirm password not match</div>');}

               
            }
                else{ die('<div class="alert alert-primary" > Current password not match</div>');}
            
        }
        else 
        {
            echo validation_errors();
        }

    }
	

    
       
        

	public function Logout()  // 
    {
    	$this->session->sess_destroy();
        
        redirect(base_url('Login'));  
    }
}
?>