<?php 
session_start();
error_reporting(0);
include '../conn.php';
$pid=$_SERVER['QUERY_STRING'];

$admin= $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
if(isset($_POST['update'])){
    $mobile = $_POST['mobile'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $adharCard = $_POST['adharCard'];
    $pancard = $_POST['pancard'];


    $sql = mysqli_query($conn, "UPDATE customers SET mobile='$mobile', dob='$date', address_permanent='$address', adhar='$adharCard', pan='$pancard' WHERE customer_id = '$admin'");
    if($sql)
    {
        echo "<script>alert('Update successfull');</script>";   
    }else{
        echo "<script>alert('Update is not successfull');</script>";
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
                                    <!-- <h4 class="font-size-18">Welcome <?php echo strtoupper($customer_name);  ?></h4>
                                    <ol class="breadcrumb mb-0"> -->
                                    <div style="font-size:18px;">
                                        Welcome
                                        <b style="color: #ec536c;"><?php echo ucwords($customer_name); ?></b>
                                    </div>
                                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Table</li> -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form action="" method="post" entype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Edit Bank Detail</h2></div>                                        
                                        <?php 
                                            $sql = mysqli_query($conn,"SELECT * FROM customers WHERE customer_id='$admin'");
                                            $result = mysqli_fetch_array($sql);

                                        ?>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Account Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" name="name" value="<?php echo $result['account_number']; ?>" placeholder="Account Number" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Account Holder</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="account_holder" value="<?php echo $result['']; ?>" placeholder="Account Holder Name" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Pan Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="mobile"  name="mobile" value="<?php echo $result['pan']; ?>" placeholder="Pan Number" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Ifsc Code</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="ifsc" value="<?php echo $result['ifsc_code']; ?>" placeholder="Ifsc Code">
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Bank Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="bank" value="<?php echo $result['bank']; ?>" placeholder="Bank Name" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Branch Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="branch_name" placeholder="Branch Name" value="<?php echo $result['bank_branch']; ?>" minilength="12" maxlength="12" pattern="[0-9]{4}[0-9]{4}[0-9]{4}" >
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                                </div>
                                            </div>
                                        </div>
                                        <button style="background-color:#17a085; margin-left:300px;" class="btn btn-primary btn-lg waves-effect waves-light" name="update">update</button>                                                           

                                    </div>



                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        </form>






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