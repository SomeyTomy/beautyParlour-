<?php
	include '../../../database.php';  
  	$data = new Databases;
	$id = $_GET['id'];
	$table = $_GET['table'];
	$condition_arr = array('status'=>2);

	$bid = 'id';
  	$data->updateData($table,$condition_arr,$bid,$id);
	echo '<script type="text/javascript">'; 
	echo 'alert("Amount Is Successfully Trnasfer To Registred Bank Account");'; 
	echo 'window.location.href = "booking.php";';
	echo '</script>';

?>