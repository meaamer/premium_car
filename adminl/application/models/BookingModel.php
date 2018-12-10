<?php
class BookingModel extends CI_Model {
	
// this function is use to select all the details of booking table
	public function BookingList($id=null){
		
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->order_by('booking_id','DESC');
		$result=$this->db->get();
		return $result->result_array();
	}
	
	
/*****show all each booking deatils***********/
	public function BookingDetail($booking_id,$type){
		
		$this->db->select('*');
		$this->db->from('booking');
		
		
	if ($type=='local'){
			
    		$this->db->join('booking__local','booking__local.booking_id = booking.booking_id','left');
    		$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
		} 
		elseif ($type=='outstation'){
			$this->db->join('booking__outstaion','booking__outstaion.booking_id = booking.booking_id','left');
			$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
   
    	} else 
    	{
    		$this->db->join('booking__transfer','booking__transfer.booking_id = booking.booking_id','left');
    		$this->db->join('advance_amount','advance_amount.booking_id = booking.booking_id','left');
		}
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('vendor','vendor.vendor_id = booking.vendor_id','left');
		$this->db->where('booking.booking_id',$booking_id);
		$result=$this->db->get();
		return $result->result_array();
		
		 
	}

	//select debited amounts
	public function TotalDebit($booking_id,$vendor_id){

		$this->db->select('SUM(advance_amount.debit) as TotalDebit,SUM(advance_amount.credit) as TotalCredit');
		$this->db->from('advance_amount');
		$this->db->where('vendor_id',$vendor_id);	
		$this->db->where('booking_id',$booking_id);	
		$result = $this->db->get();
		return $result->result_array()[0];
	}

	//function for getting per Km rate of vendors
	public function PerKmRate($vendor_id,$type){

		$this->db->select('*');
		$this->db->from('vendor');
		
		
	if ($type=='local'){
		$this->db->join('vendor__local','vendor__local.vendor_id = vendor.vendor_id','left');
		} 
		elseif ($type=='outstation'){
			$this->db->join('vendor__outstation','vendor__outstation.vendor_id = vendor.vendor_id','left');
   
    	} elseif ($type=='transfer'){

    		$this->db->join('vendor__transfer','vendor__transfer.vendor_id = vendor.vendor_id','left');

    		
		}
		$this->db->where('vendor.vendor_id',$vendor_id);
		$result=$this->db->get();
		return $result->result_array()[0];
	}
		
		

	


/*****Function to Show read Status***********/
	public function ReadStatus($booking_id){
		$this->db->where('booking_id',$booking_id);
		return($this->db->update('booking',array("read_status"=>"1")));
	}

/*****Function to show how many booking unread***********/
	public function UnReadBookings(){
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('read_status','0');
		$query = $this->db->get();  
        return $query->num_rows();
	}
	
	
	
/***************function for datatable pligins**********************/
	
	var $table="booking";

	var $selectColoum=array("booking_id","cabs.cab_name","company.company_name","first_name","traveling_date","traveling_time","type","booking.vendor_id","vendor.vendor_id","vendor.vendor_name","vendor_status","assign_timestamp","accept_timestamp","booking_timestamp","read_status");
		
