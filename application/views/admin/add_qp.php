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
<div class="row" oncontextmenu='return false;'>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false;'>
   <?php if(!empty($this->session->flashdata('add_qp_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_qp_msg');?>
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
                  
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">Date</label>
							<select class="form-control" name="exam_date" id="exam_date" required>
								<option value="">Select</option>
								<?php foreach($exam_dates as $exam_date){?>
								<option value="<?php echo $exam_date['day'];?>">
									<?php echo date("d-m-Y",strtotime($exam_date['date']));?>
								</option>
								<?php } ?>
							</select>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Slot</label>
							<select class="form-control" name="slot" id="slot" required>
								<option value="">Select</option>
								<option value="">Select</option>
							</select>
						 </div>
					 
					 </div>
			
					<div class="row" id="op">

					</div>

                  
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
		<table class="table table-bordered" id="ps_table" width="100%">
			<thead>
				<tr class="header">
				  <th colspan="11" class="cntr">QP Uploaded Details</th>
			   </tr>
			   <tr class="header">
				  <th><center>Sr.No</center></th>
				  <th>Paper Code</th>
				  <th>Paper Name</th>
				  <th>Date</th>
				  <th>Password</th>
				  <th>Question Paper</th>
				  <th>Send Password</th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$custm_curr_date = custm_curr_date;
			$curr_day = get_day_frm_date($custm_curr_date);
			$i = 1;

			foreach($pageData as $val){
				//echo '<pre>'; print_r($val); echo '</pre>';
				$rowspan = get_day_qp_count($val['day']);
				if($curr_day == $val['day'])
				{
			?>
			   <tr>
				  <td><center><?php echo $i++;?></center></td>
				  <td class="cntr"><?php echo $val['paper_code'];?></td>
				  <td style="text-align:left;"><?php echo get_paper_name($val['paper_code']); ?></td>
				  <td class="cntr"><?php echo get_qp_date($val['paper_code']);?></td>
				  <td class="cntr"><?php echo $val['password'];?></td>
				  <td class="cntr">
				    <form method="POST" id="send_pcode" action="index_view.php">
				        <input type="hidden" name="pcode" id="pcode" value="">
				    </form>
					<a href="#" onclick="send_pocde('<?php echo $val['paper_code'] ?>')">View</a>
				  </td>
				  <?php if(@$temp != $val['day']){?>
				  <td rowspan="<?php echo $rowspan; ?>" style="vertical-align:middle;border-left:1px solid #ddd;">
				  	
					<button class="btn btn-primary send_password" type="button" name="send_password" id="<?php echo $val['day']; ?>">
						Send Password
					</button>
					
				  </td>
				  <?php } ?>
			   </tr>
			<?php 
			$temp = $val['day'];
			}} 
			?>
			</tbody>
		 </table>

		 <div id="op"></div>
   </div>
   
</div>
</div>
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>

function send_pocde(pcode)
{
    $("#pcode").val(pcode);
    $("#send_pcode").submit();
}

$(document).ready(function(){
    //$('#ps_table').DataTable();

	$("#exam_date").change(function(){
		var day = this.value;
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_slots');?>",
			data : {day:day},
			success : function(data){
				var result = JSON.parse(data);
				var cnt = result.length;
				var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
					html += '<option value="'+result[i]['slot']+'">'+result[i]['slot']+'</option>';
				}
				$("#slot").html(html);
			}
		});
	});

	$(document).on("change","#slot",function(){
		var slot = this.value;
		var day  = $("#exam_date").val();
		//alert(day);
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_slot_details');?>",
			data : {day:day,slot:slot},
			success : function(data){
				$("#op").html(data);
			}
		});
	});

	$(".send_password").click(function(){
		var day = this.id;
		$(this).attr("disabled","disabled");
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('send_password');?>",
			data : {day:day},
			success : function(data){
				//$("#op").html(data);
				if(data == "succ"){
					swal({
					  title: "",
					  text: "Credentials send Successfully."
					});
					$("#"+day).removeAttr("disabled");
				}
			}
		});
	});

});

</script>
<script>
// disable right click
$(document).keydown(function (event) {
    if(event.keyCode == 123) { // Prevent F12
        return false;
    }else if(event.ctrlKey && event.shiftKey && event.keyCode == 73){ // Prevent Ctrl+Shift+I        
        return false;
    }else if(event.ctrlKey && event.keyCode == 85){
	   return false;
    }
});
</script>


