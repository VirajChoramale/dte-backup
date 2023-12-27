<?php //die("Link will be available soon"); ?>

<?php //if($_SESSION['username'] == 778899){?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>-->
<style>
		td{text-align:center;}
	th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
margin:20px 0px 0px 0px;}
 .table{	box-shadow: 0px 0px 20px 10px #e5e5e5;
 padding:10px !important;
		border-radius:10px !important;
		overflow-x:auto;
		overflow-y:auto;
		}
		.header{
		background-color:#4f93ce;
		color:white;
		} 
		.sidebar{
		margin-top:100px;
		}
		.pad5 { padding:5px; }
</style>
<style type="text/css">
        #response { padding:10px; border:1px solid; background:#ccc; }
    </style>
	<?php 
		date_default_timezone_set("Asia/Calcutta");  
	?>
<div class="row" oncontextmenu='return false'>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false'>

   <div class="col-lg-12 col-md-12 col-sm-12">
   <br>
   <ul>
   <span style="color:red;font-size: 18px;"><b>Important Instructions :</b></span>
   <!--<li style="color:red;font-size: 18px;">The Question Paper is password protected, To download the Question Paper use password: <?php echo pass_protect;?></li>-->
   <li style="color:red;font-size: 18px;">Please Use the Web Camera Enabled Device.</li>
   <li style="color:red;font-size: 18px;">Please Allow Permission to the Camera.</li>
   <li style="color:red;font-size: 18px;">Without Web Camera Permission, Question Paper Can Not be Downloaded.</li>
   </ul>
   
   </div>
 
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <b>Web Camera</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">

                  
                     
					 <div class="row">

						 
						<div class="form-group col-md-12 required">
							
							<center><div id="web_cam"></div></center>

							<div id="response"></div>

							<br/>
							
							<!--<input type="button" value="Capture Photo" onClick="">-->
							<input type="hidden" name="image" class="image-tag" id="img-tag">
						
						</div>
                        
                        <?php
                        date_default_timezone_set("Asia/Calcutta");
                        $time = date("H:i:s");
                        
                        $custm_curr_date = custm_curr_date1;
                        if($custm_curr_date=='')
                        {
                        $today_date = date('Y-m-d');
                        }else
                        {
                           $today_date = $custm_curr_date;
                        }
                        $link_on_time = link_on_time;
                        $link_on_custm = link_on_custm;
                        
                        $link_off_force = link_off_force;
                        
                        
                        if($link_off_force == 'OFF')
                        {
                           echo "<p style='text-align:center;font-size:160%;'>Link is Deactivated</p>"; 
                        }else{
                            
                        if(($link_on_time <= $time && $today_date <= date('Y-m-d')) or $link_on_custm=='ON')
                        {
                        
                        
                        ?>
						<table class="table table-bordered table-hover table-striped" id="ps_table" width="100%">
							<thead>
								<tr class="header">
								  <th colspan="11" class="cntr">Question Paper Details</th>
							   </tr>
							   <tr class="header">
								  <th><center>Sr.No</center></th>
								  <th>Paper Code</th>
								  <th style="text-align:left;">Paper Name</th>
								  <th>Total Student</th>
								  <th>Action</th>
							   </tr>
							</thead>
							<tbody>
							<?php 
							$i = 1;
							//print_r($pageData);
							foreach($pageData as $val){
							?>
							   <tr>
								  <td><center><?php echo $i++;?></center></td>
								  <td class="cntr"><?php echo $val['paper_code'];?></td>
								  <td class="cntr" style="text-align:left;"><?php echo get_paper_name($val['paper_code']);?></td>
								  <td class="cntr"><?php echo $val['candidate_count'] ?></td>
								  <td class="cntr" id="<?php echo $val['paper_code'];?>">


									<?php
									if(check_img_capture($_SESSION['inst_id'],$val['paper_code']))
									{
										?>
										<a class="btn btn-primary" onclick="submit_form_pcode('<?php echo $val['paper_code'] ?>')">Downlaod QP- <?php echo $val['paper_code']  ?></a>
										<?php
									}else
									{
										?>
										<a class="btn btn-primary" onclick="take_snapshot('<?php echo $val['paper_code'] ?>')">Capture Image</a>
										<?php
									}
									?>
									
								  </td>
							   </tr>
							<?php } ?>
							</tbody>
						 </table>
						<?php }else
						{
						    ?>
						    <script>
                                						        // Set the date we're counting down to
                                						        
                                var countDownDate = new Date("<?php echo $today_date ?> <?php echo $link_on_time ?>").getTime();
                                
                                // Update the count down every 1 second
                                var x = setInterval(function() {
                                
                                  // Get today's date and time
                                  var now = new Date().getTime();
                                    
                                  // Find the distance between now and the count down date
                                  var distance = countDownDate - now;
                                    
                                  // Time calculations for days, hours, minutes and seconds
                                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                    
                                  // Output the result in an element with id="demo"
                                  document.getElementById("demo").innerHTML = "Time remaining to activate link -  " + days + " Day, " + hours + " Hr, "
                                  + minutes + " Min, " + seconds + " Sec ";
                                    
                                  // If the count down is over, write some text 
                                  if (distance < 0) {
                                    clearInterval(x);
                                    document.getElementById("demo").innerHTML = "Link Is ON, Please Refresh Page";
                                    location.reload(true);
                                  }
                                }, 1000);
						    </script>
						    <p id="demo" style="text-align:center;font-size:160%;"></p>
						    <?php
						
						}}
						?>		
					 </div>
			

               </div>
			   
			  
            </div>
            <!-- /.row (nested) -->
         </div>
         <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

   </div>
   <!-- /.col-lg-12 -->

   
</div>
</div>

<form method="POST" id="send_pcode" action="index_view.php" target="blank">
	<input type="hidden" name="pcode" id="pcode" value="">
</form>
<!-- /.row -->
<!-- simple here configuration part a few settings and attach camera -->


<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!-- simple here configuration part a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 300,
        height: 200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#web_cam' );
  
    function take_snapshot(pcode) {
        Webcam.snap( function(web_cam_data) {
            $(".image-tag").val(web_cam_data);
            document.getElementById('response').innerHTML = '<img src="'+web_cam_data+'"/>';
			//$(".image-tag").val(web_cam_data);
			
            $.ajax({
				type : "POST",
				url  : "<?php echo base_url('capture_image');?>",
				data:{image:web_cam_data,pcode:pcode},
				success:function(data){
					
					location.reload();
				}
            });
        });
    }
</script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>

<?php if(@$res == 1){?>
<script>
$(document).ready(function(){
	$('#myModal').modal({
		backdrop: 'static',
		keyboard: false
	});
});
</script>
<?php  } ?>

<script>
function submit_form_pcode(pcode)
{
	$("#pcode").val(pcode);
	$("#send_pcode").submit();
}
$(document).ready(function(){
	
	$('#otp_btn').click(function(){
		var otp_mobile = $("#otp_mobile").val();
		var otp_email  = $("#otp_email").val();
	
		$.ajax({
			type : "post",
			url  : "<?php echo base_url('chk_otp');?>",
			data : {otp_mobile:otp_mobile,otp_email:otp_email},
			success : function(result){
				if(result == 'succ'){
					$('#myModal').modal('hide');
					if(result == 'succ'){
						alert("OTP Verification Successfull.");
						window.location.href = "<?php echo base_url('paper_down');?>";
					}
				}else{
					alert("Something Went Wrong");
				}
			}
		});
	});


});
</script>

<?php //} ?>


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