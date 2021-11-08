<?php
$servername = "localhost";
$database = "beauty_parlour";
$username = "root";
$password = "";

// Create connection

$connect = mysqli_connect($servername, $username, $password, $database);

if(isset($_POST["email"]))
{
	$sql = "SELECT * FROM registration where email ='".$_POST["email"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}




if(isset($_POST["phone"]))
{
	$sql = "SELECT * FROM registration where phone ='".$_POST["phone"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}




?>