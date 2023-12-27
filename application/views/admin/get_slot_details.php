<div class="col-lg-12 col-md-12 col-sm-12">

<form role="form" method="post" action="<?php echo base_url('add_qp');?>" enctype="multipart/form-data">
	<table class="table  table-hover table-striped" id="ps_table" width="100%">
		<thead>
		 
		   <tr class="header">
			  <th><center>Sr.No</center></th>
			  <th>Paper Code</th>
			  <th>Paper Name</th>
			  <th>File</th>
			  <th>Password</th>
		   </tr>
		</thead>
		<tbody>
		<?php 
		$i = 1;
		foreach($pageData as $val){
		?>
		   <tr>
			  <td><center><?php echo $i++;?></center></td>
			  <td class="cntr">
				 <?php echo $val['paper_code'];?>
				 <input type="hidden" name="paper_codes[]" value="<?php echo $val['paper_code'];?>"/>
				 <input type="hidden" name="day" value="<?php echo $val['day'];?>"/>
				 <input type="hidden" name="slot" value="<?php echo $val['slot'];?>"/>
			  </td>
			  <td class="cntr"><?php //echo $val['paper_name'];?></td>
			  <td class="cntr"><input type="file" name="doc_<?php echo $val['paper_code']  ?>" required/></td>
			  <td class="cntr"><input type="text" name="pwd_<?php echo $val['paper_code']  ?>" required/></td>
		   </tr>
		<?php } ?>
			<tr>
				<td colspan="5"><button type="submit" class="btn btn-primary" id="sub">Submit Information</button></td>
			</tr>
		</tbody>
	 </table>
</form>

</div>
   




