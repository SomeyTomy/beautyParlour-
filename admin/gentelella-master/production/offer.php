
<?php

include ('../../../dbcon.php');
include '../../../database.php';  
$data = new Databases;  

$success_message = '';  
 if(isset($_POST["submit"]))  
 {  


      $arr = $_POST['subcat'];
      print_r($arr);
      // $c count($arr);
      // SELECT SUM(subcat_price) FROM subcategory WHERE subcat_id = 13 or subcat_id = 30 or subcat_id = 31

      $sql = "SELECT SUM(subcat_price) as total FROM subcategory WHERE ";
      foreach ($arr as $key) 
      {
        $sql .= "subcat_id = $key OR ";
      }
      
  
      $sql = substr($sql, 0, -3);
      // echo "$sql"."<br>";
      $result = mysqli_query($conn, $sql);

     while ($row = mysqli_fetch_assoc($result)) 
      { 
        $total = $row['total'];
      } 
      // echo $total."<br>";
      $offer = $total - (($total*$_POST['ofr_discount'])/100); 
      // echo "$total";



        
      $arr = implode(',', $arr);

      $insert_data = array(  
          'ofr_name' => mysqli_real_escape_string($data->con, $_POST['ofr_name']),
          'ofr_sdate' => mysqli_real_escape_string($data->con, $_POST['ofr_sdate']),
          'ofr_edate' => mysqli_real_escape_string($data->con, $_POST['ofr_edate']),
          'ofr_discount' => mysqli_real_escape_string($data->con, $_POST['ofr_discount']),
          'subcategory_list' => $arr,
          'total'=>$total,
          'amount'=>$offer,

      );  
      if($data->insert('Offer', $insert_data))  
      {  
           echo '<script type="text/javascript">'; 
          echo 'alert("Registration Done Successfully");'; 
          echo '</script>';  
      }       


 } 
 if(isset($_GET['type']) && $_GET['type']='delete')
  {
    $id = $data->get_safe_str($_GET['id']);
    $condition_arr = array('ofr_id'=>$id);
    $data->deleteData('Offer',$condition_arr);
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

<!-- Page level plugin JavaScript-->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

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
                <h3>OFFER</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Offer Form </h2>
                  
                    
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br/>
                  <form method="post" name="offerform" id="offerform" action="">

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="offer-name">Offer Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="ofr_name" name="ofr_name" class="form-control" required pattern="[A-Za-z ]{3,}" title="Invalid Offer Name (Only Alphabets and Spaces)">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Start Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="ofr_sdate" name="ofr_sdate" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required autocomplete="false">
                        
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Offer End Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input id="ofr_edate" name="ofr_edate" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required autocomplete="false">
                        
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="offer-discount">Discount in percentage <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" id="ofr-discount" name="ofr_discount" class="form-control" required pattern="[0-9]{1,2}" title="Invalid Price (Number Only)" maxlength="2">
                      </div>
                    </div>





                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="offer-discount">Choose Category<br>(ctrl for multiple selection)<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <!-- <input type="text" id="ofr-discount" name="ofr_discount" required="required" class="form-control "> -->
                        <?php 
                        $result = $data->getData('subcategory','*');
                        // print_r($result);
                        ?>
                          <select name="subcat[]" class="form-control" required multiple>
                            <?php 
                            foreach ($result as $value)
                            {
                              ?>
                            <option value="<?php echo $value['subcat_id'];?>"><?php echo($value['subcat_name']);?></option>
                            <?php
                            }
                            ?>
                          </select>
                      </div>
                    </div>










                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <input type="submit" class="btn btn-success" value="save & continue" name="submit"/>
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
                          <th>Offer Name</th>
                          <!-- <th>List</th> -->
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Discount%</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $s1=1;
                        $offers = $data->getData('offer','*');
                        foreach ($offers as $value)
                        {

                            ?>
                            <tr>
                              <?php 
                              echo"<td>".$s1."</td>";
                              echo "<td>".$value["ofr_name"]."</td>";
                              // echo "<td>".$value["subcategory_list"]. "</td>";

                              echo "<td>".$value["ofr_sdate"]."</td>";
                              echo "<td>".$value["ofr_edate"]."</td>";
                              echo "<td>".$value["ofr_discount"]. "% </td>";
                              ?>
                            <td><a href="offeredit.php?id=<?php echo $value['ofr_id'];?>"><i style="font-size:24px" class="fa">&#xf044;</i></td>
                              <td><a id="a_id" onclick="return confirm('Are You sure that You want to delete this?')" href="delete.php?id=<?php echo $value['ofr_id']?>&idname=ofr_id&table=offer&back=offer"><i style="font-size:24px" class="fa fa-trash"></i></a></td>
                              <tr>
                            <?php
                            $s1++;
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




    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
            type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css"
          rel="Stylesheet" type="text/css" />

          <!-- start date end date validation -->
      <script type="text/javascript">
        $(function () {
            $("#ofr_sdate").datepicker({
                numberOfMonths: 2,
                minDate: "+0",
                maxDate: "+1m",
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#ofr_edate").datepicker("option", "minDate", dt);
                }
            });
            $("#ofr_edate").datepicker({
                numberOfMonths: 2,
                maxDate: "+3m",
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#ofr_sdate").datepicker("option", "maxDate", dt);
                }
            });
        });
    </script>

  </body>
</html>