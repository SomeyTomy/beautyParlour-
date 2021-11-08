<?php 
  


$image = $_GET['name'];
$path = "../../../document/";


$path .= $image;

// The location of the PDF file 
// on the server 
$filename = $path; 
  
// Header content type 
header("Content-type: application/pdf"); 
  
header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
readfile($filename); 
  




?>