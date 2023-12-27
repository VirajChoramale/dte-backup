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
		<table class="table  table-hover table-striped" id="ps_table" width="100%">
			<thead>
				<tr class="header">
				  <th colspan="11" class="cntr">Chairman Details</th>
			   </tr>
			   <tr class="header">
				  <th ><center>Sr.No</center></th>
				  <th >Chairman Name</th>
				  <th >Email</th>
				  <th >Mobile</th>
				  <th >Institute</th>
				  <th >Subject Code</th>
				  <th >Subject Name</th>
				  <th>Paper Date </th>
				  <th> Document </th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach($pageData as $val){
// 			    echo '<pre>';
// 				print_r($val);
			    $ppid = get_fid($val['paper_doc1']);
			?>
			   <tr>
				  <td><center><?php echo $i++;?></center></td>
				  <td><?php echo $val['name'];?></td>
				  <td class="cntr"><?php echo $val['email'];?></td>
				  <td class="cntr"><?php echo $val['mobile'];?></td>
				  <td class="cntr"><?php echo $val['institute_name'];?></td>
				  <td class="cntr"><?php echo $val['subject_code'];?></td>
				  <td class="cntr"><?php echo $val['subject_name'];?></td>
				  <td class="cntr"><?php echo $val['date'];?></td>
				  <td class="cntr"><a class="view_doc" id="<?php echo $ppid;?>" utype="QP"><b>View Question Paper</b></a></td>
			   </tr>
			<?php } ?>
			</tbody>
		 </table>
   </div>
   
</div>
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
								
							</div>
						</div>
						
					</div>
					
				</div>

			</div>
			<!-- Modal End -->
<!-- </div> -->
<!-- /.row -->
<form id="invisible_form" action="https://online.dbatuerp.com/dbatu/index_view.php" method="post" target="_blank">
  <input id="q" name="q" type="hidden" value="default">
</form>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
$(document).ready(function(){
    $(".view_doc").click(function(){
		$("#embed_doc").removeAttr("src");
		var utype = $(this).attr('utype');
		var flname = this.id;
		var extension = flname.substr( (flname.lastIndexOf('.') +1) ).toLowerCase();
		flname = btoa(flname);

		if(utype == "QP"){
			file_link ="https://online.dbatuerp.com/dbatu/index_view.php";
		}
		$("#invisible_form").attr("action",file_link);
		$('#q').val(flname);
		$('#invisible_form').submit();
	});
	});
</script>
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


