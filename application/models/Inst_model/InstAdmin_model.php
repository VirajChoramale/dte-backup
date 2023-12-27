<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstAdmin_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	

	public function get_all_srpd(){
		$query  = $this->db->query("SELECT * FROM info_srpd");
		return $query->result_array();
	}
	

}
?>