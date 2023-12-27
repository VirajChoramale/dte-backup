<style>
img{
	margin-top:5px;
	margin-left:20px;
	width:90px;
	height:90px;
	float:left;
	padding:5px;
	 background: white;
    /* border: 1px solid; */
    border-radius: 50%;
	 position: relative;
	 z-index:10;
	}

	.navbar{
		height:100px;
		/* background-color:#337ab7 !important; */
		background-color:#4f93ce !important;
		color:white;
	}
	.exam{
		float:right;
		font-size:13px !important;
		color:white !important;
	}
	/* .sidebar-nav, .navbar-collapse{margin-top:48px;z-index:-2;} */
	.sidebar{margin-top:100px !important;position:relative;z-index:-2;} 
	.new{
	  font-size:24px !important;
	  margin-left: 50px;
	  color:white !important;
	}
	.dropdown-toggle{ color:white !important;}
	.sticky-footer{
		padding:8px;height:20px !important;margin-bottom:0;flex-shrink:0;vertical-align:middle;
	}
</style>


<!DOCTYPE html>
<html lang="en">

<head>

	  <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>MSBTE QPD</title>
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

      <link href="<?php echo base_url();?>assets/css/steps.css" rel="stylesheet" type="text/css">
</head>

<body oncontextmenu='return false'>

    <div id="wrapper">
	
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<img src="assets/msbte_new_logo.jpg"/>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
                <a class="navbar-brand new" href="<?php echo base_url('add_inst');?>">Maharashtra State Board of Technical Education, Mumbai<br>
				<span style="line-height:2.2;font-size:14px;"> </span><br><span style="line-heigh:0;font-size:14px;">2nd Floor, Govt.Polytechnic Building, 49, Kherwadi Rd, Sub-region, Kherwadi, Bandra East, Mumbai, Maharashtra 400051</span></a>
			
            </div>
            <!-- /.navbar-header -->
            
			<!--
            <ul class="nav navbar-top-links navbar-right">
                <a class="navbar-brand exam">Exam <?php echo exam_year; ?></a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
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
                    
                </li>
                
            </ul>
            -->

            
        </nav>

        <div id="page-wrapper">
                   					
                    <!-- content -->
                    <?php echo (!empty($content)?$content:null) ?>

        </div>

	

        <!-- /#page-wrapper -->

    </div>
	<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MSBTE Website <?php echo date('Y'); ?> </span>
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
	  <script>
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
</script>

</body>

</html>