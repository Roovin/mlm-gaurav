<?php
session_start();
error_reporting(0);
if(empty($_SESSION['admin']))
{
	header("location:index.php");
}
else
{
	include 'conn.php';
    session_commit();
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Manage Purchase | Admin Dashboard</title>
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
        <script src="./js/distributors.js"></script>

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
                                    <h4 class="font-size-18">Transfer History</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transfer History</a></li>
                                        <li class="breadcrumb-item active">Transfer History</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Example</h4> -->
                                        <form id="form-horizontal" class="form-horizontal form-wizard-wrapper">                                            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Distributor ID</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" placeholder="Distributor ID"onkeyup="filter_his();" id="filter-his-distriid" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Date</label>
                                                            <div class="col-lg-9">
                                                                <input type="date" placeholder="Date" onchange="filter_his();" id="filter-his-date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtCompanyBilling" class="col-lg-3 col-form-label">Challan Number</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" onkeyup="filter_his();" id="filter-his-challannum" class="form-control" placeholder="Challan Number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Select Delivery Status</label>
                                                            <div class="col-lg-9">
                                                                <select class="form-control" name="" id="filter-his-delivery" onchange="filter_his();">
                                                                    <option value="">Select Delivery Status</option>
                                                                    <option>Travelling</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                        </form>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
                                            <thead >
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Distributor ID</th>
                                                <th>Date</th>
                                                <th>Challan Number</th>
                                                <th>Tampoo Number</th>
                                                <th>Driver Phone</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                            </tr>
                                            </thead>


                                            <tbody id="filter_his_output">
                                            <?php                                            
                                            $sql = "SELECT * FROM transfer_info ORDER BY id DESC LIMIT 10";
                                            $cnt=1;
                                            $res = mysqli_query($conn,$sql);
                                            while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
                                            {                                                
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt)?></td>
                                                <td><?php echo htmlentities($r['distri_id'])?></td>
                                                <td><?php echo htmlentities($r['date_of_transfer'])?></td>
                                                <td><?php echo htmlentities($r['challan_number'])?></td>
                                                <td><?php echo htmlentities($r['tampoo_number'])?></td>
                                                <td><?php echo htmlentities($r['driver_phone'])?></td>
                                                <td id="viewchallan-'.$r['id'].'" onclick="view_challan(this);"><i class="fa fa-eye"  style="cursor:pointer;"></i></td>
                                                <td id="editloadchallan-'.$r['id'].'" onclick="editloadchallan(this);"><i class="fa fa-pencil"></i></td>
                                            </tr>
                                            <?php $cnt=$cnt+1; }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->                    
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>

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
<?php
}
?>