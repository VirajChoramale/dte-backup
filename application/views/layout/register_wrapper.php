<?php
//exit;
?>
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
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<style>
		/*.swal-content__input {
		  padding-left: 15px;
		  letter-spacing: 42px;
		  border: 0;
		  background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
		  background-position: bottom;
		  background-size: 50px 1px;
		  background-repeat: repeat-x;
		  background-position-x: 35px;
		  width: 200px;
		  outline : none;
		}
		.swal-content {
			margin-left: 22%;
		}*/
	</style>
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
                <a class="navbar-brand" href="<?php echo base_url('/');?>">Maharashtra State Board of Technical Education</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    </ul>
                </div>
                
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="margin-left:0px;">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Welcome to MSBTE/MSCIT Student Services Portal</h3>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if(!empty($this->session->flashdata('msg'))){?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('msg');?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registration</div>
                        <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url('register');?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Mobile Number" name="mobile" id="mobile" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="orig_pass" type="password" value="" required>
                                </div>
                                <input type="submit" name="sub" class="btn btn-lg btn-primary btn-block" value="Register">
								<div style="text-align:center;margin-top:10px;">
								If already registerd ? <a href="<?php echo base_url('/')?>" style="color:#337ab7;"> Go to login </a>
								</div>
                            </fieldset>
                        </form>
                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Instructions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>The portal is more efficient & versatile with latest versions of Mozilla Firefox, Google Chrome & Internet explorer 8 & above</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td> If you have any problems with Internet Explorer lower versions , Please use Mozilla Firefox or Google Chrome or Internet Explorer 8</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
	<!--<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>-->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
	<!-- Sweet Alert -->
	<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
	<?php if(@$auth == 1){ $mob_digit = substr($mobile, -4);?>
	<script>

	function otp_popup(){
		swal("Please Enter the OTP Received on ******<?php echo $mob_digit;?>.", {
		  content: "input",
		  button: {
			text: "Submit",
			//closeModal: false
		  },
		  closeOnClickOutside: false,
		})
		.then((value) => {

			if(value){
				$.ajax({
					type : "POST",
					url: "<?php echo base_url('check_otp') ?>",
					data : {otp:value,mobile:"<?php echo $mobile;?>"},
					success : function(result){
						if(result == 'succ'){
							swal({
								title: " ",
								text : "Yor Registration is Successful !!",
								icon : "success"
							}).then(function() {
								window.location.href = "<?php echo base_url('/');?>";
							});
						}else{
							swal({
								text: "Your Entered OTP is Wrong.",
								icon: "error"
							}).then(function() {
								otp_popup();
							});
						}
					}
				});
			}else{
				swal({
					text: "Please Enter OTP",
					icon: "info"
				}).then(function() {
					otp_popup();
				});
			}
		});
	
		$(".swal-content__input").attr('maxlength','4');
	}

	$(document).ready(function(){
		otp_popup();
	});
	</script>
	<?php } ?>
</body>

</html>
