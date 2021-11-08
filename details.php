<?php

include ('dbcon.php');
include 'database.php';  
$data = new Databases; 
session_start(); 


$email = $_SESSION['email'];
$id = $_GET['id'];

$condition_arr = array(
        'subcat_id'=>$id,
        );
$result = $data->getData('subcategory','*',$condition_arr);  



if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "subcat_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'subcat_id'     =>  $_GET["id"],
        'subcat_name'     =>  $_POST["hidden_name"],
        'subcat_price'    =>  $_POST["hidden_price"],
        // 'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
      echo '<script>alert("Item Added")</script>';
      
    }
    else
    {
      echo '<script>alert("Item Already Added")</script>';
    }
  }
  else
  {
    $item_array = array(
      'subcat_id'     =>  $_GET["id"],
      'subcat_name'     =>  $_POST["hidden_name"],
      'subcat_price'    =>  $_POST["hidden_price"],
      // 'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
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
      <?php
        include("include/sidebar.php");
       ?>
        <!-- End Sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <a href="#menu-toggle" class="menuopener" id="menu-toggle"><i class="fa fa-bars"></i></a>
			
            <div class="all-page-bar">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="title title-1 text-center">
								<div class="title--heading">
									<h1>Appointment</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="index-3.html">Home</a></li>
									<li class="active">Appointment</li>
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
                        <h3>Book now</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact_form">
                                <div id="message"></div>


                            <form action="details.php?action=add&id=<?php echo($result[0]['subcat_id']);?>" method="POST">
                                        <img src="images/<?php echo$result[0]['subcat_image']?>" style=" width: 100%;height: 50%;object-fit: contain;">


                            <h1 class="title--heading" style="color: white"> 

                                <input type="hidden" name="hidden_name" value="<?php echo $result[0]["subcat_name"]; ?>"/>
                                <?php echo($result[0]['subcat_name']);?>
                            </h1>
                            <h1 class="title--heading" style="color: white">
                                <input type="hidden" name="hidden_price" value="<?php echo $result[0]["subcat_price"]; ?>"/>
                                ₹ <?php echo($result[0]['subcat_price']);?>
                            </h1>
                            <h1 class="title--heading" style="color: white">
                                <input type="hidden" name="" value="<?php echo $result[0]["description"]; ?>"/>
                                <?php echo($result[0]['description']);?>
                            </h1>
                            <div class="text-center">
                                <button type="submit" name="add_to_cart" class="btn btn-light btn-radius btn-brd grd1 subt">Add to Cart <i class="fa fa-shopping-cart" style="font-size:100%"></i></button>
                            </div>    
                            </form>



                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <div id="testimonials" class="parallax section db parallax-off" style="background-image:url('uploads/parallax_20.jpg');">
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <small>LET'S SEE OUR TESTIMONIALS</small>
                        <h3>HAPPY TESTIMONIALS</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="testi-carousel owl-carousel owl-theme">                                
                                <div class="testimonial clearfix">
                                    <div class="desc">
                                        <h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
                                        <p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
                                    </div>
                                    <div class="testi-meta">
                                        <img src="uploads/testi_01.png" alt="" class="img-responsive alignright">
                                        <h4>James Fernando <small>- Manager of Racer</small></h4>
                                    </div>
                                    <!-- end testi-meta -->
                                </div>
                                <!-- end testimonial -->
                                <div class="testimonial clearfix">
                                    <div class="desc">
                                        <h3><i class="fa fa-quote-left"></i> Awesome Services!</h3>
                                        <p class="lead">Explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you completed.</p>
                                    </div>
                                    <div class="testi-meta">
                                        <img src="uploads/testi_02.png" alt="" class="img-responsive alignright">
                                        <h4>Jacques Philips <small>- Designer</small></h4>
                                    </div>
                                    <!-- end testi-meta -->
                                </div>
                                <!-- end testimonial -->
                                <div class="testimonial clearfix">
                                    <div class="desc">
                                        <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                        <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                                    </div>
                                    <div class="testi-meta">
                                        <img src="uploads/testi_03.png" alt="" class="img-responsive alignright">
                                        <h4>Venanda Mercy <small>- Newyork City</small></h4>
                                    </div>
                                    <!-- end testi-meta -->
                                </div>
                                <!-- end testimonial -->
								<div class="testimonial clearfix">
                                    <div class="desc">
                                        <h3><i class="fa fa-quote-left"></i> Great & Talented Team!</h3>
                                        <p class="lead">The master-builder of human happines no one rejects, dislikes avoids pleasure itself, because it is very pursue pleasure. </p>
                                    </div>
                                    <div class="testi-meta">
                                        <img src="uploads/testi_03.png" alt="" class="img-responsive alignright">
                                        <h4>Venanda Mercy <small>- Newyork City</small></h4>
                                    </div>
                                    <!-- end testi-meta -->
                                </div>
                                <!-- end testimonial -->
                            </div><!-- end carousel -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

            <div class="copyrights">
                <div class="container-fluid">
                    <div class="footer-distributed">
                        <div class="footer-left">
                            <p class="footer-links">
                                <a href="#">Home</a>
                                <a href="#">Blog</a>
                                <a href="#">Pricing</a>
                                <a href="#">About</a>
                                <a href="#">Faq</a>
                                <a href="#">Contact</a>
                            </p>
                            <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SMBarber</a> Design By : <a href="https://html.design/">html design</a></p>
                        </div>

                        <div class="footer-right">
                            <form method="get" action="#">
                                <input placeholder="Subscribe our newsletter.." name="search">
                                <i class="fa fa-envelope-o"></i>
                            </form>
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