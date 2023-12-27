<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation. 
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'LoginController';
$route['check_login']     = 'LoginController/check_login';
$route['register']        = 'LoginController/register_user';
$route['check_otp']       = "LoginController/check_otp";
$route['change_password'] = "LoginController/change_password";
$route['resend_otp']      = "LoginController/resend_otp"; 
$route['otp_verification']= "OtpController/otp_verification"; 
/*----------------------------------Print-----------------*/
$route['print_new_reports']         = "admin/PrintController/index";
$route['getPostByCourse']         = "admin/PrintController/getPostByCourse";
$route['Report1']         = "admin/PrintController/Report_1";
/*--------------------------------------------------------*/

//////////////////////////// ADMIN ///////////////////////////////////////////
$route['print_all_reports']         = "admin/AdminController/print_all_report";
$route['print_report_new']         = "admin/AdminController/print_report_new";
$route['print_report_new1']         = "admin/AdminController/print_report_new1";
$route['print_report_new2']         = "admin/AdminController/print_report_new2";
$route['print_report_new3']         = "admin/AdminController/print_report_new3";
$route['print_report']         = "admin/AdminController/print_report";
$route['admin_home']         = "admin/AdminController/index";
$route['get_level']         = "admin/AdminController/get_level";
$route['get_coursnew']         = "admin/AdminController/get_coursnew";
$route['institute_details']  ="admin/AdminController/institute_details";  
$route['get_inst_course']  ="admin/AdminController/get_inst_course";  
$route['get_inst']  ="admin/AdminController/get_inst";  
$route['get_instnew']  ="admin/AdminController/get_instnew";  
$route['get_inst_level']  ="admin/AdminController/get_inst_level"; 
$route['get_post']  ="admin/AdminController/get_post"; 
$route['add_inst_vacency_details']  ="admin/AdminController/add_inst_vacency_details";  
$route['add_qp']             = "admin/AdminController/add_qp";
$route['add_qp_report']             = "admin/AdminController/add_qp_report";
$route['get_slots']          = "admin/AdminController/get_slots";
$route['get_slot_details']   = "admin/AdminController/get_slot_details";
$route['send_password']      = "admin/CredentialsController/send_password";
$route['download_instwise_reprot']   = "admin/AdminController/download_instwise_reprot";
$route['get_downlaod_report_ajax']   = "admin/AdminController/get_downlaod_report_ajax";
$route['get_rawdata_cap_img']   = "admin/AdminController/get_rawdata_cap_img";
$route['allow_edit']   = "admin/AdminController/allow_edit";
$route['deleterow']       = "admin/AdminController/deleterow";
$route['institute_details_update/(:any)']       = "admin/AdminController/institute_details/$1";
/*$route['generateXls']         = "admin/AdminController/generateXls";
$route['generateXlsChairman'] = "admin/AdminController/generateXlsChairman";
$route['send_mail']			  = "admin/AdminController/send_mail";
$route['chwise_status']       = "admin/AdminController/chwise_status";
$route['srpd_status']         = "Inst_admin/InstAdminController/srpd_status";
$route['generatepaperSet']    = "admin/AdminController/generatepaperSet";
$route['paper_report']           = "admin/AdminController/paper_report";
$route['semesterwise_ps_status'] = "admin/AdminController/semesterwise_ps_status";
$route['ch_confirm_paper']       = "admin/AdminController/ch_confirm_paper";
$route['add_q_paper']       = "admin/AdminController/add_q_paper";
$route['detail_paper_report']       = "admin/AdminController/detail_paper_report";
$route['detail_paper_report/(:any)']       = "admin/AdminController/detail_paper_report/$1";
$route['OtpVerification']       = "admin/AdminController/OtpVerification";
$route['activate_paper']       = "admin/AdminController/activate_paper";
$route['activate_paper/(:any)']       = "admin/AdminController/activate_paper/$1";
$route['enable_disable_paper'] = "admin/AdminController/enable_disable_paper";
$route['paper_type'] = "admin/AdminController/paper_type";
$route['add_srpd'] = "admin/AdminController/add_srpd";
$route['add_timetable']        = "admin/AdminController/add_timetable";
$route['paper_type'] = "admin/AdminController/paper_type";
$route['update_timetable/(:any)'] = "admin/AdminController/update_timetable/$1";
$route['add_inst']                = "admin/AdminController/add_inst";
$route['admin/delete_timetable']  = "admin/AdminController/delete_timetable";
$route['admin/delete_srpd']       = "admin/AdminController/delete_srpd";
$route['admin/directPaperUpload'] = "admin/AdminController/directPaperUpload";
$route['admin/used_unused_paper'] = "admin/AdminController/used_unused_paper";*/


