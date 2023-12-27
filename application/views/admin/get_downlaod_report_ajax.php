<table class="table table-bordered  table-hover" width="100%">
	<thead>
		<tr class="header">
		  <th colspan="11" class="cntr">Overall Report</th>
	   </tr>
	   <tr class="header">
		  <th><center>Sr.No</center></th>
		  <th>PCODE</th>
		  <th>Total Institue</th>
		  <th><?php echo date_format(date_create(get_date_frm_day($day)),'d-m-Y'); ?> Logged-In Inst</th>
		  <th>Total not Download</th>
	   </tr>
	</thead>
	<tbody>
	    <?php 
		$sr_no = 1;
		$date = get_date_frm_day($day);
		$count_login = last_login_rep($date,$day,$rbte);
		foreach($daywise_pcode as $p_code){
		?>
		<tr>
			<td><?php echo $sr_no; ?></td>
			<td><?php echo $p_code['paper_code']; ?></td>
			<td><?php echo pcodewise_insts($p_code['paper_code'],$rbte);?></td>
			<?php
		if($sr_no==1)
		{
			?>
			<td rowspan="<?php echo count($daywise_pcode);?>" style="vertical-align : middle;text-align:center;" >  <center><?php echo $count_login; ?></center>   </td>
			<?php
		}
			?>
			<td><?php echo pcodewise_insts_not_download($p_code['paper_code'],$rbte);?></td>
		</tr>
		<?php $sr_no++; } ?>
	</tbody>
</table>
<br>
<table class="table table-bordered  table-hover" width="100%">
			<thead>
				<tr class="header">
				  <th colspan="11" class="cntr">Instwise Downloaded Report</th>
			   </tr>
			   <tr class="header">
				  <th><center>Sr.No</center></th>
				  <th>RBTE</th>
				  <th>Inst ID</th>
				  <th>Inst Name</th>
				  <th>Chief Office Incharge Name</th>
				  <th>Mobile</th>
				  <th>Total Student</th>
				  <th>Last Login Details</th>
				  
				  <?php
				  foreach($daywise_pcode as $pcode)
				  {
				      ?>
				      <th><?php echo $pcode['paper_code'] ?></th>
				      <?php
				  }
				  ?>
				 
			   </tr>
			</thead>
			<tbody>
			<?php 
			$i = 1;
			
			foreach($daywise_inst as $val){
				//print_r($val);
				$inst_id = $val['exam_center'];
				$coi_details = fetch_coi_details($inst_id);
				
			?>
			   <tr>
				    <td><?php echo $i; $i++; ?></td>
				    <td><?php echo get_rbte_name($val['region']);?></td>
				    <td><?php echo $val['exam_center'];?></td>
				    <td style="text-align: left;"><?php echo fetch_inst_name($val['exam_center']);?></td>
				    <td><?php if(!empty($coi_details)){ echo $coi_details[0]['name'];} ?></td>
				    <td><?php if(!empty($coi_details)){ echo $coi_details[0]['mobile'];} ?></td>
				    <td><?php echo $val['std_cnt']; ?></td>
				    <td><?php echo last_login_for_rep($coi_details[0]['mobile'],$date);?></td>
				    <?php
				  foreach($daywise_pcode as $pcode)
				  {
					   if(check_applicable($inst_id,$day,$pcode['paper_code']))
					  {
						  $img_path = cap_img_name($inst_id,$pcode['paper_code']);
						  $arr = pcode_downlaoded_status($inst_id,$pcode['paper_code']);
						  if($img_path['image_path']!='')
						  {
						  ?>
						  <td><a href="javascript:void(0)" onclick="open_img('<?php echo $img_path['image_path'] ?>','<?php echo $inst_id ?>','<?php echo $pcode['paper_code']; ?>','<?php echo $arr['pcode_down_time']?>','<?php echo $img_path['image_cap_time'] ?>')"><?php echo $arr['msg'];   ?></a>
						  
						  <?php
								if($_SESSION['role']=='ADMIN' && $arr['msg'] != "<font style='color:red'>No</font>")
                                {
								?>
						  <br><br>
								 <a href="javascript:void(0)" onclick="allow_edit('<?php echo $inst_id ?>','<?php echo $pcode['paper_code']; ?>')">Allow Edit</a>

								 <?php } ?>
						  </td>
						  <?php
						  }else
						  {
							 ?>
						   <td>
								 <?php  echo $arr['msg']; ?>
						   </td>   
							 <?php
						  }
					  }else
					  {
						 ?>
						<td>NA</td>
						<?php
					  }
				  }
				  ?>
				   
			   </tr>
			<?php } ?>
			</tbody>
		 </table>