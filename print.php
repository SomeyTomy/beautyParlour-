<?php
 

 $id = $_GET['id'];

 include 'database.php';  
$data = new Databases;
include("dbcon.php");
session_start();
$email = $_SESSION['email'];

 $condition_arr = array('email'=>$email);
    $user = $data->getData('registration','*',$condition_arr);
    $reg_id = $user[0]['reg_id'];




 $sql = "SELECT *,booking.id as id FROM booking INNER JOIN time ON booking.time_id = time.time_id INNER JOIN payment ON payment.book_id = booking.id  where booking.reg_id=$reg_id and  id = $id  ORDER BY booking.status,booking.book_date, time.stime";

$result = mysqli_query($conn, $sql);



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
	<style> 
    .qr-code { 
      max-width: 200px; 
      margin: 10px; 
    } 
  </style> 
</head>
<script type="text/javascript">
	window.print();
</script>
<body style="">
	<div style="border-style: solid;padding: 10px;">
		<h1 style="text-align:center;"><u>Golden Queen</u></h1>
		<h3 style="text-align:center;">Near Cultural Society of, Angamaly, Kerala 683572</h3>
		<?php
		while($row = $result->fetch_assoc()) {
	    echo "<p>Booking Id: " . "<b>BP".$row["id"]."</b></p>"; ?><p>Book Date: <b><?php echo($row["book_date"]);?></b></p>
					  <div class="container-fluid"> 
					    <div class="text-center"> 
				
					      <img src= 
					"https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
					        class="qr-code img-thumbnail img-responsive" /> 
					    	<p>Amount Paid:<b><?php echo($row['amount'])?></b></p>
					    </div> 
					  </div> 
		  <?php
	  	}
	  	?>
	</div>
</body>
	<script src= 
	"https://code.jquery.com/jquery-3.5.1.js"> 
	</script> 

	<script> 
	// Function to HTML encode the text 
	// This creates a new hidden element, 
	// inserts the given text into it  
	// and outputs it out as HTML 
	function htmlEncode(value) { 
	return $('<div/>').text(value) 
	.html(); 
	} 

	$(function () { 

	// Specify an onclick function 
	// for the generate button 
	$('#generate').click(function () { 

	// Generate the link that would be 
	// used to generate the QR Code 
	// with the given data  
	let finalURL = 
	'https://chart.googleapis.com/chart?cht=qr&chl=' + 
	htmlEncode($('#content').val()) + 
	'&chs=160x160&chld=L|0' 

	// Replace the src of the image with 
	// the QR code image 
	$('.qr-code').attr('src', finalURL); 
	}); 
	}); 
	</script> 


</html>