<style>
td{text-align:center;}
th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
	margin:20px 0px 0px 0px;
}
 .table{	
/* 	box-shadow: 0px 0px 20px 10px #e5e5e5; */
/* 	padding:10px !important; */
	border-radius:10px !important;
	overflow-x:auto;
	overflow-y:auto;
}
/* .header{ */
/* 	background-color:#4f93ce; */
/* 	color:white; */
/* }  */
/* .sidebar{
	margin-top:100px;
} */
</style>
<?php
//print_r($editdata[0]);
?>
<div class="subContent">
<div class="row" oncontextmenu='return false;'>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <h3 class="page-header">
         <?php echo $title;?>
      </h3>
   </div>
</div>
<div class="row" oncontextmenu='return false;'>
   <?php if(!empty($this->session->flashdata('add_vaccency_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-success">
         <?php echo $this->session->flashdata('add_vaccency_msg');?>
      </div>
   </div>
   <?php } ?>
    <?php if(!empty($this->session->flashdata('error_add_vaccency_msg'))){?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="alert alert-danger">
         <?php echo $this->session->flashdata('error_add_vaccency_msg');?>
      </div>
   </div>
   <?php } ?>
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="">
         <div class="subcontenttitle">
            <b>Institute Details</b>
         </div>
         <form name="institute_details_form" id="inst_det_form" role="form" method="post" action="<?php echo base_url('add_inst_vacency_details');?>" enctype="multipart/form-data">
         <div class="panel-body">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12">
					 <div class="row">
					     <div class="form-group col-md-2 required">
							<label class="control-label">Select Regions</label>
							<select class="form-control" name="regions" id="regions" required onchange="getinst(this)">
								<option value="">Select</option>
							    <?php foreach($regiondata as $rd) { ?>	
								<option value="<?php echo $rd['id'] ?>" <?php echo isset($editdata[0]['region_id']) && $editdata[0]['region_id'] == $rd['id'] ? 'selected' : ''; ?>><?php echo $rd['region_name'] ?></option>
							    <?php } ?>
							</select>
						 </div>
						 <div class="form-group col-md-3 required">
							<label class="control-label">Name Of Institute</label>
							<select class="form-control" name="inst" id="inst" required  onchange="getlevel(this)">
								<option value="">Select</option>
							    
							</select>
						 </div>
						 <div class="form-group col-md-2 required">
							<label class="control-label">Select Level</label>
							<select class="form-control" name="level" id="level" onchange="getcourses(this)" required>
								<option value="">Select</option>
							   
							</select>
						 </div>
						 <div class="form-group col-md-3 required">
							<label class="control-label">Name of Branch/Course</label>
							<select class="form-control" name="branch" id="branchdata" onchange="getpost(this)" required>
								<option value="">Select</option>
							   
							</select>
						 </div>
						 

						 <div class="form-group col-md-2 required">
							<label class="control-label">Type of Post</label>
							<select class="form-control" name="designation" id="designation" required>
								<option value="">Select</option>
							   
							</select>
						 </div>
					 
					 </div>
					 <div class="row">
						 <div class="form-group col-md-4 required">
							<label class="control-label">Number Of Sanctioned Post</label>
							<input type="number" class="form-control" name="senction_post" id="senction_post" value ="<?php echo isset($editdata[0]['sensction_post']) && $editdata[0]['sensction_post'] ? $editdata[0]['sensction_post'] : ''; ?>" required <?php echo isset($editdata[0]['sensction_post'])? '' : 'disabled'; ?>>
						 </div>
						 <div class="form-group col-md-4 required">
							<label class="control-label">Number of Filled post</label>
							<input type="number" class="form-control" name="filled_post" id="filled_post" value ="<?php echo isset($editdata[0]['filled_post']) && $editdata[0]['filled_post'] ? $editdata[0]['filled_post'] : ''; ?>" required disabled>
						 </div>
						 <div class="form-group col-md-4 required">
							<label class="control-label">Vacant Post</label>
							<input type="number" class="form-control" name="vaccent_post" id="vaccent_post" value ="<?php echo isset($editdata[0]['vaccent_post']) && $editdata[0]['vaccent_post'] ? $editdata[0]['vaccent_post'] : '0'; ?>" required readonly>
						
						 </div>
					 </div>
			
                    <?php 
                    if(isset($editdata[0]))
                    {
                    ?>
                    <input type="hidden" class="form-control" name="updateid" id="updateid" value ="<?php echo $updateid; ?>">
                        <center>	<button class="btn btn-primary send_password text-center" type="submit" name="update" >
						Update
					</button></center>
                    <?php
                    }
                    else
                    {
                    ?>
                    <center>	<button class="btn btn-primary send_password text-center" type="submit" name="add" >
						Submit
					</button></center>
                    <?php
                    }
                    ?>
				   
                  
               </div>
			   
			  
            </div>
            <!-- /.row (nested) -->
         </div>
         <!-- /.panel-body -->
      </div>
      </form>
      <!-- /.panel -->
<div class="subcontenttitle">Institute Vaccency Details </div>
					  <!--<th rowspan="11"><a href="<?php echo base_url('print_report');?>" class="btn btn-danger" role="button" target="_blank">Print Report</a></th>-->
				   
      	<div class="table table-responsive">
			<table class="table table-bordered table-hover table-striped" id="ps_table" width="100%">
				<thead>
					
				   <tr class="">
					  <th ><center>Sr.No</center></th>
					   
					  <th >Institute Name</th>
					  <th >Branch/Course</th>
					  <th >Designation</th>
					  <th >Sanctioned Post</th>
					  <th >Fill Post</th>
					  <th >Vacant Post</th>
					  <th >Action</th>
					  
				   </tr>
				</thead>
				
				<tbody>
				
			<?php  
			
			$sr=1;
			foreach ($all_data as $data){ ?>
			
			<tr >
				<td><?php echo $sr++;?></td>
				<td><?php echo $data['inst_name']?></td>
				<td><?php echo $data['coursename']?></td>
				<td><?php echo $data['designation']?></td>
				<td><?php echo $data['sensction_post']?></td>
				<td><?php echo $data['filled_post']?></td>
				<td><?php echo $data['vaccent_post']?></td>
				<td style="display:flex;"> 
				<a href="<?php echo base_url('institute_details_update/'.$data['id']);?>" ><i class="fa fa-edit" style="font-size:24px; color:Green; padding:0px 10px;"></i></a>
				<i class="fa fa-trash" style="font-size:24px;color:red;padding:0px 10px;" onclick = "deleterow(<?php echo $data['id']?>)"></i>
				
				</td>
				</tr>
				<?php }?>
				</tbody>
			 </table>
	   </div>

   </div>
   <!-- /.col-lg-12 -->

    
   
</div>
</div>
</div>
<!-- /.row -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>

<script>


function getinst(seldata)
{
    var region_id = seldata.value;
    $.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_inst');?>",
			data : {region_id:region_id},
			success : function(data){
			   // console.log(data);
				var result = JSON.parse(data);
				//console.log(result);
				var cnt = result.length;
				var editRegionId = <?php echo isset($editdata[0]['inst_id']) ? $editdata[0]['inst_id'] : 'null'; ?>;
				var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
				    var selected = (editRegionId == result[i]['id']) ? 'selected' : '';
					html += '<option value="'+result[i]['id']+'"'+selected+'>'+result[i]['inst_name']+'</option>';
				}
				$("#inst").html(html);
			}
		});
}
function getlevel(seldata)
{
    var inst_id = seldata.value;
    $.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_inst_level');?>",
			data : {inst_id:inst_id},
			success : function(data){
			   // console.log(data);
				var result = JSON.parse(data);
				console.log(result);
				var cnt = result.length;
				var editRegionId = <?php echo isset($editdata[0]['course_level_id']) ? $editdata[0]['course_level_id'] : 'null'; ?>;
				var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
				    var selected = (editRegionId == result[i]['course_level_id']) ? 'selected' : '';
					html += '<option value="'+result[i]['course_level_id']+'"'+selected+'>'+result[i]['course_level_name']+'</option>';
				}
				$("#level").html(html);
			}
		});
    
}
function getpost(seldata)
{
    var level_id  = $("#level").val();
    $.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_post');?>",
			data : {level_id:level_id},
			success : function(data){
			    //console.log(data);
				var result = JSON.parse(data);
				//console.log(result);
				var editRegionId = <?php echo isset($editdata[0]['desigation_id']) ? $editdata[0]['desigation_id'] : 'null'; ?>;
				var cnt = result.length;
				var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
				    var selected = (editRegionId == result[i]['id']) ? 'selected' : '';     
					html += '<option value="'+result[i]['id']+'"'+selected+'>'+result[i]['designation']+'</option>';
				}
				$("#designation").html(html);
				toggleTextboxes();
			}
		});
}

