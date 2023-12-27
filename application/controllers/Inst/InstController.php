<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InstController extends CI_Controller {
	public function __construct(){
        parent::__construct();
		//print_r($_SESSION);
		if( @$_SESSION['role'] != 'INST' || $_SESSION['otp_auth'] != 1){
			redirect('/');
		}
		//$this->load->model(array('PS/Paper_setter'));
		$this->load->model(array('Inst/Inst_model'));
		$this->load->helper(array('functions'));
		$this->username  = $_SESSION['username'];
		$this->role      = $_SESSION['role'];
		$this->load->library(array('sendotp'));
	}
	public function index(){
		$data['title'] = "Institute Information For SRPD";
		$data['content']  = $this->load->view('Inst/home',$data,true);
		$this->load->view('Inst/main_wrapper',$data);	
	}
	public function create_employee_profile(){
	 // print_r($_SESSION);die;
	    $data['emp']      = $this->Inst_model->get_emp_by_Inst($_SESSION['inst_id']);
	    $data['designation']=$this->Inst_model->get_data('designation'); 
	    
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/create_profile',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);	
	}
	public function employee_details_list($eid=null){
	   // $eid = $this->input->post('eid');
	    $data['empdata']  = $this->Inst_model->get_emp_by_id($eid);
	   // print_r( $data['empdata']);
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_details_list',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function  employee_personal_details($eid = null){
	    $data['empdata']  = $this->Inst_model->get_emp_by_id($eid);
	    $data['change_name']=$this->Inst_model->get_data_byID("employee_name_change",$eid);
	  
	  //  print_r(  $data['change_name']);die();
	    $data['personal_data']=$this->Inst_model->get_personal_details($eid);
	    //print_r( $data['personal_data']);
	    
	    
	    
	    //$data['empdata']  = $this->Inst_model->get_emp_by_id($eid);
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_personal_details',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function  employee_additional_details($id=NULL){
        
		$data['empdata']			=	$this->Inst_model->get_emp_by_id($id);
	    $data['additionalEmpdata']  =	$this->Inst_model->get_data_byID("employee_additional_details",$id);
		$data['religiondata']  = $this->Inst_model->get_data("religion");
		$data['categorydata']  = $this->Inst_model->get_data("category");
		$data['empstatusdata']  = $this->Inst_model->get_data("employbility_status"); 
		$data['maritaldata']  = $this->Inst_model->get_data("Marital_status"); 
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_additional_details',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function  employee_education($id=null){
	    $data['edu_data']=$this->Inst_model->get_data_byID('employee_educational_details',$id);
	    $data['empdata']  = $this->Inst_model->get_emp_by_id($id);
	    $data['class_list']=$this->Inst_model->get_data('qualification_class');
	    $data['level']= $this->Inst_model->get_data("qualification_level");
	    //print_r($data['level']);die();
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_education',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function add_employee_education(){   /*  add_employee education */
	    
	    $data = $this->input->post();
	   
	    
	    ['employee_id'=>$employe_id,
	    'degree'=>$level,
	    'disipiline'=>$disiline,
	    'specialization'=>$specialization,
	    'university'=>$university,
	    'marks'=>$marks,
	    'passing_year'=>$passing_year,
	    'class'=>$class
	   ]=$data;
	   $ct=$this->Inst_model->get_entryCount_byID('employee_educational_details',$employe_id[0]);
	  
	   
	   $count=count($employe_id);//count 
	    
	    for($i=0;$i<$count;$i++){
	        $insert_arr=array('employee_id'=>$employe_id[$i],
	            'degree'=>$level[$i],
	            'disipiline'=>$disiline[$i],
	            'specialization'=>$specialization[$i],
	            'marks'=>$marks[$i],
	            'university'=>$university[$i],
	            'passing_year'=>$passing_year[$i],
	            'class'=>$class[$i]);
	        
	     
	        if($ct[0]['count']<4){
	       
	            $res1= $this->Inst_model->insert_data_by_table('employee_educational_details',$insert_arr);
	            
	         
	        }
	        else {
	            
	            $this->session->set_flashdata('edu-msg', 'You can only add maximum 4 education');
	            $this->session->set_flashdata('class', 'alert-danger');
	            redirect(base_url('employee_education/'.$employe_id[0]));
	            break;
	            
	        }
	   } 
	   $this->session->set_flashdata('edu-msg', 'Your Data Added Successfully.');
	   $this->session->set_flashdata('class', 'alert-success');
	   
	   redirect(base_url('employee_education/'.$employe_id[0]));
	   
	}
	public function update_emp_education(){
	    $data = $this->input->post();
	    
	    $row_id=$data['id'];
	    $emp_id=$data['employee_id'];
	    $res=$this->Inst_model->update_byRow("employee_educational_details",$row_id,$data);
	  //  print_r($data);die();
	    
	    if($res==1){
	      
	        $this->session->set_flashdata('edu-msg', 'Successfully updated');
	        $this->session->set_flashdata('class', 'alert-success');
	        redirect(base_url('employee_education/'.$emp_id));
	    }
	    else{
	        
	        $this->session->set_flashdata('edu-msg', 'something went wrong');
	        $this->session->set_flashdata('class', 'alert-danger');
	        redirect(base_url('employee_education/'.$emp_id));
	    }
	   
	}
	
	public function delete_emp_education(){
	    $data = $this->input->post(); 
	 
	   $row_id=$data['id'];
	    $emp_id=$data['emp'];
	    $this->Inst_model->delete_data_byRow("employee_educational_details",$row_id);
	    $this->session->set_flashdata('edu-msg', 'Successfully deleted');
	    $this->session->set_flashdata('class', 'alert-success');
	    redirect(base_url('employee_education/'.$emp_id));
	    
	    
	  
	    
	}
	public function  employee_experiance($id=null){
	    $data['emp_id']=$id;
	    $data['exp_data']=$this->Inst_model->get_data_byID("employee_experiance",$id);
	    $data['designation']=$this->Inst_model->get_data('designation');
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_experiance',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function add_employee_experiance(){
	    $data = $this->input->post();
	    
	    ['emp_id'=>$employe_id,
	    'address'=>$address,
	    'institute_name'=>$institute_name,
	    'nature_of_job'=>$nature_of_job,
	    'designation'=>$designation,
	    'date_of_joining'=>$date_of_joining,
	    'appointment_letter_no'=>$appointment_letter_no,
	    'appointment_category'=>$appointment_category,
	    'pay_scale'=>$pay_scale,
	    'service_end_date'=>$service_end_date,
	    'total_experiance'=>$total_experiance,
	    'reason_for_leaving'=>$reason_for_leaving
	    
	    ]=$data;
	    $ct=$this->Inst_model->get_entryCount_byID('employee_experiance',$employe_id[0]);
	    
	    
	    $count=count($employe_id);//count
	    
	    for($i=0;$i<$count;$i++){
	        $insert_arr=array('employee_id'=>$employe_id[$i],
	            'address'=>$address[$i],
	            'institute_name'=>$institute_name[$i],
	            'nature_of_job'=>$nature_of_job[$i],
	            'designation'=>$designation[$i],
	            'date_of_joining'=>$date_of_joining[$i],
	            'appointment_letter_no'=>$appointment_letter_no[$i],
	            'appointment_category'=>$appointment_category[$i],
	            'pay_scale'=>$pay_scale[$i],
	            'service_end_date'=>$service_end_date[$i],
	            'total_experiance'=>$total_experiance[$i],
	            'reason_for_leaving'=>$reason_for_leaving[$i]
	            );
	        
	        
	        if($ct[0]['count']<3){
	            
	            $res1= $this->Inst_model->insert_data_by_table('employee_experiance',$insert_arr);
	          
	            
	        }
	        else {
	            
	            $this->session->set_flashdata('edu-msg', 'You can only add maximum 4 education');
	            $this->session->set_flashdata('class', 'alert-danger');
	            redirect(base_url('employee_experiance/'.$employe_id[0]));
	            break;
	            
	        }
	    }
	    $this->session->set_flashdata('edu-msg', 'Your Data Added Successfully.');
	    $this->session->set_flashdata('class', 'alert-success');
	    
	    redirect(base_url('employee_experiance/'.$employe_id[0]));
	    
	    
	}
	public function update_employee_experiance(){
	    $data = $this->input->post();
	    
	    $row_id=$data['id'];
	    
	    $emp_id=$data['employee_id'];
	   
	    $res=$this->Inst_model->update_byRow("employee_experiance",$row_id,$data);
	    //  print_r($data);die();
	    
	    if($res==1){
	        
	        $this->session->set_flashdata('edu-msg', 'Successfully updated');
	        $this->session->set_flashdata('class', 'alert-success');
	        redirect(base_url('employee_experiance/'.$emp_id));
	    }
	    else{
	        
	        $this->session->set_flashdata('edu-msg', 'something went wrong');
	        $this->session->set_flashdata('class', 'alert-danger');
	        redirect(base_url('employee_experiance/'.$emp_id));
	    }
	    
	    
	}
	public function delete_employee_experiance(){
	    $data = $this->input->post();
	    
	    $row_id=$data['row-id'];
	    
	    $emp_id=$data['emp'];
	    $this->Inst_model->delete_data_byRow("employee_experiance",$row_id);
	    $this->session->set_flashdata('edu-msg', 'Successfully deleted');
	    $this->session->set_flashdata('class', 'alert-success');
	    redirect(base_url('employee_experiance/'.$emp_id));
	    
	    
	    
	    
	}
	
	public function  employee_verification(){
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_verification',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function  employee_probation(){
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_probation',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function employee_retirement_details(){
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_retirement_details',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	public function employee_deparmental_enquiry(){
	    
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_deparmental_enquiry',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
	
	
	
	public function capture_image(){
		
		$data = $this->input->post();
		$img  = $this->input->post('image');
		$pcode  = $this->input->post('pcode');
		
		$folderPath = $_SERVER['DOCUMENT_ROOT'].'/msbte/uploads1/';
	  
		$image_parts    = explode(";base64,", $img);
		$image_type_aux = explode("image/", $image_parts[0]);
		$image_type = $image_type_aux[1];
		
		$image_base64 = base64_decode($image_parts[1]);
		$fileName = $_SESSION['username'].'_'.$pcode.'_'.time().'.png';
	  
		$file = $folderPath . $fileName;
		file_put_contents($file, $image_base64);

		$data['username']  = $_SESSION['username'];
		$data['inst_id']   = $_SESSION['inst_id'];
		$data['image']     = $fileName;

		$res = $this->Inst_model->capture_image($data);

		if($res){
			echo 'succ';
		}else{
			echo 'fails';
		}

	}

	public function paper_down(){

		$data['title']     = "Pharmacy Question Paper Online Delivery Summer Examination -2023";
		$data['pageData']  = $this->Inst_model->paper_details($_SESSION['inst_id']);
		//echo '<pre>'; print_r($data['pageData']); echo '</pre>';
		$data['content']   = $this->load->view('Inst/paper_down',$data,true);
		$this->load->view('Inst/main_wrapper',$data);

	}
	
	public function send_mail($to,$otp_email){
			
			$this->load->library('email');		
			$fromemail = "coe@dbatu.ac.in";

			$mesg    = "Dear Sir/Madam,<br> You OTP IS ".$otp_email;
		    
			$subject = "QP Download OTP ".$otp_email;

			$config=array(
				'charset'=>'utf-8',
				'wordwrap'=> TRUE,
				'mailtype' => 'html'
			);
			
			$this->email->initialize($config);
			$this->email->bcc('deepak@bynaric.in');
			$this->email->to($to);
			$this->email->from($fromemail, "COE DBATU");
			$this->email->reply_to('coe@dbatu.ac.in', 'COE DBATU');
			$this->email->subject($subject);
			$this->email->message($mesg);
			$mail = $this->email->send();
	}

	public function check_otp(){
		$otp_mobile = $this->input->post('otp_mobile');
		$otp_email	= $this->input->post('otp_email');

		$res = $this->Inst_model->check_otp($otp_mobile,$otp_email);
		if(!empty($res)){
			echo 'succ';
		}else{
			echo 'fails';
		}
	}


	public function download_final(){	
		$data['subject_code'] = $this->input->post('subject_code');
		$data['username']     = $_SESSION['username'];
		
		$this->Inst_model->saveDownloads($data);
	}
	public function add_emp_profile()
	{
	   // print_r($_SESSION); die;
	   
	    $data = $this->input->post();
	  
	    $sevarth_ct=$this->Inst_model->get_column_ct('employee','sevarth_no',$data['sevarth_no']);
	   
	  
	    if($sevarth_ct[0]['count']==1){
	        $this->session->set_flashdata('add_cemp_msg', 'This sevarth id already filled');
	        $this->session->set_flashdata('class', 'alert-warning');
	      
	        redirect(base_url('create_profile'));
	    }
	    else{
	        $result=$this->Inst_model->add_emp_profile($data);
	        $result==1? $this->session->set_flashdata('add_cemp_msg', 'Employee data added')&& 
	        $this->session->set_flashdata('class', 'alert-success'):$this->session->set_flashdata('add_cemp_msg', 'Something went wrong')&& $this->session->set_flashdata('class', 'alert-danger');;
	       
	        redirect(base_url('create_profile'));
	    }
	}
	public function edit_emp_profile()
	{
	  $eid = $this->input->post('eid');
	  $data['designation']=$this->Inst_model->get_data('designation');
	  
	  $data['employeeData'] = $this->Inst_model->edit_emp_profile($eid);
	
	  $data['emp']      = $this->Inst_model->get_emp_by_Inst($_SESSION['inst_id']);
	 // print_r($data['emp']);die();
	  $data['content']  = $this->load->view('Inst/employee_forms/create_profile',$data,true);
	  $this->load->view('Inst/main_wrapper',$data);	
	 
	}
	public function update_emp_profile()
	{
	  $data1 = $this->input->post();
	  $eid = $data1['eid'];
	  $data = array(
	      'sevarth_no'=>$data1['sevarth_no'],
	      'title'     =>$data1['title'],
	      'full_name' =>$data1['full_name'],
	      'gender'    =>$data1['gender'],
	      'dob'       =>$data1['dob'],
	      'email'     =>$data1['email'],
	      'contact_no'=>$data1['contact_no']
	      );
 	     $result = $this->Inst_model->update_emp_profile($eid,$data);
        if($result){
				$this->session->set_flashdata('add_cemp_msg', 'Your Data Updated Successfully.');
				$this->session->set_flashdata('class', 'alert-success');
				redirect(base_url('create_profile'));
			}
	 
	}
	public function delete_emp_profile()
	{
	  $eid = $this->input->post('eid');
	  $result = $this->Inst_model->delete_emp_profile($eid);
	  $res_tab2=$this->Inst_model->delete_data("employee_additional_details",$eid);
	  $this->session->set_flashdata('add_cemp_msg', 'Employee Data Deleted Successfully.');
	  redirect(base_url('create_profile'));
			
	}
	public function add_emp_personal_det(){
	     $reqdata=$this->input->post();
	    // print_r($reqdata); die;
	     $insert_arr=array(
	         'employee_id'=>$reqdata["id"],
	         'title'=>$reqdata["title"],
	         'is_changename'=>$reqdata["change_in_name"],
	         'dob'=>$reqdata['dob'],
	         'aadhar_number'=>$reqdata["aadhar_number"],
	         'pan_number'=>$reqdata["pan_number"],
	         'father_name'=>$reqdata["fathername"],
	         'mother_name'=>$reqdata["mothername"],
	         'residential_address'=>$reqdata["res_address"],
	         'mother_tounge'=>$reqdata["mothertouge"],
	         'permanent_address'=>$reqdata["per_address"],
	         'home_town_address'=>$reqdata["home_address"],
	         'is_disability'=>$reqdata["disabilty"],	          
	         'percent_disability'=>$reqdata['percentage_disab'],
	         'pwd_type'=>$reqdata['pwd_type']
	         
	     );
	     
	     //$my_arr=array('employee_id' => 1,'title' =>'MR', 'is_changename' => 0 ,'dob' => '2023-12-23' ,'aadhar_number' => 123456789123 ,'pan_number' => '1234567891' ,'father_name' => 'viraj' ,'mother_name' => 'choramale', 'residential_address' => '123456' ,'mother_tounge' => '111111', 'permanent_address' => '123456', 'home_town_address' => '12345669' ,'is_disability' => 1 );
	     //print_r($my_arr);
	   
	     if($reqdata["change_in_name"]==1){
	         $changeArr=array('employee_id'=>$reqdata["id"],
	             'old_name'=>$reqdata["old_name"],
	             'gazet_for_name_change'=>$reqdata["g-for-name-change"],
	             'date'=>$reqdata["gdate"]
	         
	        );
	        // print_r($changeArr);
	         $res1= $this->Inst_model->insert_data_by_table('employee_personal_details',$insert_arr);
	         $res= $this->Inst_model->insert_data_by_table('employee_name_change',$changeArr);
	         if($res&&$res1){
	             $this->session->set_flashdata('add_cemp_msg', 'Your Data Saved Successfully.');
	             redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	         } 
	         
	     }
	     
	     
	     else{
	          $res1= $this->Inst_model->insert_data_by_table('employee_personal_details',$insert_arr);
	         if($res&&$res1){
	             $this->session->set_flashdata('add_cemp_msg', 'Your Data Saved Successfully.');
	             redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	         }else{
	             $this->session->set_flashdata('add_cemp_msg', 'Something went Wrong.');
	             redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	         } 
	     }
	  
	     
	}
	public function update_personal_data(){
	    $reqdata=$this->input->post();
	    // print_r($reqdata); die;
	    $insert_arr=array(
	        'employee_id'=>$reqdata["id"],
	        'title'=>$reqdata["title"],
	        'is_changename'=>$reqdata["change_in_name"],
	        'dob'=>$reqdata['dob'],
	        'aadhar_number'=>$reqdata["aadhar_number"],
	        'pan_number'=>$reqdata["pan_number"],
	        'father_name'=>$reqdata["fathername"],
	        'mother_name'=>$reqdata["mothername"],
	        'residential_address'=>$reqdata["res_address"],
	        'mother_tounge'=>$reqdata["mothertouge"],
	        'permanent_address'=>$reqdata["per_address"],
	        'home_town_address'=>$reqdata["home_address"],
	        'is_disability'=>$reqdata["disabilty"],
	        'percent_disability'=>$reqdata['percentage_disab'],
	        'pwd_type'=>$reqdata['pwd_type']
	        
	    );
	    $ct=$this->Inst_model->get_entryCount_byID('employee_name_change',$reqdata["id"]);
	    $dat=$this->Inst_model->get_data_byID("employee_name_change",$reqdata["id"]);
	    if($insert_arr['is_disability']==0){$insert_arr['percent_disability']=0;$insert_arr['pwd_type']='NA';}
	 
	    if($reqdata["change_in_name"]==1){
	        $changeArr=array('employee_id'=>$reqdata["id"],
	            'old_name'=>$reqdata["old_name"],
	            'gazet_for_name_change'=>$reqdata["g-for-name-change"],
	            'date'=>$reqdata["gdate"]
	            
	        );
	        $res1= $this->Inst_model->update_data('employee_personal_details',$reqdata["id"],$insert_arr);
	       
	        $ct['count']==0?$this->Inst_model->insert_data_by_table('employee_name_change',$changeArr):$this->Inst_model->
	        update_data('employee_name_change',$reqdata["id"],$changeArr);
	        
	        
	        if($res1==0&& $res==0){
	            $this->session->set_flashdata('add_empp_msg', 'Your Data Saved Successfully.');
	            redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	        }
	        elseif ($res1>=0 && $res>=0){
	            $this->session->set_flashdata('add_empp_msg', 'Your Data Updated Successfully.');
	            redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	            
	        }else {
	            $this->session->set_flashdata('add_empp_msg', 'Something went wrong..');
	            redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	        }
	        
	        
	    }elseif ($reqdata["change_in_name"]==0&&$dat){
	        $this->Inst_model->delete_data("employee_name_change",$reqdata["id"]);
	        
	        $res1= $this->Inst_model->update_data('employee_personal_details',$reqdata["id"],$insert_arr);
	        $this->session->set_flashdata('add_empp_msg', 'Your Data Saved Successfully.');
	        
	        
	        redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	              
	    }
	    
	    else{
	        $res1= $this->Inst_model->update_data('employee_personal_details',$reqdata["id"],$insert_arr);
	        if($res>=0&&$res1>=0){
	            $this->session->set_flashdata('add_empp_msg', 'Your Data Saved Successfully.');
	            redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	        }else{
	            $this->session->set_flashdata('add_empp_msg', 'Something went Wrong.');
	            redirect(base_url('employee_personal_details/'.$reqdata["id"]));
	        }
	    }
	    
	}


}
?>