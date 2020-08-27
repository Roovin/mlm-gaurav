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
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6" >
                                            <?php 
                                                $sql = mysqli_query($conn, "SELECT plane_name FROM active_plane WHERE customer_id = '$admin'");
                                                $result = mysqli_fetch_array($sql);
                                                if($result['plane_name'] == SILVER){
                                            ?>
                                                <div class="card mini-stat text-white" style="background-color:green;">
                                                <?php
                                                }else{ ?>
                                                    <div class="card mini-stat text-white" style="background-color:red;">
                                            <?php }
                                                ?>
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                                <img src="assets/images/services-icon/04.png" alt="">
                                                            </div> -->
                                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Silver</h5>
                                                            <h4 class="font-weight-medium font-size-24">Rs. 0
                                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                                            <!-- <div class="mini-stat-label bg-warning">
                                                                <p class="mb-0">+ 84%</p>
                                                            </div> -->
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="float-right">
                                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                                            </div>
                                                            <p class="text-white-50 mb-0 mt-1">Silver</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <?php
                                                    if($result['plane_name'] == GOLD){
                                                ?>
                                                    <div class="card mini-stat text-white" style="background-color:green;">
                                                <?php
                                                    }else{ ?>
                                                        <div class="card mini-stat text-white" style="background-color:red;">
                                            <?php
                                                    }
                                                ?>
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                                <img src="assets/images/services-icon/04.png" alt="">
                                                            </div> -->
                                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Gold</h5>
                                                            <h4 class="font-weight-medium font-size-24">Rs. 0
                                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                                            <!-- <div class="mini-stat-label bg-warning">
                                                                <p class="mb-0">+ 84%</p>
                                                            </div> -->
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="float-right">
                                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                                            </div>

                                                            <p class="text-white-50 mb-0 mt-1">Gold</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                            <?php
                                                    if($result['plane_name'] == DIAMOND){
                                                ?>
                                                    <div class="card mini-stat text-white" style="background-color:green;">
                                                <?php
                                                    }else{ ?>
                                                        <div class="card mini-stat text-white" style="background-color:red;">
                                            <?php
                                                    }
                                                ?>
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                                <img src="assets/images/services-icon/04.png" alt="">
                                                            </div> -->
                                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Diamond</h5>
                                                            <h4 class="font-weight-medium font-size-24">Rs. 0 
                                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                                            <!-- <div class="mini-stat-label bg-warning">
                                                                <p class="mb-0">+ 84%</p>
                                                            </div> -->
                                                        </div>
                                                        <div class="pt-2">
                                                            <div class="float-right">
                                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                                            </div>

                                                            <p class="text-white-50 mb-0 mt-1">Diamaond</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <?php
                                                        if($result['plane_name'] == RUBY){
                                                    ?>
                                                        <div class="card mini-stat text-white" style="background-color:green;">
                                                    <?php
                                                        }else{ ?>
                                                            <div class="card mini-stat text-white" style="background-color:red;">
                                                <?php
                                                        }
                                                    ?>
                                                        <div class="card-body">
                                                            <div class="mb-4">
                                                                <!-- <div class="float-left mini-stat-img mr-4">
                                                                    <img src="assets/images/services-icon/04.png" alt="">
                                                                </div> -->
                                                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Ruby</h5>
                                                                <h4 class="font-weight-medium font-size-24">Rs. 0 
                                                                    <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                                                <!-- <div class="mini-stat-label bg-warning">
                                                                    <p class="mb-0">+ 84%</p>
                                                                </div> -->
                                                            </div>
                                                            <div class="pt-2">
                                                                <div class="float-right">
                                                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                                                </div>

                                                                <p class="text-white-50 mb-0 mt-1">RUBY</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end row -->
                                        <div class="row">
                                        <div class="col-xl-3 col-md-6" style="padding-left: 34px;padding-right: 0px;">
                                                <?php
                                                        if($result['plane_name'] == CROWN){
                                                    ?>
                                                        <div class="card mini-stat text-white" style="background-color:green;">
                                                    <?php
                                                        }else{ ?>
                                                            <div class="card mini-stat text-white" style="background-color:red;">
                                                <?php
                                                        }
                                                    ?>
                                                        <div class="card-body">
                                                            <div class="mb-4">
                                                                <!-- <div class="float-left mini-stat-img mr-4">
                                                                    <img src="assets/images/services-icon/04.png" alt="">
                                                                </div> -->
                                                                <h5 class="font-size-16 text-uppercase mt-0 text-white-50">CROWN</h5>
                                                                <h4 class="font-weight-medium font-size-24">Rs. 0 
                                                                    <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                                                <!-- <div class="mini-stat-label bg-warning">
                                                                    <p class="mb-0">+ 84%</p>
                                                                </div> -->
                                                            </div>
                                                            <div class="pt-2">
                                                                <div class="float-right">
                                                                    <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                                                </div>

                                                                <p class="text-white-50 mb-0 mt-1">CROWN</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
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
