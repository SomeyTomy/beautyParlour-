<?php

include '../../../database.php';  
$data = new Databases;  
include("../../../dbcon.php");


$sql = "SELECT * FROM booking INNER JOIN registration ON booking.reg_id = registration.reg_id INNER JOIN time ON booking.time_id = time.time_id INNER JOIN payment ON booking.id = payment.book_id ORDER BY booking.status,booking.book_date,time.stime ASC";

$result = mysqli_query($conn, $sql);




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Zeras Spaa</title>

    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php
            include("sidebar.php");

          ?>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/picture.jpg" alt="">Somey Tomy
                    </a>
                   
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Booking Details</h3>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="row">
            
          </div>


            <div class="row">
            
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                     <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>User Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Booking Details</th>
                          <th>Amount</th>
                          <th>Action</th>
                          <th>Status</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $sn = 1;
                        foreach ($result as $value) 
                        {
                        ?>
                            <tr>
                              <td><?php echo($sn);$sn++;?></td>
                              <td><?php echo($value['fname']." ".$value['lname']);?></td>
                              <td><?php echo($value['book_date']);?></td>
                              <td><?php echo(date('h:i:s a', strtotime($value['stime']))." to ".date('h:i:s a', strtotime($value['etime'])));?></td>
                              <td><?php echo($value['book_details']);?></td>
                              <td><?php echo($value['amount']);?></td>
                              

                              <?php
                              if ($value['status']==2) 
                              {
                              ?>
                                <td><label style="color:red">Rejected</label></td>
                              <?php
                              }
                              elseif ($value['status']==3) 
                              {?>
                                <td><label style="color:green">Completed</label></td>
                              <?php
                              }
                               elseif ($value['status']==4) 
                              {?>
                                <td><label style="color:black">Cancelled</label></td>
                              <?php
                              }
                              else
                              {?>
                                <td>
                                  <a href="confirm.php?id=<?php echo $value['id']?>&table=booking" class="btn btn-success">Confrim</a>
                                  <a href="reject.php?id=<?php echo $value['id']?>&table=booking" class="btn btn-danger" onclick="return confirm('Are You sure that You want to Reject this Booking?')">Reject</a>
                                </td>
                              <?php
                              }
                              ?>

                              <?php
                                if ($value['status']==0) 
                                {?>
                                  <td style="background-color:rgb(179, 178, 177);"><label style="color:yellow">Pending</label></td>
                                <?php
                                }
                                if ($value['status']==1) 
                                {?>
                                  <td style="background-color:rgb(179, 178, 177);"><label style="color:green">Confirm</label></td>
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
                              ?>
                            </tr>
                        <?php
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

             
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            !!!!!!................ZERA SPAA................!!!!!<a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      function myFunction() 
      {
        confirm("Press a button!");
      }
    </script>


  </body>
</html>