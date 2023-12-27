<style>
td{text-align:center;}
th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{ margin:20px 0px 0px 0px; }
.table{	
	box-shadow: 0px 0px 20px 10px #e5e5e5;
	padding:10px !important;
	border-radius:10px !important;
	overflow-x:auto;
	overflow-y:auto;
}
.header{ background-color:#4f93ce;color:white; } 
.sidebar{ margin-top:100px; }
</style>
<br>
<div class="row" oncontextmenu='return false'>
   <?php if(!empty($this->session->flashdata('dir_up_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('dir_up_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <b><?php echo $title;?></b>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
                  <form role="form" method="post" action="<?php echo base_url('admin/directPaperUpload');?>" enctype="multipart/form-data">
					 
					 <div class="row">
					 	 <div class="form-group col-md-4 required">
							<label class="control-label">Select Subject Code</label>
							<select class="form-control" name="subject_code" id="subject_code" required>
								<option value="">Select</option>
								<?php foreach($timetable as $val){?>
								<option value="<?php echo $val['sub_code'];?>">
									<?php echo $val['sub_code'].' - '.$val['sub_name'];?>
								</option>
								<?php } ?>
							</select>
						 </div>
						 <div class="form-group col-md-4 required">
							<label class="control-label">Select Semester</label>
							<select class="form-control" name="semester" id="semester" required>
								<option value="">Select</option>
								<?php foreach(range(1,8) as $sem){?>
								<option value="<?php echo $sem;?>"><?php echo $sem;?></option>
								<?php } ?>
							</select>
						 </div>
						 <div class="form-group col-md-4 required">
							<label class="control-label">Upload Question Paper</label>
							<input type="file" class="form-control" name="paper_doc" id="paper_doc" required>
						 </div>
					 	 <div class="form-group col-md-4">
							<button type="submit" class="btn btn-primary" name="sub" id="sub" style="margin-top:23px;">
								Upload QP
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
					<?php ?>
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
				//$sub_details = subjectdetails($val['subject_code'])
			?>
			   <tr>
				  <td><center><?php echo $i++;?></center></td>
				  <td class="cntr"><?php echo $val['subject_code'];?></td>
				  <td class="cntr"><?php echo $val['subject_name'];?></td>
				  <td class="cntr">
					<?php $ppid = get_fid($val['paper_doc1']);?>
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
		//$("#embed_doc").removeAttr("src");
		var flname = this.id;
		//alert(flname);
		//return false;
		var extension = flname.substr( (flname.lastIndexOf('.') +1) ).toLowerCase();
		flname = btoa(flname);
		file_link ="https://online.dbatuerp.com/dbatu/index_view.php";
		$('#q').val(flname);
		$('#invisible_form').submit();
	});

});

</script>

<script>
$(document).keydown(function(event){

    if(event.keyCode == 123) { 
        return false;
    }else if(event.ctrlKey && event.shiftKey && event.keyCode == 73){        
        return false;
    }else if(event.ctrlKey && event.keyCode == 85){
        return false;
    }

});
</script>