	var $order_column=array("booking_id","cabs.cab_name","company.company_name","first_name","traveling_date",
	null,"type","vendor_id");


/*******Function for Search Query****/
	public function SearchQuery($para){
		//die(print_r($para));
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		$this->db->join('cabs','cabs.cab_id = booking.cab_id','left');
		$this->db->join('company','company.company_id = booking.company_id','left');
		$this->db->join('vendor','vendor.vendor_id=booking.vendor_id','left');
		//$this->db->where('vendor_status',$para);
		
		if($para==0){
		 	$this->db->where_in('vendor_status',array(0,1));	
		 }else if($para==3){
		 	$this->db->where('vendor_status',3);
		 }else if($para==4){
		 	$this->db->where('vendor_status',4);
		 }
		
		
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("cabs.cab_name",$_POST["search"]["value"]);
			#$this->db->or_like("company.company_name",$_POST["search"]["value"]);
			#$this->db->or_like("first_name",$_POST["search"]["value"]);
			#$this->db->or_like("traveling_date",$_POST["search"]["value"]);
			#$this->db->or_like("type",$_POST["search"]["value"]);
			
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
	

/*******Function for Assiging Booking To Vendor*****/
	public function GetVendorRates(){
		if($this->input->post('type')=="OutStation"){
		$data =	$this->GetVendorOS($this->input->post('sub_type'),$this->input->post('city'),$this->input->post('cab'),$this->input->post('total_kms'),$this->input->post('no_of_days'));
			
			return $data;	
		}
		if($this->input->post('type')=="Local"){
			$data=$this->GetVendorLocal($this->input->post('sub_type'),$this->input->post('city'),$this->input->post('cab'),$this->input->post('no_of_days'));
			
			return $data;	
			
			}
			if($this->input->post('type')=="Transfer"){
			$data=$this->GetVendorTransfer($this->input->post('city'),$this->input->post('cab'),$this->input->post('total_kms'));
						
			return $data;	
			
			}
		
	}


	
/*******Function for Getting Vendor For OS**************/			
	public function GetVendorOS($city,$cab_id,$type){
		if($type=="outstation"){
			$this->db->select("*");
			$this->db->from('vendor__outstation');
			$this->db->join('vendor','vendor.vendor_id=vendor__outstation.vendor_id','left');
			$this->db->join('cabs','vendor__outstation.cab_id=cabs.cab_id','left');		
			//$this->db->join('company__outstation','company__outstation.cab_id=vendor__outstation.cab_id','left');		
			$this->db->where('vendor__outstation.cab_id',$cab_id);
			$this->db->where('vendor__outstation.city',$city);
			$this->db->order_by('vendor__outstation.outstation_per_kilometer','ASC');
			$q=$this->db->get();
			return $q->result_array();
			//die(print_r($q));
		}else if($type=="local") {
			$this->db->select("*");
			$this->db->from('vendor__local');
			$this->db->join('vendor','vendor.vendor_id=vendor__local.vendor_id','left');
			$this->db->join('cabs','vendor__local.cab_id=cabs.cab_id','left');		
			$this->db->where('vendor__local.cab_id',$cab_id);
			$this->db->where('vendor__local.city',$city);
			//$this->db->order_by('vendor__local.outstation_per_kilometer','ASC');
			$q=$this->db->get();
			return $q->result_array();
		}else if($type="transfer"){
			$this->db->select("*");
			$this->db->from('vendor__transfer');
			$this->db->join('vendor','vendor.vendor_id=vendor__transfer.vendor_id','left');
			$this->db->join('cabs','cabs.cab_id=vendor__transfer.cab_id','left');		
			$this->db->where('vendor__transfer.cab_id',$cab_id);
			$this->db->where('vendor__transfer.city',$city);
			//$this->db->order_by('vendor__tranfer.outstation_per_kilometer','ASC');
			$q=$this->db->get();	
			return $q->result_array();
		}
		
		
	}


	public function GetCompanyOS($booking_id,$type){
		$this->db->select("*");
		if ($type=='outstation') {
			$this->db->from('booking__outstaion');

		}elseif ($type=='transfer') {

			$this->db->from('booking__transfer');

		}elseif ($type=='local') {
			
			$this->db->from('booking__local');
		}
		$this->db->where('booking_id',$booking_id);
		$q=$this->db->get();	
		return $q->result_array()[0];
	}


/*******Function for Assiging Vendor**************/
	public function AssignVendor($booking_id,$data){
		$this->db->where('booking_id',$booking_id);
		return($this->db->update('booking',$data));
		
	}


/*****Function for getting Closing Details from close_outstation table*********/
	public function GetClosingDetails($booking_id){
		$this->db->select('*');
		$this->db->from('close_outstation');
		$this->db->where('booking_id',$booking_id);
		$q=$this->db->get();
		return $q->result_array();
		
	}
	
	
	
/*****Function for Updating Closing Details in booking_outstation*********/		
	public function UpdateOne($dataone,$booking_id){
		$advance_id=$this->input->post('advance_id');
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__outstaion',$dataone);	


		$datathree=array(
				'credit'=>$this->input->post('advance_amount'),
				'reason'=>$this->input->post('reason'));

		$this->db->where('booking_id',$booking_id);
		$this->db->where('advance_id',$advance_id);
		$this->db->update('advance_amount',$datathree);	
		return true;

		
	}
	
/*****Function for Updating Closing Details in bookingtable*********/		
	public function UpdateTwo($datatwo,$booking_id){
		$this->db->where('booking_id',$booking_id);
		return($this->db->update('booking',$datatwo));	
		
	}
	
	public function UpdateThree($datathree){
		$this->db->insert('advance_amount',$datathree);
		return true;	
	}
		
		
		
	
/*****Function for Updating Closing Details in Close Table*********/		
	public function UpdateClose($data,$close_id){
		$this->db->where('close_id',$close_id);
		return($this->db->update('close_outstation',$data));	
		
	}	

/******Function for updating local booking table********************/	
	public function UpdateLocal($booking_id){
		$advance_id=$this->input->post('advance_id');
		
		$dataone=array(
			    'extra_hour'=>$this->input->post('extra_hour'),
				'other_charges'=>$this->input->post('other_charges'),
				'totat_kilometer'=>$this->input->post('total_km')
				);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__local',$dataone);
			
			$datatwo=array(
				'opening_km'=>$this->input->post('opening_km'),
				'closing_km'=>$this->input->post('closing_km'));

		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$datatwo);

		$data3=array(
				'reason'=>$this->input->post('reason'),
				'credit'=>$this->input->post('advance_amount'));

		$this->db->where('booking_id',$booking_id);
		$this->db->where('advance_id',$advance_id);
		$this->db->update('advance_amount',$data3);
		return true;
	}


