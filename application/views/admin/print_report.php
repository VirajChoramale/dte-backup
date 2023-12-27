<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DTE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:10px;">
  <table class="table table-bordered table-sm">
    <thead>
		  <tr>
		      
			<th colspan="21" class="text-center" style="border-style:none !important;"> <p class='header'>Annexure D <br>(प्रपत्र ड)</p>
			</th>
		  </tr>
		  <tr>
			<th colspan="21" class="text-center" ><h4 class='header'><?php echo $designame[0]['designation']; ?></h4></th>
		  </tr>
		 
		 <tr>
			<th rowspan="5" class="text-center">Institute Name<br>(संस्थेचे नाव)</th>
			<th rowspan="5" class="text-center">Sanctioned Posts <br>(मंजूर पदे)</th>
			<th rowspan="5" class="text-center">Filled Posts<br>(भरलेली पदे)</th>
			<th rowspan="5" class="text-center">Vacant Posts<br>(रिक्त पदे)े)</th>
			<th colspan="3" class="text-center">For Office use only</th>
		</tr>
		<tr>
			<th rowspan="4" class="text-center">In<br>(आत)</th>
			<th rowspan="4" class="text-center">Out<br>(बाहेर)</th>
			<th rowspan="4" class="text-center">Vacant<br>(रिक्त)</th>
		</tr>
		
		</thead>	
    <tbody>
        <?php foreach($regionaldata as $rd){ ?>
       	<tr>
		<td>
			 Region Name  : <strong><?php echo $rd['region_name']  ?></strong>
		</td>
	</tr>
	
	<?php  
	$databyregionid = getregionalvacantdata($rd['region_id'],$designame[0]['id']);
	foreach($databyregionid as $db)
	{
	?>
		<tr>
		    <td><?php echo $db['inst_name'] ?></td>
		    <td><?php echo $db['sensction_post']; $sen_cnt +=$db['sensction_post'];  ?></td>
		    <td><?php echo $db['filled_post']; $fill_cnt +=$db['filled_post']; ?></td>
		    <td><?php echo $db['vaccent_post']; $vac_cnt +=$db['vaccent_post']; ?></td>
		    <td></td>
		    <td></td>
		    <td></td>
		</tr>
	
		
		<?php } ?>
			<tr>
		    <td class="text-right"><strong>Total</strong></td>
		    <td><strong><?php echo $sen_cnt; $g_sen_cnt +=$sen_cnt;  ?></strong></td>
		    <td><strong><?php echo $fill_cnt; $g_fill_cnt +=$fill_cnt; ?></strong></td>
		    <td><strong><?php echo $vac_cnt; $g_vac_cnt +=$vac_cnt; ?></strong></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    </tr>
		<?php
        }
		?>
			<tr>
		    <td class="text-right"><strong>Grand Total</strong></td>
		    <td><strong><?php echo $g_sen_cnt; ?></strong></td>
		    <td><strong><?php echo $g_fill_cnt; ?></strong></td>
		    <td><strong><?php echo $g_vac_cnt; ?></strong></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    </tr>
    </tbody>
  </table>
</div>

</body>
<script>
 window.print();
</script>
</html>
