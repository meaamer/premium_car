<?php
class VendorPricingModel extends CI_Model{
	
	############### Select List ######################################
	
	public function LocalList($id=null){
		$this->db->select('*');
		$this->db->from('vendor__local');
		$this->db->join('cabs','cabs.cab_id =vendor__local.cab_id','left');
		$this->db->join('vendor','vendor.vendor_id =vendor__local.vendor_id','left');
		if($id!=null){
			$this->db->where('vendor__local.vendor_local_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	
	
	public function OSList($id=null){
		
		$this->db->select('*');
		$this->db->from('vendor__outstation');
		$this->db->join('cabs','cabs.cab_id =vendor__outstation.cab_id','left');
		$this->db->join('vendor','vendor.vendor_id =vendor__outstation.vendor_id','left');
		if($id!=null){
			$this->db->where('vendor__outstation.vendor_outstation_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
		
		
	}
	public function TRList($id=null){
		
		$this->db->select('*');
		$this->db->from('vendor__transfer');
		$this->db->join('cabs','cabs.cab_id =vendor__transfer.cab_id','left');
		$this->db->join('vendor','vendor.vendor_id =vendor__transfer.vendor_id','left');
		if($id!=null){
			$this->db->where('vendor__transfer.vendor_transfer_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
		
	}
	
	
	
	############### ADD ######################################
	
	public function AddLocal($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'full_day' => $this->input->post('fullday'),
		'half_day' => $this->input->post('halfday'),
		'city' => $this->input->post('city'),
		'extra_hours' => $this->input->post('extrahour'),
		'extra_kilometer' => $this->input->post('extrakm'));
		$this->db->insert('vendor__local',$data);
		return true;
		
	}
	
	public function AddOS($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'outstation_per_kilometer' => $this->input->post('os_per_km'),
		'extra_per_kilometer' => $this->input->post('extra_per_km'),
		'city' => $this->input->post('city'),
		'average_per_kilometer' => $this->input->post('avg_per_km'));
		
		$this->db->insert('vendor__outstation',$data);
		return true;
		
	}
	public function AddTR($id=null){
		
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'transfer_rate' => $this->input->post('tr_rate'),
		'city' => $this->input->post('city'),
		'waiting_charges' => 0);
		
		$this->db->insert('vendor__transfer',$data);
		return true;
		
	}
	
	################# UPDATE ##########################
	
	public function UpdateLocal($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'full_day' => $this->input->post('fullday'),
		'city' => $this->input->post('city'),
		'half_day' => $this->input->post('halfday'),
		'extra_hours' => $this->input->post('extrahour'),
		'extra_kilometer' => $this->input->post('extrakm'));
		$this->db->where('vendor_local_id',$id);
		$this->db->update('vendor__local',$data);
		return(true);
		
	}
	public function UpdateOS($id=null){
		
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'outstation_per_kilometer' => $this->input->post('os_per_km'),
		'extra_per_kilometer' => $this->input->post('extra_per_km'),
		'average_per_kilometer' => $this->input->post('avg_per_km'));
		$this->db->where('vendor_outstation_id',$id);
		$this->db->update('vendor__outstation',$data);
		return(true);
		
	}
	public function UpdateTR($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'vendor_id' => $this->input->post('vendor_id'),
		'transfer_rate' => $this->input->post('tr_rate'),
		'city' => $this->input->post('city'),
		'waiting_charges' => $this->input->post('waiting_charges'));
		
		$this->db->where('vendor_transfer_id',$id);
		$this->db->update('vendor__transfer',$data);
		return(true);
	}
	
	################# DELETE ##########################
	
	public function DeleteLocal($id){
		
		$this->db->where('vendor_local_id',$id);
		$this->db->delete('vendor__local');
		return(true);
		
	}
	public function DeleteOS($id=null){
		
		$this->db->where('vendor_outstation_id',$id);
		$this->db->delete('vendor__outstation');
		return(true);
		
	}
	public function DeleteTR($id=null){
		
		$this->db->where('vendor_transfer_id',$id);
		$this->db->delete('vendor__transfer');
		return(true);
		
	}
	
	################### cabs and  Vendor Pricing###################################
	
	
	public function GetLocalPricing($id=null){
		$this->db->select('*');
		$this->db->from('vendor__local');
		$this->db->join('vendor','vendor.vendor_id=vendor__local.vendor_id','left');
		$this->db->join('cabs','cabs.cab_id=vendor__local.cab_id','left');
		if($this->input->get_post("vendor_id")!=""){
			$this->db->where('vendor__local.vendor_id',$this->input->get_post("vendor_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('vendor__local.cab_id',$this->input->get_post("cab_id"));	
		}
		
		
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
	
	public function GetOSPricing($id=null){
		$this->db->select('*');
		$this->db->from('vendor__outstation');
		$this->db->join('vendor','vendor.vendor_id=vendor__outstation.vendor_id','left');
		$this->db->join('cabs','cabs.cab_id=vendor__outstation.cab_id','left');
		if($this->input->get_post("vendor_id")!=""){
			$this->db->where('vendor__outstation.vendor_id',$this->input->get_post("vendor_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('vendor__outstation.cab_id',$this->input->get_post("cab_id"));	
		}
		
		
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
	public function GetTRPricing($id=null){
		$this->db->select('*');
		$this->db->from('vendor__transfer');
		$this->db->join('vendor','vendor.vendor_id=vendor__transfer.vendor_id','left');
		$this->db->join('cabs','cabs.cab_id=vendor__transfer.cab_id','left');
		if($this->input->get_post("vendor_id")!=""){
			$this->db->where('vendor__transfer.vendor_id',$this->input->get_post("vendor_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('vendor__transfer.cab_id',$this->input->get_post("cab_id"));	
		}
		
		
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
	
}
?>