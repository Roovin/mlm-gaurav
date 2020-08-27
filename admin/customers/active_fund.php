<?php 
    session_start();
    error_reporting(0);
    include '../conn.php';
    $pid=$_SERVER['QUERY_STRING'];

    $admin= $_SESSION['customer_id'];
    $customer_name = $_SESSION['customer_name'];
    $sql = mysqli_query($conn, "SELECT active_fund FROM customers WHERE customer_id = '$admin'");
    $row = mysqli_fetch_array($sql);

    if(isset($_POST['add_fund'])){
        $add_fund = $_POST['fund'];
        // echo $add_fund;exit;
        $date = date('y-m-d');
        // echo $row['active_fund'];exit;
        $add_fund=$row['active_fund']+$add_fund;

        $sql = mysqli_query($conn, "UPDATE customers SET active_fund = '$add_fund' WHERE customer_id = '$admin'");
        if($sql){
            echo "<script>alert('Fund Add Successfull')</script>";
        }else{
            echo "<script>alert('No Add Fund')</script>";
        }
    }

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
                                        <h2>ADD FUND</h2>
                                      
                                        <h3 style="color:blue;">Active Fund: Rs. <?php echo 0; ?></h3>
                                        <form action="" method="POST">
                                            <div class="">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Add Fund :</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="fund" placeholder="Enter Balance">
                                                    </div>
                                                    <!-- <div id="sponser" style="color:red; font-size:18px;margin-left: 50px;"></div> -->
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="add_fund" >Add Fund</button>
                                        </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>TRANSFER FUND ANOTHER ID</h2>
                                       
                                        <h3 style="color:blue;">Active Fund: Rs. <?php echo 0; ?></h3>
                                        <form action="" method="POST">
                                            <div class="">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Enter Member Id:</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="customer_id"  id="sponser_id" onkeyup="myfunction()" placeholder="Enter member id">
                                                    </div>
                                                    <div id="sponser" style="color:red; font-size:18px;margin-left: 50px;"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Enter Fund Transfer:</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="transfer_fund" placeholder="Enter Fund">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="fund_transfer">Transfer</button>
                                        </form>
                                        
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






