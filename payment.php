<?php

include 'database.php';  
$data = new Databases;  
include("dbcon.php");
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

    $total = 0;
    $book_details = "";
    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $book_details .= $values["subcat_name"].",";
        }
    }


    $total = $_GET['price'];
    if($_GET['service']=='home')
    {
        $total = $total + 100;
    }








$success_message = '';  
if(isset($_POST["submit"]))  
{      
    $condition_arr = array('email'=>$email);
    $user = $data->getData('registration','*',$condition_arr);
    $reg_id = $user[0]['reg_id'];



        if(isset($_GET['offer_details']))
        {
            echo $book_details;
            $book_details = $_GET['offer_details'];
        }
   
    $insert_data = array(  

    'reg_id' => $reg_id,
    'book_details' => $book_details,
    'book_date' => mysqli_real_escape_string($data->con, $_GET['datemin']),
    'emp_id' => mysqli_real_escape_string($data->con, $_GET['employee']),
    'time_id' => mysqli_real_escape_string($data->con, $_GET['time']),
    'service' => mysqli_real_escape_string($data->con, $_GET['service']),
    'status' => 0,
    );  
    $data->insert('booking', $insert_data); 
    // Destroy Shopping Cart
    unset($_SESSION["shopping_cart"]);
    // payment Table

    
    $sql = "SELECT * FROM booking ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    while($row = $result->fetch_assoc())
    {
       $id= $row['id'];
       $insert_data = array(  

        'book_id ' => $id,
        'amount' => $total,

        );  
        $data->insert('payment', $insert_data); 

    }
    







    echo '<script type="text/javascript">'; 
    echo 'alert("Booking Successfully.!");'; 
    echo 'window.location.href = "view.php";';
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
									<h1>PAYMENT</h1>
								</div>
								<div class="clearfix"></div>
								<ol class="breadcrumb">
									<li><a href="view.php">Home</a></li>
									<li class="active">Payment</li>
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
                        <h3>Payment</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="contact_form" style="background-color: white;">
                                <div id="message"></div>
                                <form class="row" name="" method="post" id="paymentform" name="paymentform">
                                    <fieldset class="row-fluid">
                                        <div class="col-xs-12">
                                            <label>Total Amount</label>
                                            <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo($total);?>">
                                        </div>
                                        <div class="col-xs-12">
                                            <label>Name on Card</label>
                                            <input type="text" name="cardname" id="cardname" class="form-control" placeholder="Card Holder Name">
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Expiry Year</label>
                                            <!-- <input type="text" name="expyear" id="expyear" class="form-control" placeholder="Exp Year"> -->
                                            <select name="expyear" id="expyear" class="form-control">
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>                                             
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Expiry Month</label>
                                            <!-- <input type="text" name="expmonth" id="expmonth" class="form-control" placeholder="Exp Month"> -->
                                            <select name="expmonth" id="expmonth" class="form-control">
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">Mar</option>
                                                <option value="04">Apr</option>
                                                <option value="05">May</option>
                                                <option value="06">Jun</option>
                                                <option value="07">Jul</option>
                                                <option value="08">Agu</option>
                                                <option value="09">Sept</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>CVV Number</label>
                                            <input type="password" name="cvv" id="cvv" class="form-control" placeholder="CVV" maxlength="3">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label>Accepted Cards</label>
                                            <br>
                                            <i class="fa fa-cc-visa" style="color:navy; font-size:300%;"></i>
                                            <i class="fa fa-cc-amex" style="color:blue; font-size:300%;"></i>
                                            <i class="fa fa-cc-mastercard" style="color:red; font-size:300%;"></i>
                                            <i class="fa fa-cc-discover" style="color:orange; font-size:300%;"></i>
                                        </div>

                                        

                                        
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address for Communication"></textarea>
                                        </div> -->
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




      <!-- <script src="./js/jquery-2.1.3.min.js"></script> -->
      <script src="./js/jquery.validate.min.js"></script>
      <script src="./js/validate.js"></script>




</body>
</html>