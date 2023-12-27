<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintController extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
		if( ($_SESSION['role'] != 'ADMIN' && $_SESSION['role'] != 'RBTE') || $_SESSION['otp_auth'] != 1){
			redirect('/');
		}
		$this->load->model(array('admin/Print_model'));
		$this->load->helper(array('functions'));
	}
/*--------------------------------------------------------------------*/
	public function index(){
	    $data['course'] = $this->Print_model->getCourses();
		$data['content'] = $this->load->view('admin/prints/home',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	
	public function getPostByCourse()
	{
	    $cid = $_POST['courseid'];
	    $result = $this->Print_model->get_Designation_by_courseId($cid);
	    echo json_encode($result);
		die();  
	}
	public function Report_1(){
	    $cid = $_POST['course'];
	    $pid = $_POST['designation'];
	    $data['CoursePostData'] = $this->Print_model->getCourse_Post_Data($cid,$pid);
	    $this->load->view('admin/prints/Report1',$data);
		//$data['content'] = $this->load->view('admin/prints/home',$data,true);
		//$this->load->view('admin/main_wrapper',$data);
	}
/*-----------------------------------------------------------------------*/	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function get_inst()
	{
	    $region_id = $this->input->post("region_id");
	    $instdata    = $this->Admin_model->getInstitute($region_id);
	    echo json_encode($instdata);
		die();
	}
	public function get_instnew()
	{
	    $region_id = $this->input->post("region_id");
	    $instdata    = $this->Admin_model->getInstitutenew($region_id);
	    echo json_encode($instdata);
		die();
	}
	public function get_inst_level()
	{
	    $inst_id = $this->input->post("inst_id");
		$result = $this->Admin_model->get_inst_level($inst_id);
		echo json_encode($result);
		die();
	}
	public function get_post()
	{
	   $level_id = $this->input->post("level_id");
		$result = $this->Admin_model->get_post($level_id);
		echo json_encode($result);
		die();  
	}

	public function institute_details($id=null){
	    if(isset($id))
	    {
	    $data['editdata'] =    $this->Admin_model->getivddatabyid($id);
	    $data['all_data']    = $this->Admin_model->get_vaccancy_data();
        $data['regiondata']    = $this->Admin_model->getRegions();
        $data['updateid']   = $id; 
	    }
	    else
	    {
	     $data['all_data']    = $this->Admin_model->get_vaccancy_data();
         $data['regiondata']    = $this->Admin_model->getRegions();
	    }
         $data['content']=$this->load->view('admin/institute_details',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	    
	}
	public function get_inst_course()
	{
	    $inst_id = $this->input->post("inst_id");
	     $level_id = $this->input->post("level_id");
		$result = $this->Admin_model->getCourseByInst($inst_id,$level_id);
		echo json_encode($result);
		die();
	}
	public function add_inst_vacency_details(){
	    
	     $data = $this->input->post();
	     //print_r($data); die;
	     $result  = $this->Admin_model->add_inst_vaccency_details($data);
	    	if($result){
				$this->session->set_flashdata('add_vaccency_msg', 'Your Data Saved Successfully.');
				redirect(base_url('institute_details'));
			}
			else
			{
			    $this->session->set_flashdata('error_add_vaccency_msg', 'Data Already Exists.');
				redirect(base_url('institute_details'));
			}
	    
	}
	public function print_report()
	{
	    if(isset($_POST['postwise']) && $_POST['postwise']!=='')
	    {
	        //print_r($_POST['region']); die;
	        $data['did'] = $_POST['designation'];
	        $data['rid'] = $_POST['region'];
	        $data['regionaldata'] = $this->Admin_model->getdisntinctregionalid($data);
	        $data['designame'] = $this->Admin_model->getDesignationById($data);
	       // print_r($data['designame']); die;
	        $this->load->view('admin/print_report',$data);
	    }
	}
	public function print_all_report()
	{
	   $data['postdata']    = $this->Admin_model->getDesignation();
	   $data['regiondata']    = $this->Admin_model->getRegions();
	   $data['content'] = $this->load->view('admin/print_all_report',$data,true);
	   $this->load->view('admin/main_wrapper',$data);
	} 
	
	public function add_qp(){

        if($_SESSION['role'] == 'ADMIN')
        {
    		if($this->input->post()){
    
    			$data   = $this->input->post();
    
    			$day     = $this->input->post('day');
    			$slot     = $this->input->post('slot');
    			
    			$arr_pcode = $this->Admin_model->get_slot_details($day,$slot);
    
    
    
    
    			//echo '<pre>'; print_r($data); echo '</pre>';
    
    			
    			//echo '<pre>'; print_r($_FILES); echo '</pre>';
    
    			//print_r($arr_pcode);
    			$cnt = count($arr_pcode);
    
    			foreach($arr_pcode as $val_pcode){
    				
    				$file_name     = $_FILES['doc_'.$val_pcode['paper_code']]['name'];
    				$file_type     = $_FILES['doc_'.$val_pcode['paper_code']]['type'];
    				$file_tmp_name = $_FILES['doc_'.$val_pcode['paper_code']]['tmp_name'];
    				$file_err    = $_FILES['doc_'.$val_pcode['paper_code']]['error'];
    				$file_size     = $_FILES['doc_'.$val_pcode['paper_code']]['size'];
    				
    				$uploadPath = 'uploads/';
    
    				$config['upload_path']   = $uploadPath;
    				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|docx';
    				$config['file_name']     = time().'_'.$val_pcode['paper_code'];
    				
    				$this->load->library('upload', $config);
    				$this->upload->initialize($config);
    				
    				if($this->upload->do_upload('doc_'.$val_pcode['paper_code'])){
    					$fileData = $this->upload->data();
    					$uploadData['file_name'] = $fileData['file_name'];
    				}
    				
    				$dt[] = array(
    					"paper_code" => $val_pcode['paper_code'],
    					"password"   => $data["pwd_".$val_pcode['paper_code']],
    					"doc"        => $uploadData['file_name'],
    					"day"        => $day,
    					"slot"		 => $slot
    				);
    
    				
    			
    
    			
    			
    
    			}
    			
    			$result = $this->Admin_model->add_qp($dt);
    			if($result){
    				$this->session->set_flashdata('add_qp_msg', 'Your Data Saved Successfully.');
    				redirect(base_url('add_qp'));
    			}
    		}
    		$data['title']       = "Upload Question Paper";
    		$data['exam_dates']  = $this->Admin_model->get_exam_dates_not_qp_upload();
    		$data['pageData']    = $this->Admin_model->get_qp_details();
    		$data['content']     = $this->load->view('admin/add_qp',$data,true);
    		$this->load->view('admin/main_wrapper',$data);
        }else
        {
            echo "This Link Is Not For You";
        }
	}

	public function get_slots(){
		$day = $this->input->post("day");
		$result = $this->Admin_model->get_slots($day);
		echo json_encode($result);
		die();
	}
	
	public function add_qp_report(){
		$data['title']       = "Uploaded Question Paper Details";
		$data['pageData']    = $this->Admin_model->get_qp_details();
		$data['content']     = $this->load->view('admin/add_qp_report',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}


	public function get_slot_details(){
		$day  = $this->input->post("day");
		$slot = $this->input->post("slot");
		$data['pageData'] = $this->Admin_model->get_slot_details($day,$slot);
		$response = $this->load->view('admin/get_slot_details',$data,true);
		echo $response;
	}
	
	public function chwise_status(){
		$data['title']     = "Chairman Wise Status";
		$data['pageData'] = $this->Admin_model->get_all_chairman();
		//echo '<pre>'; print_r($data['pageData']); echo '</pre>';
		$data['content']   = $this->load->view('admin/chwise_status',$data,true);
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

	public function generatepaperSet(){
		$data['title']     = "Generate Paper Set";
		if($this->input->post()){
			$date = $this->input->post('date');
			$res = $this->Admin_model->getGeneratedpaperSet($date);
			if($res){
				$this->session->set_flashdata('ps_sel_msg', 'Paper Selection Successfull.');
				redirect(base_url('generatepaperSet'));
			}
		}
		$data['pageData'] = $this->Admin_model->getSelectedPaperSets();
		$data['examDates'] = $this->Admin_model->getAllExamDates();
		//echo '<pre>'; print_r($data['pageData']); echo '</pre>';
		$data['content']   = $this->load->view('admin/generatepaperSet',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}

	public function paper_report(){
		$data['title']     = "Summary Report";
		$data['pageData'] = $this->Admin_model->get_all_pdreports();
		$data['pageData1'] = $this->Admin_model->get_all_pdreports_1();
		$data['pageData2'] = $this->Admin_model->get_all_pdreports_2();
		$data['pageData3'] = $this->Admin_model->get_all_pdreports_3();
		 //echo "<pre>"; print_r($data['pageData']); echo "</pre>";
		$data['content']   = $this->load->view('admin/paper_report',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	public function semesterwise_ps_status(){
	    $data['pageData']=array();
	    if($this->input->post()){
	        $data   = $this->input->post();
            $result = $this->Admin_model->get_all_sem_paper_settersDoc($data);
	        if($result){
	         
	           
	        }
	    }
	    $data['title']     = "Summary Report";
	    $data['pageData']  = $this->Admin_model->get_all_sem_paper_settersDoc($data);
	    $data['content']   = $this->load->view('admin/semesterwise_ps_status',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}
	
	public function ch_confirm_paper(){
	    $data['title']     = "Chairman Confirm Paper";
	    //$data['pageData']=array();
	    $data['pageData'] = $this->Admin_model->get_all_confirm_paper();
		//echo '<pre>';
		//print_r($data);
	    $data['content']= $this->load->view('admin/ch_confirm_paper',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}
	
	public function detail_paper_report($date=NULL){
	    //echo $date;
	    $data['title']     = "Available QP Set Count";
	    $data['pageData']  = $this->Admin_model->get_all_paper_report($date);
		$data['examDates'] = $this->Admin_model->getAllExamDates();
	    $data['content']   = $this->load->view('admin/detail_paper_report',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}


	public function OtpVerification(){
		$data['title']     = "OTP Verication For Institutes";
		$data['pageData'] = $this->Admin_model->get_all_inst_otp();
		//echo '<pre>'; print_r($data['pageData']); echo '</pre>';
		$data['content']   = $this->load->view('admin/OtpVerification',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}

	public function activate_paper($date=null){
	    //echo $date;
	    $data['title']     = "Activate Question Paper";
	    $data['pageData']  = $this->Admin_model->get_activate_paper($date);
		$data['examDates'] = $this->Admin_model->getAllExamDates();
	    //echo '<pre>'; print_r($data['examDates']); echo '</pre>';
		$data['content']   = $this->load->view('admin/activate_paper',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}
	
	public function add_q_paper(){
	    $data['title']     = "Add Question Paper";
	    if($this->input->post()){
	        $data = $this->input->post();
	        $data['role'] = "PS";
	        $data['created_by'] = 'AD';
	        
	        if(!empty($_FILES['paper_doc']['name'])){
	            $uploadData = $this->upload_files('uploads',$_FILES['paper_doc']);
	            $data['paper_doc1'] = $uploadData['file_name'];
	        }
	        
	        if(!empty($_FILES['model_paper_doc']['name'])){
	            $uploadData = $this->upload_files('uploads',$_FILES['model_paper_doc']);
	            $data['model_paper_doc1'] = $uploadData['file_name'];
	        }
	        
	        $result	= $this->Admin_model->add_paper_doc($data);
	            if($result){
	                $this->session->set_flashdata('add_paper_msg', 'Your Data Saved Successfully.');
	                redirect(base_url('add_q_paper'));
	                }
	    }
	    $data['subject_data'] = $this->Admin_model->get_all_subjects();
	    $data['pageData'] = $this->Admin_model->get_admin_added_paper($_SESSION['username']);
	    $data['content']= $this->load->view('admin/add_q_paper',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	    
	}

	public function enable_disable_paper(){
		$id     = $this->input->post('id');
		$status = $this->input->post('status');
		$result	= $this->Admin_model->enable_disable_paper($id,$status);
	}

	public function paper_type(){
		$id         = $this->input->post('id');
		$paper_type = $this->input->post('paper_type');
		$result	= $this->Admin_model->set_paper_type($id,$paper_type);
	}

	public function add_timetable(){
		if($this->input->post()){
			$data   = $this->input->post();
			$result = $this->Admin_model->add_timetable($data);
			if($result){
				$this->session->set_flashdata('add_chairman_msg', 'Your Data Saved Successfully.');
				redirect(base_url('add_timetable'));
			}
		}
		$data['title']     = "Add Timetable";
		$data['pageData']  = $this->Admin_model->get_all_timetable();
		$data['content']   = $this->load->view('admin/add_timetable',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	
	public function delete_timetable(){
		$id  = $this->input->post('id');
		$res = $this->Admin_model->delete_time_table($id);
		if($res){
			echo 'succ';
		}else{
			echo 'fails';
		}
	}

	public function add_inst(){
		if($this->input->post()){
			$data   = $this->input->post();
			$result = $this->Admin_model->add_inst($data);
			if($result){
				$this->session->set_flashdata('add_chairman_msg', 'Your Data Saved Successfully.');
				redirect(base_url('add_inst'));
			}
		}
		$data['title']     = "Add Institutes";
		//$data['pageData']  = $this->Admin_model->get_all_timetable();
		$data['content']   = $this->load->view('admin/add_inst',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	

	public function add_srpd(){
		if($this->input->post()){
			$data   = $this->input->post();
			if(!empty($_FILES['paper_doc']['name'])){
				$uploadData = $this->upload_files('uploads1',$_FILES['paper_doc']);
				$data['paper_doc'] = $uploadData['file_name'];
			}

			$result = $this->Admin_model->add_srpd($data);
			if($result){
				$this->session->set_flashdata('add_msg', 'Your Data Saved Successfully.');
				redirect(base_url('add_srpd'));
			}
		}
		$data['title']     = "Institute Information For SRPD";
		//$data['pageData']  = $this->Inst_model->get_all_chairman();
		$data['content']   = $this->load->view('admin/add_srpd',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}
	
	public function delete_srpd(){
		$id  = $this->input->post('id');
		$res = $this->Admin_model->delete_srpd_info($id);
		if($res){
			echo 'succ';
		}else{
			echo 'fails';
		}
	} 

	public function update_timetable(){
		$id           = $this->input->post('id');
		$sub_code     = $this->input->post('sub_code');
		$sub_name     = $this->input->post('sub_name');
		$date         = $this->input->post('date');
		$exam_to      = $this->input->post('exam_to');
		$exam_from    = $this->input->post('exam_from');
		$paper_type    = $this->input->post('paper_type');
		$result	= $this->Admin_model->update_timetable($id,$sub_code,$sub_name,$date,$exam_to,$exam_from,$paper_type);
	}

	public function directPaperUpload(){
		
		if($this->input->post()){
			$data   = $this->input->post();

			if(!empty($_FILES['paper_doc']['name'])){
				$uploadData = $this->upload_files('uploads',$_FILES['paper_doc']);
				$data['paper_doc1'] = $uploadData['file_name'];
			}

			$result = $this->Admin_model->directPaperUpload($data);
			if($result){
				$this->session->set_flashdata('dir_up_msg', 'Your Data Saved Successfully.');
				redirect(base_url('admin/directPaperUpload'));
			}

		}

		$data['title']     = "Direct Paper Upload";
		$data['timetable'] = $this->Admin_model->get_all_timetable();
		$data['pageData']  = $this->Admin_model->getAllDirectUploadedPapers();
		$data['content']   = $this->load->view('admin/directPaperUpload',$data,true);
		$this->load->view('admin/main_wrapper',$data);
	}

	public function used_unused_paper(){
		$data['title']     = "Used - Unused Paper Details";
	    $data['pageData']  = $this->Admin_model->get_all_paper_report_1();
		$data['examDates'] = $this->Admin_model->getAllExamDates();
	    $data['content']   = $this->load->view('admin/used_unused_paper',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}
	
	public function download_instwise_reprot()
	{
	    
	    $data['title']     = "Institute Wise Download Report";
	    $data['exam_dates']  = $this->Admin_model->get_exam_dates();
	    $data['content']   = $this->load->view('admin/download_instwise_reprot',$data,true);
	    $this->load->view('admin/main_wrapper',$data);
	}
	
	public function get_downlaod_report_ajax()
	{
	    $day   = $this->input->post('day');
	    $slot   = $this->input->post('slot');
	    $rbte   = $this->input->post('rbte');
	    
	    $data['daywise_pcode']  = $this->Admin_model->get_slot_details($day,$slot);
	    $data['daywise_inst']  = $this->Admin_model->daywise_inst($day,$slot,$rbte);
	    $data['rbte'] = $rbte;
		$data['day'] = $day;
	    $data1   = $this->load->view('admin/get_downlaod_report_ajax',$data,true);
	    
	    
	    echo $data1;
	}
	
	public function get_rawdata_cap_img()
	{
	    $img_path = $this->input->post('img_path');
	    
	    echo base64_encode(file_get_contents('uploads1/'.$img_path));
				     
	}

	public function allow_edit(){
		$inst_id = $this->input->post('inst_id');
		$pcode   = $this->input->post('pcode');
		$result  = $this->Admin_model->allow_edit($inst_id,$pcode);
		if($result > 0){
			echo 'succ';
		}else{
			echo 'wrong';
		}
	}
	
	public function print_report_new()
	{
	    $regions = $_POST['region'];
	    $post = $_POST['designation'];
	    $data['regionaldata'] = $this->Admin_model->getRegionsdata($regions,$post);
	    $this->load->view('admin/print_reports',$data);

	}
	public function print_report_new1()
	{
	   // print_r($_POST);
	   // die;
	    $regions = $_POST['region'];
	    $post = $_POST['institute'];
	    $data['regionaldata'] = $this->Admin_model->getInstitutenew($regions,$post);
	    $this->load->view('admin/print_reports1',$data);

	}
	public function get_level()
	{
	   $region_id = $this->input->post("region_id");
	    $regiondata    = $this->Admin_model->getLevelByRegion($region_id);
	    //print_r($regiondata); die;
	    echo json_encode($regiondata);
		die();  
	}
	
	public function get_coursnew()
	{
	     $region_id = $this->input->post("region_id");
	     $level_id = $this->input->post("level_id");
	     $regiondata    = $this->Admin_model->getCourseBylevel($region_id,$level_id);
	     $postdata    = $this->Admin_model->getpostBylevel($level_id);
	     $data = array(
	         'regiondata'=>$regiondata,
	         'postdata'  =>$postdata
	         );
	    echo json_encode($data);
		die();  
	    
	}
	public function print_report_new2()
	{
	   // print_r($_POST); die;
	     $regions = $_POST['region'];
	     $level = $_POST['level'];
	     $course = $_POST['course'];
	     $desig = $_POST['designation'];
	     $data['btydata'] = $this->Admin_model->getbtydata($regions,$level,$course,$desig);
	     //print_r($data['btydata']); die;
	    $this->load->view('admin/print_reports2',$data);
	}
	
	public function print_report_new3()
	{
	    $region = $_POST['region'];
	    $data['rdata'] = $this->Admin_model->getrdata($regions);
	}
	public function deleterow()
	{
	     $id = $this->input->post("rowid");
	     $postdata    = $this->Admin_model->deleterows($id);
	     if($postdata)
	     {
	         echo json_encode(['status'=>200]); 
	     }
	     else
	     {
	         echo json_encode(['status'=>401]);
	     }
	    
		die();    
	}

}
