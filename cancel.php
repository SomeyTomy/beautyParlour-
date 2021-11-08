<?php
	include 'database.php';  
  	$data = new Databases;
	$id = $_GET['id'];
	$table = $_GET['table'];
	$condition_arr = array('status'=>4);
	$bid = 'id';
	$amount =  $_GET['amount'];

	$amount = $amount - ($amount*5/100);

  	$data->updateData($table,$condition_arr,$bid,$id);
	echo '<script type="text/javascript">'; 
?>
	alert("Booking Cancelled...Rs <?php echo $amount;?> Refunded");
<?php
	echo 'window.location.href = "viewbook.php";';
	echo '</script>';
?>
