<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
body {font-family: Arial, Helvetica, sans-serif;}

form {
  border: 3px solid #f1f1f1;
  font-family: Arial;
}

.container {
  padding: 5px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=checkbox] {
  margin-top: 16px;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  border: none;
}

input[type=submit]:hover {
  opacity: 0.8;
}

/*p{ padding: 5px;}*/

</style>
</head>
<body>

  <div class="container">

   <center>
     <p>
      <h2><?php echo exam_year; ?> Exam</h2>
      <div><b>Pharmacy Question Paper Online Delivery <?php echo exam_year; ?></b></div>
     </p>
   </center>

  </div>
<?php 
	//print_r($paper_code);
	//print_r($password);
	//echo $inst_id;
	//print_r($day);
?>
  <div class="container" style="background-color:white">
    <p>
		Dear Sir,<br>
		Today's Question Paper's File Password as below
    </p>
    <table>
	  <tr>
		<th>Paper Code</th>
		<th>Password</th>
	  </tr>
	  <?php foreach($paper_code as $pcode){?>
	  <tr>
		<td><?php echo $pcode;?></td>
		<td>
		<?php 
			if(check_applicable($inst_id,$day,$pcode)){
				echo $password[$pcode];
			}else{
				echo 'NA';
			}
		?>
		</td>
	  </tr>
	  <?php } ?>
	</table>
  </div>
   
</body>
</html>

