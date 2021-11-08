 <?php  
 //logout.php  
 session_start();  
 session_destroy();  
 echo '<script type="text/javascript">'; 
  echo 'alert("You have successfully logged out!");'; 
  echo 'window.location.href = "index.php";';
  echo '</script>';  
 ?> 