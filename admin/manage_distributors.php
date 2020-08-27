<?php 
session_start();
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
                                    <h4 class="font-size-18">Manage Distributors</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Distributors</a></li>
                                        <li class="breadcrumb-item active">Manage Distributors</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Example</h4>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div>
                                                        <div class="form-group mb-4">
                                                            <label for="input-date1">Owner's Name</label>
                                                            <input id="input-date1" class="form-control input-mask">                                                            
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="input-date2">Owner Phone Number</label>
                                                            <input id="input-date2" class="form-control input-mask">                                                        
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="input-datetime">Store's State</label>
                                                            <input id="input-datetime" class="form-control input-mask">                                                            
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-4 mt-lg-0">
                                                        <div class="form-group mb-4">
                                                            <label for="input-repeat">Store's City</label>
                                                            <input id="input-repeat" class="form-control input-mask">                                                        
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="input-mask">Distributor ID</label>
                                                            <input id="input-mask" class="form-control input-mask">                                                            
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="input-ip">Active Status</label>
                                                            <input id="input-ip" class="form-control input-mask">                                                            
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form> -->
                                        <table cellpadding="0" cellspacing="0" border="0" id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Owner Name</th>
                                                <th>Owner Phone</th>
                                                <th>Store City</th> 
                                                <th>Store State</th>      
                                                <th>Status</th>                                                         
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $query=mysqli_query($conn,"SELECT * FROM distributors ORDER BY id DESC LIMIT 10");
                                                $cnt=1;
                                                while($r=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                                {
                                                    $status = $r['active_status'];
                                                    if($status==1)
                                                    {
                                                        $status2 = "Active";
                                                    }
                                                    else
                                                    {
                                                        $status2 = "Inactive";
                                                    }
                                                ?>	
                                            <tr>
                                                <td><?php echo htmlentities($r['distri_id'])?></td>
                                                <td><?php echo htmlentities($r['owner_name']);?></td>
                                                <td><?php echo htmlentities($r['owner_phone']);?></td>                            
                                                <td><?php echo htmlentities($r['store_city']);?></td>
                                                <td><?php echo htmlentities($r['store_state']);?></td>
                                                <td><?php echo $status2 ?></td>                                                                                                                        
                                            </tr>   
                                            <?php $cnt=$cnt+1; } ?>                                                                     
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                </div>
            </div>

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