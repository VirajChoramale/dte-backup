<style>
		td{text-align:center;}
	th{vertical-align:middle !important;text-align:center; }
.cntr{ text-align:center; }
.instruction {color :red;}
.page-header{
margin:20px 0px 0px 0px;}
 .table{
		
		box-shadow: 0px 0px 20px 10px #e5e5e5;
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

<div class="row" oncontextmenu='return false'>
   <div class="col-lg-12 col-md-12 col-sm-12"><h3 class="page-header"><?php echo $title; ?></h3></div>
</div>
<div class="row" oncontextmenu='return false'>
   
   <div class="col-lg-12 col-md-12 col-sm-12">
      <div>
	     <div class="col-lg-12 col-md-12 col-sm-12">
		<table class="table  table-hover table-striped" id="ps_table" width="">
			<thead>
				<!--<tr class="header">
				  <th colspan="8" class="cntr">tttt</th>
			   </tr> -->
			   <tr class="header">
				  <th><center>Sr.No</center></th>
				  <th>Institute Code</th>
				  <th>Mobile Number</th>
				  <th>Mobile OTP</th>
				  <th>Email ID</th>
				  <th>Email OTP</th>
				  <th>Date</th>
				  <th>Download Status</th>
				 
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
				  
				  <td><?php echo $val['username'];?></td>
			 	  <td class="cntr"><?php echo $val['mobile'];?></td>
				  <td class="cntr"><?php echo $val['otp_mobile'];?></td>
				  <td class="cntr"><?php echo $val['email'];?></td>
				  <td class="cntr"><?php echo $val['otp_email'];?></td>
				  <td class="cntr"><?php echo $val['created_date'];?></td>
				  <td class="cntr"><?php echo $val['status'];?></td>
			   </tr>
			<?php } ?>
			</tbody>
		 </table>
		 <br>

   </div>
		
		 
      </div>
   </div>
   <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<script>
// JavaScript popup window function
	function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=500,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
	}

</script>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
<script>
$(document).ready(function(){
	$('ps_table').DataTable({ responsive: true, });
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