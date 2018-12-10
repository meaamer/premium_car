<?php
class BookingModel extends CI_Model{
	
	public function BookingList(){
	 $this->db->select('*');
	 $this->db->from('booking');
	 $this->db->where('vendor_id',$this->session->userdata('vendor_id'));
	 $result = $this->db->get();
	 return $result->result_array();
	}
	
	/*****show all each booking deatils***********/
	public function BookingDetail($booking_id,$type){
		
		$this->db->select('*');
		$this->db->from('booking');
		
		if ($type=='local'){
			
    		$this->db->join('booking__local','booking__local.booking_id = booking.booking_id','left');
		} 
		elseif ($type=='outstation'){
			$this->db->join('booking__outstaion','booking__outstaion.booking_id = booking.booking_id','left');
   
    	}else
    	{
    		$this->db->join('booking__transfer','booking__transfer.booking_id = booking.booking_id','left');
		}
		
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->where('booking.booking_id',$booking_id);
		$result=$this->db->get();
		return $result->result_array();
		
		
	}
	
	
/***************function for datatable pligins**********************/
	
	var $table="booking";

	var $selectColoum=array("booking_id","type","from_city","traveling_date","traveling_time","vendor_status","assign_timestamp");
		
	var $order_column=array("booking_id","type","from_city","traveling_date","traveling_date","vendor_status");


/*******Function for Search Query****/
	public function SearchQuery($para){
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		 $this->db->where('vendor_id',$this->session->userdata('vendor_id'));
		 //die(print_r($para));
		 if($para==0){
		 	$this->db->where_in('vendor_status',array(0,1));	
		 } else if($para==3){
		 	$this->db->where('vendor_status',3);
		 } else if($para==4){
		 	$this->db->where('vendor_status',4);
		 }
		 
		 //$this->db->where('vendor_status','1');
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("booking_id",$_POST["search"]["value"]);
			//$this->db->or_like("company.company_name",$_POST["search"]["value"]);
			//$this->db->or_like("first_name",$_POST["search"]["value"]);
			//$this->db->or_like("traveling_date",$_POST["search"]["value"]);
			//$this->db->or_like("type",$_POST["search"]["value"]);
			
		}
		//die("#".$_POST['order']['0']['dir']);
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('booking_id', 'DESC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function MakeTable($para){
		$this->SearchQuery($para);  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function GetFilterData($para){
		$this->SearchQuery($para);  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function GetAllData($para){
		$this->db->select("*");  
        $this->db->from($this->table);  
        return $this->db->count_all_results();  
	}
	

/*******Function for Getting all Data******/		
	public function AcceptBooking($booking_id){
		$this->db->where('booking_id',$booking_id);
		date_default_timezone_set("Asia/Calcutta");
		$status=array('vendor_status'=>'1',
			'accept_timestamp'=>date('d-m-y h:i A'),
		
			"driver_name"=>$this->input->post('d_name'),
			"driver_contact_number"=>$this->input->post('d_no'),
			"cab_number"=>$this->input->post('cab_no'));
		return $q=$this->db->update('booking',$status);
	}
	

/*******Function for Getting all Data******/		
	public function RejectBooking($booking_id){
		$this->db->where('booking_id',$booking_id);
		$status=array('vendor_status'=>'2','vendor_id'=>'0');
		return $q=$this->db->update('booking',$status);
		
	}	

		// function for get vendor per kilometer pricing
		public function VendorPricing($type){

		$this->db->select('*');
		$this->db->from('vendor');
		if ($type=='local') {
			$this->db->join('vendor__local','vendor__local.vendor_id = vendor.vendor_id','left');
		}
		if ($type=='outstation') {
			$this->db->join('vendor__outstation','vendor__outstation.vendor_id = vendor.vendor_id','left');
		}
		if ($type=='transfer') {
			$this->db->join('vendor__transfer','vendor__transfer.vendor_id = vendor.vendor_id','left');
		}
		
		$this->db->where('vendor.vendor_id',$this->session->userdata('vendor_id'));
		
		
		$result=$this->db->get();
		return $result->result_array()[0];

	}



}
?>