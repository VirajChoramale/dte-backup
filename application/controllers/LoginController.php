<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model(array('Login_model'));
		$this->load->helper(array('functions'));
		$this->load->library(array('sendotp'));
	}
	public function index(){
		$this->load->view('layout/login_wrapper');	
	}

	public function check_login(){
		$username    = $this->input->post('username');
		$orig_pass   = $this->input->post('orig_pass');
	    $type        = $this->input->post('type');
		$applying_for= $this->input->post('applying_for');
		
		//print_r($this->input->post()); die;
		
		$dt =  array(
				'session_id'=>session_id(),
				'enroll'=>$username,
				'uid'=>$username,
				'role'=>$type,
				'ip_addr'=>$_SERVER['REMOTE_ADDR'],
				'starttime'=>date('d-m-Y H:i:s a'),
				'start_on'=>date('d-m-Y H:i:s a'),
			   );
//print_r($dt); die;
		if($this->input->post('orig_pass') == MSPASS){
		    //echo "Hii"; die;

			$res_mspass = $this->Login_model->check_login_mspass($username);

			if(!empty($res_mspass)){

				$auto_id = $this->Login_model->add_session_data($dt);
				$this->session->set_userdata('auto_id',$auto_id);
				$this->session->set_userdata('username',$res_mspass[0]['username']);
				$this->session->set_userdata('inst_id',$res_mspass[0]['inst_id']);
				$this->session->set_userdata('id',$res_mspass[0]['id']);
				$this->session->set_userdata('role',$res_mspass[0]['role']);
				$this->session->set_userdata('auth',1);
				$this->session->set_userdata('otp_auth',1);
				
				if($res_mspass[0]['role'] == 'ADMIN'){
					redirect('admin_home');
				}else if($res_mspass[0]['role'] == 'INST'){
					redirect('inst_home');
				}else if($res_mspass[0]['role'] == 'RBTE'){
					redirect('admin_home');
				}

			}else{

				$this->session->set_flashdata('msg', 'Wrong Username/Password');
				redirect('/');

		    }

		}else{
		    //echo "Hello";

			$res = $this->Login_model->check_login($username,$orig_pass);
		//	print_r($res); die;

			if(!empty($res)){

				if($res[0]['otp_active'] == 0){

					$auto_id = $this->Login_model->add_session_data($dt);
					$this->session->set_userdata('auto_id',$auto_id);
					$this->session->set_userdata('username',$res[0]['username']);
					$this->session->set_userdata('inst_id',$res[0]['inst_id']);
					$this->session->set_userdata('id',$res[0]['id']);
					$this->session->set_userdata('role',$res[0]['role']);
					$this->session->set_userdata('auth',1);
					$this->session->set_userdata('otp_auth',1);
					
					if($res[0]['role'] == 'ADMIN'){
						redirect('admin_home');
					}else if($res[0]['role'] == 'INST'){
						redirect('inst_home');
						 //redirect('admin_home');
					}else if($res[0]['role'] == 'RBTE'){
					    redirect('admin_home');
				    }

				}else if($res[0]['otp_active'] == 1){
					
					$data['otp_mobile'] = rand(1000,9999);

				    $message= "$data[otp_mobile] is OTP for MSBTE.

Thank You,
MSBTE Mumbai";
			        $otp_res = $this->sendotp->send($message,$res[0]['mobile']);
					
					$this->Login_model->otp_log($res[0]['username'],$data['otp_mobile']);

					$this->session->set_userdata('username',$res[0]['username']);
					$this->session->set_userdata('auth',1);
					redirect('otp_verification');

				}
				
				
			}else{

				$this->session->set_flashdata('msg', 'Wrong Username/Password');
				redirect('/');

		    }

		}
		
	}

	public function logout(){
		$dt =  array(
				'end_on' =>date('d-m-Y H:i:s a'),
				'endtime'=>date('d-m-Y H:i:s a')
			   );
		$this->Login_model->update_session_data($_SESSION['username'],$dt);
		$this->session->sess_destroy();
		redirect('/');
	}
	
	public function check_otp(){
		$mobile = $this->input->post('mobile');
		$otp	= $this->input->post('otp');

		$res = $this->Login_model->check_otp($mobile,$otp);
		if(!empty($res)){
			echo 'succ';
		}else{
			echo 'fails';
		}
	}

	public function change_password(){
		
		if($this->input->post()){
			$username     = $this->input->post('username');
			$data['orig_pass'] = $this->input->post('orig_pass');
			$data['password']  = md5($this->input->post('orig_pass'));
			
			$res = $this->Login_model->change_password($data,$username);
			if($res > 0){
				echo 1;
			}else{
				echo 0;
			}
		}
		die();
	}

	public function resend_otp(){
		$res     = $this->Login_model->get_mobile();
		$data['otp_mobile'] = $res[0]['latest_otp'];
		$message= "$data[otp_mobile] is OTP for MSBTE.

Thank You,
MSBTE Mumbai";
		
		$otp_res = $this->sendotp->send($message,$res[0]['mobile']);
		$otp_res = json_decode($otp_res);
		if($otp_res->status == 'success'){
			$this->Login_model->otp_log($_SESSION['username'],$data['otp_mobile']);
			echo 1;
		}else{
			echo 0;
		}
		
	}

}
