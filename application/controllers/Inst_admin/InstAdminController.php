<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstAdminController extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
		if(empty($_SESSION['username']))
			redirect('/');
		$this->load->model(array('Inst_model/InstAdmin_model'));
		$this->load->helper(array('functions'));
		$this->load->library(array('sendotp'));
	}
	public function index(){
		$data['title'] = "";
		$data['content'] = $this->load->view('admin/home',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	public function upload_files($path,$files){
		$_FILES['document']['name']     = $files['name'];
		$_FILES['document']['type']     = $files['type'];
		$_FILES['document']['tmp_name'] = $files['tmp_name'];
		$_FILES['document']['error']    = $files['error'];
		$_FILES['document']['size']     = $files['size'];
		
		$uploadPath = $path.'/';
		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx';
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('document')){
			$fileData = $this->upload->data();
			$uploadData['file_name'] = $fileData['file_name'];
		}
		return $uploadData;    
	}
	
	public function srpd_status(){
		$data['title']     = "Summary Report";
		$data['pageData'] = $this->InstAdmin_model->get_all_srpd();
		$data['content']   = $this->load->view('admin/srpd_status',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	

	

	

	



	

	public function generateXls() {

        $this->load->library('Excel');

        $psBankDetails = $this->Admin_model->getApprovedPaperSetterBankDetails();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sr.No');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Paper Setter Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Account Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'IFSC');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Brach Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Address');  
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Papers Uploded');      
        
		$sr_no = 1;
        $rowCount = 2;
        foreach ($psBankDetails as $val) {

			$uploaded_cnt = getPsUploadCnt($val['account_no']);

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $sr_no++);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['account_no']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val['ifsc_code']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val['bank_branch']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val['bank_name_addr']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $uploaded_cnt);
            $rowCount++;

			foreach(range('A','F') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
			}

        }
        $filename = "Paper Setter Bank Details - ". date("d-m-Y").".xls";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output');
 
    }

	public function generateXlsChairman() {

        $this->load->library('Excel');

        $chBankDetails = $this->Admin_model->getChairmanBankDetails();
		//print_r($chBankDetails);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sr.No');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Chairman Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Account Number');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'IFSC');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Brach Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Address');  
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Papers Uploaded'); 
        
		$sr_no = 1;
        $rowCount = 2;
        foreach ($chBankDetails as $val) {

			$uploaded_cnt = getPsUploadCntChairman($val['account_no']);

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $sr_no++);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $val['name']);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $val['account_no']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $val['ifsc_code']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $val['bank_branch']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $val['bank_name_addr']);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $uploaded_cnt);
            $rowCount++;

			foreach(range('A','F') as $columnID) {
				$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
					->setAutoSize(true);
			}

        }
        $filename = "Chairman Bank Details - ". date("d-m-Y").".xls";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output');
 
    }
	
	public function send_mail(){ 
        
		$this->load->library('email');		
		$fromemail = "coe@dbatu.ac.in";
 		$subject   = "Login Credentials of Online Question Paper Upload";
		$users = $this->Admin_model->all_users_for_mail();
		$i = 1;
		foreach($users as $user){
			$to = $user['email'];
			if($user['role'] == 'CH'){		
				$mesg = "Dear Sir/Madam,<br> You are <b>appointed as a Chairman</b> of Question Paper Setter Panel for DBATU Winter-22 Examination for Subject ".$user['subject_name']." subject code(".$user['subject_code']."). <br>Use the below link and login credentials to verify/modify and upload the Question Paper. <br> Link : http://online.dbatuerp.com/dbatu <br> <b>Username : ".$user['username']."<br> Password : ".$user['username']."</b>";
			}else{
				$mesg = "Dear Sir/Madam,<br> You are <b>appointed as a Question Paper Setter</b> for DBATU Winter-22 Examination for Subject ".$user['subject_name']." subject code(".$user['subject_code']."). Use the below link and login credentials to upload the Question Paper. <br> Link : http://online.dbatuerp.com/dbatu <br> <b>Username : ".$user['username']."<br> Password : ".$user['username']."</b>";
			}
			echo '<br>';
			$config=array(
				'charset'=>'utf-8',
				'wordwrap'=> TRUE,
				'mailtype' => 'html'
			); 
			
			$this->email->initialize($config);
			$this->email->bcc('deepak@bynaric.in,azar@vishumangal.com');
			//$this->email->to($to);
			//$this->email->cc('deepak@bynaric.in,azar@vishumangal.com');
			$this->email->from($fromemail, "COE DBATU");
			$this->email->reply_to('coe@dbatu.ac.in', 'COE DBATU');
			$this->email->subject($subject);
			$this->email->message($mesg);
			//$mail = $this->email->send();
		}
	}

}
