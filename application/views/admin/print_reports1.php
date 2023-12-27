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
<style>
.table tr th , tr td{
border:1px solid #000 !important;
}
h5{
    font-weight: 600;
    }
    th.text-center {
    font-weight: 500;
}
    
    @media print{
    .table tr th {
border:2px solid #000 !important;
}
   .table tr td {
border:2px solid #000 !important;
}
h5{
    font-weight: 600;
    }
    th.text-center {
    font-weight: 500;
}
    }

</style>
<div class="container" >
  <table class="table table-bordered table-sm" style="border: 2px solid;">
    <thead style="border: 1px solid">
		  <tr>
		      
			<th colspan="21" class="text-center" style="border-style:none !important;"> <p class='header'>Annexure D <br>(प्रपत्र ड)</p>
			</th>
		  </tr>
		  <tr>
			<th colspan="21" class="text-center" ><h4 class='header'>Region : <?php echo $regionaldata[0]['region_name']; ?></h4></th>
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
    <tbody >
        <?php 
       // print_r($regionaldata); 
        foreach($regionaldata as $rd){ 
        ?>
       	<tr>
    		<td colspan="21">
    			<h5><span><?php echo $rd['inst_name']  ?></span></h5>
    		</td>
		</tr>
		<?php
		$databyregionid = getsanctionsdatabyinst($rd['region_id'],$rd['inst_id']);
		//print_r($databyregionid);
		$g_sen_cnt = 0;
        $g_fill_cnt = 0;
        $g_vac_cnt = 0;
		foreach($databyregionid as $dcs)
		{
		?>
	       
	        <tr>
		    <td class="text-center"><?php echo $dcs['designation'] ?></td>
		    <td class="text-center"><?php echo $dcs['sensction_post']; $sen_cnt +=$dcs['sensction_post'];  ?></td>
		    <td class="text-center"><?php echo $dcs['filled_post']; $fill_cnt +=$dcs['filled_post']; ?></td>
		    <td class="text-center"><?php echo $dcs['vaccent_post']; $vac_cnt +=$dcs['vaccent_post']; ?></td>
		    <td></td>
		    <td></td>
		    <td></td>
		</tr>
		
	     <!--   <tr>-->
		    <!--<td class="text-right"><strong>Total</strong></td>-->
		    <!--<td class="text-center"><strong><?php echo $sen_cnt; $g_sen_cnt +=$sen_cnt;  ?></strong></td>-->
		    <!--<td class="text-center"><strong><?php echo $fill_cnt; $g_fill_cnt +=$fill_cnt; ?></strong></td>-->
		    <!--<td class="text-center"><strong><?php echo $vac_cnt; $g_vac_cnt +=$vac_cnt; ?></strong></td>-->
		    <!--<td></td>-->
		    <!--<td></td>-->
		    <!--<td></td>-->
		    <!--</tr>-->
	       <?php
		}
		?>
		<!--<tr>-->
		<!--    <td class="text-right"><strong>Grand Total</strong></td>-->
		<!--    <td class="text-center"><strong><?php echo $g_sen_cnt; ?></strong></td>-->
		<!--    <td class="text-center"><strong><?php echo $g_fill_cnt; ?></strong></td>-->
		<!--    <td class="text-center"><strong><?php echo $g_vac_cnt; ?></strong></td>-->
		<!--    <td></td>-->
		<!--    <td></td>-->
		<!--    <td></td>-->
		<!--    </tr>-->
		<?php
	        }
	        ?>
			
    </tbody>
  </table>
</div>

</body>
<script>
 window.print();
</script>
</html>
