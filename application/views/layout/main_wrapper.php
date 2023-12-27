<style>
	#page-wrapper{min-height:100% !important;}
</style>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>MSBTE</title>
      <!-- Bootstrap Core CSS -->
      <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- MetisMenu CSS -->
      <link href="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
      <!-- DataTables CSS -->
      <link href="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
      <!-- DataTables Responsive CSS -->
      <link href="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
      <!-- Morris Charts CSS -->
      <link href="<?php echo base_url();?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Date Picker -->
      <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet" type="text/css">
      <!-- Custom Css -->
      <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="wrapper">
         <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php echo base_url('home');?>">DBATU</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                     
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Username :<?php echo $_SESSION['username'];?></a>
                                          </li>
                                          <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                          </li> <li class="divider"></li>-->
                        
					 
                     <li><a href="<?php echo base_url('LoginController/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                  </ul>
               </li>
               <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
               <div class="sidebar-nav navbar-collapse">
                  <ul class="nav" id="side-menu">
                     <!--<li class="sidebar-search">
                        <div class="input-group custom-search-form">
                           <input type="text" class="form-control" placeholder="Search...">
                           <span class="input-group-btn">
                           <button class="btn btn-default" type="button">
                           <i class="fa fa-search"></i>
                           </button>
                           </span>
                        </div>
                     </li>-->
                     <li>
                        <?php if($this->session->userdata('inst_type') == 'new' || $this->session->userdata('inst_type') == 'new_exist'){?>
                        <a href="<?php echo base_url('home');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        <?php }else{ ?>
                        <a href="<?php echo base_url('ext_home');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        <?php } ?>
                     </li>
                     <?php if($this->session->userdata('inst_type') == 'new' || $this->session->userdata('inst_type') == 'new_exist' ){?>
                     <li>
                        <?php 
                           if($this->session->userdata('inst_type') == 'new'){
                           ?>
                        <a href="#"><i class="fa fa-university fa-fw"></i>New Institute not affiliated to MSBTE<span class="fa arrow"></span></a>
                        <?php }else{ ?>
                        <a href="#"><i class="fa fa-university fa-fw"></i>Existing Institute/school/Jr.Collage/Degree Collage not affilated to MSBTE<span class="fa arrow"></span></a>
                        <?php } ?>
                        <ul class="nav nav-second-level">
						   <?php /*if(check_authentication($_SESSION['username'],date('Y'),$_SESSION['inst_type']) == true && !format_7_A_B($_SESSION['username']) ){

						   }else{*/
						   ?>
                           <li>
                              <a href="<?php echo base_url('establishment');?>">1.Name and address (with  Pin  Code) </a>
                           </li>
						   <?php //if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || check_gov($_SESSION['username'])){?>
                        
						   <?php //if(name_address_user_type($_SESSION['username'],$_SESSION['inst_type'])){?>
                           <li>
                              <a href="<?php echo base_url('society_details');?>">2.Details of the Applicant Society / Trust / Company </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('members_trustees');?>">3.Details of Members / Trustees </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('resolution');?>">4.Resolution of the Society / Trust / Company</a>
                           </li>
						   <?php //} ?>
                           <li>
                              <a href="<?php echo base_url('proposed_institution');?>">5.Name and address of the proposed institution with PIN Code</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('courses_proposed');?>">6.Course/s proposed to be started from the academic Year 2020-2021</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('same_land');?>">7.The Society / Trust / Company applied for more than one institute using same land & building</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('land');?>">8.Land</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('building');?>">9.Building</a>
                           </li>
                           <li>
                              <a href="#">10.Built-up Area<span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('builtup_area');?>">i.Existing building’s Carpet Area</a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('academic_area');?>">ii.Academic Area</a>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a href="<?php echo base_url('principal_coordinator');?>">11.Principal / Coordinator Details</a>
                           </li>
                           <li>
                              <a href="#">12.Teaching / Non-teaching Staff<span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('staff_details');?>">i.Faculty</a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('course_wise_faculty');?>">ii.Course wise faculty </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('non_teaching');?>">iii.Non-teaching staff</a>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a href="<?php echo base_url('equipment');?>">13.Equipment</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('library');?>">14.Library</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('computer_centre');?>">15.Computer Centre</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('investment');?>">16.Investment on furniture excluding library</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('funds');?>">17.Funds available in bank </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('other');?>">18.Other</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('info_furnish');?>">19.Information to Furnish in Support of the Proposal</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('check_list');?>">20.Check List</a>
                           </li>
                           
                           <li>
                              <a href="<?php echo base_url('declaration');?>">21.Declaration</a>
                           </li>
                           
                           <li>
                              <a href="<?php echo base_url('SummaryReport_a');?>">Summary Report</a>
                           </li>
                           
						   <!--<li>
                              <a href="<?php echo base_url('paystatus');?>">22.Processing Fee Details</a>
                           </li>-->
                        </ul>
                     </li>
					 <?php //} ?>
                     
					 <?php } ?>
					 

					 <!--------------------------------------------- Edit Permission ------------------------------------------>

					 <?php 
					 if(!check_rbte_approval($_SESSION['username'])){
					 if(format_7_A_B($_SESSION['username']) || descripancies($_SESSION['username'])){?>
					 <li>
						  <a href="<?php echo base_url('view_descripancies/new');?>"><i class="fa fa-table fa-fw"></i> View Descripancies</a>
					 </li>
					 <?php } } ?>

					 <!--------------------------------------- End Edit Permission -------------------------------------------->

					 <?php if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || check_gov($_SESSION['username'])){?>
					 <li>
                        <a href="<?php echo base_url('new_preview/').date('Y'); ?>"><i class="fa fa-table fa-fw"></i> Preview </a>
                     </li>
					 <li>
                        <a href="<?php echo base_url('upload_preview/'); ?>"><i class="fa fa-table fa-fw"></i> Upload Final Preview Document </a>
                     </li>
                     <?php } ?>					 
						
					
					 <?php if(old_application($_SESSION['username'])){?>
					 <!--<li>
                        <a href="<?php echo base_url('hamiptra/'); ?>"><i class="fa fa-table fa-fw"></i>Undertaking</a>
                     </li> 
					 <li>
                        <a href="<?php echo base_url('remaining_docs/'); ?>"><i class="fa fa-table fa-fw"></i> Remaining Documents </a>
                     </li>--> 
					 <?php } ?>


                     <?php //} ?>

                     <?php if($this->session->userdata('inst_type') == 'existing_intended'){?>
                     <li class="active">
                        <a href="#"><i class="fa fa-university fa-fw"></i>Existing polytechnic affiliated to MSBTE and intending to conduct short term courses<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						   <?php if(check_authentication($_SESSION['username'],date('Y'),$_SESSION['inst_type']) == false || format_7_A_B($_SESSION['username']) ){?>
                           <li>
                              <a href="<?php echo base_url('ext_establishment');?>">1.Name and address of the institution</a>
                           </li>

                          

						   <?php if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || $_SESSION['typeofinst'] == 'G'){?>

                           <li>
                              <a href="<?php echo base_url('ext_latest_approval');?>">2.Latest approvals</a> 
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_sharing_facilities');?>">3.i.Polytechnic sharing facilities with any other institution/ any other course</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_aicte_courses');?>">3.ii.Existing AICTE approved courses with intake</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('non_approved_courses');?>">3.iii.Institution conducting courses not approved by MSBTE</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_courses_proposed');?>">4.Proposal for Introduction of New Courses</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_principal_coordinator');?>">5.Details of the Principal / Co-ordinator</a>
                           </li>
                           <li>
                              <a href="#">6.Teaching / Non teaching Staff Details <span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('ext_staff_details');?>">Faculty</a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('ext_course_wise_faculty');?>">Course Wise Faculty </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('ext_non_teaching');?>">Non-teaching Staff</a>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_building');?>">7.Building</a>
                           </li>
                           <li>
                              <a href="#">8.Built-up Area<span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 
								<li>
                                    <a href="<?php echo base_url('ext_builtup_area');?>">Existing building’s Carpet Area</a>
                                 </li>
                                 
								 <li>
                                    <a href="<?php echo base_url('ext_academic_area');?>">Academic Area</a>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_equipment');?>">9.Euipment</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_library');?>">10.Library</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('ext_computer_centre');?>">11.Computer Centre</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('financial_position');?>">12.Financial Status of the Society /Trust / Company</a>
                           </li>
                          
						   <!--<li>
                              <a href="<?php echo base_url('ext_mou');?>">13.MoU's</a>
                           </li>-->
                           <li>
                              <a href="<?php echo base_url('ext_checklist');?>">13.Check List</a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('SummaryReport_b');?>">Summary Report</a>
                           </li>
						   <!--<li>
                              <a href="<?php echo base_url('ext_paystatus');?>">15.Processing Fee Details</a>
                           </li>-->
                        </ul>
                     </li>
					 <?php } ?>
                     
                     <?php }// end of if paystatus  ?>

					 <?php 
					 if(!check_rbte_approval($_SESSION['username'])){
					 if( format_7_A_B($_SESSION['username']) || descripancies($_SESSION['username']) ){?>
					 <li>
						  <a href="<?php echo base_url('view_descripancie_7A/existing_intended');?>"><i class="fa fa-table fa-fw"></i> View Descripancies</a>
					 </li>
					 <?php } } ?>

					 <?php if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || $_SESSION['typeofinst']=='G'){?>
					 <li>
                        <a href="<?php echo base_url('ext_preview/').date('Y'); ?>"><i class="fa fa-table fa-fw"></i> Preview </a>
                     </li>
					 <li>
                        <a href="<?php echo base_url('upload_preview/'); ?>"><i class="fa fa-table fa-fw"></i> Upload Final Preview Document </a>
                     </li>
					 <?php } ?>
					
					 
					 <?php if(old_application($_SESSION['username'])){?>
					 <!--<li>
                        <a href="<?php echo base_url('hamiptra/'); ?>"><i class="fa fa-table fa-fw"></i> Undertaking </a>
                     </li> 
                     <li>
                        <a href="<?php echo base_url('remaining_docs/'); ?>"><i class="fa fa-table fa-fw"></i> Remaining Documents </a>
                     </li>-->
					 <?php } ?>

                     
					 <?php } ?>

                     <?php if($this->session->userdata('inst_type') == 'existing'){?>
                     <li class="active">
                        <a href="#"><i class="fa fa-table fa-fw"></i>Existing Institute affiliated to MSBTE & conducting state government approved short term diploma courses<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
						   <?php if(check_authentication($_SESSION['username'],date('Y'),$_SESSION['inst_type']) == false || format_7_A_B($_SESSION['username']) ){?>
                           <li>
                              <a href="<?php echo base_url('var_establishment');?>">1.Name and address of the institution </a>
                           </li>
                       
						   <?php if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || $_SESSION['typeofinst']=='G'){?>

                           <li>
                              <a href="<?php echo base_url('var_latest_approval');?>">2.Latest approvals</a> 
                           </li>
                           <li>
                              <a href="<?php echo base_url('var_sharing_facilities');?>">3.i.Institute sharing facilities with any other institution/ any other course </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('existing_courses');?>">3.ii.Existing courses in the Institute </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('var_non_approved_courses');?>">3.iii.Institution conducting courses not approved by MSBTE</a>
                           </li>
						   <li>
						   <?php 
						   //echo '<pre>'; print_r($_SESSION); echo '</pre>';
						   ?>
						   	  <a>
                              <select class="form-control" name="user_app_for" id="user_app_for">
								 <option value="">Application for ?</option>
								 <option value="additional_course" <?php if(@$_SESSION['user_app_for'] == 'additional_course'){ echo 'selected'; }?> >Additional Courses proposed to be introduced</option>
								 <option value="intake_variation" <?php if(@$_SESSION['user_app_for'] == 'intake_variation'){ echo 'selected'; }?> >Courses in which variation in intake is proposed</option>
								 <option value="course_closure" <?php if(@$_SESSION['user_app_for'] == 'course_closure'){ echo 'selected'; }?> >Closure of Course</option>
								 <option value="change_name_trust" <?php if(@$_SESSION['user_app_for'] == 'change_name_trust'){ echo 'selected'; }?> >Change in Name of trust/society/company</option>
								 <option value="change_name_inst" <?php if(@$_SESSION['user_app_for'] == 'change_name_inst'){ echo 'selected'; }?> >Change in Name of Institute</option>
								 <option value="change_place" <?php if(@$_SESSION['user_app_for'] == 'change_place'){ echo 'selected'; }?> >Change in place</option>
								 <option value="institution_closure" <?php if(@$_SESSION['user_app_for'] == 'institution_closure'){ echo 'selected'; }?> >Closure of Institution</option>
								 <?php if($_SESSION['username'] == '0627'){?>
								 <option value="course_replacement" <?php if(@$_SESSION['user_app_for'] == 'course_replacement'){ echo 'selected'; }?> >Course Replacement</option>
								 <?php } ?>
							  </select>
							  </a>
                           </li>
						   
						   <?php if(@$_SESSION['user_app_for'] == 'intake_variation'){?>
						   <li>
							<a href="<?php echo base_url('intake_variation');?>">4.b.Courses in which variation in intake is proposed</a>
						   </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'course_closure'){?>
						   <li>
							<a href="<?php echo base_url('course_closure');?>">4.c.Closure of Course</a>
						   </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'change_name_trust'){?>
						   <li>
							<a href="<?php echo base_url('change_trust');?>">4.d.Whether Change in Name of trust/society/company</a>
						   </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'change_name_inst'){?>
						   <li>
							<a href="<?php echo base_url('change_name');?>">4.d.i.Whether Change in Name of Institute</a>
						   </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'change_place'){?>
						   <li class="active">
							<a href="#">4.e.Whether Change in place is proposed ? <span class="fa arrow"></span></a>
							<ul class="nav nav-third-level">
								<li><a href="<?php echo base_url('change_place');?>" style="margin-left:10px;">Land Details</a></li>
								<li><a href="<?php echo base_url('change_building');?>" style="margin-left:10px;">Building(Attach photo copy of following documents)</a></li>
								<li><a href="<?php echo base_url('change_built_up_area');?>" style="margin-left:10px;">Existing building’s Carpet Area</a></li>
								<li><a href="<?php echo base_url('change_academic_area');?>" style="margin-left:10px;">Academic Area</a></li>
							</ul>
						   </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'institution_closure'){?>
						   <li>
								<a href="<?php echo base_url('institution_closer');?>">4.g.Whether Closure of Institution is proposed</a>
						   </li>
						   <?php } ?>

						 
                           <li>
                              <a href="#">variation / name change / place change / institution clouser<span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('intake_variation');?>">4.b.Courses in which variation in intake is proposed</a>
                                 </li>
								 <li>
									<a href="<?php echo base_url('course_closure');?>">4.c.Closure of Course</a>
								 </li>
								 <li>
                                    <a href="<?php echo base_url('change_trust');?>">4.d.Whether Change in Name of trust/society/company</a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('change_name');?>">4.d.i.Whether Change in Name of Institute</a>
                                 </li>
                                 <li>
								 	<a href="#">4.e.Whether Change in place is proposed ? <span class="fa arrow"></span></a>
									<ul class="nav nav-third-level">
										<li><a href="<?php echo base_url('change_place');?>" style="margin-left:10px;">Land Details</a></li>
										<li><a href="<?php echo base_url('change_building');?>" style="margin-left:10px;">Building(Attach photo copy of following documents)</a></li>
										<li><a href="<?php echo base_url('change_built_up_area');?>" style="margin-left:10px;">Existing building’s Carpet Area</a></li>
										<li><a href="<?php echo base_url('change_academic_area');?>" style="margin-left:10px;">Academic Area</a></li>
									</ul>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('institution_closer');?>">4.g.Whether Closure of Institution is proposed</a>
                                 </li>
                              </ul>
                           </li>
						   
						  
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
                           <li>
                              <a href="<?php echo base_url('var_courses_proposed');?>">4.a.Additional Courses proposed to be introduced</a>
                           </li>
                           
						   <?php } ?>

						   <?php if($_SESSION['username'] == '0627'){?>
						  <li>
                              <a href="<?php echo base_url('replacement');?>">Replacement of Course</a>
                           </li>
						   <?php } ?>
                            
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'course_closure' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_principal_coordinator');?>">5.Details of the Co-ordinator</a>
                           </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="#">6.Teaching / Non teaching Staff Details <span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('var_staff_details');?>">Faculty</a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('var_course_wise_faculty');?>">Course Wise Faculty </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('var_non_teaching');?>">Non-teaching Staff</a>
                                 </li>
                              </ul>
                           </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'course_closure' || @$_SESSION['user_app_for'] == 'institution_closure' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_land');?>">7.Land Details</a>
                           </li>
						   <?php } ?>

						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'institution_closure' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_building');?>">8.Building</a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
                           <li>
                              <a href="#">9.Built-up Area <span class="fa arrow"></span></a>
                              <ul class="nav nav-third-level">
                                 <li>
                                    <a href="<?php echo base_url('var_builtup_area');?>">Existing building’s Carpet Area </a>
                                 </li>
                                 <li>
                                    <a href="<?php echo base_url('var_academic_area');?>">Academic Area</a>
                                 </li>
                              </ul>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_equipment');?>">10.Equipment </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_library');?>">11.Library </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_computer_centre');?>">12.Computer Centre </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
                           <li>
                              <a href="<?php echo base_url('var_investment');?>">13.Investment on furniture excluding library </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
                           <li>
                              <a href="<?php echo base_url('infrastructure_facilities');?>">14.Details of infrastructure/facilities </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course' || @$_SESSION['user_app_for'] == 'intake_variation' || @$_SESSION['user_app_for'] == 'change_place' || @$_SESSION['user_app_for'] == 'course_replacement'){?>
                           <li>
                              <a href="<?php echo base_url('var_financial_position');?>">15.Financial Status of the Society / Trust / Company  </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
                           <li>
                              <a href="<?php echo base_url('var_checklist');?>">16.Check List </a>
                           </li>
						   <?php } ?>
						   <?php if(@$_SESSION['user_app_for'] == 'additional_course'){?>
						   <li>
                              <a href="<?php echo base_url('var_paystatus');?>">18.Processing Fee<span style="color:red;"><b>*</b></span> </a>
                           </li>
						   <?php } ?>
                        </ul>
                     </li>
                     <li>
                        <a href="<?php echo base_url('SummaryReport_c') ?>"><i class="fa fa-table fa-fw"></i>Summary Report</a>
                     </li>
					 <?php } ?>
                     
                     <?php } // end of paystatus if ?>

					 <?php if( format_7_A_B($_SESSION['username']) || descripancies($_SESSION['username']) ){?>
					 <li>
						  <a href="<?php echo base_url('view_descripancies/existing');?>">View Descripancies</a>
					 </li>
					 <?php } ?>
					
					 <?php if(check_paystatus($_SESSION['username'],$_SESSION['inst_type']) || $_SESSION['typeofinst']=='G'){?>
					 <li>
                        <a href="<?php echo base_url('var_preview/').date('Y'); ?>"><i class="fa fa-table fa-fw"></i> Preview</a>
                     </li>
					 <li>
                        <a href="<?php echo base_url('upload_preview/'); ?>"><i class="fa fa-table fa-fw"></i> Upload Final Preview Document </a>
                     </li>
					 <?php } ?>
					 
					 
					 <?php if(old_application($_SESSION['username'])){?>
					 <!--<li>
                        <a href="<?php echo base_url('hamiptra/'); ?>"><i class="fa fa-table fa-fw"></i> Undertaking </a>
                     </li> 
                     <li>
                        <a href="<?php echo base_url('remaining_docs/'); ?>"><i class="fa fa-table fa-fw"></i> Remaining Documents </a>
                     </li>-->
					 <?php } ?>
                     
					 
					 
					 <?php } ?>
                  </ul>
               </div>
               <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
         </nav>
         <div id="page-wrapper" >
            <!-- content -->
            <?php echo (!empty($content)?$content:null) ?>
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Metis Menu Plugin JavaScript -->
      <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>
      <!-- DataTables JavaScript -->
      <script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- Morris Charts JavaScript -->
      <script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
      <!--<script src="<?php echo base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
         <script src="<?php echo base_url();?>assets/data/morris-data.js"></script>-->
      <!-- Custom Theme JavaScript -->
      <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
      <!-- Custom js -->
      <script src="<?php echo base_url();?>assets/js/custom.js"></script>
      <!-- fancy alert -->
      <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
      <!-- Datepicker -->
      <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>

	  <script>
	  $(document).ready(function(){
		$("#user_app_for").change(function(){
			
			$.ajax({
				type: "POST",
				url : "<?php echo base_url('user_app_for'); ?>",
				data: { user_app_for : this.value},
				success: function(data){
					if(data == 'additional_course'){
						window.location.replace("<?php echo base_url('var_courses_proposed');?>");
					}else if(data == 'intake_variation'){
						window.location.replace("<?php echo base_url('intake_variation');?>");
					}
					else if(data == 'course_closure'){
						window.location.replace("<?php echo base_url('course_closure');?>");
					}
					else if(data == 'change_name_trust'){
						window.location.replace("<?php echo base_url('change_trust');?>");
					}
					else if(data == 'change_name_inst'){
						window.location.replace("<?php echo base_url('change_name');?>");
					}
					else if(data == 'change_place'){
						window.location.replace("<?php echo base_url('change_place');?>");
					}
					else if(data == 'institution_closure'){
						window.location.replace("<?php echo base_url('institution_closer');?>");
					}else if(data == 'course_replacement'){
						window.location.replace("<?php echo base_url('replacement');?>");
					}
					
				}
			});
		});
	  });
	  
	  
	  function fileValidation(this1) 
	  { 
                var fileInput =  document.getElementById(this1.id); 
                  
                var filePath = fileInput.value; 
              
                // Allowing file type 
                var allowedExtensions =  
                        /(\.pdf|\.PDF)$/i; 
                  
                if (!allowedExtensions.exec(filePath)) { 
                    alert('File Allowed Only IN PDF Format Only'); 
                    fileInput.value = ''; 
                    return false; 
                }
    
    			var oFile = document.getElementById(this1.id).files[0];
    
                if (oFile.size > 2097152) //
                {
                    alert("File size must under 2 MB!"); 
    				fileInput.value = ''; 
                    return false;
                }

      } 
	  </script>
   </body>
</html>