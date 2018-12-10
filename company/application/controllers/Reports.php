<?php

class Reports extends CI_Controller {
	
	// show local booking list v
	public function Local($id=null){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('ReportModel');
		if ($id!=null){
			$data['rows']=$this->ReportModel->Local($id)[0];
			$this->load->view('reports/report_detail/LocalDetail',$data);
		}else{
			$data['locals']=$this->ReportModel->Local();
		$this->load->view('reports/LocalReportView',$data);
		}
		
		$this->load->view('includes/footer');
	}

	// show Outstation booking list v
	public function Outstation($id=null){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('ReportModel');
		if ($id!=null){
			$data['rows']=$this->ReportModel->OS($id)[0];
			$this->load->view('reports/report_detail/OSDetail',$data);
		}else{
		$data['outstations']=$this->ReportModel->OS();
		$this->load->view('reports/OSReportView',$data);
		}
		
		$this->load->view('includes/footer');
	}
	

// show Transfer booking list v
	public function Transfer($id=null){
		$this->load->view('includes/header');
		$this->load->view('includes/aside');
		$this->load->model('ReportModel');
		if ($id!=null){
			$data['rows']=$this->ReportModel->TR($id)[0];
			$this->load->view('reports/report_detail/TRDetail',$data);
		}else{
			$data['transfers']=$this->ReportModel->TR();
		$this->load->view('reports/TRReportView',$data);
		}
		
		$this->load->view('includes/footer');
	}
##################################show list using datatable######################

	

	

	

/**********Function for local Bookings through datatable method*************/	
	public function LocalList(){
		$this->load->model('ReportModel');  
		$fetch_data = $this->ReportModel->LocalMakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->booking_id;
			$sub_array[]=$row->cab_name;
			$sub_array[]=$row->from_city;
			$sub_array[]=$row->sub_type;
			$sub_array[]=$row->traveling_date;
			$sub_array[]=$row->first_name;
			
			
			$sub_array[]='<a href="'.base_url().'Reports/Local/'.$row->booking_id.'"
			 class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>';
			
			$sub_array[]=$row->booking_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->ReportModel->LocalGetAllData(),  
            "recordsFiltered"       =>     $this->ReportModel->LocalGetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}



	/**********Function for outstation Bookings through datatable method*************/	
	public function OSList(){
		$this->load->model('ReportModel');  
		$fetch_data = $this->ReportModel->OSMakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->booking_id;
			$sub_array[]=$row->cab_name;
			$sub_array[]=$row->from_city;
			$sub_array[]=$row->no_of_days;
			$sub_array[]=$row->traveling_date;
			$sub_array[]=$row->first_name;
			
			
			$sub_array[]='<a href="'.base_url().'Reports/Outstation/'.$row->booking_id.'"
			 class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>';
			
			$sub_array[]=$row->booking_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->ReportModel->OSGetAllData(),  
            "recordsFiltered"       =>     $this->ReportModel->OSGetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}




	/**********Function for transfer Bookings through datatable method*************/	
	public function TRList(){
		$this->load->model('ReportModel');  
		$fetch_data = $this->ReportModel->TRMakeTable();  
		$data = array();
		
		foreach($fetch_data as $row){
			
			$sub_array= array();
			
			$sub_array[]=$row->booking_id;
			$sub_array[]=$row->cab_name;
			$sub_array[]=$row->from_city;
			$sub_array[]=$row->type;
			$sub_array[]=$row->traveling_date;
			$sub_array[]=$row->first_name;
			
			
			$sub_array[]='<a href="'.base_url().'Reports/Transfer/'.$row->booking_id.'"
			 class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></a>';
			
			$sub_array[]=$row->booking_id;
		    
		    $data[]=$sub_array;
		}
		
		$output = array(
			"draw"                  =>     intval($_POST["draw"]),  
            "recordsTotal"          =>     $this->ReportModel->TRGetAllData(),  
            "recordsFiltered"       =>     $this->ReportModel->TRGetFilterData(),  
            "data"                  =>     $data  
		
		);
		echo json_encode($output);
		
	}
}
?>