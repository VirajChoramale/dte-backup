<style>
		td{text-align:center;}
	th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
margin:20px 0px 0px 0px;}
 .table{	box-shadow: 0px 0px 20px 10px #e5e5e5;
 padding:10px;
		border-radius:10px;
		overflow-x:scroll;
		overflow-y:scroll;
		display:inline-block;
		}
		.header{
		background-color:#4f93ce;
		color:white;
		} 
		.sidebar{
		margin-top:100px;
		}
</style>

<div class="row" oncontextmenu='return false;'>
   <div class="col-lg-12 col-md-12 col-sm-12"><h3 class="page-header"><?php echo $title; ?></h3></div>
</div>
<div class="row" oncontextmenu='return false;'>
   
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div>
	     <br>
	  	 <center>
	  		<a class="btn btn-primary" href="<?php echo base_url('generateXls')?>">Export PS Bank Details</a> &nbsp; &nbsp;
			<a class="btn btn-primary" href="<?php echo base_url('generateXlsChairman')?>">Export Chairman Bank Details</a>
		 </center>
		 <br><br>
		 <table class="table table-bordered table-hover table-striped" id="permission_tbl" width="100%">
			<thead>
			   <tr class="header">
				  <th colspan="10">List</th>
			   </tr>
			   <tr class="header">
				  <th>Sr.No</th>
				  <th>Chairman Name</th>
				  <th>Paper Setter Name</th>
				  <th>Course Name</th>
				  <th>Course Code</th>
				  <th>Subject Name</th>
				  <th>Subject Code</th>
				  <th>Question Paper Uploaded by Paper Setter</th>
				  <th>Question Paper Uploaded by Chairman</th>
			   </tr>
			</thead>
			<tbody>
			   <?php 
			   $sr_no = 1;
			   //echo '<pre>'; print_r($pageData); echo '</pre>';
			   foreach($pageData as $val){
			   ?>
			   <tr>
				  <td class="text-center"><?php echo $sr_no++;?></td>
				  <td>
				  <?php
				  if($val['role'] == 'CH'){
			   
				  }else{
					echo chairman_name($val['parent']);
				  }
			      ?>
				  </td>
				  <td><?php echo $val['name'];?></td>
				  <td><?php echo $val['course_name'];?></td>
				  <td class="text-center"><?php echo $val['paper_code'];?></td>
				  <td><?php echo $val['subject_name'];?></td>
				  <td class="text-center"><?php echo $val['subject_code'];?>
				  </td>
				  <td class="text-center">
				  <?php 
				  if(!empty($val['paper_doc'])){
					echo "YES";
			      }else{
					echo "NO";
				  }
			      ?>
				  </td>
				  <td class="text-center">
				  <?php 
				  if($val['status'] == ''){
					echo "NO";
			      }else if($val['status'] == 'A'){
					echo "YES";
				  }
			      ?>
				  </td>
				  
			   </tr>
			   <?php } ?>
		   </tbody>
		</table>

      </div>
   </div>
   <!-- /.col-lg-4 -->
</div>
<!-- /.row -->

<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
$(document).ready(function(){
	$('#permission_tbl').DataTable({ responsive: true, });
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