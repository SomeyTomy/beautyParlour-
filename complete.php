<?php
	include 'database.php';  
  	$data = new Databases;
	$id = $_GET['id'];
	$table = $_GET['table'];
	$condition_arr = array('status'=>3);
	$bid = 'id';


  	$data->updateData($table,$condition_arr,$bid,$id);
	echo '<script type="text/javascript">'; 
	echo 'window.location.href = "empreport.php";';
	echo '</script>';
?>
