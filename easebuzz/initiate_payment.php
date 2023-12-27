<?php 
ob_start();
include('index.php');
ob_end_clean();
$CI =& get_instance();

define("BASEURL","https://shortterm.msbte.ac.in/student_service/");

if(empty($_SESSION['username']))
   header("location:".BASEURL);

$trnsaction_id = "STC".time(); 
$amount = number_format(25000, 2,'.', '');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Initiate Payment API</title>
    </head>
    <body>
        <div class="grid-container">
            <header class="wrapper">
                <div class="logo">
					<?php
					//print_r($_SESSION);
					if($_SESSION['inst_type'] == 'new')
						$home_url = BASEURL.'home';
					else
						$home_url = BASEURL.'ext_home';
					?>
                    <a href="<?php echo $home_url;?>" class="navbar-brand">
                        Maharashtra State Board of Technical Education
                    </a>
                </div>
            </header>
            
            <div class="form-container">
                <h2 style="color:#333;">INITIATE PAYMENT</h2>
                <hr>
                <form method="POST" action="<?php echo BASEURL;?>easebuzz/easebuzz.php?api_name=initiate_payment" id="init_pay">
                    <div class="main-form">
                        <h3 style="color:#333;">Mandatory Parameters</h3>
                        <hr>
						<p class="mandatory-data"><label for="amount">Amount : <?php echo $amount; ?></label></p>

                        <div class="mandatory-data">

							
							<input type="hidden" id="txnid" class="txnid" name="txnid" value="<?php echo $trnsaction_id;?>">
							
							<input type="hidden" id="amount" class="amount" name="amount" value="<?php echo $amount;?>" placeholder="<?php echo $amount;?>">
                            
							
                            <input type="hidden" id="surl" class="surl" name="surl" value="<?php echo BASEURL;?>easebuzz/response.php"> 
							
							<input type="hidden" id="furl" class="furl" name="furl" value="<?php echo BASEURL;?>easebuzz/response.php">

                            <input type="hidden" id="udf1" class="udf1" name="udf1" value="<?php echo $_SESSION['username']?>">

                            <input  type="hidden" id="udf2" class="udf2" name="udf2" value="<?php echo $_SESSION['inst_type']?>">

							<input  type="hidden" id="udf3" class="udf3" name="udf3" value="<?php echo $_SESSION['inst_type']?>">

							<input  type="hidden" id="udf4" class="udf4" name="udf4" value="<?php echo $_SESSION['inst_type']?>">

							<input  type="hidden" id="udf5" class="udf5" name="udf5" value="<?php echo $_SESSION['inst_type']?>">

							<input  type="hidden" id="udf6" class="udf6" name="udf6" value="<?php echo $_SESSION['inst_type']?>">

							<input  type="hidden" id="udf7" class="udf7" name="udf7" value="<?php echo $_SESSION['inst_type']?>">

                            <div class="form-field">
                                <label for="firstname">First Name<sup>*</sup></label>
                                <input id="firstname" class="firstname" name="firstname" value="" placeholder="<?php echo $_POST['inst_name']?>" required>
                            </div>
                    
                            <div class="form-field">
                                <label for="email">Email ID<sup>*</sup></label>
                                <input id="email" class="email" name="email" value="<?php echo $_POST['inst_email']?>"
                                placeholder="Enter your email" required>
                            </div>
                    
                            <div class="form-field">
                                <label for="phone">Phone<sup>*</sup></label>
                                <input id="phone" class="phone" name="phone" value="<?php echo $_POST['inst_phone']?>"
                                placeholder="Enter your phone" required>
                            </div>
                            
                            <div class="form-field">
                                <label for="productinfo">Product Information<sup>*</sup></label>
                                <input id="productinfo" class="productinfo" name="productinfo" value="Short Term Courses" placeholder="Apple Laptop" required>
                            </div>
                    

                        </div>
                        
                        <div class="btn-submit">
                            <button type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </body>
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
	<script>
	   $(document).ready(function(){
			$("#init_pay").submit();
	   });
	</script>
</html>