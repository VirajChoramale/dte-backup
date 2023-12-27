<style>
/* .img_class{ */
/* 	margin-top:5px; */
/* 	margin-left:20px; */
/* 	width:90px; */
/* 	height:90px; */
/* 	float:left; */
/* 	padding:5px; */
/* 	 background: white; */
/*     /* border: 1px solid; */ */
/*     border-radius: 50%; */
/* 	 position: relative; */
/* 	 z-index:10; */
/* } */

/* .navbar{ */
/* 	height:100px; */
/* 	/* background-color:#337ab7 !important; */ */
/* 	background-color:#4f93ce !important; */
/* 	color:white; */
/* 	} */
	.exam{
	float:right;
	font-size:13px !important;
	color:white !important;
}
/* .sidebar-nav, .navbar-collapse{margin-top:48px;z-index:-2;} */
/* .sidebar{margin-top:100px !important;position:relative;z-index:-2;}  */
/* .new{ */
/* 	  font-size:24px !important; */
/* 	  margin-left: 50px; */
/* 	  color:white !important; */
/* } */
.dropdown-toggle{ color:#fff !important;}
/* .sticky-footer{ */
/* 	padding:8px;height:20px !important;margin-bottom:0;flex-shrink:0;vertical-align:middle; */
/* } */
/* .sticky-footer{ */
/* 	padding:8px;height:20px !important;margin-bottom:0;flex-shrink:0;vertical-align:middle; */
/* } */
/* #page-wrapper{min-height:100% !important;} */
</style>

<!DOCTYPE html>
<html lang="en">

<head>
	  <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>DTE-MIS</title>
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

<body oncontextmenu='return false'>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<img class="haeder_logo"  src="<?php echo base_url('assets/download.jpg');?>" class=""/>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand new" href="<?php echo base_url('admin_home');?>">Directorate of Technical Education, Maharashtra State<br>
				<span style="line-height:2.2;font-size:14px;"> </span><br><span style="font-size: 21px;
    font-weight: 500;">तंत्रशिक्षण संचालनालय, महाराष्ट्र राज्य</span></a>
            </div>
            <!-- /.navbar-header -->
            
            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown logindropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="uinfo">
                        <i class="fa fa-user fa-fw" ></i><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
						<li>
							<a href="#">
								<i class="fa fa-user fa-fw"></i> Username :<?php echo $_SESSION['username'];?>
							</a>
                        </li>
                        <li>
							<a href="<?php echo base_url('LoginController/logout');?>">
								<i class="fa fa-sign-out fa-fw"></i> Logout
							</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

     
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" class='row' >
		         <div class='col-sm-2 sidebar' id='sidebar'> 
		               <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url('admin_home');?>">
								<i class="fa fa-home fa-fw"></i> Home
							</a>
                        </li>
                        <?php
                        //print_r($_SESSION);
                        if($_SESSION['role']=='ADMIN')
                        {
                        ?>
						<li>
							<a href=<?php echo base_url('institute_details');?>>
								<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Institute Details
							</a>
						</li>
						<li>
						    	<a href=<?php echo base_url('print_new_reports');?>>
								<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Print Reports
							</a>
						</li>
						<?php
						    if($_SESSION['id']==2)
						    {
						?>
						<li>
						<a href=<?php echo base_url('print_all_reports');?>>
								<i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Print Reports
							</a>
						</li>
						<?php
						    }
                        }
						?>
						<!--<li>
							<a href="<?php echo base_url('add_paper_setter');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Add Paper Setter
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('ch_ps_maping');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Chairman Paper Setter Maping
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('chwise_status');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Chairman Wise Status
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('add_timetable');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Add Timetable
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('add_inst');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Add Institutes
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('add_srpd');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Add SRPD Info
							</a>
						</li>
						<li> 
							<a href="<?php echo base_url('ch_confirm_paper');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Chairman Confirmed Q. Paper
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('activate_paper');?>">
								<i class="fa fa-list" aria-hidden="true"></i>Paper Activation
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('generatepaperSet');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Random QP Selection
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('srpd_status');?>">
								<i class="fa fa-list" aria-hidden="true"></i> SRPD INFO
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('paper_report');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Paper Download Summary
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('semesterwise_ps_status');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Semester wise Paper Setter Summary
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('add_q_paper');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Add Question Paper
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('detail_paper_report');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Date Wise & Subject Wise Available Saper Sets
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('OtpVerification');?>">
								<i class="fa fa-list" aria-hidden="true"></i> OTP Verification
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/used_unused_paper');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Used / Unused QP Set
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/directPaperUpload');?>">
								<i class="fa fa-list" aria-hidden="true"></i> Direct Question Paper Upload
							</a>
						</li>-->
                    </ul>
                    <?php //} ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
		        
		        </div>
		        
		        
		        <div class="col-sm-10" id='mainContent'>
		                <?php echo (!empty($content)?$content:null) ?>
		        
		        </div>
		        
                   
                    <!-- content -->
                   

        </div>
        <!-- /#page-wrapper -->

    </div>
	<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; DTE Website <?php echo date('Y'); ?> </span>
                    </div>
                </div>
            </footer>
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
      <!-- Custom Theme JavaScript -->
      <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
      <!-- Custom js -->
      <script src="<?php echo base_url();?>assets/js/custom.js"></script>
      <!-- fancy alert -->
      <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
      <!-- Datepicker -->
      <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	
	  <script>
		  function fileValidation(this1) { 
			var fileInput =  document.getElementById(this1.id); 
			var filePath = fileInput.value; 
			var allowedExtensions =  /(\.pdf|\.PDF)$/i; 
			  
			if (!allowedExtensions.exec(filePath)) { 
				alert('File Allowed Only IN PDF Format Only'); 
				fileInput.value = ''; 
				return false; 
			}
			var oFile = document.getElementById(this1.id).files[0];
			if (oFile.size > 2097152){
				alert("File size must under 2 MB!"); 
				fileInput.value = ''; 
				return false;
			}
		  } 
	  </script>
	  <!--<script>
        // disable right click
        $(document).keydown(function (event) {
            if (event.keyCode == 123) { // Prevent F12
                return false;
            } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                return false;
            }else if (event.ctrlKey && event.keyCode == 85) {
                           return false;
                       }
        });
        </script>-->

</body>

</html>