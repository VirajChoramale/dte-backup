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
								<option value="<?php echo $exam_date['day'];?>" <?php if($exam_date['date']==custm_curr_date){ echo "selected";} ?>>
									<?php echo 'Day : '.$exam_date['day'].' - Date : '.date("d-m-Y",strtotime($exam_date['date']));?>
								</option>
								<?php } ?>
							</select>
						 </div>

						 <div class="form-group col-md-6 required">
							<label class="control-label">Slot</label>
							<select class="form-control" name="slot" id="slot" required>
								
								<option value="2">Slot 2</option>
							</select>
						 </div>
					 
					 </div>
			
				

                  
               </div>
               
               
               
               <div class="col-lg-12 col-md-12 col-sm-12">
                  
                     
					 <div class="row">

						 <div class="form-group col-md-6 required">
							<label class="control-label">RBTE</label>
							<select class="form-control" name="rbte" id="rbte" required>
								<option value="">Select</option>
								
								<?php
								if($_SESSION['role']=='ADMIN')
                                {
								?>
								<option value="all" selected>All</option>
								<option value="1">RBTE Mumbai</option>
                                <option value="2">RBTE Pune</option>
                                <option value="3">RBTE Nagpur</option>
                                <option value="4">RBTE Aurangabad</option>
								<?php
                                }else
                                {
								?>
				
								
				  <option selected value=<?php if($_SESSION['username']=='rbte_mumbai' ){ echo "1"; }
                   else if($_SESSION['username']=='rbte_pune'){ echo "2"; }
                   else if($_SESSION['username']=='rbte_nagpur'){ echo "3"; }
                   else if($_SESSION['username']=='rbte_aurangabad'){ echo "4"; }?>>
                       <?php  
                        if($_SESSION['username']=='rbte_mumbai' ){ echo "RBTE Mumbai"; }
                   else if($_SESSION['username']=='rbte_pune'){ echo "RBTE Pune"; }
                   else if($_SESSION['username']=='rbte_nagpur'){ echo "RBTE Nagpur"; }
                   else if($_SESSION['username']=='rbte_aurangabad'){ echo "RBTE Aurangbad"; }
                       ?></option>
					<?php
                                }
					?>
							</select>
						 </div>

						 <div class="form-group col-md-6 required"><br>
							<button class="btn btn-primary" id="btn_submit">Submit</button>
						 </div>
					 
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
		<div id="show_report"></div>
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
    $('#ps_table').DataTable();

	$("#exam_date").change(function(){
		var day = this.value;
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_slots');?>",
			data : {day:day},
			success : function(data){
				var result = JSON.parse(data);
				var cnt = result.length;
				//var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
					html += '<option selected value="'+result[i]['slot']+'">'+result[i]['slot']+'</option>';
				}
				$("#slot").html(html);
			}
		});
	});

	$(document).on("click","#btn_submit",function(){
		var slot = $("#slot").val();
		var day  = $("#exam_date").val();
		var rbte  = $("#rbte").val();
		
		if(day=='')
		{
		    alert("Please Select Date");
		    return false;
		}
		
		
		if(slot=='')
		{
		    alert("Please Select Slot");
		    return false;
		}
		//alert(day);
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_downlaod_report_ajax');?>",
			data : {day:day,slot:slot,rbte:rbte},
			beforeSend: function(){
                             $("#show_report").html('<p>Loading...</p>');
                           },
			success : function(data){
				$("#show_report").html(data);
			}
		});
	});
	
	

	$(".send_password").click(function(){
		var paper_code = this.id;
		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('send_password');?>",
			data : {paper_code:paper_code},
			success : function(data){
				console.log(data);
			}
		});
	});

});

function open_img(src_img,inst_id,pcode,pcode_down_time,img_cap_time_pcode)
{
    if(src_img!='')
    {
        $('#img01').attr("src","");
        $("#inst_img").html('');
        $("#pcode_img").html('');
        $("#down_time_pcode").html('');
        $("#img_cap_time_pcode").html('');
        $.ajax({
    			type : "POST",
    			url  : "<?php echo base_url('get_rawdata_cap_img');?>",
    			data : {img_path:src_img},
    			beforeSend: function(){
    			    
                   
                               },
    			success : function(data){
    			   
    			    inst_id  = inst_id.padStart(4,"0");
    			    $("#inst_img").html(''+inst_id+'');
    			    $("#pcode_img").html(''+pcode+'');
    			    $("#down_time_pcode").html(''+pcode_down_time+'');
    			    $("#img_cap_time_pcode").html(''+img_cap_time_pcode+'');
    			     $('#myModal').modal('show');
    				$('#img01').attr("src","data:image/png;base64," + data);
    			}
    	});
    }
   
}

function allow_edit(inst_id,pcode){
	if(confirm("Are you sure to allow download to "+inst_id+" for "+pcode)){

		$.ajax({
			type : "POST",
			url  : "<?php echo base_url('allow_edit');?>",
			data : {inst_id:inst_id,pcode:pcode},
			success : function(data){
				if(data == 'succ'){
					alert("Download allowed to "+inst_id+" for "+pcode);
					$("#btn_submit").trigger("click");
				}
			}
		});
	}
}

</script>
<!--<script>
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
</script>-->


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Capture Image of Inst Id : <d id="inst_img"></d> For Paper Code : <d id="pcode_img"> </h4>
        </div>
        <div class="modal-body">
          Image Captured Time : <d id="img_cap_time_pcode"></d><br><br>
          QP Download Time : <d id="down_time_pcode"></d><br><br>
          <img id="img01" height="500" width="500" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>

<!-- The Modal 
<div id="myModal" class="modal">

  
  <span class="close">&times;</span>

  
  <img class="modal-content" id="img01">

 
  <div id="caption"></div>
</div>-->