//////////////////////////// INSTITUTES ///////////////////////////////////////////

$route['inst_home']       = "Inst/InstController/index";

$route['create_profile']       = "Inst/InstController/create_employee_profile";
$route['add_emp_profile']       = "Inst/InstController/add_emp_profile";
$route['update_personal_data']       = "Inst/InstController/update_personal_data";
$route['add_employee_education']="Inst/InstController/add_employee_education";
$route['employee_education/(:any)']       = "Inst/InstController/employee_education/$1";
$route['update_emp_education']       = "Inst/InstController/update_emp_education";

$route['delete_emp_education']       = "Inst/InstController/delete_emp_education";



$route['edit_emp_profile']       = "Inst/InstController/edit_emp_profile";
$route['add_emp_personal_det']       = "Inst/InstController/add_emp_personal_det"; 
$route['update_emp_profile']       = "Inst/InstController/update_emp_profile";
$route['delete_emp_profile']       = "Inst/InstController/delete_emp_profile";
$route['employee_details_list/(:any)']       = "Inst/InstController/employee_details_list/$1";
$route['employee_personal_details/(:any)']       = "Inst/InstController/employee_personal_details/$1";
$route['employee_additional_details/(:any)']       = "Inst/Inst2Controller/employee_additional_details/$1";
$route['employee_experiance/(:any)']       = "Inst/InstController/employee_experiance/$1";
$route['add_employee_experiance']       = "Inst/InstController/add_employee_experiance";
$route['update_employee_experiance']       = "Inst/InstController/update_employee_experiance";
$route['delete_employee_experiance']       = "Inst/InstController/delete_employee_experiance";

$route['employee_verification/(:any)']       = "Inst/Inst2Controller/employee_verification/$1";
$route['employee_probation/(:any)']       = "Inst/Inst2Controller/employee_probation/$1";

$route['employee_retirement_details/(:any)']       = "Inst/Inst2Controller/employee_retirement_details/$1";
$route['employee_deparmental_enquiry/(:any)']       = "Inst/Inst2Controller/employee_deparmental_enquiry/$1";

$route['add_emp_additional_det']       = "Inst/Inst2Controller/add_emp_additional_det"; 
$route['update_emp_additional_det']       = "Inst/Inst2Controller/update_emp_additional_det"; 
$route['add_emp_verification_det']       = "Inst/Inst2Controller/add_emp_verification_det"; 
$route['add_emp_probation_det']       = "Inst/Inst2Controller/add_emp_probation_det"; 
$route['add_emp_retirement_det']       = "Inst/Inst2Controller/add_emp_retirement_det"; 
$route['add_emp_dept_details']       = "Inst/Inst2Controller/add_emp_dept_details"; 


$route['paper_down']      = "Inst/InstController/paper_down";
$route['capture_image']   = "Inst/InstController/capture_image";

$route['check_otp']       = "Inst/InstController/check_otp";
$route['chk_otp']         = "Inst/InstController/check_otp";
$route['download_final']  = "Inst/InstController/download_final";
$route['test']            =  "Inst/Inst2Controller/test";








