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


if(empty($_SESSION["shopping_cart"]))
{
  echo '<script>alert("Cart Is Empty. Continue Shopping...!")</script>';
  echo '<script>window.location="view.php"</script>';

}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["subcat_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
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
                  <h1>MY CART</h1>
                </div>
                <div class="clearfix"></div>
                <ol class="breadcrumb">
                  <li><a href="view.php">Home</a></li>
                  <li class="active">My Cart</li>
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
                        <h3>My Cart</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact_form" style="background-color: white;">
                                <div id="message"></div>
                               <table class="table table-bordered">
          <tr>
            <th width="35%">Item Name</th>
            <th width="25%">Price</th>
            <th width="25%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <tr>
            <td><?php echo $values["subcat_name"]; ?></td>
            <td>₹ <?php echo $values["subcat_price"]; ?></td>
            <td>₹ <?php echo number_format($values["subcat_price"], 2);?></td>
            <td><a href="cart.php?action=delete&id=<?php echo $values["subcat_id"]; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
              $total = $total + ($values["subcat_price"]);
            }
          ?>
          <tr>
            <td colspan="2" align="right">Total</td>
            <td align="right">₹ <?php echo number_format($total, 2); ?></td>
            <td></td>
          </tr>
          <?php
          }
          ?>
            
        </table>
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <br><a href="booknow.php" class="btn btn-light btn-radius btn-brd grd1 subt">Book Now</a>
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




      <!-- <script src="./js/jquery-2.1.3.min.js"></script> -->
      <script src="./js/jquery.validate.min.js"></script>
      <script src="./js/validate.js"></script>




</body>
</html>