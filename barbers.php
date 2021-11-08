<?php
include ('dbcon.php');
include 'database.php';  
$data = new Databases; 
session_start();
$email = $_SESSION['email'];

if(!empty($_SESSION['email']))
{
  $condition_arr = array('email'=>$email,);
  $result = $data->getData('registration','*',$condition_arr); 
  if($result == 0)
  {
    header("location:index.php");   
  }
}
else
{
    header("location:index.php");
} 

$barber = $data->getData('employee','*');




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
        <?php
            include("sidebar.php");
        ?>
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
									<h1>Our Employees</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="view.php">Home</a></li>
									<li class="active">Our Employees</li>
								</ol>
							</div>
							<!-- .title end -->
						</div>
					</div>
				</div>
			</div><!-- end all-page-bar -->

            <section class="section nopad cac text-center">
                <a href="#"><h3>Interesting our awesome barber services? Just drop an appointment form below!</h3></a>
            </section>

            <div id="barbers" class="section lb">
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <small>MEET OUR BABRER TEAM</small>
                        <h3>OUR BARBERS</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row dev-list text-center">
                        


                    <?php 
                        foreach ($barber as $value) 
                    {
                    ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="widget clearfix">
								<div class="hover-br">
									<img src="images/<?php echo $value["emp_image"];?>" alt="" class="img-responsive">
									<!-- <div class="social-up-hover">
										<div class="footer-social">
											<a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
											<a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
											<a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
											<a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
										</div>
									</div> -->
								</div>
                                <div class="widget-title">
                                    <h3><?php echo($value['emp_name']. " " . $value['emp_lname'])?></h3>
                                    <small>Contact :<?php echo($value['emp_phn']);?></small>
                                </div>
                                <!-- end title -->
                                <p>Working Experience: <?php echo($value['emp_wrkexp'])?> Years</p>

                                
                            </div><!--widget -->
                        </div><!-- end col -->
                    <?php
                    }
                    ?>  
                        
                        
						
 
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

           <!-- end section -->

            <div class="copyrights">
                <div class="container-fluid">
                    <div class="footer-distributed">
                        <div class="footer-left">
                            <p class="footer-links">
                               
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

</body>
</html>