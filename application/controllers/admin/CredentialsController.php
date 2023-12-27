<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CredentialsController extends CI_Controller {

	public function __construct(){
        parent::__construct();
		if(@$_SESSION['auth'] != 1){
			redirect('/');
		}
		$this->load->model(array('admin/Credentials_model'));
		$this->load->helper(array('functions'));
		$this->load->library(array('sendotp'));
		//print_r($_SESSION);
	}

	public function send_password(){
		
		
		if($this->input->post()){
			
			$day = $this->input->post('day');
			$instIdEmails = $this->Credentials_model->get_emails($day);

			$paper_codes = $this->Credentials_model->get_paper_codes($day);
			
			foreach($paper_codes as $val){
				$result   = $this->Credentials_model->get_password($val['paper_code']);
				$password = $result[0]['password'];
				$send_array['paper_code'][]	 = $val['paper_code'];
				$send_array['password'][$val['paper_code']]	 = $password;
			}
			
			
			$mobiles = $this->Credentials_model->get_mobiles_new($day);
			$message= "Your password for MSBTE is: $password

Thank you,
MSBTE Mumbai";

			$res = $this->sendotp->send($message,$mobiles);
			
			$paper_str = implode(",",$send_array['paper_code']);
			
			if($res){
				$this->Credentials_model->save_sms_qp_status($mobiles,$paper_str);
			}
			
			foreach($instIdEmails as $inst_id=>$email){
				$fromemail="qpdmsbteac@qpd.msbte.ac.in";
				$subject  = "Question Paper Download";
				$send_array['inst_id'] = $inst_id; 
				$send_array['day']     = $day; 
				$mesg  = $this->load->view('admin/mail_content',$send_array,true);
				
				$postParameter = array(
					'email'   => $email,
					'content' => $mesg,
					'subject' => $subject,
					'projtype'=> 1
				);

				$curlHandle = curl_init('https://dbatuerp.com/api/sendmail');
				curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $postParameter);
				curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
				$curlResponse = curl_exec($curlHandle);
				curl_close($curlHandle);
				$mail = json_decode($curlResponse);
				if($mail->status == 'success'){
					$this->Credentials_model->save_email_qp_status($send_array['paper_code'],$email);
				}
			}


			echo "succ";
			
		}

		
	}
	


}
