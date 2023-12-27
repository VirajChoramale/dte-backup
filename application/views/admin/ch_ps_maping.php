
<style>
		td{vertical-align: middle !important;}
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
<div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row">
   <?php if(!empty($this->session->flashdata('map_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('map_msg');?>
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
                  <form role="form" method="post" action="<?php echo base_url('ch_ps_maping');?>" enctype="multipart/form-data">
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Chairman Name</label>
							<select class="form-control" name="chairman"  required>
								<option value="">Select</option>
								<?php foreach($chairmans as $chairman){?>
								<option value="<?php echo $chairman['id'];?>"><?php echo $chairman['name'];?></option>
								<?php } ?>
							</select>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Paper Setter Name</label>
							<select class="form-control" name="paper_setter[]" id="paper_setter" multiple required>
								<option value="">Select</option>
								<?php foreach($paper_setters as $ps){?>
								<option value="<?php echo $ps['id'];?>"><?php echo $ps['name'];?></option>
								<?php } ?>
							</select>
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
				  <th colspan="11" class="cntr">List</th>
			   </tr>
			   <tr class="header">
				  <th class="text-center">Sr.No</th>
				  <th class="text-center">Chirman Name</th>
				  <th>Paper Setter Name</th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach($chairmans as $val){
				//print_r($val);
			?>
			   <tr>
				  <td class="text-center"><?php echo $i++;?></td>
				  <td ><?php echo $val['name'];?></td>
				  <td>
				  <ul>
				  <?php 
				  $ps_list = paper_setters_assedTo_chairman($val['id']);
			      foreach($ps_list as $ps){
					echo "<li>".$ps['name']."</li>";
				  }
			      ?>
			      </ul>
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

