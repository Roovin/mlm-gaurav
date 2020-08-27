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
        <link rel="stylesheet" href="css/purchase.css">

        <script src="./js/jquery-1.9.0.min.js"></script>
        <script src="./js/purchase.js"></script>
        
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
                                    <h4 class="font-size-18">Manage Purchase</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Purchase</a></li>
                                        <li class="breadcrumb-item active">Manage Purchase</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        
                    <div id="view-bill-cover"style="width:0px">
                        <center>
                        <div id="view-bill">
                            <div id="view-close-bill" style="float:right;border-radius:100%;width:28px;height:25px;background-color:red;color:white;font-family:calibri;padding-top:5px;text-align:center;margin-right:15px;margin-top:-15px;padding-left:2px;cursor:pointer;">X</div>
                            <div id="view-bill-mfd-name"><b><div></div></b></div>
                            <div id="bill-info">
                                <div class="view-bill-info">Bill Number:&nbsp;&nbsp;&nbsp;<span></span></div>
                                <div class="view-bill-info">Purchase Date:&nbsp;&nbsp;&nbsp;<span></span></div>
                            </div>
                            <div id="view-bill-info2">
                                <div class="view-bill-info">Stock ID:&nbsp;&nbsp;&nbsp;<span ></span></div>
                                <div class="view-bill-info"></div>
                            </div>
                            <div id="view-bill-details">
                                <div class="view-bsno"><b>Sno</b></div>
                                <div class="view-bsno" style="width:200px;"><b>Products</b></div>
                                <div class="view-bsno" style="width:70px;"><b>Quantity</b></div>
                                <div class="view-bsno" style="width:120px;"><b>Rate</b></div>
                                <div class="view-bsno" style="width:120px;"><b>Total Cost</b></div>
                                <div class="view-bsno"><b>GST (%)</b></div>
                                <div class="view-bsno" style="width:100px;"><b>GST (Fig.)</b></div>
                                <div class="view-bsno" style="width:113px;border-right:0px;"><b>Net Price</b></div>
                            </div>
                            <div id="view-billing-output">
                            
                            </div>
                            <div class="view-bill-details">
                                <div class="view-bsno" style="border-right:1px solid white;"></div>
                                <div class="view-bsno" style="width:200px;border-right:1px solid white;"><b>Grand Total</b></div>
                                <div class="view-bsno" style="width:70px;border-right:1px solid white;"></div>
                                <div class="view-bsno" style="width:120px;"></div>
                                <div class="view-bsno" style="width:120px;">10000000</div>
                                <div class="view-bsno"></div>
                                <div class="view-bsno" style="width:100px;">10000000</div>
                                <div class="view-bsno" style="width:113px;border-right:0px;">1000000</div>
                            </div>
                        </div>
                        </center>
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
                                                            <label for="txtFirstNameBilling" class="col-lg-3 col-form-label">Manufacturer Name</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" placeholder="Manufacturer" onkeyup="his_filter();" id="his_filter_mfdby" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtLastNameBilling" class="col-lg-3 col-form-label">Product Code</label>
                                                            <div class="col-lg-9">
                                                                <input type="text" placeholder=" Product Code" onkeyup="his_filter();" id="his_filter_productcode" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtCompanyBilling" class="col-lg-3 col-form-label">Date (From)</label>
                                                            <div class="col-lg-9">
                                                                <input type="date" onchange="his_filter();" id="his_filter_fromdate" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">Date (To)</label>
                                                            <div class="col-lg-9">
                                                                <input onchange="his_filter();" id="his_filter_todate" type="date" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                        </form>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap " style="border-collapse: collapse; border-spacing: 0; width: 100%; ">
                                            <thead id="purchase-data-table">
                                            <tr>
                                                <th>Sno.</th>
                                                <th>Manufactured By</th>
                                                <th>Pur. Date</th>
                                                <th>Bill Number</th>
                                                <th>Stock ID</th>
                                                <th>View Bill</th>
                                                <th>Delete Bill</th>
                                            </tr>
                                            </thead>
                                            <tbody id="his_filter_output">
                                            <?php
                                            $sql = "SELECT * FROM billing_info ORDER BY id DESC LIMIT 10";
                                            $res = mysqli_query($conn,$sql);
                                            while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($r['id'])?></td>
                                                <td><?php echo htmlentities($r['mfd_by'])?></td>
                                                <td><?php echo htmlentities($r['purchase_date'])?></td>
                                                <td><?php echo htmlentities($r['bill_number'])?></td>
                                                <td><?php echo htmlentities($r['stock_id'])?></td>
                                                <td onclick="billview(this);"id="billview-'.$r['id']"><i class="fa fa-eye" style="cursor: pointer;"></i></td>
                                                <td id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></td>
                                            </tr>
                                            
                                            <?php } ?>
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