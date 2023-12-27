<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OtpController extends CI_Controller {

	public function __construct(){
        parent::__construct();
		//print_r($_SESSION);
		if(@$_SESSION['auth'] != 1){
			redirect('/');
		}
		$this->load->model(array('Login_model'));
		$this->load->helper(array('functions'));
		$this->load->library(array('sendotp'));
	}

	public function otp_verification(){

        
		if($this->input->post()){
			
			$otp    = $this->input->post('otp');
			$result = $this->Login_model->otp_verification($otp);
			if(!empty($result)){
				
				 $dt =  array(
					'session_id'=>session_id(),
					'enroll'    =>$_SESSION['username'],
					'uid'       =>$_SESSION['username'],
					'role'      =>$result[0]['role'],
					'ip_addr'   =>$_SERVER['REMOTE_ADDR'],
					'starttime' =>date('d-m-Y H:i:s a'),
					'start_on'  =>date('d-m-Y H:i:s a'),
			    );
				
				$auto_id = $this->Login_model->add_session_data($dt);
				$this->session->set_userdata('auto_id',$auto_id);
				$this->session->set_userdata('inst_id',$result[0]['inst_id']);
				$this->session->set_userdata('role',$result[0]['role']);
				$this->session->set_userdata('otp_auth',1);
				
				$this->Login_model->last_login();

				if($result[0]['role'] == 'ADMIN'){
					redirect('admin_home');
				}else if($result[0]['role'] == 'INST'){
					redirect('inst_home');
				}else if($result[0]['role'] == 'RBTE'){
					redirect('admin_home');
				}

			}else{
				$this->session->set_flashdata('otp_msg', 'Wrong OTP');
				redirect('otp_verification');
			}

		}

		$data['title']   = "OTP Verification";
		$data['mobOtp']  = $this->Login_model->get_mobile();
		//print_r($data['mobOtp']);
		$data['content'] = $this->load->view('otp/otp_verification',$data,true);
		$this->load->view('otp/main_wrapper',$data);
	}
	


}
