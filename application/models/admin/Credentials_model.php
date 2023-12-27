<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credentials_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	
	public function get_password($paper_code){
		$query  = $this->db->query("SELECT password FROM qp_details where paper_code = '$paper_code'");
		return $query->result_array();
	}

	public function get_mobiles($day){
		$query  = $this->db->query("SELECT exam_center FROM inst_time_table_master where day = '$day' GROUP BY exam_center");
		$result = $query->result_array();
		$data = array();
		foreach($result as $val){
			$query1  = $this->db->query("SELECT inst_id,mobile FROM chief_coordinator where inst_id = '$val[exam_center]'");
			$result1 = $query1->result_array();
			if(!empty($result1)){
				$data[$result1[0]['inst_id']] = $result1[0]['mobile'];
			}
		}
		return $data;
	}
	
	public function get_mobiles_new($day){
		$query  = $this->db->query("SELECT exam_center FROM inst_time_table_master where day = '$day' GROUP BY exam_center");
		$result = $query->result_array();
		$data   = '';
		foreach($result as $val){
			$query1  = $this->db->query("SELECT mobile FROM chief_coordinator where inst_id = '$val[exam_center]'");
			$result1 = $query1->result_array();
			$data = $data.','.@$result1[0]['mobile'];
		}
		return ltrim($data,',');
	}

	public function save_sms_qp_status($mobiles,$paper_str){
		$result = explode(",",$mobiles);
		foreach($result as $val){
			$data[] = array(
				"paper_code" => $paper_str,
				"mobile"     => $val	
			);
		}
		return $this->db->insert_batch("sms_details",$data);
	}

	public function get_emails($day){
		$query  = $this->db->query("SELECT exam_center FROM inst_time_table_master where day = '$day' GROUP BY exam_center");
		$result = $query->result_array();
		$data = array();
		foreach($result as $val){
			$query1  = $this->db->query("SELECT inst_id,email FROM chief_coordinator where inst_id = '$val[exam_center]'");
			$result1 = $query1->result_array();
			if(!empty($result1)){
				$data[$result1[0]['inst_id']] = $result1[0]['email'];
			}
		}
		return $data;
	}

	public function save_email_qp_status($paper_codes,$email){
		
		foreach($paper_codes as $paper_code){
			$data[] = array(
				"paper_code" => $paper_code,
				"email"      => $email,
			);
		}

		return $this->db->insert_batch("email_details",$data);

	}

	public function get_paper_codes($day){
		$query  = $this->db->query("SELECT paper_code FROM inst_time_table_master where day = '$day' GROUP BY paper_code");
		return $query->result_array();
	}

}
?>