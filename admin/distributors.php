<?php
session_start();
if(empty($_SESSION['admin']))
{
	header("location:index.php");
}
else
{
	include 'conn.php';
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Add Distributors | Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                                    <h4 class="font-size-18">Add Distributors</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Distributors</a></li>
                                        <li class="breadcrumb-item active">Add Distributors</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form method="post" class="mt-3" action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">                                
                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Add Distributors</h2></div>
                                        <div class="form-group row text">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Owner's Name</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="" placeholder="Owner Name" id="add-distri-owner-name" required> 
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Owner's Phone Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number"  name="" placeholder="Owner's Phone Number" id="add-distri-owner-phone" required>
                                            </div>
                                        </div>                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Owner's Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Owner's Address" id="add-distri-owner-address" required>
                                            </div>
                                        </div>     
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Store's State </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Store's State" id="add-distri-store-state" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Store's City</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Store's City" id="add-distri-store-city" required>
                                            </div>
                                        </div>    
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Store's Address</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Store's Address" id="add-distri-store-address" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Profit On Business Volume </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Profit On Business Volume" id="add-distri-profit-bv" required>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Security Amount </label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Security Amount" id="add-distri-security-amount" required>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="" placeholder="Password" id="add-distri-password" required>
                                            </div>
                                        </div> 
                                        <button style="background-color:#17a085; margin-left:250px;" class="btn btn-primary btn-lg waves-effect waves-light" id="addd-btn" onclick="add_distri();">Add Distributor</button>                                                                                                                                                                                                                     
                                    </div>
                                </div>
                            </div> <!-- end col -->                            
                        </div> <!-- end row -->    
                        
                    </form>
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

<script src="assets/js/app.js"></script>

</body>
</html>
<?php }?>