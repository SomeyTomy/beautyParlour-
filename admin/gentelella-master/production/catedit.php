
<?php

include '../../../database.php';  
$data = new Databases;  

$success_message = '';  
 if(isset($_POST["update"]))
{
  $cat_id = $_GET['id'];
  $cat_name = mysqli_real_escape_string($data->con, $_POST['cat_name']);
  // $cat_name = mysqli_real_escape_string($data->con, $_POST['cat_name']);
  $update_arr = array('cat_name'=>$cat_name);
  $id = 'cat_id';
  $data->updateData('category',$update_arr,$id,$cat_id);
  echo "<script>alert('Successfully Update A Record')</script>";
}






$result = $data->getData('category','*');
$id = $_GET['id'];

$condition_arr = array('cat_id'=>$id);
$values=$data->getData('category','*',$condition_arr);



// $result = $data->getData('emgcategory','*',$condition_arr);
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
          <div class="left_col scroll-view">
        
            <!-- sidebar menu -->
          <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Golden Queen</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/picture.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome</span>
              <h2>Somey Tomy</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i> Home </a>
                  
                </li>
                <li><a><i class="fa fa-book"></i> Booking<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="booking.php">Booking</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i> Employee<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="Eregister.php">Registration</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> category <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="category.php">Add Category</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Sub Category <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="subcategory.php">Add Subcategory</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bug"></i> offers <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="offer.php">add offers</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-bar-chart-o"></i>Reports<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="BookingReport.php">Booking Report</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="../../../logout.php">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
          </div>
        </div>

        <!-- top navigation -->
        <?php
        include("topnavigation.php");
       ?>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>EDIT CATEGORY</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Category Form </h2>
                  
                    
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="post"  name="categoryform" id="categoryform">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="category-name">category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="cat-name" name="cat_name" required="required" class="form-control" value="<?php echo $values[0]['cat_name'];?>" pattern="[A-Za-z ]{1,}" title="Invalid Category Name"  maxlength="20">
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <input type="submit" class="btn btn-success" value="update" name="update"/>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>


            <div class="row">
            
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View</h2>
                   
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
                          <th>Category</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $s1=1;
                      if(isset($result['0']))
                      {


                        foreach ($result as $value)
                        {


                            ?>
                            <tr>
                              <?php 
                              echo"<td>".$s1."</td>";
                              echo "<td>".$value["cat_name"]."</td>";
                              ?>
                            <td><a href="catedit.php?id=<?php echo $value['cat_id'];?>"><i style="font-size:24px" class="fa">&#xf044;</i></td>
                              <td><a id="a_id" href="delete.php?id=<?php echo $value['cat_id']?>&idname=cat_id&table=category&back=category"><i style="font-size:24px" class="fa fa-trash"></i></a></td>
                              <tr>
                            <?php
                            $s1++;
                          }
                        }
                        else
                        {
                          echo "<td colspan='4' align='center'>no records found </td>";
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




      <script src="./js/jquery.validate.min.js"></script>
      <script src="./js/validate.js"></script>


 <script type="text/javascript">
    $(function() {
        $('td a#a_id').click(function() {
            return confirm("Are You sure that You want to delete this?");
        });
    });
</script>

  </body>
</html>