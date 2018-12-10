<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cabs extends CI_Controller {
	
	//this function is show all lisl of cabs 
	public function CabList($id=null){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->model('CabModel');
		if( $id!=null ){
			
			$data['rows']=$this->CabModel->CabList($id)[0];
			$this->load->view('cabs/CabRegistrationView',$data);
		}
		
		$data['cabs']=$this->CabModel->CabList();
		$this->load->view('cabs/CabListView',$data);
		$this->load->view('includes/footer');
	}
	
	
	
	
/**********Function for Getting cab through datatable method*************/	
	public function CabListX(){
		$this->load->model('CabModel');  
		$fetch_data = $this->CabModel->MakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->cab_id;
			$sub_array[]=$row->cab_name;
			$sub_array[]='<img width="100" src="'. base_url().'assets/uploads/'.$row->cab_image.'">';
			$sub_array[]=$row->cab_description;
			$sub_array[]='<a href="'.base_url().'Cabs/CabList/'.$row->cab_id.'" class="btn btn-danger"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>';
			$sub_array[]='<button id="'.$row->cab_id.'" onclick="delete_cab('.$row->cab_id.')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>';

			
			
			$sub_array[]=$row->cab_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->CabModel->GetAllData(),  
            "recordsFiltered"       =>     $this->CabModel->GetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}
	
	
/*******function show the form of Company ragistration******/
	public function Register(){
		header('Access-Control-Allow-Origin:*');
		$this->load->view('includes/header');
		$this->load->model('BookingModel');
		$datax['num']=$this->BookingModel->UnReadBookings();
		$this->load->view('includes/aside',$datax);
		$this->load->view('cabs/CabRegistrationView');
		$this->load->view('includes/footer');
	}
	
/******this function is used to add new cab details*****/
	public function AddCab(){
		header('Access-Control-Allow-Origin:*');
		
		
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters();
		$this->form_validation->set_rules('cab_name', 'Cab Name', 'required');
		$this->form_validation->set_rules('cab_des', 'Description', 'required');
		
		$_FILES["cab_img"];
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '500';
		$config['encrypt_name']= TRUE;
		$this->load->library('upload', $config);
		if($this->form_validation->run())
		{
			if ( ! $this->upload->do_upload('cab_img'))
			{
				$error = array('error' => $this->upload->display_errors());
				die($error['error']);
			}
			else
			{
				$image = array('upload_data' => $this->upload->data());
				$data = array(
				"cab_name"=>$this->input->post("cab_name"),
				'cab_description' => $this->input->post('cab_des'),
				"cab_image"=>$image['upload_data']['file_name']
				);
				//die(print_r($data));
				$this->load->model('CabModel');
				if($res=$this->CabModel->AddCab($data))
				{
					die ('Submit Successfully');		
				}else
				{
					die ('Please ReSubmit');			
				}	
				
			}
			
		}
		else 
		{
			echo validation_errors();
		}
		
	}
	
	public function UpdateCab($id){
		header('Access-Control-Allow-Origin:*');
		
		if( $_FILES['cab_img']['tmp_name']!="" ){
			
		$this->load->library("form_validation");
		$this->form_validation->set_error_delimiters();
		$this->form_validation->set_rules('cab_name', 'Cab Name', 'required');
		$this->form_validation->set_rules('cab_des', 'Description', 'required');
		$_FILES["cab_img"];
		$config['upload_path'] = 'assets/uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '500';
		$config['encrypt_name']= TRUE;
		$this->load->library('upload', $config);
		if($this->form_validation->run())
		{
			if ( ! $this->upload->do_upload('cab_img'))
			{
				$error = array('error' => $this->upload->display_errors());
				die($error['error']);
			}
			else
			{
				$image = array('upload_data' => $this->upload->data());
				$data = array(
				"cab_name"=>$this->input->post("cab_name"),
				'cab_description' => $this->input->post('cab_des'),
				"cab_image"=>$image['upload_data']['file_name']
				);
				//die(print_r($data));
				$this->load->model('CabModel');
				if($res=$this->CabModel->UpdateCab($data,$id))
				{
					die ('Submit Successfully');		
				}else
				{
					die ('Please ReSubmit');			
				}	
				
			}
			
		}
		else 
		{
			echo validation_errors();
		}
		}else{
			
			$this->load->library("form_validation");
			$this->form_validation->set_error_delimiters();
			$this->form_validation->set_rules('cab_name', 'Cab Name', 'required');
			$this->form_validation->set_rules('cab_des', 'Description', 'required');
			
			if( $this->form_validation->run() )
			{
				
				
				
						
						$data = array(
									  "cab_name"=>$this->input->post("cab_name"),
									  'cab_description' => $this->input->post('cab_des')
									  );
				
						$this->load->model('CabModel');
						if($res=$this->CabModel->UpdateCab($data,$id))
						{
							die ('Submit Successfully');		
						}
						else
						{
							die ('Please ReSubmit');			
						}	
				
					
			
			}
			else 
			{
			echo validation_errors();
			}
		}
	}
	
	
	public function DeleteCab($id){
		
		header('Access-Control-Allow-Origin:*');
		$this->load->model('CabModel');
		$final= $this->CabModel->DeleteCab($id);
		if( $final==true ){
			
			die('Delete Successfully');
		}
		else{
			die('Unable To Delete');
		}
		
	}
}
?>