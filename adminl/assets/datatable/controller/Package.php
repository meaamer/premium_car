<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
	public function AddWebPackage($id=null){
		$this->load->helper(array('url','form'));
		$dataheader=array('title'=>'Add Package');
		$this->load->view('Extras/Header',$dataheader);
		
		$this->load->model('PackageModel');
		$data="";
		if($id!=null){
			//die('hello');
			$data['row']=$this->PackageModel->GetPackage($id)[0];
		}
		
		$this->load->model('CabModel');
		$data['cabs']=$this->CabModel->GetCabs();
		

		$this->load->model('GeoModel');
		$data['cities']=$this->GeoModel->GetCities();
		
		//die(print_r($data['cities']));

		$this->load->view('PackageManagment/AddWebPackage',$data);
		$this->load->view('Extras/Footer');

	}

	public function AddWebPackagePrice(){
		header('Access-Control-Allow-Origin:*');
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>'); 
		$this->form_validation->set_rules('package_name','Package Name','required');
		//$this->form_validation->set_rules('source_city','Source City','required');
		$this->form_validation->set_rules('special_id','Special Id','required');
		$this->form_validation->set_rules('cab_id','Cab','required');
		$this->form_validation->set_rules('from_city','From City','required');
		$this->form_validation->set_rules('to_city','To City','required');
		$this->form_validation->set_rules('itinerary','Itinerary','required');
		$this->form_validation->set_rules('no_of_days','No of Days','required');
		$this->form_validation->set_rules('km_limit','Kms Limit','required');
		$this->form_validation->set_rules('extra_km','Extra Km','required');
		$this->form_validation->set_rules('extra_hour','Extra Hour','required');
		$this->form_validation->set_rules('hour_limit','Hour Limit','required');
		$this->form_validation->set_rules('include','Includes ','required');
		$this->form_validation->set_rules('exclude','Exclude','required');
		$this->form_validation->set_rules('fare_amount','Fare Amount','required');
		$this->form_validation->set_rules('terms','Terms','required');
		
		if($this->form_validation->run()){
			$data=array(
				'package_name'=>$this->input->post('package_name'),
				'city_id'=>$this->input->post('city_id'),
				'special_id'=>$this->input->post('special_id'),
				'cab_id'=>$this->input->post('cab_id'),
				'from_city'=>$this->input->post('from_city'),
				'to_city'=>$this->input->post('to_city'),
				'itinerary'=>$this->input->post('itinerary'),
				'no_of_days'=>$this->input->post('no_of_days'),
				'km_limit'=>$this->input->post('km_limit'),
				'extra_km'=>$this->input->post('extra_km'),
				'extra_hour'=>$this->input->post('extra_hour'),
				'hour_limit'=>$this->input->post('hour_limit'),
				'include'=>$this->input->post('include'),
				'exclude'=>$this->input->post('exclude'),
				'fare_amount'=>$this->input->post('fare_amount'),
				'terms'=>$this->input->post('terms'));	
			
				$this->load->model('PackageModel');
				if($this->PackageModel->AddWebPackagePrice($data)){
					echo '<div class="alert alert-success" >Web Package Added Successfully</div><script>$("#add_webpackage_form")[0].reset();</script>';
				};
				//$id = $this->WebModel->AddWebPricelDetails($data);
				
			}else{
				
				echo validation_errors();
			}
	}

	public function UpdateWebPackage(){
		header('Access-Control-Allow-Origin:*');
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>'); 
		$this->form_validation->set_rules('package_name','Package Name','required');
		//$this->form_validation->set_rules('source_city','Source City','required');
		$this->form_validation->set_rules('special_id','Special Id','required');
		$this->form_validation->set_rules('cab_id','Cab','required');
		$this->form_validation->set_rules('from_city','From City','required');
		$this->form_validation->set_rules('to_city','To City','required');
		$this->form_validation->set_rules('itinerary','Itinerary','required');
		$this->form_validation->set_rules('no_of_days','No of Days','required');
		$this->form_validation->set_rules('extra_hour','Extra Hour','required');
		$this->form_validation->set_rules('hour_limit','Hour Limit','required');
		$this->form_validation->set_rules('km_limit','Kms Limit','required');
		$this->form_validation->set_rules('extra_km','Extra Km','required');
		$this->form_validation->set_rules('include','Includes ','required');
		$this->form_validation->set_rules('exclude','Exclude','required');
		$this->form_validation->set_rules('fare_amount','Fare Amount','required');
		$this->form_validation->set_rules('terms','Terms','required');
		
		if($this->form_validation->run()){
			$data=array(
				'package_name'=>$this->input->post('package_name'),
				'city_id'=>$this->input->post('city_id'),
				'special_id'=>$this->input->post('special_id'),
				'cab_id'=>$this->input->post('cab_id'),
				'from_city'=>$this->input->post('from_city'),
				'to_city'=>$this->input->post('to_city'),
				'itinerary'=>$this->input->post('itinerary'),
				'no_of_days'=>$this->input->post('no_of_days'),
				'km_limit'=>$this->input->post('km_limit'),
				'extra_hour'=>$this->input->post('extra_hour'),
				'hour_limit'=>$this->input->post('hour_limit'),
				'extra_km'=>$this->input->post('extra_km'),
				'include'=>$this->input->post('include'),
				'exclude'=>$this->input->post('exclude'),
				'fare_amount'=>$this->input->post('fare_amount'),
				'terms'=>$this->input->post('terms'));	
			
				$this->load->model('PackageModel');
				if($this->PackageModel->UpdateWebPackage($data)){
					echo '<div class="alert alert-success" >Web Package Added Successfully</div><script>$("#add_webpackage_form")[0].reset();</script>';
				};
				//$id = $this->WebModel->AddWebPricelDetails($data);
				
			}else{
				
				echo validation_errors();
			}
	}

	public function PackageList(){
		$this->load->helper(array('url','form'));
		$dataheader=array('title'=>'Add Package');
		$this->load->view('Extras/Header',$dataheader);
		$this->load->model('PackageModel');
		$data['package_list']=$this->PackageModel->PackageList();
		$this->load->view('Web/WebList/PackageList',$data);
		$this->load->view('Extras/Footer');
	}
	
/**********Function for Getting Bookings*************/	
	public function PackageListx(){
		$this->load->model("PackageModel");  
		$fetch_data = $this->PackageModel->MakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->package_name;
			$sub_array[]=$row->city_name;
			$sub_array[]=$row->to_city;
			$sub_array[]=$row->cab_name;
			$sub_array[]=$row->no_of_days;
			$sub_array[]=$row->km_limit;
			$sub_array[]=$row->extra_km;
			$sub_array[]=$row->fare_amount;
			$sub_array[]='<a href="'.base_url().'Package/AddWebPackage/'.$row->id.'" id="'.$row->id.'" class="btn btn-primary btn-xs mBtnSmall">Edit</a>';
			$sub_array[]='<button id="'.$row->id.'" onclick="DeletePackage('.$row->id.')" class="btn btn-danger btn-xs mBtnSmall">Delete</button>';
			$sub_array[]=$row->id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->PackageModel->GetAllData(),  
            "recordsFiltered"       =>     $this->PackageModel->GetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}
	
	
	
	public function DeletePackages($id){
		header('Access-Control-Allow-Origin:*');
		$this->load->helper(array('url','form'));
		$this->load->model('PackageModel');
		$this->PackageModel->DeletePackage($id);
		
	}
	




}





?>