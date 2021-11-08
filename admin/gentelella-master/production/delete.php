<?php
	include '../../../database.php';  
  	$data = new Databases;




	// $id = $_GET['id'];
	$table = $_GET['table'];
	$back = $_GET['back'];

	$condition_arr = array($_GET['idname']=>$_GET['id']);
	$data->deleteData($table,$condition_arr);
	header("location:$back.php");

?>