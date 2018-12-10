<?php
class ReportModel extends CI_Model {
	
	//show local booking 
	public function Local($id=null){
		$this->db->select('*');
		$this->db->from('booking');
		if ( $id!=null ){
			
			$this->db->join('booking__local','booking__local.booking_id = booking.booking_id','left');
			$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
			$this->db->where('booking.type','local');
			$this->db->where('booking.booking_id',$id);
			$this->db->where('company_id',$this->session->userdata('company_id'));
			
		}else{
			
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->where('booking.type','local');
		$this->db->where('company_id',$this->session->userdata('company_id'));
			
		}
		
		$result = $this->db->get();
		return $result->result_array();
	}
	
	
	//show Outstation booking 
	public function OS($id=null){
		$this->db->select('*');
		$this->db->from('booking');
		if ( $id!=null ){
			
			$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
			$this->db->join('booking__outstaion','booking__outstaion.booking_id = booking.booking_id','left');
			$this->db->where('booking.type','outstation');
			$this->db->where('booking.booking_id',$id);
			$this->db->where('company_id',$this->session->userdata('company_id'));
			
		}else{
			$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
			$this->db->where('booking.type','outstation');
			$this->db->where('company_id',$this->session->userdata('company_id'));
			
		}
		
		$result = $this->db->get();
		return $result->result_array();
	}
	
	
	//show transfer booking 
	public function TR($id=null){
		$this->db->select('*');
		$this->db->from('booking');
		if ( $id!=null ){
			
			$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
			$this->db->join('booking__transfer','booking__transfer.booking_id = booking.booking_id','left');
			$this->db->where('booking.type','transfer');
			$this->db->where('booking.booking_id',$id);
			$this->db->where('company_id',$this->session->userdata('company_id'));
			
			
		}else{
			$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
			$this->db->where('booking.type','transfer');
			$this->db->where('company_id',$this->session->userdata('company_id'));
				
		}
		
		$result = $this->db->get();
		return $result->result_array();
	}

	##############################Show local list using datatable############


	var $local_table="booking";

	var $local_selectColoum=array("booking_id","cabs.cab_name","from_city","sub_type",
		"traveling_date","traveling_time","first_name");
		
	var $local_order_column=array("booking_id","cabs.cab_name","from_city","sub_type","traveling_date",null,"first_name");


/*******Function for Search Query****/
	public function LocalSearchQuery(){
		$this->db->select($this->local_selectColoum);
		$this->db->from($this->local_table);
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->where('booking.type','local');
		$this->db->where('company_id',$this->session->userdata('company_id'));
		if(isset($_POST["search"]["value"])){
			$this->db->like("first_name",$_POST["search"]["value"]);
			//$this->db->or_like("cabs.cab_name",$_POST["search"]["value"]);
			//$this->db->or_like("from_city",$_POST["search"]["value"]);
			//$this->db->or_like("traveling_date",$_POST["search"]["value"]);
			//$this->db->or_like("booking_id",$_POST["search"]["value"]);
			
		}
		//die("#".$_POST['order']['0']['dir']);
		if(isset($_POST["order"])){
			$this->db->order_by($this->local_order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('booking_id', 'DESC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function LocalMakeTable(){
		$this->LocalSearchQuery();  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function LocalGetFilterData(){
		$this->LocalSearchQuery();  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function LocalGetAllData(){
		$this->db->select("*");  
        $this->db->from($this->local_table);  
        return $this->db->count_all_results();  
	}
	######################ends local################################





		##############################Show outstation list using datatable############


	var $os_table="booking";

	var $os_selectColoum=array("booking_id","cabs.cab_name","from_city","no_of_days",
		"traveling_date","first_name");
		
	var $os_order_column=array("booking_id","cabs.cab_name","from_city","no_of_days","traveling_date","first_name");


/*******Function for Search Query****/
	public function OSSearchQuery(){
		$this->db->select($this->os_selectColoum);
		$this->db->from($this->os_table);
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->where('booking.type','outstation');
		$this->db->where('company_id',$this->session->userdata('company_id'));
		if(isset($_POST["search"]["value"])){
			$this->db->like("first_name",$_POST["search"]["value"]);
			//$this->db->or_like("cabs.cab_name",$_POST["search"]["value"]);
			//$this->db->or_like("from_city",$_POST["search"]["value"]);
			//$this->db->or_like("traveling_date",$_POST["search"]["value"]);
			//$this->db->or_like("booking_id",$_POST["search"]["value"]);
			
		}
		//die("#".$_POST['order']['0']['dir']);
		if(isset($_POST["order"])){
			$this->db->order_by($this->os_order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('booking_id', 'DESC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function OSMakeTable(){
		$this->OSSearchQuery();  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function OSGetFilterData(){
		$this->OSSearchQuery();  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function OSGetAllData(){
		$this->db->select("*");  
        $this->db->from($this->os_table);  
        return $this->db->count_all_results();  
	}
	######################ends outstation################################






		##############################Show transfer list using datatable############


	var $tr_table="booking";

	var $tr_selectColoum=array("booking_id","cabs.cab_name","from_city","type",
		"traveling_date","first_name");
		
	var $tr_order_column=array("booking_id","cabs.cab_name","from_city","type","traveling_date","first_name");


/*******Function for Search Query****/
	public function TRSearchQuery(){
		$this->db->select($this->tr_selectColoum);
		$this->db->from($this->tr_table);
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->where('booking.type','transfer');
		$this->db->where('company_id',$this->session->userdata('company_id'));
		if(isset($_POST["search"]["value"])){
			$this->db->like("first_name",$_POST["search"]["value"]);
			//$this->db->or_like("cabs.cab_name",$_POST["search"]["value"]);
			//$this->db->or_like("from_city",$_POST["search"]["value"]);
			//$this->db->or_like("traveling_date",$_POST["search"]["value"]);
			//$this->db->or_like("booking_id",$_POST["search"]["value"]);
			
		}
		//die("#".$_POST['order']['0']['dir']);
		if(isset($_POST["order"])){
			$this->db->order_by($this->tr_order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('booking_id', 'DESC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function TRMakeTable(){
		$this->TRSearchQuery();  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function TRGetFilterData(){
		$this->TRSearchQuery();  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function TRGetAllData(){
		$this->db->select("*");  
        $this->db->from($this->tr_table);  
        return $this->db->count_all_results();  
	}
	######################ends Transfer################################
}
?>