
<style>
	.row{
	padding-top:50px;
	}
	.col-lg-8{
		box-shadow: 0px 0px 20px 10px #e5e5e5;
		border-radius:15px;
		margin-bottom:25px;
	}
	.head_title, .pan_head{
	padding:20px;
	}
	.instruction{
	color:red;
	}
	ol > li {color:red;}
	.navbar-brand, .navbar-default, .navbar-header{
	float: none !important;
	text-align:center !important;
	line-height:unset !important;
	}
	
	img{
	width: 200px;
    height: 200px;
    background: whitesmoke;
    /* border: 1px solid; */
    border-radius: 50%;
    padding: 10px;
    align-items: center;
   margin: 2% 2% 2% 30%;
	}

.navbar{
display:none;}

.left{margin-bottom:20px;}
.right{padding:20px;margin-bottom:20px;}
#page-wrapper{margin-left:0px !important;min-height:100% !important;}
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
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


    <div id="wrapper" >

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('/');?>" align="center"><font size="6" color=""><strong>Maharashtra State Board of Technical Education, Mumbai</strong></font></a>
            </div>
            <!-- /.navbar-header -->
			<?php if(!empty($_SESSION['username'])){?>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
			<?php } ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div  id="page-wrapper"  >
           <!--  <div class="row">
                <div class="col-lg-12 ">
                    <h3 class="page-header" align="center">Welcome to BATU Services Portal</h3>
                </div>
            </div> -->
            <!-- /.row -->
            <div class="row"  >
                <?php if(!empty($this->session->flashdata('msg'))){?>
                    <div class="col-md-12" ">
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('msg');?>
                        </div>
                    </div>
                <?php } ?>
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
				 <div class="col-lg-8 col-md-8 col-sm-12">
				 
				  <div class="head_title" align="center">
                           <span style="color:orange;font-size:22px;font-weight:600;">Welcome</span><br>
						   <span style="color:#337ab7;font-size:22px;font-weight:600;">Directorate of Technical Education, Maharashtra State</span><br>
						   <span style="color:#337ab7;font-size:18px;font-weight:400;">तंत्रशिक्षण संचालनालय, महाराष्ट्र राज्य </span><br> 
						   <hr></hr>
                        </div>
				
				<div class="col-lg-6 col-md-6 col-sm-12 left">
                  <img src="assets/dte-logo.gif"/>
                </div>	

                <div class="col-lg-6 col-md-6 col-sm-12 right">
                    <div class="panel panel-default" align="center">
                      <!--   <div class="panel-heading">
                           Welcome to BATU Services Portal
                        </div> -->
                        <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url('check_login');?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="orig_pass" type="password" value="" required>
                                </div>
                                <input type="submit" name="sub" class="btn btn-lg btn-primary btn-block" value="Login">
								<!--<div style="text-align:center;margin-top:10px;">
									Not registered ? <a href="<?php echo base_url('register')?>" style="color:#337ab7;"> Create account</a>
								</div>-->
                            </fieldset>
                        </form>
                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
			
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12"></div>
                <!-- /.col-lg-4 -->

               <!--   <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           MSCIT
                        </div>-->
                        <!-- /.panel-heading -->
                       <!-- <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Sr.No</th>
											<th>Documents Needed for Name Correction</th>
										</tr>
									</thead>
                                    <tbody>
                                        <tr>
										  <td><center>1</center></td>
										  <td>Original MS-CIT Certificate</td>
									    </tr>
									    <tr>
										  <td><center>2</center></td>
										  <td>Copy of Photo Identity Proof (Pan Card/Driving License/Passport, attested by Gazetted Officer)</td>
									    </tr>
									    <tr>
										  <td><center>3</center></td>
										  <td>Copy of Statement of Marks of (HSC/SSC/VIII/IV, attested by Gazetted Officer)</td>
									    </tr>
                                    </tbody>
                                </table>

								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Sr.No</th>
											<th>Documents Needed for Duplicate Cerificate</th>
										</tr>
									</thead>
                                    <tbody>
                                        <tr>
										  <td><center>1</center></td>
										  <td>Annexture A</td>
									    </tr>
									    <tr>
										  <td><center>2</center></td>
										  <td>Annexture B</td>
									    </tr>
									    <tr>
										  <td><center>3</center></td>
										  <td>Original MS-CIT Certificate/Provisional/Appearing Certificate/Hall Ticket</td>
									    </tr>
										<tr>
										  <td><center>4</center></td>
										  <td>Copy of Photo Identity Proof (Pan Card/Driving License/Passport, attested by Gazetted Officer)</td>
									    </tr>
                                    </tbody>
                                </table>

                            </div>-->
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

				 <!-- <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           MSBTE 
                        </div>-->
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
										<tr>
											<th width="55px"><center>Sr.No</center></th>
											<th>Documents Needed for Equivalence Cerificate</th>
										</tr>
									</thead>
                                    <tbody>
                                        <tr>
                                            <td><center>1</center></td>
                                            <td>All Semester Mark List</td>
                                        </tr>
                                        <tr>
                                            <td><center>2</center></td>
                                            <td>Board Certificate</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>-->
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>
            <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>

	<script>
	$(document).ready(function(){
		$("#type").change(function(){
			var html = "";
			if(this.value == 2){
				html += '<option value="">Applying for ?</option>';
				html += '<option value="NC">Upload Paper</option>';
				html += '<option value="DC">Remark Paper</option>';
			}else if(this.value == 1){
				html += '<option value="">Applying for ?</option>';
				html += '<option value="EQ">Equivalence</option>';
			}
			$("#applying_for").html(html);
		});
	});
	</script>

</body>

</html>
