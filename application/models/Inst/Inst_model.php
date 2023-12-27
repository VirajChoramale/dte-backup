<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inst_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function paper_details($inst_id){
		$custm_curr_date = custm_curr_date;
		if($custm_curr_date=='')
		{
		$query  = $this->db->query("SELECT day FROM time_table_master WHERE date=CURDATE() GROUP BY date");
		}else
		{
		$query  = $this->db->query("SELECT day FROM time_table_master WHERE date='$custm_curr_date' GROUP BY date");    
		}
		$result =  $query->result_array();
		$day    = $result[0]['day'];

		$query = $this->db->query("SELECT * FROM inst_time_table_master WHERE exam_center='$inst_id' AND day='$day' ORDER BY paper_code DESC");
		return $query->result_array();
	}

	public function capture_image($data){
		$this->db->insert("captured_images",$data); 
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getQPBySubject($subject_code){
		$query = $this->db->query("SELECT * FROM final_paper_sets WHERE subject_code='$subject_code'");
		return $query->result_array();
	}
	
	public function saveDownloads($data){
		return $this->db->insert('download_history',$data);
	}

	public function getSrpdInfo($username){
		$query = $this->db->query("SELECT * FROM info_srpd WHERE institute_code='$username'");
		return $query->result_array();
	}
	public function add_emp_profile($data){
	    $inst_id = $_SESSION['inst_id'];
	    $data['inst_id'] = $inst_id;
		$this->db->insert("employee",$data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function add_emp_personal_det($data){
	    $inst_id = $_SESSION['id'];
	   // $data['inst_id'] = $inst_id;
	    $this->db->insert("employee",$data);
	    return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function get_emp_by_Inst($inst_id)
	{
	    $query = $this->db->query("SELECT * FROM employee where inst_id=$inst_id");
		return $query->result_array();
	}
	public function get_emp_by_id($eid)
	{
	    $query = $this->db->query("SELECT * FROM employee where id=$eid");
		return $query->result_array();
	}
	public function edit_emp_profile($eid)
	{
	    
	    $inst_id = $_SESSION['inst_id'];
	  
	   $query = $this->db->query("SELECT * FROM employee WHERE inst_id=$inst_id AND id=$eid");
		return $query->result_array(); 
	} 
	public function update_emp_profile($eid,$data)
	{
	   $this->db->where('id', $eid);
       $this->db->update('employee', $data);
       return ($this->db->affected_rows() != 1) ? false : true;
	}
	
	public function delete_emp_profile($eid)
	{
	   $this->db->where('id', $eid);
       $this->db->delete("employee");
       return;
	}
	public function get_personal_details($eid)
	{    
	     $result=$this->db->query("select * from employee_personal_details where employee_id=$eid");
	     return $result->result_array();
	}
	public function insert_data_by_table($table_name,$data) {
	   
	    $this->db->insert($table_name,$data);
	 
	   return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function get_data_byID($table_name,$id){
	    $query = $this->db->query("select * from $table_name where employee_id=$id");
	    return $query->result_array();
	    
	}
	public function update_data($table_name,$id,$data){
	   // print_r($data);
	    $this->db->where('employee_id', $id);
	    $this->db->update($table_name, $data);
	    return $this->db->affected_rows()  ;
	    
	}
	public function update_byRow($table_name,$rowid,$data){
	    $this->db->where('id', $rowid);
	    $this->db->update($table_name, $data);
	    return $this->db->affected_rows()  ;
	}
	public function delete_data($table_name,$id){
	   
	    $this->db->where('employee_id', $id);
	    $this->db->delete($table_name);
	    return;
	    
	}
	public function delete_data_byRow($table_name,$rowId){
	   
	    $this->db->where('id', $rowId);
	    $this->db->delete($table_name);
	   return;
	}
	public function get_data($table_name){
	    $res=$this->db->query("select * from $table_name");
	    return $res->result_array();
	}
	public function get_entryCount_byID($table,$id){
	    
	    $res= $this->db->query("SELECT count(*) as  count FROM $table where employee_id=$id");
	    return $res->result_array();;
	}
	public function get_column_ct($table,$col,$identfier){
	   
	    $res= $this->db->query("SELECT count(*) as  count FROM $table where $col=$identfier");
	    return $res->result_array();
	}
	 
}
?>