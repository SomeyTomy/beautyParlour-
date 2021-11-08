<?php

include 'database.php';  
$data = new Databases;
session_start(); 



 if(isset($_POST["login"]))  
  {  
        if($_POST["user"]=="customer")
        {
              $email = mysqli_real_escape_string($data->con, $_POST['email']);
              $phone = mysqli_real_escape_string($data->con, $_POST['phone']);
              $password = md5($_POST["password"]);


              $condition_arr = array(
                                'email'=>$email,
                                'phone'=>$phone,
                              );
              $result = $data->getData('registration','*',$condition_arr);  
              if ($result > 0) 
              {
                $temp = "email";
                $update_arr = array(
                                'password'=>$password,
                              );
                $data->updateData('registration',$update_arr,$temp,$email);
                echo "<script>alert('Successfully Reset Your Password')</script>";
              }
              else
              {
                echo "<script>alert('Email Address And Phone Is Not Matching')</script>";
              }
        }
        else
        {
            $email = mysqli_real_escape_string($data->con, $_POST['email']);
            $phone = mysqli_real_escape_string($data->con, $_POST['phone']);
            $password = md5($_POST["password"]);


              $condition_arr = array(
                                'emp_email'=>$email,
                                'emp_phn'=>$phone,
                              );
              $result = $data->getData('employee','*',$condition_arr);  
              if ($result > 0) 
              {

                $temp = "emp_email";
                $update_arr = array(
                                'emp_password'=>$password,
                              );
                $data->updateData('employee',$update_arr,$temp,$email);

                echo "<script>alert('Successfully Reset Your Password')</script>";

              }
              else
              {
                echo "<script>alert('Email Address And Phone Is Not Matching')</script>";
              }
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
									<h1>Forgot Password?</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="index-3.html">Home</a></li>
									<li class="active">Forgot Password?</li>
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

            <div id="appointment" class="section wb">
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <small>LET'S MAKE AN APPOINTMENT FOR YOUR LIFE</small>
                        <h3>Forgot Password?</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
						
                        <div class="col-md-6">
                            <div class="contact_form">
                                <div id="message"></div>
                                <form method="post" id="registrationform" name="registrationform" action="">
                                    <fieldset class="row-fluid">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="radio" name="user" id="user" value="customer" checked>
                                            <label>Customer</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <input type="radio" name="user" id="user" value="employee">
                                            <label>Employee</label>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                                        </div>





                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
                                        </div>






                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <a href="login.php" style="color:white">Login Now?</a> 
                                            <br>
                                            <br>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="text-align:right;">
                                        <a href="registration.php" style="color:white">New User?</a>
                                            <br>
                                            <br>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt" name="login">SUBMIT</button>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="appointment-left">
                                <h2>Opening Time</h2>
                                <div class="appointment-time">
                                    <ul>
                                        <li>
                                            <span>Monday </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Tuesday </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Wednesday </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Thursday </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Friday  </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Saturday  </span><span>9am-6pm</span>
                                        </li>
                                        <li>
                                            <span>Sunday  </span><span>CLOSED</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <!-- end section -->

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




        <script src="./js/jquery.validate.min.js"></script>
      <script src="./js/validate.js"></script>


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

</body>
</html>