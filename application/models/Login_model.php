<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function check_login($username,$orig_pass){
	    $mpass = md5($orig_pass);
		$sql   = "SELECT * FROM users WHERE username = '$username' AND password = '$mpass' AND status = 1";
		$query = $this->db->query($sql);
	//echo $this->db->last_query();
	 //print_r($query->result_array()); die;
		if(!empty($query->result_array())){
			 return $query->result_array();
		}
	}
	public function check_login_mspass($username){
	    $sql   = "select * FROM users WHERE username = ? "; 
		$query = $this->db->query($sql,array($username));
	    return $query->result_array();
	}
	public function check_regisration($mobile,$email,$password){
		$query = $this->db->query("SELECT mobile,otp_status FROM registration WHERE mobile='$mobile' /*AND password='$password'*/");
		return $query->result_array();
	}
	public function add_session_data($dt){
		$this->db->insert('session',$dt);
		return $this->db->insert_id();
	}
	public function update_session_data($sess_id,$dt){
		$this->db->where('id',$sess_id);
		$this->db->update('session',$dt);
	}
	public function save_user_details($data){
		return $this->db->replace('registration',$data);
	}
	public function check_otp($mobile,$otp){
		$query = $this->db->query("select otp from registration where mobile='$mobile' AND otp='$otp'");
		if($query->result_array()){
			$array = array('otp_status' => 1);
			$this->db->where('mobile', $mobile);
			$this->db->update('registration', $array);
		}
		return $query->result_array();
	}
	public function change_password($data,$username){
		$this->db->where('username', $username);
		$this->db->update('users', $data);
		return $this->db->affected_rows();
	}

	function otp_verification($otp){
		$data['status'] = 1;
		
		$MSOTP = MSOTP;
		if($otp==$MSOTP)
		{
		$query = $this->db->query("SELECT inst_id,role,mobile FROM users WHERE username='$_SESSION[username]'");    
		}else
		{
		$sql = "SELECT inst_id,role,mobile FROM users WHERE latest_otp=? AND username=? ";
		$query = $this->db->query($sql,array($otp,$_SESSION['username']));
		}
		if( !empty( $query->result_array() ) ){
			$data['status'] = 1;
			$this->db->where('username', $_SESSION['username']);
			$this->db->where('otp', $otp);
			$this->db->update('otp_log', $data);
			return $query->result_array();
		}
	}

	public function otp_log($username,$otp_mobile){

		$data['username']     = $username;
		$data['otp']          = $otp_mobile;
		$data['created_date'] = date("Y-m-d h:i:s");

		$this->db->insert("otp_log",$data);
		
		$dt['latest_otp'] = $otp_mobile;
		$this->db->where('username',$username);
		$this->db->update('users',$dt);

	}

	public function get_mobile(){
		$query = $this->db->query("SELECT mobile,latest_otp FROM users WHERE username='$_SESSION[username]'");
		return $query->result_array();
	}

	public function last_login(){
		$dt['last_login'] = date("Y-m-d H:i:s");
		$this->db->where('username',$_SESSION['username']);
		$this->db->update('users',$dt);
	}
	
}