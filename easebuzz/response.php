<?php
	ob_start();
	include('index.php');
	ob_end_clean();
	$CI =& get_instance(); 
	define("BASEURL","https://shortterm.msbte.ac.in/student_service/");
    include_once('easebuzz-lib/easebuzz_payment_gateway.php');
	date_default_timezone_set("Asia/Calcutta"); 
    $SALT = "2E63EJQCRJ";
    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
    $result = $easebuzzObj->easebuzzResponse($_POST);
	$result = json_decode($result, true);
	$chk_tx=$result["data"]["status"];
	
	if($chk_tx=="success")
	{
		 echo "<br><font color=green size=3><center>Your Payment Has Been Successfully Completed. </center></font><br>";
		 $data['app_id']   = $result["data"]["udf1"];	  
		 $data['type']     = $result["data"]["udf3"];
		 $data['sub_type'] = $result["data"]['udf4'];
		 $data['easebuzz'] = $result["data"]["easepayid"];	  
		 $data['status']   = $result["data"]["status"];
		 $data['email']    = $result["data"]["email"];
		 $data['phone']    = $result["data"]["phone"];
		 $data['amt']      = $result["data"]["amount"];
		 $data['trans_id'] = $result["data"]["txnid"];
		 $data['response_date'] = date('d-m-Y H:i:s a');
		 $data['f_code']   = 'Ok';
		 
		 $CI->db->where('app_id', $data['app_id']);
		 $CI->db->where('trans_id', $data['trans_id']);
		 $CI->db->update('paystatus',$data);
	 ?>
	 <br><br>
	 <center>
	 <script>
	 function printDiv() {
		  document.getElementById("print_div").style.visibility = "hidden";
		  document.getElementById("r_link").style.visibility    = "hidden";
		  window.print();
	 }
	 </script>
	 <p><button type="button" onclick="printDiv();" id="print_div"> Print </button></p>
	 <table width="50%" id="print_tbl">
	 	<tr>
			<td colspan="2" style="text-align:center;"><h3>Maharashtra State Board of Technical Education<h3></td>
		</tr>
		<tr>
			<td>Name : </td>
			<td><?php echo $result["data"]["firstname"];?></td>
		</tr>
		<tr>
			<td>Amount (In Rs.) : </td>
			<td><?php echo $result["data"]["amount"];?> /-</td>
		</tr>
		<tr>
			<td>Transaction Id : </td>
			<td><?php echo $result["data"]["txnid"];?></td>
		</tr>
		<tr>
			<td>Payment Gateway Id : </td>
			<td><?php echo $result["data"]["easepayid"];?></td>
		</tr>
		<tr>
			<td>Date & Time : </td>
			<td><?php echo date('d-m-Y h:i:s a');?></td>
		</tr>
		<tr>
			<td>Application Category : </td>
			<td>
			<?php 
			if($result["data"]["udf3"] == '2' && $result["data"]["udf4"] == 'NC'){ 
				echo 'MSCIT Name Change Service'; 
			}else if($result["data"]["udf3"] == '2' && $result["data"]["udf4"] == 'DC'){
				echo 'MSCIT Duplicate Certificate Service';
			}else if($result["data"]["udf3"] == '1' && $result["data"]["udf4"] == 'NC'){
				echo 'MSBTE Name Change Service';
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<center>
			<a href="https://shortterm.msbte.ac.in/student_service/" id="r_link">Click here to login again</a>
			</center>
			</td>
		</tr>
	 </table>
	 </center>
	 <?php
	 }
	 else if ($chk_tx=="userCancelled") 
	 {
		 echo "<font color=red size=3><center>Your payment process is cancel by user.</center></font>"; 
		 $data['app_id']   = $result["data"]["udf1"];	  
		 $data['type']     = $result["data"]["udf3"];
		 $data['sub_type'] = $result["data"]['udf4'];
		 $data['easebuzz'] = $result["data"]["easepayid"];	  
		 $data['status']   = $result["data"]["status"];
		 $data['email']    = $result["data"]["email"];
		 $data['phone']    = $result["data"]["phone"];
		 $data['amt']      = $result["data"]["amount"];
		 $data['trans_id'] = $result["data"]["txnid"];
		 $data['response_date'] = date('d-m-Y H:i:s a');
		 $data['f_code']   = 'C';
		 
		 $CI->db->where('app_id', $data['app_id']);
		 $CI->db->where('trans_id', $data['trans_id']);
		 $CI->db->update('paystatus',$data);
	 ?>
	 <br><br>
	 <center>
	 <table width="50%">
		<tr>
			<td>Name : </td>
			<td><?php echo $result["data"]["firstname"];?></td>
		</tr>
		<tr>
			<td>Amount (In Rs.) : </td>
			<td><?php echo $result["data"]["amount"];?> /-</td>
		</tr>
		<tr>
			<td>Transaction Id : </td>
			<td><?php echo $result["data"]["txnid"];?></td>
		</tr>
		<tr>
			<td>Payment Gateway Id : </td>
			<td><?php echo $result["data"]["easepayid"];?></td>
		</tr>
		<tr>
			<td colspan="2">
				<center>
					<a href="https://shortterm.msbte.ac.in/student_service/">Click here to login again</a>
				</center>
			</td>
		</tr>
	 </table>
	 </center>

	 <?php
	 }
	 else
	 { 
		 echo "<br><font color=red size=3><center>Your payment process Fail, Please try again.</center></font><br>";
		 $data['uid']      = $result["data"]["udf1"];	  
		 $data['type']     = $result["data"]["udf2"];
		 $data['sub_type'] = $result["data"]['udf4'];
		 $data['easebuzz'] = $result["data"]["easepayid"];	  
		 $data['status']   = $result["data"]["status"];
		 $data['email']    = $result["data"]["email"];
		 $data['phone']    = $result["data"]["phone"];
		 $data['amt']      = $result["data"]["amount"];
		 $data['trans_id'] = $result["data"]["txnid"];
		 $data['response_date'] = date('d-m-Y H:i:s a');
		 $data['f_code']   = 'F';
	
		 $CI->db->where('uid', $data['uid']);
		 $CI->db->where('trans_id', $data['trans_id']);
		 $CI->db->update('paystatus',$data);
	 ?>
	 <br><br>
	 <center>
	 <table width="50%">
		<tr>
			<td>Name : </td>
			<td><?php echo $result["data"]["firstname"];?></td>
		</tr>
		<tr>
			<td>Amount (In Rs.) : </td>
			<td><?php echo $result["data"]["amount"];?> /-</td>
		</tr>
		<tr>
			<td>Transaction Id : </td>
			<td><?php echo $result["data"]["txnid"];?></td>
		</tr>
		<tr>
			<td>Payment Gateway Id : </td>
			<td><?php echo $result["data"]["easepayid"];?></td>
		</tr>
		<tr>
			<td colspan="2">
			<center>
			<a href="https://shortterm.msbte.ac.in">Click here to login again</a>
			</center>
			</td>
		</tr>
	 </table>
	 </center>
	 <?php
	 }
?>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}
table {
  border-collapse: collapse;
  width: 50%;
}
th, td {
  padding: 15px;
}
</style>

