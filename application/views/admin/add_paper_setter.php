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
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false;'>
   <?php if(!empty($this->session->flashdata('add_paper_setter_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_paper_setter_msg');?>
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
                  <form role="form" method="post" action="<?php echo base_url('add_paper_setter');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Paper Setter Name</label>
							<input class="form-control" name="name" id="name" required>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Email</label>
							<input class="form-control" name="email" id="email" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Mobile</label>
							<input class="form-control" name="mobile" id="mobile" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Branch</label>
							<input class="form-control" name="branch" id="branch" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Course Name</label>
							<input class="form-control" name="course_name" id="course_name" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Course Code</label>
							<input type="number" class="form-control" name="paper_code" id="paper_code" required>
						 </div>
						 <div class="form-group col-md-6 required">
							<label class="control-label">Semester</label>
							<select class="form-control" name="semester" id="semester" required>
								<option value="">Select</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						 </div>
						 <div class="form-group col-md-6 required">
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
						 </div>
					 
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
					  <th colspan="11" class="cntr">Paper Setter Details</th>
				   </tr>
				   <tr class="header">
					  <th ><center>Sr.No</center></th>
					  <th >Paper Setter Name</th>
					  <th >Email</th>
					  <th >Mobile</th>
					  <th >Branch</th>
					  <th >Course Name</th>
					  <th >Course Code</th>
					  <th >Semester</th>
					  <th >Subject Code</th>
					  <th >Institute</th>
					  <th >Username</th>
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
					  <td><?php echo $val['name'];?></td>
					  <td class="cntr"><?php echo $val['email'];?></td>
					  <td class="cntr"><?php echo $val['mobile'];?></td>
					  <td class="cntr"><?php echo $val['branch'];?></td>
					  <td class="cntr"><?php echo $val['course_name'];?></td>
					  <td class="cntr"><?php echo $val['paper_code'];?></td>
					  <td class="cntr"><?php echo $val['semester'];?></td>
					  <td class="cntr"><?php echo $val['subject_code'];?></td>
					  <td class="cntr"><?php echo $val['institute_name'];?></td>
					  <td class="cntr"><?php echo $val['username'];?></td>
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

