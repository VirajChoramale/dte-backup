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
   
    <div class="col-lg-12 col-md-12 col-sm-12">
		
		<table class="table  table-hover table-striped" id="ps_table" width="100%">
			<thead>
			   <tr class="header">
				  <th><center>Sr.No</center></th>
				  <th>Date</th>
				  <th>Subaject Code</th>
				  <th>Subject Name</th>
				  <th>Available Qp Sets</th>
				  <th>Used Paper Sets</th>
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			foreach($pageData as $val){
				$avl_cnt = available_QpSets($val['sub_code']);
				if($avl_cnt == 0){
				    $bg = "red;color:white";
				}else{
				    $bg = "white";
				}
			?>
			   <tr style="background:<?php echo $bg;?>">
				  <td><center><?php echo $i++;?></center></td>
				  <td><?php echo $val['date'];?></td>
				  <td class="cntr"><?php echo $val['sub_code'];?></td>
				  <td class="cntr"><?php echo $val['sub_name'];?></td>
				  <td class="cntr"><?php echo $avl_cnt;?></td>
				  <td>
				  <?php 
				  $used_cnt = usedPaperSets($val['sub_code']);
				  echo $used_cnt;
				  ?>
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
    $("#date").change(function(){
		var url = "<?php echo base_url('detail_paper_report');?>";
		//alert(url);
		window.location.href = url+"/"+(this.value);
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


