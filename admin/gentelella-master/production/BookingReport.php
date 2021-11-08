<?php

include '../../../database.php';  
$data = new Databases;  
include("../../../dbcon.php");


$sql = "SELECT * FROM booking INNER JOIN registration ON booking.reg_id = registration.reg_id INNER JOIN time ON booking.time_id = time.time_id INNER JOIN employee ON booking.emp_id =  employee.emp_id INNER JOIN payment ON booking.id = payment.book_id ORDER BY booking.status,booking.book_date,time.stime ASC";

$result = mysqli_query($conn, $sql);

$sdate= "";
$edate = "";

if(isset($_POST['submit']))
{
  $sdate =  $_POST["sdate"];
  $edate = $_POST["edate"];



  $sql = "SELECT * FROM booking INNER JOIN registration ON booking.reg_id = registration.reg_id INNER JOIN time ON booking.time_id = time.time_id INNER JOIN employee ON booking.emp_id =  employee.emp_id INNER JOIN payment ON booking.id = payment.book_id where book_date > '$sdate' AND book_date < '$edate' ORDER BY booking.status,booking.book_date,time.stime ASC";
  $result = mysqli_query($conn, $sql);
}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>



    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

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


    <!-- Date Range Picker -->




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
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                      <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
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
                <h3>Booking Report</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
          </div>
          
          

            <div class="row">
            



              <div class="col-md-12 col-sm-12">
                <div class="x_panel">

                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <form action="" method="POST">
                              <table border="0" cellspacing="5" cellpadding="5">
                                <tbody>
                                  <tr>
                                    <td colspan="5"><b>Search By Date</b></td>
                                    <td><b>Search By Amount</b></td>
                                  </tr>
                                  <tr>
                                    <td>Start Date:</td>
                                    <td><input type="date" id="sdate" name="sdate" placeholder="yyyy-mm-dd" value="<?php echo($sdate)?>"></td>
                                    <td>End Date:</td>
                                    <td><input type="date" id="edate" name="edate" placeholder="yyyy-mm-dd" value="<?php echo($edate)?>"></td>
                                    <td><input type="submit" name="submit" class="btn-primary"></td>


                                    <td>Minimum Amount:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                    <td>Maximum Amount:</td>
                                    <td><input type="text" id="max" name="max"></td>


                                    
                                </tr>
                            </tbody>
                          </table>
                          </form>
                          <br>
                    <div id="tab">

                     <table class="table table-striped searchable sortable"  id="example" style="width:100%">
                      <thead>
                        <tr>
                          <th>SNO</th>
                          <th>User Name</th>
                          <th>Employee Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Booking Details</th>
                          <th>Amount</th>
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
                              <td><?php echo($value['emp_name']." ".$value['emp_lname']);?></td>
                              <td><?php echo($value['book_date']);?></td>
                              <td><?php echo(date('h:i:s a', strtotime($value['stime']))." to ".date('h:i:s a', strtotime($value['etime'])));?></td>
                              <td><?php echo($value['book_details']);?></td>
                              <td class="count-me"><?php echo($value['amount']);?></td>
                              

                             

                              <?php
                                if ($value['status']==0) 
                                {?>
                                  <td ><label style="color:grey"><b>Pending</b></label></td>
                                <?php
                                }
                                if ($value['status']==1) 
                                {?>
                                  <td ><label style="color:green"><b>Confirm</b></label></td>
                                <?php
                                }
                                if ($value['status']==2) 
                                {?>
                                  <td ><label style="color:red"><b>Rejected</b></label></td>
                                <?php
                                }
                                if ($value['status']==3) 
                                {?>
                                  <td ><label style="color:cyan"><b>Completed</b></label></td>
                                <?php
                                }
                                if ($value['status']==4) 
                                {?>
                                  <td ><label style="color:black"><b>Cancelled</b></label></td>
                                <?php
                                }
                              ?>
                            </tr>
                        <?php
                        }
                        ?>

                      </tbody>
                      <tfoot>
                          <tr>
                              <th>SNO</th>
                              <th>User Name</th>
                              <th>Employee Name</th>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Booking Details</th>
                              <th>Amount</th>
                              <th>Status</th>
                            
                          </tr>
                      </tfoot>
                    </table>
                  </div>


                    <input type="button" class="btn btn-primary" value="Create PDF" id="btPrint" onclick="createPDF()" />
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

             

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




    <!-- PDF -->
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

  

  <!-- Table Serach -->
  <script type="text/javascript">
      $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );

  </script>



<!-- Date Search -->


<script type="text/javascript">
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[6] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
</script>




<!-- TOTAL -->
<!-- <script type="text/javascript">

   var tds = document.getElementById('example').getElementsByTagName('td');
            var sum = 0;
            for(var i = 0; i < tds.length; i ++) {
                if(tds[i].className == 'count-me') {
                    sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                }
            }
            document.getElementById('example').innerHTML += '<b><h2><tr><td colspan="6">Total Amount</td> <td style="text-decoration-line: underline; text-decoration-style: double;">' + sum + '</td></tr></h2></b>';
</script> -->




  </body>
</html>