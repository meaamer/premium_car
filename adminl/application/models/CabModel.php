<?php
class CabModel extends CI_Model {
	
	// this function is use to select all the details of cab table
	public function CabList($id=null){
		
		$this->db->select('*');
		$this->db->from('cabs');
		if( $id!=null ){
			$this->db->where('cab_id',$id);
		}
		$result=$this->db->get();
		return $result->result_array();
	}
	
	
	// function use to insert cabs deails in database
	public function AddCab($data){
		
		$this->db->insert('cabs',$data);
		return true;
	}
	
	//use to update cab details
	public function UpdateCab($data,$id){
		$this->db->where('cab_id',$id);
		$this->db->update('cabs',$data);
		return true;
	}
	
	// use to delete cab table row
	public function DeleteCab($id){
		
		$this->db->where('cab_id',$id);
		$this->db->delete('cabs');
		return true;
		
	}
	
	
		
/***************function for datatable pligins**********************/
	
	var $table="cabs";

	var $selectColoum=array("cab_id","cab_name","cab_image","cab_description");
		
	var $order_column=array("cab_id","cab_name",null,null);


/*******Function for Search Query****/
	public function SearchQuery(){
		$this->db->select($this->selectColoum);
		$this->db->from($this->table);
		
		if(isset($_POST["search"]["value"])){
			$this->db->like("cab_name",$_POST["search"]["value"]);
			$this->db->or_like("cab_id",$_POST["search"]["value"]);
			
			
		}
		
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			
		}
		else{
			$this->db->order_by('cab_id', 'DESC');  
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