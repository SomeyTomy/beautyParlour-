<?php
include './../dbcon.php';  


$emp_id = $_GET['id'];
$checkDate = $_GET['empdate'];


$sql = "SELECT * FROM time WHERE time_id NOT IN (SELECT time_id from booking WHERE emp_id =".$emp_id. " and book_date ="."'".$checkDate."')";


$query = mysqli_query($conn,$sql);

$result = mysqli_fetch_all($query);



$output = '';

$output = '<option value="" selected>-- Select Time ---</option>';


foreach ($result as $key) {
  
           $output.='<option value="'.$key[0].'">'.$key[1]." - ".$key[2]."</option>";
}




echo $output;