	/******Function for updating transfer booking table********************/	
	public function UpdateTransfer($booking_id){
		$advance_id=$this->input->post('advance_id');
		$dataone=array(
			    'extra_kilometer'=>$this->input->post('extra_kilometer'),
				'other_charges'=>$this->input->post('other_charges'),
				'totat_kilometer'=>$this->input->post('total_km')
				);
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking__transfer',$dataone);
			
			$datatwo=array(
				'opening_km'=>$this->input->post('opening_km'),
				'closing_km'=>$this->input->post('closing_km'));

		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',$datatwo);

		$data3=array(
				'reason'=>$this->input->post('reason'),
				'credit'=>$this->input->post('advance_amount'));

		$this->db->where('booking_id',$booking_id);
		$this->db->where('advance_id',$advance_id);
		$this->db->update('advance_amount',$data3);
		
		return true;
	}

	// insert admin payble amount to transfer booking
	public function TransferPay($id,$vendor_id){
		$datathree=array(
				'debit'=>$this->input->post('pay_amount'),
				'booking_id'=>$id,
				'vendor_id'=>$vendor_id,
				'credit'=>0,
				'date'=>date('d-m-y'));
		$this->db->insert('advance_amount',$datathree);
		return true;	
	}

	// insert admin payble amount to Local booking
	public function LocalPay($id){
		$datathree=array(
				'debit'=>$this->input->post('paid_amount'),
				'booking_id'=>$id,
				'vendor_id'=>$this->input->post('vendor_id'),
				'credit'=>0,
				'date'=>date('d-m-y'));
		$this->db->insert('advance_amount',$datathree);
		return true;	
	}


	
	public function Approve($data,$booking_id){
		$this->db->where('booking_id',$booking_id);
		return($this->db->update('booking',$data));
	}
	
}
?>