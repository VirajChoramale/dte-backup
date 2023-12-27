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
</style>
<div class="row" oncontextmenu='return false'>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false'>
   <?php if(!empty($this->session->flashdata('add_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="panel panel-default">

         <div class="panel-heading">
            <b>To be filled by Insitutes</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <form role="form" method="post" action="<?php echo base_url('add_srpd');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Institute Code</label>
							<input class="form-control" name="institute_code" id="institute_code" pattern="[0-9]{4}" title="Enter Four Digit Institute code" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Institute Name</label>
							<input class="form-control" name="institute_name" id="institute_name" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Mobile Number </label>
							<p><Strong>Note:</strong>(Exam Controller)</p>
							<input class="form-control" name="mobile" id="mobile" pattern="[0-9]{10}" title="Enter 10 Digit Mobile Number" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Email ID </label>
							<p><Strong>Note:</strong>(Exam Controller)</p>
							<input type="email" class="form-control" name="email" required>
						 </div>
						 
						 <div class="form-group col-md-6 required">
							<label class="control-label">Computer MAC Address</label>
							<input class="form-control" name="mac_addr" id="mac_addr" required>
						 </div>

						  
						 <div class="form-group col-md-6 required">
							<label class="control-label">Scanned PDF Upload</label>
							<p><Strong>Note:</strong>Scanned PDF must be letter head signed by Principal mentioning Instiute Exam Controller Name, Mobile No. and Email ID for Paper Downloading on Exam day.</p>
							<input type="file" class="form-control" name="paper_doc" id="paper_doc" onchange="return fileValidation(this);" required>
						 </div>
						 
						 
						
						 
					 
					 </div>
			
					 <div class="row">
					 	 <div class="col-lg-12 col-md-12 col-sm-12">
							<button type="submit" class="btn btn-primary" id="sub">Submit Information</button>
						 </div>
					 </div>

                  </form>
				  <p><Strong>Note:</strong>Computer Machine must have good Quality Web Cam for Paper Downloading on exam day.</p>
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

   $(".view_doc").click(function(){
		$("#embed_doc").removeAttr("src");
		var flname = this.id;
		var extension = flname.substr( (flname.lastIndexOf('.') +1) ).toLowerCase();;
		if(extension == 'pdf'){
			var url = "<?php echo base_url('uploads/');?>"+this.id;
		}else{
			var url = "https://docs.google.com/gview?url=<?php echo base_url('uploads/');?>"+this.id+"&embedded=true";
		}
		var html ='';
		if(url != ""){
			//html += '<embed src="'+url+'" width="100%" height="500" type="application/pdf">';
			html += '<iframe src="'+url+'" width="100%" height="500" type="application/pdf"></iframe>';
 			$("#embed_doc").html(html);
			$('#myModal').modal('show');
		}
	});

	

});

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


