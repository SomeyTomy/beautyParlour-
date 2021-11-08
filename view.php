<?php 
session_start();
// $conn = mysqli_connect("localhost", "root", "", "beauty_parlour");

include ('dbcon.php');
include 'database.php';  
$data = new Databases; 

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



$date = date("m/d/Y");

$query = "SELECT * FROM offer WHERE ofr_sdate >= $date";
$offer = mysqli_query($conn, $query);
$query = "SELECT * FROM subcategory INNER JOIN category WHERE subcategory.cat_id = category.cat_id ORDER BY subcat_id ASC";
$result = mysqli_query($conn, $query);






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



    <title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    

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
      
            <div class="all-page-bar">
        






              <div id="home" class="parallax first-section" data-stellar-background-ratio="0.4" style="background-image:url('uploads/slider.jpg');">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="full-width" class="owl-carousel owl-theme">

                              <?php
                              if(mysqli_num_rows($offer) > 0)
                              {
                                while($row = mysqli_fetch_array($offer))
                                {
                       

                              ?>


                              <div class="text-center item">
                                <div class="col-md-8 col-md-offset-2 col-sm-12">
                                  <div class="big-tagline text-center">
                                  <h2>
                                    <strong><?php echo $row["ofr_name"]; ?></strong><br>
                                  </h2>
                                  <h3 class="btn btn-light">
                                      <?php echo $row["ofr_sdate"]; ?> TO <?php echo $row["ofr_edate"]; ?>
                                    </h3><br><br>

                                  <h2 class="btn btn-light" style="color: rgb(255, 187, 51);"><?php echo ($row["ofr_discount"]."% Offer"."<br><strike>".$row["total"]."</strike><br>".$row["amount"]); ?></h2><br>

                                  <a href="offerdetails.php?id=<?php echo $row['ofr_id'];?>" class="btn btn-light btn-radius btn-brd grd1 butn">View More</a>
                                  </div>
                                </div>
                              </div>
                              <?php
                              }
                              }
                              ?>

                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
              </div>









      </div><!-- end all-page-bar -->

            <!-- <section class="section nopad cac text-center">
                <a href="#"><h3>Interesting our awesome barber services? Just drop an appointment form below!</h3></a>
            </section> -->

            <div id="contact" class="section wb">
                

                        <div class="container-fluid">
                    <div class="section-title row text-center">
                        <div class="col-md-8 col-md-offset-2">
                        <h3>OUR SERVICES</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->




                    <div class="row dev-list text-center">



        <?php
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>

                       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <form method="post" action="view.php?action=add&id=<?php echo $row["subcat_id"]; ?>">
                            <div class="widget clearfix">
                                <div class="hover-br">
                                    <img src="images/<?php echo $row["subcat_image"];?>" style="width: 300px;height: 350px" alt="" class="img-responsive" >
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
                                    <h3 style="text-transform: uppercase;">
                                      <a href="details.php?id=<?php echo $row['subcat_id'];?>"><?php echo $row["subcat_name"]; ?></a>
                                    </h3>
                                    <h2>
                                      ₹ <?php echo $row["subcat_price"]; ?>
                                    </h2>
                                    <br>
                                    <small><strong><?php echo $row["cat_name"]; ?></strong></small>
                                    <!-- HIDDEN VALUES -->
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["subcat_name"]; ?>" />
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["subcat_price"]; ?>" />


                                </div>
                                <!-- end title -->
                                <p><?php echo $row["description"]; ?></p>
                                <button type="submit" name="add_to_cart" class="btn btn-light btn-radius btn-brd grd1 btn-block subt">Add to Cart <i class="fa fa-shopping-cart" style="font-size:100%"></i></button>
                                
                            </div><!--widget -->
                        </form>
                        </div><!-- end col -->

                        
                      <?php
          }
        }
        else{
          echo "<p>No Booking Available</p>";
        }
      ?>
                       




                        
                       
                    </div><!-- end row -->
                </div>









                <!-- end container -->
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