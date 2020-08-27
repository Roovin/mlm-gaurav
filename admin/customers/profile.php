<?php 
session_start();
error_reporting(0);
include '../conn.php';
$pid=$_SERVER['QUERY_STRING'];

$admin= $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
?>

<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Data Table | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />    

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">
        <?php include 'top-header.php';?>
           
           <!-- ========== Left Sidebar Start ========== -->
           <?php include 'sidebar.php';?>
           <!-- Left Sidebar End -->

           <!-- ============================================================== -->
           <!-- Start right Content here -->
           <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18"><?php echo strtoupper($customer_name);  ?></h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Table</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <center><h2 style="background: #ec536c !important;color: white;padding: 14px;margin: 0;">Sponser</h2>
										<table class="table table-bordered dt-responsive nowrap" style="border-collapse: inherit; border-spacing: 0; width: 100%; margin:0">
                                            <?php  
											$sql = "SELECT * FROM customers WHERE customer_id = '$admin'";
											$result=mysqli_query($conn, $sql);
											if($rows = mysqli_fetch_array($result))
											{ ?>
											<tr style="background: aliceblue;">
												<td style="width:50%;text-align: right; padding-right: 50px;">YOUR Id</td>
												<td>
													<a href="" style="color: black; padding-left: 50px;"><?php echo htmlentities($rows['customer_id']); ?></a>
												</td> 												
											</tr>  
                                            <tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right; padding-right: 50px;">Name</td>
												<td>
													<a href="" style="color: black;  padding-left: 50px;"><?php echo htmlentities($rows['name']); ?></a>
												</td> 												
											</tr> 
                                             
											<tr style="background: aliceblue;">
												<td style="width:50%;text-align: right; padding-right: 50px;">Email Id</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['email']); ?></a>
												</td> 												
											</tr> 
                                            <tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Date Of Birth</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['dob']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: aliceblue;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Gender</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
											<tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Mobile No.</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['mobile']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: aliceblue;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Address</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['address_permanent']); ?></a>
												</td> 												
											</tr> 
                                            <tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right;padding-right: 50px;">City</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: aliceblue;">
												<td style="width:50%;text-align: right;padding-right: 50px;">District</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right;padding-right: 50px;">State</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: aliceblue;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Country</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
                                            <tr style="background: antiquewhite;">
												<td style="width:50%;text-align: right;padding-right: 50px;">Pin Code</td>
												<td>
													<a href="" style="color: black;padding-left: 50px;"><?php echo htmlentities($rows['']); ?></a>
												</td> 												
											</tr>
											<?php
                                            } 
											else
											{
												echo "You have no sponser";
											}
											?> 
											
                                        </table>
										</center>




                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->






                        </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                    </div> <!-- container-fluid -->
                </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/jszip/jszip.min.js"></script>
    <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/js/pages/datatables.init.js"></script> 

    <script src="assets/js/app.js"></script>

    </body>
</html>