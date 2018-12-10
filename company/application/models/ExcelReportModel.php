<?php /**
* 
*/
class ExcelReportModel extends CI_Model
{
	
	


	public function GetReport(){
		$to_date=$this->input->post('to_date');
		$from_date=$this->input->post('from_date');
		$type=$this->input->post('type');
		
		
		$this->db->select('*');	
		$this->db->from('booking');	
		if ($type=='local') {
			$this->db->join('booking__local','booking__local.booking_id=booking.booking_id','left');	
		}elseif ($type=='outstation') {
			$this->db->join('booking__outstaion','booking__outstaion.booking_id=booking.booking_id','left');
		}elseif ($type=='transfer') {
			$this->db->join('booking__transfer','booking__transfer.booking_id=booking.booking_id','left');	
		}
		
			
		
		$this->db->join('cabs','cabs.cab_id=booking.cab_id','left');	
		$this->db->join('company','company.company_id=booking.company_id','left');	
		//$this->db->join('vendor','vendor.vendor_id=booking.vendor_id','left');	
		//$this->db->join('advance_amount','advance_amount.booking_id=booking.booking_id','left');
		
		$this->db->where('company.company_id',$this->session->userdata('company_id'));
	 	if ($to_date!="") {
	 		$this->db->where('traveling_date <=',$to_date);
	 	}
	 	
	 	if ($from_date!="") {
	 		$this->db->where('traveling_date >=',$from_date);
	 	}
	 	

	 	if ($type!="") {
	 		$this->db->where('type',$type);
	 	}
	 	
		
		
		$query=$this->db->get();
		return($query->result_array());
		
		
		
	}
} ?>