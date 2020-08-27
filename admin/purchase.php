<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Insert Product | Admin Dashboard</title>
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
            <?php
            if($success){
               echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Great !</strong> Your Product Is Inserted..
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
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
                                    <h4 class="font-size-18">Purchase Entry</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchase</a></li>
                                        <li class="breadcrumb-item active">Purchase Entry</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Purchase Entry</h2></div>
                                        <div class="form-group row text">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">MFD. By</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="productName" placeholder=" MFD By"> 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label"> Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="DD / MM / YYYY">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label"> Bill Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number"  name="beforeDiscount" placeholder=" Bill Number">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Product 1 <br>Scan Barcode for Product ID</h2></div>
                                        <div class="form-group row text py-5">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Generate/Attach Barcode</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="productName" placeholder=" Barcode"> 
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label"> Product Category</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Product Category">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Product Sub Category</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="productAvailability">
                                                    <option value="">Product Sub Category</option>                                                    
                                                </select>
                                            </div>
                                        </div>         
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label">Select Product</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="productAvailability">
                                                    <option value="">Select Product</option>                                                    
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Quantity</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Quantity">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Purchase Price per Unit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Purchase Price per Unit">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Total</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Total" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">GST Rate (%)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="GST Rate (%)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">GST Figure</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="GST Figure" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Net Purchase Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Net Purchase Price" disabled>
                                            </div>
                                        </div>

                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Product General Information</h2></div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Batch Number</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Batch Number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">MFD Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="DD / MM / YYYY">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label"> Exp Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder=" Exp Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Net Purchase Price Per Unit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Net Purchase Price Per Unit" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label"> MRP</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="MRP">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label"> Discount%</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Discount%">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Sale Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Sale Price" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Gross Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Gross Profit" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">GST on Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="GST on Profit" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Net Profit</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Net Profit" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Profit Cut (%)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Profit Cut (%)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Profit for Disburse (%)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Profit for Disburse (%)" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Profit For Business Partner (%)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Profit For Business Partner (%)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Percentage Sharing on BV (%)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Percentage Sharing on BV (%)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Business Volume</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text"  name="productCompany" placeholder="Business Volume" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->                            
                        </div> <!-- end row -->                        
                    </form>
                    </div> <!-- container-fluid -->
                    <button style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="insertCategory">Submit Bill</button>
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