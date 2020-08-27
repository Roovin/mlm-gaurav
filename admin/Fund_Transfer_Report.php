<?php 
session_start();
error_reporting(0);
if(empty($_SESSION['admin'])){
    header("location : index.php");
}else{
    include ('conn.php');
    
    
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Manage Product | Admin Dashboard</title>
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
            <?php
            // if($success){
            //    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //         <strong>Great !</strong> Your Product Is Inserted..
            //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                 <span aria-hidden="true">&times;</span>
            //         </button>
            //     </div>';
            // }
            ?>
            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php';?>
            <!-- Left Sidebar End -->
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
                                    <h4 class="font-size-18">Fund Transfer Report</h4>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="margin-right: -52%">
                                        <h4 class="card-title">Example</h4>
                                        <form  method="post" enctype="multipart/form-data" >
                                            <!-- <div data-repeater-list="group-a"> -->
                                                <div data-repeater-item class="row">
                                                    <div  class="form-group col-lg-2">
                                                        <label for="name">Cusomer ID</label>
                                                        <input type="text" id="name" name="customer_id" class="form-control" placeholder="Cusomer ID"/>
                                                    </div>
        
                                                    <div  class="form-group col-lg-2">
                                                        <label for="transfered">Transfered</label>
                                                        <select class="ftr-fields" name="transfer" style="width: 105%; height: 53%;">
                                                            <option value="">select</option>
                                                            <option value="Transfered">Transfered</option>
                                                            <option value="Rejected" >Rejected</option>
                                                        </select>
                                                        <!-- <input type="email" id="email" class="form-control"/> -->
                                                    </div>
        
                                                    <div  class="form-group col-lg-2">
                                                        <label for="subject">Subject</label>
                                                        <input type="date" class="ftr-fields" name="date" style="width: 105%; height: 52%;">
                                                        <!-- <input type="text" id="subject" class="form-control"/> -->
                                                    </div>
                                                    
                                                    <div class="col-lg-2 align-self-center">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-block" value="submit" style="width: 40%; margin-left: 25%;">submit</button>
                                                    <!-- <div class="col-lg-2 align-self-center">
                                                        <input data-repeater-delete type="button" class="btn btn-primary btn-block" value="Delete"/>
                                                    </div> -->
                                                </div>
                                                
                                            <!-- </div> -->
                                            <!-- <input data-repeater-create type="button" class="btn btn-success mo-mt-2" value="Add"/> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>C-Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <?php
                            
                                if(isset($_POST['submit'])){
                                    // print_r($_POST['customer_id']);
                                $cid = $_POST['customer_id'];
                                $status = $_POST['transfer'];
                                $date = $_POST['date'];
                                // print_r($status);exit;

                                $query=mysqli_query($conn,"SELECT * FROM fund_trans WHERE customer_id LIKE '$cid' AND status LIKE '$status' AND date LIKE '$date'");
                                if($query){
                                    while($r=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                    {
                                        $cust_id = $r['customer_id'];
                                        // print_r($cust_id);
                                        $query=mysqli_query($conn,"SELECT name,mobile FROM customers WHERE customer_id='$cust_id'");
                                        $row = mysqli_fetch_array($query);
                                        $name = $row['name'];
                                        // $name = "fhd";
                                        // print_r($name);exit;
                                        $mobile = $row['mobile'];
                                        ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo htmlentities($cust_id)?></td>
                                        <td><?php echo htmlentities($name)?></td>
                                        <td><?php echo htmlentities($mobile)?></td>
                                        <td><?php echo htmlentities($r['amount'])?></td>
                                        <td><?php echo htmlentities($r['status'])?></td>
                                        <td><?php echo htmlentities($r['date'])?></td>
                                    </tr>
                                    
                                    </tbody>
                                <?php
                                    }
                                }else{
                                    echo "Credential is not match. please enter again !";
                                }
                            }
                            ?>                

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

        <!-- form repeater js -->
        <script src="assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

        <script src="assets/js/pages/form-repeater.int.js"></script>

        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/veltrix-mvc/vertical/form-repeater.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jul 2020 09:34:53 GMT -->
</html>
<?php 
}
?>
