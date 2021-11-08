<?php
include ('dbcon.php');
include 'database.php';  
$data = new Databases; 

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
			
            <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('uploads/slider.jpg');">
                <div class="container-fluid">
                    <div class="row">
						<div id="full-width" class="owl-carousel owl-theme">
							
                            <div class="text-center item">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<div class="big-tagline text-center">
										<h2><strong>Golden Queen</strong></h2>
										<p class="lead"></p>
										<a href="login.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">APPOINTMENT NOW</a>
									</div>
								</div>
							</div>
							<div class="text-center item">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<div class="big-tagline text-center">
										<h2><strong>The Barber Shop</strong><br>
										in New York</h2>
										<p class="lead">With SMBarber responsive landing page template, you can showcase your next barber shop websites!</p>
										<a href="login.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">APPOINTMENT NOW</a>
									</div>
								</div>
							</div>
							<div class="text-center item">
								<div class="col-md-8 col-md-offset-2 col-sm-12">
									<div class="big-tagline text-center">
										<h2><strong>The Barber Shop</strong><br>
										in New York</h2>
										<p class="lead">With SMBarber responsive landing page template, you can showcase your next barber shop websites!</p>
										<a href="login.php" class="btn btn-light btn-radius btn-brd grd1 effect-1 butn">APPOINTMENT NOW</a>
									</div>
								</div>
							</div>
						</div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <section class="section nopad cac text-center">
                <a href="#"><h3>Interesting our awesome barber services? Just drop an appointment form below!</h3></a>
            </section>

            <div class="section wb">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="message-box">
                                <h4>About</h4>
                                <h2>Welcome to Golden Queen</h2>
                                <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>

                                <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed vitae rutrum neque. Ut id erat sit amet libero bibendum aliquam. Donec ac egestas libero, eu bibendum risus. Phasellus et congue justo. </p>

                                <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Learn More</a>
                            </div><!-- end messagebox -->
                        </div><!-- end col -->
                    </div><!-- end row -->
					
					<hr class="hr1"> 
					
					<div class="row">
						<div class="col-md-12">
							<div class="about-tab">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_a" data-toggle="tab">Our Mission</a></li>
									<li><a href="#tab_b" data-toggle="tab">Why Us?</a></li>
									<li><a href="#tab_c" data-toggle="tab">About Us</a></li>								
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab_a">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque tortor mi, eget mattis velit sagittis id. Duis ornare mauris eu eros interdum, vitae finibus arcu ultricies. Donec vitae felis eleifend, dignissim erat a, pretium diam. Donec eu massa odio. Suspendisse et ornare lacus, pharetra imperdiet ligula.</p>
										<p>Vestibulum ac quam id lorem semper condimentum. Nulla vel ligula turpis. Nullam luctus, mi nec rhoncus gravida, tortor est semper purus, a feugiat sapien odio non urna. Fusce pellentesque neque ut nisi rhoncus imperdiet. Sed eu purus vel turpis consectetur convallis. Donec a dolor tellus. Phasellus dignissim erat nec ipsum condimentum sollicitudin. </p>
									</div>
									<div class="tab-pane fade" id="tab_b">
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
										<ul>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>User Experince</li>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>Full Devices</li>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>Awesome Design</li>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>Visual Impact</li>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>100% Sincronized</li>
											<li><i class="fa fa-circle-o" aria-hidden="true"></i>Custom Support</li>
										</ul>
									</div>
									<div class="tab-pane fade" id="tab_c">
										<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
									</div>
								</div><!-- tab content -->
							</div>
						</div><!-- end col -->
					</div><!-- end row -->
					
                    <hr class="hr1"> 

                  
















                  <!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

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

</body>
</html>