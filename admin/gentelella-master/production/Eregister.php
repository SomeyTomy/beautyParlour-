<?php

include '../../../database.php';  
$data = new Databases;  

$success_message = '';  
if(isset($_POST["submit"]))  
 {  

    $emp_certificates = $_FILES['emp_certificates']['name'];
    $emp_image = $_FILES['emp_image']['name'];

    // Set the target location
    $target = "../../../document/".basename($emp_certificates);
    $target1 = "../../../images/".basename($emp_image);

    $insert_data = array(  
    		'emp_name' => mysqli_real_escape_string($data->con, $_POST['emp_name']),
            'emp_lname' => mysqli_real_escape_string($data->con, $_POST['emp_lname']),
            'emp_address' => mysqli_real_escape_string($data->con, $_POST['emp_address']),
            'emp_pincode' => mysqli_real_escape_string($data->con, $_POST['emp_pincode']),
            'emp_dob' => mysqli_real_escape_string($data->con, $_POST['emp_dob']),
            'emp_phn' => mysqli_real_escape_string($data->con, $_POST['emp_phn']),
            'emp_password' => mysqli_real_escape_string($data->con, md5($_POST['emp_phn'])),

    

            'emp_email' => mysqli_real_escape_string($data->con, $_POST['emp_email']),
            'emp_wrkexp' => mysqli_real_escape_string($data->con, $_POST['emp_wrkexp']),
            'emp_image' => mysqli_real_escape_string($data->con, $_FILES['emp_image']['name']),
            'emp_certificates' => mysqli_real_escape_string($data->con, $_FILES['emp_certificates']['name'])
        );  
     
     // Store the image
        if($data->insert('employee', $insert_data))  
        {  
          move_uploaded_file($_FILES['emp_certificates']['tmp_name'], $target);
          move_uploaded_file($_FILES['emp_image']['tmp_name'], $target1);


          echo '<script>alert("Successful Add a New Employee ")</script>';  
        }      
 }  
 if(isset($_GET['type']) && $_GET['type']='delete')
  {
    $id = $data->get_safe_str($_GET['id']);
    $condition_arr = array('emp_id'=>$id);
    $data->deleteData('employee',$condition_arr);
    // echo '<script>alert("Successfully Delete A Record ")</script>'; 
      echo '<script type="text/javascript">'; 
	  echo 'alert("Successfully Delete A Record");'; 
	  echo 'window.location.href = "Eregister.php";';
	  echo '</script>';
  }
  



$result = $data->getData('employee','*');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Gentelella Alela! | </title>

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
							<h3>EMPLOYEE REGISTRATION</h3>
						</div>

						
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Registration Form</h2>
									
										
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form name="eregisterform" id="eregisterform" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">

										

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="First-name">First Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="emp_name" name="emp_name" class="form-control" pattern="[A-Za-z ]{3,}" title="Only Characters and White Space Allowed">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="Last-name">Last Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="emp_lname" name="emp_lname" class="form-control" pattern="[A-Za-z ]{3,}" title="Only Characters and White Space Allowed">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" 
										 for="address">Address:</label>
												<div class="col-md-6 col-sm-6 ">
												<input id="emp_address" name="emp_address" class="form-control" required pattern="[0-9A-Za-z ]{3,}" title="Only Characters, Numbers and White Space Allowed">
											</div>
												</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="pincode">pincode <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="emp_pincode" name="emp_pincode" class="form-control" pattern="[0-9]{6,6}" title="Please Enter Valid Pincode">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Date of birth <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="emp_dob" name="emp_dob" class="form-control" placeholder="dd-mm-yyyy" type="date"  max="2002-01-01">
											</div>
										</div>
										<div class="item form-group">
											<label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">phone</label>
											<div class="col-md-6 col-sm-6 ">
											<input type="text" class="form-control" id="emp_phn" name="emp_phn" placeholder="Phone Number" pattern="[0-9]{10,10}" title="Please Enter The Valid Phone Number">
											<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
										</div>
										</div>
										<div class="item form-group">
											<label for="work Experience" class="col-form-label col-md-3 col-sm-3 label-align">Email </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="emp_email" name="emp_email" class="form-control" type="email" name="email">
											</div>
										</div>
										
										


										<div class="item form-group">
											<label for="work Experience" class="col-form-label col-md-3 col-sm-3 label-align">Experience<br>(in year wise) </label>
											<div class="col-md-6 col-sm-6 ">
												<input class="form-control" type="text" name="emp_wrkexp" id="emp_wrkexp" maxlength="2">
											</div>
										</div>


										<div class="item form-group">
											<label for="work Experience" class="col-form-label col-md-3 col-sm-3 label-align">Profile Image <br>(Accpet Image files only)</label>
											<div class="col-md-6 col-sm-6 ">
												<input class="form-control" type="file" name="emp_image" id="emp_image">
											</div>
										</div>
										
										<div class="item form-group">
											<label for="work Experience" class="col-form-label col-md-3 col-sm-3 label-align">work Experience<br>(Accpet pdf file only) </label>
											<div class="col-md-6 col-sm-6 ">
												<input id="emp_certificates" name="emp_certificates" class="form-control" type="file" >
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
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Address</th>
                          <th>Pincode</th>
                          <th>Dob</th>
                          <th>Phone</th>
                          <th>Email</th>
						  <th>Exprience</th>
						  <th>Certificate</th>
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
                              echo "<td>".$value["emp_name"]."</td>";
                              echo "<td>".$value["emp_lname"]."</td>";
                              echo "<td>".$value["emp_address"]."</td>";
                              echo "<td>".$value["emp_pincode"]."</td>";
                              echo "<td>".$value["emp_dob"]."</td>";
                              echo "<td>".$value["emp_phn"]."</td>";
                              echo "<td>".$value["emp_email"]."</td>";
                              echo "<td>".$value["emp_wrkexp"]."</td>";
                              
                              ?>
                              <td><a href="viewpdf.php?id=<?php echo($value['emp_id']);?>&name=<?php echo($value['emp_certificates'])?>"><i style="font-size:24px" class="fa fa-eye"></i></td>
                              <td><a onclick="return confirm('Are You sure that You want to delete this?')" href="delete.php?id=<?php echo $value['emp_id']?>&idname=emp_id&table=employee&back=Eregister"><i style="font-size:24px" class="fa fa-trash"></i></a></td>
                              <tr>
                            <?php
                            $s1++;
                          }
                      }
                        else
                        {
                          echo "<td colspan='12' align='center'>no records found </td>";
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
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


</body>
</html>