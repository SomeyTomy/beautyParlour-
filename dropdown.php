<?php
$servername = "localhost";
$database = "beauty_parlour";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection Failed");

// Check connection

$sql = "SELECT * FROM employee";
$query = mysqli_query($conn,$sql) or die ("Query Unsccessful");

$str = "";


while ($row = mysqli_fetch_assoc($query)) {
	$str .= "<option value='{$row['emp_id']}'>{$row['emp_name']}</option>";
}
echo $str;
?>