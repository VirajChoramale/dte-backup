<div class="col-lg-12 col-md-12 col-sm-12">
	   <font color='red'><h3 class="instruction" >Instructions :</h3>
<!-- 	   <p> Unless  Confirmed, Question Paper will be not uploaded. Once Confirmed Question Paper can not be changed.</p> -->
	  </font>
</div>
<div class="row" oncontextmenu='return false'>
   <div class="col-lg-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
 
<div class="row" oncontextmenu='return false'>
   <?php if(!empty($this->session->flashdata('add_paper_msg'))){?>
   <div class="col-lg-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_paper_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <b>To be upload by Admin</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12">
                  <form role="form" method="post" action="<?php echo base_url('add_q_paper');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
						    
							<label class="control-label">Select Subject </label>
							<select class="form-control" name="sub_code" id="sub_code" required>
								<option value="">Select</option>
								<?php foreach($subject_data as $sub_data){?>
								<option value="<?php echo $sub_data['subject_code'].':'.$sub_data['semester'].':'.$sub_data['subject_name'];?>">
								    <?php echo $sub_data['subject_code'].'-'.$sub_data['subject_name'].'('.$sub_data['name'].')';?>
								</option>
								<?php } ?>
							</select>
						 </div>
						 
						 <div class="form-group col-md-6 required">
							<label class="control-label">Paper Setter Name</label>
							<input type="text" class="form-control" name="ps_name" id="ps_name"  required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Upload Question Paper</label>
							<input type="file" class="form-control" name="paper_doc" id="paper_doc" onchange="return fileValidation(this);" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Model Answer Paper</label>
							<input type="file" class="form-control" name="model_paper_doc" id="model_paper_doc" onchange="return fileValidation(this);" required>
						 </div>

					 </div>
			
<!-- 					 <div class="row"> -->
<!-- 					     <div class="form-group col-md-12"> -->
<!-- 							<label> -->
<!-- 								<input type="checkbox" required/>  -->
<!-- 								 I downloaded the question paper set which is set by the paper setter and verified and uploaded. -->
<!-- 							</label> -->
<!-- 					</div> -->
					 	 <div class="col-md-12">
							<button type="submit" class="btn btn-primary" id="sub">Submit Information</button>
						 </div>
					 </div>

                  </form>
               </div>
			  
            </div>

         </div>
         <!-- /.panel-body -->
      </div>
      <!-- /.panel -->

			 

   
   <!-- /.col-lg-12 -->
   
       <div class="col-lg-12">
					<table class="table table-bordered table-hover table-striped" id="permission_tbl" width="100%">
						<thead>
							<tr>
							  <th colspan="11">Admin Uploaded Q. Paper Details</th>
						   </tr>
						   <tr>
							  <th><center>Sr.No</center></th>
							  <th>Paper Setter Name</th>
							  <th>Course Code</th>
							  <th>Subject Code</th>
<!-- 							  <th>Question Paper Uploaded by Paper Setter</th> -->
<!-- 							  <th>Download Question Paper</th> -->
							  <th>Question Paper Uploaded by Admin</th>
<!-- 							  <th>Model Answer Paper Uploaded by Paper Setter</th> -->
<!-- 							  <th>Download Model Answer Paper</th> -->
							  <th>Model Answer Paper Uploaded by Admin</th>
						   </tr>
						</thead>
						<tbody>
						<?php 
						$i = 1;
						foreach($pageData as $val){
							//echo '<pre>'; print_r($val); echo '</pre>';
						?>
						   <tr>
							  <td><center><?php echo $i++;?></center></td>
							  <td><?php echo $val['name'];?></td>
							  <td class="cntr"><?php echo $val['paper_code'];?></td>
							  <td class="cntr"><?php echo $val['subject_code'];?></td>
							  
							  <td class="cntr">
							  <?php if(!empty($val['paper_doc1'])){
                               
							   $ppid = get_fid($val['paper_doc1']);
							   
// 							   if($val['confirm_flg']=='1'){
// 							          echo "<font color='red'><b>Question Paper Confirmed.</b></font>";

// 							   }else if($val['confirm_flg']=='0'){

							   ?>
								<a class="view_doc" id="<?php echo $ppid;?>" utype="QP"><b>View Question Paper</b></a>

								<!-- <a href="<?php echo base_url('chaiman_update1/'.base64_encode($val['id']));?>" class="btn btn-success dwnl-btn" onclick='return Confirm();' >Confirm</a> -->

							  <?php //} }else{ echo 'Not Uploaded';
							  } ?>
							  </td>
							  <td>
							  <?php if(!empty($val['model_paper_doc1'])){
								$ppid = get_fid1($val['model_paper_doc1']);	  
							  ?>
								<a class="view_doc" id="<?php echo $ppid;?>" utype="MA"><b>View Model Answer</b></a>
							  <?php }else{ echo 'Not Uploaded'; } ?>
							  </td>
						   </tr>
						<?php } ?>
						</tbody>
					 </table>
			   </div>

</div>
</div>

<form id="invisible_form" action="https://online.dbatuerp.com/dbatu/index_view.php" method="post" target="_blank">
  <input id="q" name="q" type="hidden" value="default">
</form>

<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
function Confirm(){
var cnfrm=confirm("Are you sure to confirm? Once Confirmed Question Paper cannot be changed.");
return cnfrm;
}
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
$(document).ready(function(){

    $(".view_doc").click(function(){
		$("#embed_doc").removeAttr("src");
		var utype = $(this).attr('utype');
		var flname = this.id;
		var extension = flname.substr( (flname.lastIndexOf('.') +1) ).toLowerCase();
		flname = btoa(flname);

		if(utype == "QP"){
			file_link ="https://online.dbatuerp.com/dbatu/index_view.php";
		}else if(utype == "MA"){
			file_link ="https://online.dbatuerp.com/dbatu/index_view1.php";
		}
		
		$("#invisible_form").attr("action",file_link);
		$('#q').val(flname);
		$('#invisible_form').submit();
	});

	$(".view_doc1").click(function(){
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

	$("#ifsc_code").change(function () {      
	   var inputvalues = $(this).val();      
	   var reg = /[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$/;    
		if (inputvalues.match(reg)) {    
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('bank_details'); ?>",
				data : {ifsc:inputvalues},
				success:function(result){
					result = result.split(":");
					console.log(result);
					
					if(result[0] != 'Invalid IFSC'){
						$("#bank_name_addr").val(result[0]+','+result[1]);	
						$("#bank_branch").val(result[2]);	
					}
				}
			});    
		}    
		else {    
			 $("#ifsc").val("");    
			alert("You entered invalid IFSC code");    
			//document.getElementById("txtifsc").focus();    
			return false;    
		}    
	});

});

</script>


