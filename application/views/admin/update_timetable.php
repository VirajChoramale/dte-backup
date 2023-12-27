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
<div class="row" oncontextmenu='return false;'>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false;'>
   <?php if(!empty($this->session->flashdata('add_chairman_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_chairman_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <b>To be filled by admin</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <form role="form" method="post" action="<?php echo base_url('add_timetable');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Add Subject Code</label>
							<input class="form-control" name="sub_code" id="sub_code" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Add Subject Name</label>
							<input class="form-control" name="sub_name" id="sub_name" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Add Date</label>
							<input class="form-control" name="date" id="date" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Exam Start Time</label>
							<input class="form-control" name="exam_to" id="exam_to" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Exam End Time</label>
							<input class="form-control" name="exam_from" id="exam_from" required>
						 </div>
						<!-- <div class="form-group col-md-6 required">
							<label class="control-label">Activate</label>
							<input type="number" class="form-control" name="paper_code" id="paper_code" required>
						 </div>-->
						 <div class="form-group col-md-6 required">
							<label class="control-label">Add Paper type</label>
							<select class="form-control" name="paper_type" id="paper_type" required>
								<option value="">Select</option>
								<option value="E">Engineering</option>
								<option value="P">Pharmacy</option>
								<option value="V">Vocational</option>
								
							</select>
						 </div>
						 <!--<div class="form-group col-md-6 required">
							<label class="control-label">Subject Name</label>
							<input class="form-control" name="subject_name" id="subject_name" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Subject Code</label>
							<input class="form-control" name="subject_code" id="subject_code" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Institute Name</label>
							<input class="form-control" name="institute_name" id="institute_name" required>
						 </div>-->
					 
					 </div>
			
					 <div class="row">
					 	 <div class="col-lg-12 col-md-12 col-sm-12">
							<button type="submit" class="btn btn-primary" id="sub">Submit Information</button>
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

    <div class="col-lg-12 col-md-12 col-sm-12">
		<table class="table  table-hover table-striped" id="ps_table" width="100%">
			<thead>
				<tr class="header">
				  <th colspan="11" class="cntr">Timetable Details</th>
			   </tr>
			   <tr class="header">
				  <th ><center>Sr.No</center></th>
				  <th >Subject Code</th>
				  <th >Subject Name</th>
				  <th >Date</th>
				  <th >Exam Start time</th>
				  <th >Exam End time</th>
				  <th >Paper type</th>
				  <th >Update</th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach($pageData as $val){
				//print_r($val);
				
			?>
			  <tr>
				  <td><center><?php echo $i++;?></center></td>
				  <td><?php echo $val['sub_code'];?></td>
				  <td class="cntr"><?php echo $val['sub_name'];?></td>
				  <td class="cntr"><?php echo $val['date'];?></td>
				  <td class="cntr"><?php echo $val['exam_to'];?></td>
				  <td class="cntr"><?php echo $val['exam_from'];?></td>
				  <td class="cntr"><?php echo $val['paper_type'];?></td>
				  <td>
					<a href='update_timetable?id=".$val[id]."'>Edit</a>
					
				  </td>
			   </tr> 
			<?php } ?>
			</tbody>
		 </table>
   </div>
   
</div>
</div>
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
$(document).ready(function(){
    $('#ps_table').DataTable();
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


