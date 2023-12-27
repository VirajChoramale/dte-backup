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
   <?php if(!empty($this->session->flashdata('ps_sel_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('ps_sel_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <b>Ramdom Paper Set Selection</b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <form role="form" method="post" action="<?php echo base_url('generatepaperSet');?>" enctype="multipart/form-data">
					 
					 <div class="row">
					 	 <div class="form-group col-md-4 required">
							<label class="control-label">Date</label>
							<select class="form-control" name="date" id="date" required>
								<option value="">Select</option>
								<?php foreach($examDates as $date){?>
								<option value="<?php echo $date['date'];?>">
									<?php echo date("d-m-Y",strtotime($date['date']));?>
								</option>
								<?php } ?>
							</select>
						 </div>
					 	 <div class="form-group col-md-4">
							<button type="submit" class="btn btn-primary" name="sub" id="sub" style="margin-top:23px;">
								Click Here to Select Random Paper Sets
							</button>
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

  <!-- Modal -->
  <div class="col-lg-12">

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">View Document</h4>
				</div>
				<div class="modal-body" id="embed_doc">
					<?php
					
					
					?>
				</div>
			</div>
			
		</div>
		
	</div>

  </div>
  <!-- Modal End -->
    
    <div class="col-lg-12 col-md-12 col-sm-12">
		<table class="table  table-hover table-striped" id="ps_table" width="100%">
			<thead>
				<tr class="header">
				  <th colspan="11" class="cntr">Paper Set Details</th>
			   </tr>
			   <tr class="header">
				  <th><center>Sr.No</center></th>
				  <th>Course Code</th>
				  <th>Course Name</th>
				  <th>Subject Code</th>
				  <th>Subject Name</th>
				  <th>View QP</th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach($pageData as $val){
				//echo '<pre>'; print_r($val); echo '</pre>';
				$sub_details = subjectdetails($val['subject_code'])
			?>
			   <tr>
				  <td><center><?php echo $i++;?></center></td>
				  <td><?php echo $sub_details['paper_code'];?></td>
				  <td class="cntr"><?php echo $sub_details['course_name'];?></td>
				  <td class="cntr"><?php echo $val['subject_code'];?></td>
				  <td class="cntr"><?php echo $sub_details['subject_name'];?></td>
				  <td class="cntr">
					<!--<a class="view_doc" id="<?php echo $val['paper_doc'];?>"><b>View Question Paper</b></a>-->
					<?php $ppid = get_fid($val['paper_doc']);?>
					<a class="view_doc" id="<?php echo $ppid;?>" scode="<?php echo $val['subject_code'];?>"><b>View Question Paper</b></a>
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
$(document).ready(function(){
    
	$('#ps_table').DataTable();
	
	$(document).on("click",".view_doc",function(){
	//$(".view_doc").click(function(){
		$("#embed_doc").removeAttr("src");
		var flname = this.id;
		//alert(flname);
		var extension = flname.substr( (flname.lastIndexOf('.') +1) ).toLowerCase();
		flname = btoa(flname);
		file_link ="https://online.dbatuerp.com/dbatu/index_view.php";
		$('#q').val(flname);
		$('#invisible_form').submit();
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


