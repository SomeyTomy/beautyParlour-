
<?php

include '../../../database.php';  
$data = new Databases;  

$success_message = '';  
 if(isset($_POST["submit"]))  
 {  
      $insert_data = array(  
          'cat_name' => mysqli_real_escape_string($data->con, $_POST['cat_name'])
      );  
      if($data->insert('category', $insert_data))  
      {  
           echo '<script>alert("Successful Add a New Category ")</script>';  
      }       
 } 
 if(isset($_GET['type']) && $_GET['type']='delete')
  {
    $id = $data->get_safe_str($_GET['id']);
    $condition_arr = array('cat_id'=>$id);
    $data->deleteData('category',$condition_arr);
    echo '<script>alert("Successfully Delete A Record ")</script>'; 
  }
  



$result = $data->getData('category','*');
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
    <!-- <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    
<!--     <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->

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
       <?php
        include("topnavigation.php");
       ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>CATEGORY</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Category Form</h2>
                  
                    
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="post" name="categoryform" id="categoryform">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="category-name">category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="cat_name" name="cat_name" class="form-control" pattern="[A-Za-z ]{1,}" title="Invalid Category Name" maxlength="20">
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <input type="submit" class="btn btn-success" value="submit" name="submit"/>
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
        <?php

          include("footer.php");

        ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!-- <script src="../vendors/jquery/dist/jquery.min.js"></script> -->
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






      <script src="./js/jquery-2.1.3.min.js"></script>
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