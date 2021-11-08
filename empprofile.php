<?php

include 'database.php';  
$data = new Databases;  

session_start();
$email = $_SESSION['email'];


if(!empty($_SESSION['email']))
{
  $condition_arr = array('emp_email'=>$email,);
  $result = $data->getData('employee','*',$condition_arr); 
  if($result == 0)
  {
    header("location:index.php");   
  }


}
else
{
    header("location:index.php");
} 







    $condition_arr = array('emp_email'=>$email);
    $user = $data->getData('employee','*',$condition_arr);
    $reg_id = $user[0]['emp_id'];



 if(isset($_POST["submit"]))  
 {      

    if($_FILES['upload']['name'] == "")
    {
        $certificate =  $_POST['certificate'];
    }
    else
    {
        $certificate = $_FILES['upload']['name'];
        $target = "document/".basename($certificate);
        move_uploaded_file($_FILES['upload']['tmp_name'], $target);
    }






      $update_arr = array 
                ( 
                'emp_address' => mysqli_real_escape_string($data->con, $_POST['address']),
                'emp_dob' => mysqli_real_escape_string($data->con, $_POST['dob']),
                'emp_phn' => mysqli_real_escape_string($data->con, $_POST['phone']),
                'emp_wrkexp' => mysqli_real_escape_string($data->con, $_POST['experience']),
                'emp_certificates' => $certificate,
                 );

        
      $temp = 'emp_email';
      $data->updateData('employee',$update_arr,$temp,$email);


      echo '<script type="text/javascript">'; 
      echo 'alert("Successfully Update Your Profile");'; 
      echo 'window.location.href = "empreport.php";';
      echo '</script>';

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
            <a href="index.html"><img style="width:200px; height:150px;" src="images/<?php echo ($user[0]['emp_image']);?>" alt="image"></a>
        </div>
        <ul class="sidebar-nav">
            <li><a href="empreport.php">Home</a></li>
            <li><a href="empreport.php">Booking Details</a></li>
            <li><a href="empprofile.php">Profile</a></li>
            <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSMSqNHVGmKXwTSHqdlLKLcpXtDdrWBvRjWxtWtLKzgwhQHhxKgNZxzQcSjPQtsdmjpsDhQb">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>
        <!-- End Sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
            <div class="all-page-bar" style="background-image:url('uploads/Portfolio.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="title title-1 text-center">
								<div class="title--heading">
									<h1>PROFILE</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="index-3.html">Home</a></li>
									<li class="active">Pofile</li>
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
                        <h3>Porfile</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact_form" style="background-color: white;">
                                <div id="message"></div>
                                <form class="row" name="eregisterform" id="eregisterform" method="post" enctype="multipart/form-data">
                                    <fieldset class="row-fluid">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo ($user[0]['emp_name']);?>" disabled>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo ($user[0]['emp_lname']);?>" disabled>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Email-id</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email Address" value="<?php echo ($user[0]['emp_email']);?>" disabled>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" value="<?php echo ($user[0]['emp_phn']);?>">
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Commuincation Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address for Communication"><?php echo ($user[0]['emp_address']);?></textarea>
                                        </div>



                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob" id="dob" class="form-control" placeholder="Password" value="<?php echo ($user[0]['emp_dob']);?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Work Experience</label>
                                            <input type="text"required name="experience" id="experience" class="form-control" maxlength="2" placeholder="Work Experience (In Year Wise)" value="<?php echo($user[0]['emp_wrkexp']);?>">
                                        </div>



                                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Certificate</label>
                                            <input type="file" name="upload" id="upload" class="form-control">


                                            <input type="hidden" name="certificate" id="certificate" class="form-control" value="<?php echo($user[0]['emp_certificates']);?>">
                                        </div>


                                        
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                            <!-- <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">Submit</button> -->
                                            <input type="submit" name="submit" value="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">
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
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<style type="text/css">
    ::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
</style>

</body>
</html>