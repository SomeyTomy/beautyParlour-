<?php


include '../../../database.php';  
$data = new Databases;  

$success_message = '';  
 if(isset($_POST["update"]))
{
  $cat_id = $_GET['id'];
  $subcat_id = $_GET['id'];
  $cat_id = mysqli_real_escape_string($data->con, $_POST['cat_id']);
  $subcat_name = mysqli_real_escape_string($data->con, $_POST['subcat_name']);
  $subcat_price = mysqli_real_escape_string($data->con, $_POST['subcat_price']);
  $description = mysqli_real_escape_string($data->con, $_POST['description']);
  


  if($_FILES['upload']['name'] == "")
    {
        $subcat_image =  $_POST['image'];
    }
    else
    {
        $subcat_image = $_FILES['upload']['name'];
        $target = "../../../images/".basename($subcat_image);
        move_uploaded_file($_FILES['upload']['tmp_name'], $target);
    }







  
  $update_arr = array 
                ( 
                  'cat_id'=>$cat_id,
                 'subcat_name'=>$subcat_name,
                 'subcat_price'=>$subcat_price,
                 'description'=>$description,
                 'subcat_image'=>$subcat_image,
                 );
  $temp = 'subcat_id';
  $data->updateData('subcategory',$update_arr,$temp,$subcat_id);
  echo "<script>alert('Successfully Update A Record')</script>";
}






$id = $_GET['id'];
$condition_arr = array('subcat_id'=>$id);
$values = $data->getData('subcategory','*',$condition_arr);


echo($values[0]['subcat_name']);


$result = $data->getData('subcategory','*');
// print_r($result);
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
                <h3>EDIT SUBCATEGORY</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
           <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>SubCategory Form</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="subcategryform" method="POST" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                    




                    <div class="form-group row">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="select-cat">select Category <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">


                       <?php
                         $condition_arr = array('cat_id'=>$values[0]['cat_id']);
                          $single=$data->getData('category','*',$condition_arr);
                          ?>
                        <select class="form-control" name="cat_id">

                          <option selected value="<?php echo($single[0]['cat_id']);?>"><?php echo($single[0]['cat_name']);?></option>



                          <?php
                            $result1 = $data->getData('category','*');
                            foreach ($result1 as $value)
                          {
                          ?>
                            <option value="<?php echo $value['cat_id'];?>"><?php echo $value['cat_name'];?></option>
                          <?php
                          }
                          ?>



                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcat-name">subcategry Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="subcat-name" name="subcat_name" class="form-control " value="<?php echo($values[0]['subcat_name']);?>" pattern="[A-Za-z ]{3,}" title="Invalid Sub Category Name" maxlength="20">
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcat-price">price <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="subcat-price" name="subcat_price" name="subcat_price"  class="form-control" value="<?php echo($values[0]['subcat_price']);?>" pattern="[0-9]{1,}" title="Invalid Price" maxlength="10">
                      </div>
                    </div>




                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcat-price">Description <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6">
                        <textarea name="description" class="form-control" required pattern="[A-Za-z ]{3,}" title="Invalid Sub Category Name" maxlength="250"> <?php echo($values[0]['description']);?> </textarea>
                      </div>
                    </div>



              
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="subcat-price">Image <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="file" id="upload" name="upload" class="form-control" accept="image/*">
                      </div>

                      <input type="text" name="image" hidden value="<?php echo($values[0]['subcat_image']);?>">

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
                          <th>Sub Cater</th>
                          <th>Price</th>
                          <th>Image</th>
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
                              echo "<td>".$value["cat_id"]."</td>";
                              echo "<td>".$value["subcat_name"]."</td>";
                              echo "<td>".$value["subcat_price"]."</td>";
                              echo "<td><img width='50' height='50' src='../../../images/".$value['subcat_image']."' ></td>";
                              ?>
                              <td><a href="subcatedit.php?id=<?php echo $value['subcat_id'];?>"><i style="font-size:24px" class="fa">&#xf044;</i></td>
                              <td><a id="a_id" href="delete.php?id=<?php echo $value['subcat_id']?>&idname=subcat_id&table=subcategory&back=subcategory"><i style="font-size:24px" class="fa fa-trash"></i></a></td>
                              </tr>
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
</html>s