<?php
$q = $_POST[q];
$q = base64_decode($q);
$servername = "localhost";
$username = "onlinedbatuerp_dev";
$password = "Vm007009!@12";
$dbname = "onlinedbatuerp_dbatu_w22";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `ps_doc_bank` where id='$q'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//print_r($row);

$conn->close();




// Store the file name into variable
$file     = $row['paper_doc1'];
$filename = $row['paper_doc1'];

// Header content type
header('Content-type: application/pdf');

header('Content-Disposition: inline; filename="' . $filename . '"');

header('Content-Transfer-Encoding: binary');

header('Accept-Ranges: bytes');

// Read the file
@readfile('protected_pdf/'.$file);
?>
