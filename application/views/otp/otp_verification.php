<style>
td{text-align:center;}
th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
	margin:20px 0px 0px 0px;
}
.table{	
	box-shadow: 0px 0px 20px 10px #e5e5e5;
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
</style>
<div class="row" oncontextmenu='return false'>
   <div class="col-lg-10 col-md-10 col-sm-10">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false'>
   <?php if(!empty($this->session->flashdata('otp_msg'))){?>
   <div class="col-lg-10 col-md-10 col-sm-10">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('otp_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-10 col-md-10 col-sm-10">
      <div class="panel panel-default">

         <div class="panel-heading">
            <b>
				OTP has been send to xxxxxx<?php echo substr($mobOtp[0]['mobile'], -4);?>
			</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">



                  <form role="form" method="post" action="<?php echo base_url('otp_verification');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Enter OTP Received on OTP</label>
							<input class="form-control" name="otp" id="otp" title="Enter OTP" required maxlength='4'>
						 </div>
						 
						 <div class="form-group col-md-12">
							<span id="box_header"></span><a href="javascript:void(0);" id="resend_otp"><b>Resend OTP</b></a>
						 </div>
					 
					 </div>
			
					 <div class="row">
					 	 <div class="col-lg-12 col-md-12 col-sm-12">
							<button type="submit" class="btn btn-primary" id="sub">Validate</button>
						 </div>
					 </div>

                  </form>
				  
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
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
$(document).ready(function(){

   $("#resend_otp").click(function(){
		$(this).hide();
		

		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('resend_otp')?>",
			data : {status:"1"},
			success : function(data){
				if(data == 1){
					swal({
					  title: "OTP",
					  text: "OTP send to mobile number successfully."
					});

					var elapsed_seconds = 0;
					var interval = setInterval(function() {
					   elapsed_seconds = elapsed_seconds + 1;
					   $('#box_header').text(get_elapsed_time_string(elapsed_seconds));
					   
					   if(elapsed_seconds === 30){
							clearInterval(interval);
							$("#box_header").text("");
							$("#resend_otp").show();
					   }

					}, 1000);

				}else{
					swal({
					  title: "OTP",
					  text: "Something Went Wrong."
					});
				}
			}
		});
	});


});

</script>

<script>
// disable right click
$(document).keydown(function (event) {
    if(event.keyCode == 123){
        return false;
    }else if(event.ctrlKey && event.shiftKey && event.keyCode == 73){        
        return false;
    }else if(event.ctrlKey && event.keyCode == 85){
	    return false;
    }
});

 function get_elapsed_time_string(total_seconds) {

	  function pretty_time_string(num) {
		return ( num < 10 ? "0" : "" ) + num;
	  }

	  var hours = Math.floor(total_seconds / 3600);
	  total_seconds = total_seconds % 3600;

	  var minutes = Math.floor(total_seconds / 60);
	  total_seconds = total_seconds % 60;

	  var seconds = Math.floor(total_seconds);

	  // Pad the minutes and seconds with leading zeros, if required
	  hours = pretty_time_string(hours);
	  minutes = pretty_time_string(minutes);
	  seconds = pretty_time_string(seconds);

	  // Compose the string for display
	  var currentTimeString = hours + ":" + minutes + ":" + seconds + " (Wait 30s) ";

	  return currentTimeString;
}



</script>