function getcourses(seldata)
{
    var level_id = seldata.value;
    var inst_id  = $("#inst").val();
    $.ajax({
			type : "POST",
			url  : "<?php echo base_url('get_inst_course');?>",
			data : {inst_id:inst_id,level_id:level_id},
			success : function(data){
			   // console.log(data);
				var result = JSON.parse(data);
				//console.log(result);
				var editRegionId = <?php echo isset($editdata[0]['course_id']) ? $editdata[0]['course_id'] : 'null'; ?>;
				var cnt = result.length;
				var html = '<option value="">Select</option>';
				for(i=0;i<cnt;i++){
				    var selected = (editRegionId == result[i]['course_id']) ? 'selected' : '';
					html += '<option value="'+result[i]['course_id']+'" '+selected+'>'+result[i]['coursename']+'</option>';
				}
				$("#branchdata").html(html);
			}
		});
    
}

</script>
<script>
$(document).keydown(function (event) {
    if(event.keyCode == 123) { // Prevent F12
        return false;
    }else if(event.ctrlKey && event.shiftKey && event.keyCode == 73){ // Prevent Ctrl+Shift+I        
        return false;
    }else if(event.ctrlKey && event.keyCode == 85){
	   return false;
    }
});

$(document).ready(function() {
  $("#filled_post").on('input',function() {
   var senction_post = parseInt($("#senction_post").val());
   var filled_post = parseInt($(this).val());
   var vaccent = $("#vaccent_post");
   if(filled_post > senction_post)
   {
       alert("Filled Value Can't be more then Senction Value");
       vaccent.val('');
   }
   else
   {
      var vaccent_post = senction_post -filled_post;
      vaccent.val(vaccent_post);
      
   }
  });
  
    $("#senction_post").on('input',function() {
   var filled_post = parseInt($("#filled_post").val());
   var senction_post = parseInt($(this).val());
   var vaccent = $("#vaccent_post");
   if(filled_post > senction_post)
   {
       alert("Filled Value Can't be more then Senction Value");
       vaccent.val('');
   }
   else
   {
      var vaccent_post = senction_post -filled_post;
      vaccent.val(vaccent_post);
      
   }
  });
})



