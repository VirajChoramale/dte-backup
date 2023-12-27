<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inst2Controller extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if( @$_SESSION['role'] != 'INST' || $_SESSION['otp_auth'] != 1){
			redirect('/');
		}
		//$this->load->model(array('PS/Paper_setter'));
		$this->load->model(array('Inst/Inst_model','Inst/Inst2_model'));
		$this->load->helper(array('functions'));
		$this->username  = $_SESSION['username'];
		$this->role      = $_SESSION['role'];
		$this->load->library(array('sendotp'));
	}
    
     public function  employee_additional_details($id=NULL){
         
		$data['empdata']				=	$this->Inst_model->get_emp_by_id($id);
	    $data['additionalEmpdata']		=	$this->Inst_model->get_data_byID("employee_additional_details",$id);
		$data['religiondata']			=	$this->Inst_model->get_data("religion");
		$data['categorydata']			=	$this->Inst_model->get_data("category");
		$data['empstatusdata']			=	$this->Inst_model->get_data("employbility_status"); 
		$data['maritaldata']			=	$this->Inst_model->get_data("Marital_status"); 
        $data['empadditionaddeddata']	=	$this->Inst2_model->get_data_byID("employee_additional_details",$id); 
        $data['empcategorydata']		=	$this->Inst2_model->get_data_byID("Employee_category",$id); 
        $data['empspousedata']			=	$this->Inst2_model->get_data_byID("Employee_spouse",$id); 
        $data['empchilddata']			=	$this->Inst2_model->get_data_byID("Employee_child",$id); 
 
	    $data['content']  = $this->load->view('Inst/employee_forms/employee_additional_details',$data,true);
	    $this->load->view('Inst/main_wrapper',$data);
	}
    public function test()
    {
        echo "Hii"; die;
    }

	public function add_emp_additional_det(){

	    $reqdata=$this->input->post();
		$submit_type = $reqdata['add_update'];
		 
		$data1 = array(
		'employee_id'=>$reqdata['empid'],
		'religion' =>$reqdata['religion'],
		'category' =>$reqdata['category'],
		'maritialStatus' =>$reqdata['maritialStatus'],
		'employeeStatus' =>$reqdata['employeeStatus'],
		'created_at' =>date('Y-m-d H:i:s'), 
		);

		if($reqdata['category']!=1){
			$cast_data = array(
			'employee_id'=>$reqdata['empid'],
			'castCertificateNumber'=>$reqdata['castCertificateNumber'],
			'castCertificateDate' =>$reqdata['castCertificateDate'],
			'castCertificateAuthority' =>$reqdata['castCertificateAuthority'],
			'castValidityNumber' =>$reqdata['castValidityNumber'], 
			'castValidityDate' =>$reqdata['castValidityDate'], 
			'castValidityAuthority' =>$reqdata['castValidityAuthority'], 
			'created_at' =>date('Y-m-d H:i:s'), 
			);
			$res1 = $this->Inst2_model->insert_data_by_table("Employee_category",$cast_data,$submit_type);
		}
		
		if($reqdata['maritialStatus']==2){
			if($reqdata['is_spouseGovEmployee']==1){
					$marr_data=array(
					'employee_id'=>$reqdata['empid'],
					"spouseName"=>$reqdata["spouseName"],
					"change_in_surname"=>$reqdata["change_in_surname"],
					"surname"=>$reqdata["surname"], 
					"is_spouseGovEmployee"=>$reqdata["is_spouseGovEmployee"],
					"spouseEmpCode"=>$reqdata["spouseEmpCode"],
					"spouseEmpStatus"=>$reqdata["spouseEmpStatus"],	
					"spouseEmpDesignation"=>$reqdata["spouseEmpDesignation"],	
					"spouseEmpLocation"=>$reqdata["spouseEmpLocation"],	
					'created_at' =>date('Y-m-d H:i:s'), 
				); 

			}else{ 
				$marr_data=array(
					'employee_id'=>$reqdata['empid'],
					"spouseName"=>$reqdata["spouseName"],
					"change_in_surname"=>$reqdata["change_in_surname"],
					"surname"=>$reqdata["surname"], 	
					"is_spouseGovEmployee"=>$reqdata["is_spouseGovEmployee"],
					'created_at' =>date('Y-m-d H:i:s'), 
				); 
			} 
		 
			$res2=$this->Inst2_model->insert_data_by_table("Employee_spouse",$marr_data,$submit_type);
		} 

		if($reqdata["maritialStatus"]==2 || $reqdata["maritialStatus"]==3 || $reqdata["maritialStatus"]==4){

			$ch_count= count($reqdata["childNumber"]);
				for($i=0;$i<$ch_count;$i++){
				$cid=$reqdata['childNumber'][$i];
				$children_data=array(
							'employee_id'=>$reqdata['empid'],
							'childNumber'=>$reqdata['childNumber'][$i],
							'childName'=>$reqdata['childName'][$i],
							'childDOB'=>$reqdata['childDOB'][$i],		
							'childGender'=>$reqdata['childGender'][$i],
							'created_at' =>date('Y-m-d H:i:s'), 
					);
					
					$res3=$this->Inst2_model->insert_data_by_table("Employee_child",$children_data,$submit_type,$cid);
				}
		}
 
		 $res = $this->Inst2_model->insert_data_by_table("employee_additional_details",$data1,$submit_type);
		 
		if($res)
		{
			$this->session->set_flashdata('edu-msg', 'Your Data Added Successfully.');
			$this->session->set_flashdata('class', 'alert-success');
			redirect(base_url('employee_additional_details/'.$reqdata['empid']));
		}
		
	}

	public function update_emp_additional_det(){
		 
			 $updata=$this->Inst2_model->get_data_byID("employee_additional_details",$reqdata["id"]);
	}
	 
	public function employee_verification($id=NULL){
		$data['empdata']	 =	$this->Inst_model->get_emp_by_id($id); 
		$data['empverifidata']  = $this->Inst2_model->get_data_byID("employee_certificate_details",$id); 
		$data['content']	=	$this->load->view('Inst/employee_forms/employee_verification',$data,true);
		$this->load->view('Inst/main_wrapper',$data);  
	}
	public function add_emp_verification_det(){ 
		$reqdata =	$this->input->post();
		//print_r($reqdata); die;
		$eid=$reqdata["employee_id"];
		$submit_type = $_POST['add_update'];
		array_pop($reqdata);
		//print_r($reqdata); die;
		//echo base_url('employee_verification/'.$reqdata["employee_id"]); die;
		$result= $this->Inst2_model->insert_data_by_table("employee_certificate_details",$reqdata,$submit_type); 
		if($result){ 
				$this->session->set_flashdata('edu-msg', 'Your Data Added Successfully.');
				$this->session->set_flashdata('class', 'alert-success');
				redirect(base_url('employee_verification/'.$eid)); 
		}
	}

	public function employee_probation($id=null){
		$data['empdata']	 =	$this->Inst_model->get_emp_by_id($id); 
		$data['empprobdata']  = $this->Inst2_model->get_data_byID("employee_probation_details",$id); 
		$data['content']	=	$this->load->view('Inst/employee_forms/employee_probation',$data,true);
		$this->load->view('Inst/main_wrapper',$data);  	
	}

	public function add_emp_probation_det(){
		$Preqdata =	$this->input->post();
		$eid = $Preqdata['employee_id']; 
		$submit_type = $_POST['add_update'];
		array_pop($Preqdata); 
		$result=$this->Inst2_model->insert_data_by_table("employee_probation_details",$Preqdata,$submit_type);
	  
		if($result){  
				$this->session->set_flashdata('add_empp_msg', 'Your Data Added Successfully.');
				$this->session->set_flashdata('class', 'alert-success');
				redirect(base_url('employee_probation/'.$eid)); 
		} 
	}

	public function employee_retirement_details($id=null){  
		$data['empdata']	 =	$this->Inst_model->get_emp_by_id($id);  
		$data['empretdata']  =  $this->Inst2_model->get_data_byID("employee_retirement_details",$id); 
		$data['content']	 =  $this->load->view('Inst/employee_forms/employee_retirement_details',$data,true);	
		$this->load->view('Inst/main_wrapper',$data);
	}

 	public function add_emp_retirement_det(){
			$Rreqdata			=	$this->input->post(); 
			$eid = $Rreqdata['employee_id']; 
			$submit_type = $_POST['add_update'];
			array_pop($Rreqdata); 
			$result=$this->Inst2_model->insert_data_by_table("employee_retirement_details",$Rreqdata,$submit_type);
			if($result){  
				$this->session->set_flashdata('add_empp_msg', 'Your Data Added Successfully.');
				$this->session->set_flashdata('class', 'alert-success');
				redirect(base_url('employee_retirement_details/'.$eid)); 
			} 
	}

	public function employee_deparmental_enquiry($id=null){

			$data['empdata']=$this->Inst_model->get_emp_by_id($id);
			$data['empdeptdata']=$this->Inst2_model->get_data_byID("employee_deparmental_details",$id);
			$data['content']= $this->load->view("Inst/employee_forms/employee_deparmental_enquiry",$data,true); 
			$this->load->view('Inst/main_wrapper',$data);		
	}

	public function add_emp_dept_details(){ 
			$Dreqdata		=	$this->input->post();
			$eid			=	$Dreqdata['employee_id'];  
			$submit_type	=	$_POST['add_update'];
			array_pop($Dreqdata); 
			  
			$result=$this->Inst2_model->insert_data_by_table("employee_deparmental_details",$Dreqdata,$submit_type);
			if($result){  
				$this->session->set_flashdata('add_empp_msg', 'Your Data Added Successfully.');
				$this->session->set_flashdata('class', 'alert-success');
				redirect(base_url('employee_deparmental_enquiry/'.$eid)); 
			}  

	}  
}
?>