<style>
td{text-align:center;vertical-align: middle !important;}
th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
margin:20px 0px 0px 0px;}
 .table{	
 	  width:92% !important;
	  box-shadow: 0px 0px 20px 10px #e5e5e5;
      padding:10px;
		border-radius:10px;
		/*overflow-x:scroll;
		overflow-y:scroll;*/
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

<div class="row" oncontextmenu='return false'>
   <div class="col-lg-12 col-md-12 col-sm-12"><h3 class="page-header"><?php echo $title; ?></h3></div>
</div>
<div class="row" oncontextmenu='return false'>
   
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div>
	     <br>
		 <table class="table table-bordered table-hover table-striped" id="permission_tbl" width="100%">
			<thead>
			   <tr class="header">
				  <th colspan="9">List</th>
			   </tr>
			   <tr class="header">
				  <th>Sr.No</th>
				  <th>Course Name</th>
				  <th>Course Code</th>
				  <th>Subject Name</th>
				  <th>Subject Code</th>
				  <th>Chairman Name</th>
				  <th>Paper Setter Name</th>
				  <th>QP by PS</th>
				  <th>QP by Chairman</th>
			   </tr>
			</thead>
			<tbody>
			   <?php 
			   $sr_no = 1;
			   //echo '<pre>'; print_r($pageData); echo '</pre>';
			   foreach($pageData as $val){
				   $result = getPSByChairman($val['id']);
				   $cnt = count($result);
				   $k = 1;
				   //echo '<pre>'; print_r($val); echo '</pre>';
				   foreach($result as $res){ //echo '<pre>'; print_r($res); echo '</pre>';
			   ?>
			   <tr>
					  
					  <?php if($k==1){?>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $sr_no++;?></td>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $val['course_name'];?></td>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $val['paper_code'];?></td>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $val['subject_name'];?></td>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $val['subject_code'];?> </td>
						  <td rowspan="<?php echo $cnt;?>"><?php echo $val['name'];?></td>
						  <td>
						  <?php 
						  if($res['role'] == 'PS'){
								echo $res['name'];
						  }
					      ?>
						  </td>
						  <td>
						  <?php 
						  if($res['role'] == 'PS'){
							$chk_uload = check_paper_uploaded($res['username'],'PS');
							if(empty($chk_uload)){
								echo "NO";
							}else{
								echo "YES";
							}
						  }
						  ?>
						  </td>
						  <td>
						  <?php 
						  //echo $res['username'];
						  $chk_uload = check_paper_uploaded($res['username'],'CH');
						  if(empty($chk_uload)){
							echo "NO";
						  }else{
							echo "YES";
						  }
						  ?>
						  </td>
						 <?php }else{ ?>
						  <td>
						  <?php 
						  if($res['role'] == 'PS'){
								echo $res['name'];
						  }
					      ?>
						  </td>
						  <td>
						  <?php 
						  if($res['role'] == 'PS'){
							$chk_uload = check_paper_uploaded($res['username'],'PS');
							if(empty($chk_uload)){
								echo "NO";
							}else{
								echo "YES";
							}
						  }
						  ?>
						  </td>
						  <td>
						  <?php 
						  //echo $res['username'];
						  $chk_uload = check_paper_uploaded($res['username'],'CH');
						  if(empty($chk_uload)){
							echo "NO";
						  }else{
							echo "YES";
						  }
						  ?>
						  </td>
					  <?php } // end of else ?>
					  
			      </tr>

				  <?php $k++; } // end of foreach ?>

			   <?php  } ?>
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
	//$('#permission_tbl').DataTable({ responsive: true, });
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