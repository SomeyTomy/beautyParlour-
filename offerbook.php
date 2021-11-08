<?php
// SELECT * FROM time WHERE id NOT IN (SELECT time_id from booking WHERE emp_id = 5 and book_date = '2021-02-17')
include ('dbcon.php');
include 'database.php';  
$data = new Databases; 

session_start();
$email = $_SESSION['email'];
$condition_arr = array('email'=>$email);
$user = $data->getData('registration','*',$condition_arr);
$reg_id = $user[0]['reg_id'];

 
$employee = $data->getData('employee','*');
$ofr_id = $_GET['id'];



$query = "SELECT * FROM offer WHERE ofr_id = $ofr_id";

$result = mysqli_query($conn, $query);

foreach ($result as $key) {
	$value = $key['subcategory_list'];
	$total = $key['amount'];
}

$arr = (explode(",",$value));


$sql = "SELECT subcat_name FROM subcategory WHERE ";
      foreach ($arr as $key) 
      {
        $sql .= "subcat_id = $key OR ";
      }
      $sql = substr($sql, 0, -3);


      $result = mysqli_query($conn, $sql);

     	$book_details = "";
     while ($row = mysqli_fetch_assoc($result)) 
      { 
        $book_details .= $row["subcat_name"].",";
      } 
      // echo $book_details;
      // echo $total;








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
									<h1>BOOK Now</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="index-3.html">Home</a></li>
									<li class="active">Book Now</li>
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

            <div id="contact" class="section wb">
                <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <small>LET'S MAKE AN CONTACT FOR YOUR LIFE</small>
                        <h3>Book Now</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->


                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="contact_form" style="background-color: white;">
                                
                               <form id="registrationform" class="row" name="registrationform" method="get" action="payment.php">
                                    <fieldset class="row-fluid">



                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Total Amount</label>
                                            <input type="text" name="price" id="price" class="form-control" disabled value="<?php echo number_format($total, 2); ?>">
                                            <input type="hidden" name="price" id="price" class="form-control" value="<?php echo($total); ?>">
                                        </div>



                                    


                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Booking Date</label>
                                            <input type="date" id="datemin" name="datemin" min="<?php echo(date('Y-m-d', strtotime(' +1 day')));?>" max ="<?php echo(date('Y-m-d', strtotime(' +30 day')));?>" class="form-control" value="<?php echo(date('Y-m-d', strtotime(' +1 day')));?>">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Select Your Favourite Employee</label>
                                            <select class="form-control" name="employee" id="employee" required>
                                                <option value="">Select Your Favourite Employee</option>
                                                <?php
                                                    foreach ($employee as $value) 
                                                    {
                                                ?>
                                                        <option value="<?php echo($value['emp_id']);?>"> <?php echo($value['emp_name']);?></option>
                                                    <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                       

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Select Time</label>
                                        </div>


                                       
                                        
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <select name="time" id="loadTime" class="form-control" required>
                                                    
                                                </select>
                                            
                                               
                                            </div>




                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Select Service You Preffered</label>
                                            <select class="form-control" name="service">
                                                <option value="shop">Shop</option>
                                                <option value="home">Home(+100 Service Charge)</option> 
                                            </select>
                                            <input type="text" name="offer_details" hidden="true" value="<?php echo($book_details)?>">
                                        </div>
                                        
                                        
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Commuincation Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address for Communication"></textarea>
                                        </div> -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
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

   <script src="js/ajax-load.js"></script>


<style type="text/css">
    ::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
</style>

</body>
</html>