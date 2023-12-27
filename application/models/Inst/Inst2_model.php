<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inst2_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function add_emp_additional_det($data){
		
     //print_r($data); die;
	     
	    $this->db->insert("employee_additional_details",$data1);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function employee_verification($data){
		
     //print_r($data); die;
	     
	 //   $this->db->insert("employee_additional_details",$data1);
	 //   return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function insert_data_by_table($table_name,$data,$submit_type=null,$cid=null) {
		// print_r($data);die;
		// echo $data['employee_id']; 
		$id=$data['employee_id'];
		if($submit_type =='add')
		{
				$this->db->insert($table_name,$data);
		}
		else
		{
			if($cid !=null)
			{
				
				$this->db->where('childNumber',$cid);
				$this->db->where('employee_id',$id);
				$this->db->replace($table_name,$data);
			}
			else
			{
			     $this->db->where('employee_id',$id);
				$this->db->update($table_name,$data);
			}
				
		}
	 
	   return ($this->db->affected_rows() != 1) ? false : true;
	} 
	 
	public function get_data_byID($table_name,$id){
	    $query = $this->db->query("select * from $table_name where employee_id=$id");
	    return $query->result_array();
	    
	} 
	
}
?>