function deleterow(id)
{
    var btn = event.target;
   $.ajax({
			type : "POST",
			url  : "<?php echo base_url('deleterow');?>",
			data : {rowid:id},
			success : function(data){
			    console.log(data);
                $(btn).closest("tr").remove();
			
			}
		});  
}
</script>

<?php {
if(isset($editdata[0]['region_id']))
{
?>
<script>
     $(document).ready(function () {
    });
    
    $(document).ready(function () {
    triggerChange('#regions')
        .then(function () {
            
            return delay(500); // Adjust delay as needed
        })
        .then(function () {
            return triggerChange('#inst');
        })
        .then(function () {
            return delay(1000);
        })
        .then(function () {
            return triggerChange('#level');
        })
        .then(function () {
            return delay(1500);
        })
        .then(function () {
            return triggerChange('#branchdata');
        })
        .catch(function (error) {
            console.error('Error:', error);
        });

    function triggerChange(selector) {
        return new Promise(function (resolve, reject) {
            $(selector).on('change', function () {
                //toggleTextboxes();
                console.log(selector + ' change event triggered.');
                resolve();
            }).trigger('change');
        });
    }

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
});


</script>
<?php } }?>

<script>
//$(document).ready(function() {
    function toggleTextboxes()
    {
        //alert();
         var regions = $("#regions").val();
          var inst = $("#inst").val();
           var designation = $("#designation").val();
            var branchdata = $("#branchdata").val();
             //var designation = $("#designation").val();
          if(regions !='' && inst !==''  && branchdata!=='' && designation!='')
          {
              $("#senction_post,#filled_post").prop("disabled",false);
          }
          else
          {
              $("#senction_post,filled_post").prop("disabled",true);
          }
    }
    $("#regions,#inst,#designation,#branchdata").change(function (){
        toggleTextboxes();
    });
    
//});

</script>


