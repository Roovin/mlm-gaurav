<?php 
session_start();
error_reporting(0);
include 'conn.php';


if (isset($_POST['insertCategory'])) {
    
    $subcategoryName = $_POST['subCategoryName'];
    
        $sql = "insert INTO product_sub_category(sub_category) VALUES('$subcategoryName')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: insert_product.php");
        }
}
?>
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
                                    <h4 class="font-size-18">Insert Sub Categories</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product &amp Packages</a></li>
                                        <li class="breadcrumb-item active">Insert Sub Category</li>
                                    </ol>
                                </div>
                            </div>                        
                        </div>     
                        <!-- end page title -->
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <!-- <h4 class="card-title">Textual inputs</h4>
                                        <p class="card-title-desc">Here are examples of <code
                                                class="highlighter-rouge">.form-control</code> applied to each
                                            textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                                    class="highlighter-rouge">type</code>.</p> -->
        
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Sub Category Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text"  name="subCategoryName">
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <button style="background-color:#17a085; margin-left:560px;" class="btn btn-primary btn-lg waves-effect waves-light" name="insertCategory">Insert Category</button>
                        </div> <!-- end row -->
                    </form>

                    <table cellpadding="0" cellspacing="0" border="0" id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Category ID</th>
                                    <th>Sub Category</th>                                   
                                </tr>
                                </thead>
                                <tbody>
                                <?php $query=mysqli_query($conn,"select * from product_sub_category");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
									?>	
                                <tr>
                                    <td><?php echo htmlentities($cnt)?></td>
                                    <td><?php echo htmlentities($row['category_id']);?></td>
                                    <td><?php echo htmlentities($row['sub_category'])?></td>                            
                                </tr>   
                                <?php $cnt=$cnt+1; } ?>                                                                     
                                </tbody>
                            </table>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <!-- <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer> -->

            </div>
            <!-- end main content-->
            
        <!-- /Right-bar -->

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
