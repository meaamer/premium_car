<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PackageModel extends CI_Model {

/*******Function for Adding Web Package****/	
	public function AddWebPackagePrice($data){
		$query=$this->db->insert('web__package',$data);
		return($query);
	}

/*******Function for Getting WebPackage data for Update****/		
	public function GetPackage($id){
		$this->db->select('*');
		$this->db->from('web__package');
		$this->db->where('id',$id);
		$q=$this->db->get();
		return $q->result_array();
	}

/*******Function for Updating WebPackage******/
	public function UpdateWebPackage($data){
		$this->db->where('id',$this->input->get_post('id'));
		$query=$this->db->update('web__package',$data);
		return($query);
	}
	
	
	public function DeletePackage($id){
		$this->db->where('id', $id);
   		return($this->db->delete('web__package'));
	}

/*******Function for Getting PackageList******/
	public function PackageList(){
		$this->db->select('*');
		$this->db->from('web__package');
		$this->db->join('source_city','source_city.city_id=web__package.city_id','left');
		$this->db->join('cabs','cabs.cab_id=web__package.cab_id','left');
		$q=$this->db->get();
		return $q->result_array();
		
	}

	
	var $table="web__package";

	var $selectColoum=array("id","package_name","web__package.city_id","cab_name","city_name","to_city","web__package.cab_id","no_of_days","km_limit","extra_km","fare_amount");	
	var $order_column=array("package_name",null,null,null,null,null);


/*******Function for Search Query****/
	public function SearchQuery(){
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		$this->db->join("cabs","cabs.cab_id=web__package.cab_id","left");
		$this->db->join("source_city","source_city.city_id=web__package.city_id","left");
		if(isset($_POST["search"]["value"])){
			$this->db->like("source_city.city_name",$_POST["search"]["value"]);
			$this->db->or_like("package_name",$_POST["search"]["value"]);
			$this->db->or_like("to_city",$_POST["search"]["value"]);
			$this->db->or_like("no_of_days",$_POST["search"]["value"]);
			$this->db->or_like("km_limit",$_POST["search"]["value"]);
			$this->db->or_like("extra_km",$_POST["search"]["value"]);
			$this->db->or_like("cabs.cab_name",$_POST["search"]["value"]);
		}
		//die("#".$_POST['order']['0']['dir']);
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('id', 'ASC');  
		}
		
	}
	
	
/*******Function for Making Database Table****/	
	public function MakeTable(){
		$this->SearchQuery();  
           if($_POST["length"]!= -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
	}
	

/*******Function for Filtering Data******/	
	public function GetFilterData(){
		$this->SearchQuery();  
        $query = $this->db->get();  
        return $query->num_rows();  
	}
	
	
/*******Function for Getting all Data******/	
	public function GetAllData(){
		$this->db->select("*");  
        $this->db->from($this->table);  
        return $this->db->count_all_results();  
	}
	


}

?>	