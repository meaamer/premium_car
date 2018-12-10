
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyPricingModel extends CI_Model {
	
	############### Select List ######################################
	
	public function LocalList($id=null){
		
		$this->db->select('*');
		$this->db->from('company__local');
		$this->db->join('cabs','cabs.cab_id = company__local.cab_id','left');
		$this->db->join('company','company.company_id = company__local.company_id','left');
		if($id!=null){
			$this->db->where('company__local.company_local_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	
	
	public function OSList($id=null){
		
		$this->db->select('*');
		$this->db->from('company__outstation');
		$this->db->join('cabs','cabs.cab_id = company__outstation.cab_id','left');
		$this->db->join('company','company.company_id = company__outstation.company_id','left');
		if($id!=null){
			$this->db->where('company__outstation.company_outstation_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
		
	}
	public function TRList($id=null){
		
		$this->db->select('*');
		$this->db->from('company__transfer');
		$this->db->join('cabs','cabs.cab_id = company__transfer.cab_id','left');
		$this->db->join('company','company.company_id = company__transfer.company_id','left');
		if($id!=null){
			$this->db->where('company__transfer.company_transfer_id',$id);
		}
		$result = $this->db->get();
		return $result->result_array();
	}
	############### Datatalbe Lists ######################################
	
	
	
	
	
	
	############### ADD ######################################
	
	public function AddLocal($id=null){
		
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'full_day' => $this->input->post('fullday'),
		'half_day' => $this->input->post('halfday'),
		'extra_hour' => $this->input->post('extrahour'),
		
		'extra_kilometer' => $this->input->post('extrakm')
					);
		$this->db->insert('company__local',$data);
		return true;
		
	}
	public function AddOS($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'outstation_per_kilometer' => $this->input->post('os_per_km'),
		'extra_per_kilometer' => $this->input->post('extra_per_km'),
		'average_per_kilometer' => $this->input->post('avg_per_km'),
		'driver_charges' => $this->input->post('driver_chrages')
		
					);
		$this->db->insert('company__outstation',$data);
		return true;
		
	}
	public function AddTR($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'transfer_rate' => $this->input->post('tr_rate'),
		'waiting_charges' => 0);
		$this->db->insert('company__transfer',$data);
		return true;
		
	}
	
	################# UPDATE ###################################################
	
	public function UpdateLocal($id=null){
		
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'full_day' => $this->input->post('fullday'),
		'half_day' => $this->input->post('halfday'),
		'extra_hour' => $this->input->post('extrahour'),
		'extra_kilometer' => $this->input->post('extrakm'));
		$this->db->where('company_local_id',$id);
		$this->db->update('company__local',$data);
		return(true);
		
	}
	public function UpdateOS($id=null){
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'outstation_per_kilometer' => $this->input->post('os_per_km'),
		'extra_per_kilometer' => $this->input->post('extra_per_km'),
		'average_per_kilometer' => $this->input->post('avg_per_km'),
		'driver_charges' => $this->input->post('driver_chrages'));
		$this->db->where('company_outstation_id',$id);
		$this->db->update('company__outstation',$data);
		return(true);
		
	}
	public function UpdateTR($id=null){
		
		$data=array(
		'cab_id' => $this->input->post('cab_id'),
		'company_id' => $this->input->post('company_id'),
		'transfer_rate' => $this->input->post('tr_rate'),
		'waiting_charges' => $this->input->post('waiting_charges'));
		
		$this->db->where('company_transfer_id',$id);
		$this->db->update('company__transfer',$data);
		return(true);
		
	}
	
	################# DELETE ################################################
	
	public function DeleteLocal($id=null){
		
		$this->db->where('company_local_id',$id);
		$this->db->delete('company__local');
		return(true);
		
	}
	public function DeleteOS($id=null){
		
		$this->db->where('company_outstation_id',$id);
		$this->db->delete('company__outstation');
		return(true);
		
	}
	public function DeleteTR($id=null){
		
		$this->db->where('company_transfer_id',$id);
		$this->db->delete('company__transfer');
		return(true);
		
	}
	################### cabs and companyPricing###################################
	
	
	public function GetLocalPricing($id=null){
		$this->db->select('*');
		$this->db->from('company__local');
		$this->db->join('company','company.company_id=company__local.company_id','left');
		$this->db->join('cabs','cabs.cab_id=company__local.cab_id','left');
		if($this->input->get_post("comp_id")!=""){
			$this->db->where('company__local.company_id',$this->input->get_post("comp_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('company__local.cab_id',$this->input->get_post("cab_id"));	
		}
		
		if($id!=null){
			$this->db->where('company__local.company_local_id',$id);	
		}
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
	
	
	
	public function GetOSPricing($id=null){
		$this->db->select('*');
		$this->db->from('company__outstation');
		$this->db->join('company','company.company_id=company__outstation.company_id','left');
		$this->db->join('cabs','cabs.cab_id=company__outstation.cab_id','left');
		if($this->input->get_post("comp_id")!=""){
			$this->db->where('company__outstation.company_id',$this->input->get_post("comp_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('company__outstation.cab_id',$this->input->get_post("cab_id"));	
		}
		
		
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
	
	public function GetTRPricing($id=null){
		$this->db->select('*');
		$this->db->from('company__transfer');
		$this->db->join('company','company.company_id=company__transfer.company_id','left');
		$this->db->join('cabs','cabs.cab_id=company__transfer.cab_id','left');
		if($this->input->get_post("comp_id")!=""){
			$this->db->where('company__transfer.company_id',$this->input->get_post("comp_id"));	
		}
		
		if($this->input->get_post("cab_id")!=""){
			$this->db->where('company__transfer.cab_id',$this->input->get_post("cab_id"));	
		}
		
		
		
		$q=$this->db->get();
		return $q->result_array();
	}
	
}
?>