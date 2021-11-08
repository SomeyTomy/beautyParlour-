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






    
    $condition_arr = array('email'=>$email);
    $user = $data->getData('registration','*',$condition_arr);
    $reg_id = $user[0]['reg_id'];

$sql = "SELECT * FROM booking INNER JOIN time ON booking.time_id = time.time_id INNER JOIN payment ON payment.book_id = booking.id  where booking.reg_id=$reg_id ORDER BY booking.status,booking.book_date, time.stime";

$result = mysqli_query($conn, $sql);
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
                  <h1>BOOK REPORT</h1>
                </div>
                <div class="clearfix"></div>
                <ol class="breadcrumb">
                  <li><a href="view.php">Home</a></li>
                  <li class="active">Book Report</li>
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
                        <h3>Book Report</h3>
                        <hr class="grd1">
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>
                        </div>
                    </div><!-- end title -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact_form" style="background-color: white;">
                                <div id="message"></div>
                                <div id="tab">
                                  <table class="table table-bordered">
                                  <tr>
                                    <th>SNo</th>
                                    <th>Booking Id</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Service</th>
                                    <th>Book Details</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                  <?php
                                  if (mysqli_num_rows($result) > 0) 
                                  {
                                  $sn = 0; 
                                  foreach ($result as $value) 
                                  {
                                  $sn++;
                                  echo "<tr>";
                                    echo "<td>".$sn."</td>";
                                    echo "<td>"."BP".$value['id']."</td>";
                                    echo "<td>".date('h:i:s a', strtotime($value['stime']))." to ".date('h:i:s a', strtotime($value['etime']))."</td>";
                                    echo "<td>".$value['book_date']."</td>";
                                    echo "<td>".$value['service']."</td>";
                                    echo "<td>".$value["book_details"]."</td>";
                                    echo "<td>".$value["amount"]."</td>";

                                    ?>

                                    <?php
                                        if ($value['status']==0) 
                                        {?>
                                          <td style="background-color:rgb(179, 178, 177);"><label style="color:yellow">Pending</label></td>
                                        <?php
                                        }
                                        if ($value['status']==1) 
                                        {?>
                                          <td style="background-color:rgb(179, 178, 177);"><label style="color:green">Confirm</label> <a href="print.php?id=<?php echo($value["id"])?>" class="btn btn-primary">Print</a></td>
                                        <?php
                                        }
                                        if ($value['status']==2) 
                                        {?>
                                          <td style="background-color:rgb(179, 178, 177);"><label style="color:red">Rejected</label></td>
                                        <?php
                                        }
                                        if ($value['status']==3) 
                                        {?>
                                          <td style="background-color:rgb(179, 178, 177);"><label style="color:cyan">Completed</label></td>
                                        <?php
                                        }
                                        if ($value['status']==4) 
                                        {?>
                                          <td style="background-color:rgb(179, 178, 177);"><label style="color:black">Cancelled</label></td>
                                        <?php
                                        }
                                        if($value['status']==0 || $value['status']==1)
                                        {
                                        ?>
                                            <td style="background-color:rgb(179, 178, 177);"><a onclick="return confirm('Are You sure that You want to Cancel this Booking? Remember 5% Processign Fee Is Deduce')" href="cancel.php?id=<?php echo $value['id']?>&table=booking&amount=<?php echo$value['amount']?>" class="btn btn-danger">Cancel</a></td>
                                        <?php
                                        }
                                        else
                                        {
                                            echo("<td><label class='btn  btn-warning'>No Action</label></td>");
                                        }
                                      ?>


                                    <?php
                                  echo "</tr>";
                                  }
                                }
                                else
                                {
                                    echo("<tr><td colspan='8' style='text-align: center;color:red;'><strong>No Appointment Founded</strong></td></tr>");
                                }

                                  ?>
                                  
                            
                                </table>
                             </div>




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





<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close();   // CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>

</body>
</html>