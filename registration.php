<?php

include 'database.php';  
$data = new Databases;  

$success_message = '';  
 if(isset($_POST["submit"]))  
 {      

    $password=$_POST["password"];  
           $password = md5($password);
            $insert_data = array(  
            'fname' => mysqli_real_escape_string($data->con, $_POST['fname']),
            'address' => mysqli_real_escape_string($data->con, $_POST['address']),
            // 'pincode' => mysqli_real_escape_string($data->con, $_POST['pincode']),
            'email' => mysqli_real_escape_string($data->con, $_POST['email']),
            'phone' => mysqli_real_escape_string($data->con, $_POST['phone']),
            'password' => mysqli_real_escape_string($data->con, $password),
     
        );  

      if($data->insert('registration', $insert_data))  
      {  
           echo '<script type="text/javascript">'; 
            echo 'alert("Thank You For Registering");'; 
            echo 'window.location.href = "login.php";';
            echo '</script>';
      }       
 } 
 
?>  
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>SMBarber - Responsive HTML5 Template</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="css/colors.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="barber_version">

    <!-- LOADER -->
    <div id="preloader">
        <div class="cube-wrapper">
		  <div class="cube-folding">
			<span class="leaf1"></span>
			<span class="leaf2"></span>
			<span class="leaf3"></span>
			<span class="leaf4"></span>
		  </div>
		  <span class="loading" data-name="Loading">SMBarber Loading</span>
		</div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">

        <!-- Sidebar-wrapper -->
       <div id="sidebar-wrapper">
            <div class="side-top">
                <div class="logo-sidebar">
                    <a href="index.html"><img src="images/logos/icon.jpg" alt="image" style="width:200px; height:150px;"></a>
                </div>
                <ul class="sidebar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMSqNHVGmKXwTSHqdlLKLcpXtDdrWBvRjWxtWtLKzgwhQHhxKgNZxzQcSjPQtsdmjpsDhQb">Contact</a></li>
                    <li><a href="login.php">Login Now</a></li>
                </ul>
            </div>
        </div>
        <!-- End Sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
            <div class="all-page-bar" style="background-image:url('uploads/slider.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="title title-1 text-center">
								<div class="title--heading">
									<h1>REGISTRATION</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="index-3.html">Home</a></li>
									<li class="active">Registration</li>
								</ol>
								<div class="much">
									<img src="uploads/mustache.png" alt=""/>
								</div>
							</div>
							<!-- .title end -->
						</div>
					</div>
				</div>
			</div><!-- end all-page-bar -->

            <section class="section nopad cac text-center">
                <a href="#"><h3>Interesting our awesome barber services? Just drop an appointment form below!</h3></a>
            </section>

            <div id="contact" class="section wb">
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <small>LET'S MAKE AN CONTACT FOR YOUR LIFE</small>
                        <h3>Register Now</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact_form" style="background-color: white;">
                                <div id="message"></div>
                                <form id="registrationform" class="row" name="registrationform" method="post">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" pattern="[A-Za-z ]{3,}" title="Invalid Offer Name (Only Alphabets and Spaces)">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" pattern="[A-Za-z ]{3,}" title="Invalid Offer Name (Only Alphabets and Spaces)">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Email-id</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                            <p id="email_error"></p>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" maxlength="10">
                                            <p id="phone_error"></p>
                                        </div>


                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Confirm Password</label>
                                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Your Password">
                                        </div>


                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Commuincation Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address for Communication"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <!-- <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">Submit</button> -->
                                            <input type="submit" id="submit" name="submit" value="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <div id="map" class="map-box">
                <div class="container-fluid">
                    
                </div><!-- end container -->
            </div><!-- end section -->

<div class="copyrights">
                <div class="container-fluid">
                    <div class="footer-distributed">
                        <div class="footer-left">
                            <p class="footer-links">
                                <a href="index.php">Home</a>
                                <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMSqNHVGmKXwTSHqdlLKLcpXtDdrWBvRjWxtWtLKzgwhQHhxKgNZxzQcSjPQtsdmjpsDhQb">Contact</a>
                                <a href="admin/gentelella-master/production/login.php">Admin Login</a>
                            </p>
                        </div>

                        
                    </div>
                </div><!-- end container -->
            </div><!-- end copyrights -->
        </div>
    </div><!-- end wrapper -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
	<script src="js/responsive-tabs.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>




      <!-- <script src="./js/jquery-2.1.3.min.js"></script> -->
      <script src="./js/jquery.validate.min.js"></script>
      <script src="./js/validate.js"></script>




<script>  
 $(document).ready(function(){  
   $('#email').blur(function(){

     var email = $(this).val();
     $.ajax({
      url:'availability.php',
      method:"POST",
      data:{email:email},
      success:function(data)
                {
                    if(data != '0')
                    {
                      $('#email_error').html('<b><span class="text-danger">Email Is Already Taken</span></b>');
                      $('#submit').attr("disabled",true);
                    }
                    else
                    {
                      $('#email_error').html('');
                      $('#submit').attr("disabled",false); 
                    }
                }
     })
  });
   $('#phone').blur(function(){

     var phone = $(this).val();
     $.ajax({
      url:'availability.php',
      method:"POST",
      data:{phone:phone},
      success:function(data)
                {
                    if(data != '0')
                    {
                      $('#phone_error').html('<b><span class="text-danger">Phone Number Is Already Linked With Another Account</span></b>');
                      $('#submit').attr("disabled",true);
                    }
                    else
                    {
                      $('#phone_error').html('');
                      $('#submit').attr("disabled",false); 
                    }
                }
     })
  });

 });  
</script>




</body>
</html>