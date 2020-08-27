<?php 
session_start();
// error_reporting(0);
if(empty($_SESSION['admin'])){
    header("location : index.php");
}else{
    include ('conn.php');

if(isset($_GET['del']))
    {
            mysqli_query($conn,"delete from products where id = '".$_GET['id']."'");
            $_SESSION['delmsg']="Product deleted !!";
    }

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
           
            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php';?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <!-- <div id="layout-wrapper"> -->            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18">Manage Products</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product &amp Packages</a></li>
                                        <li class="breadcrumb-item active">Manage Products</li>
                                    </ol>
                                </div>
                            </div>                        
                        </div>     
                        <!-- end page title -->
                        <table cellpadding="0" cellspacing="0" border="0" id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Contact no</th>
                                    <th>Shipping Address</th>
                                    <th>Product </th>
                                    <th>Qty </th>
                                    <th>Amount </th>
                                    <th>Order Date</th>                                         
                                </tr>
                                </thead>
                                <tbody> 
                                <?php 
                                    $f1="00:00:00";
                                    $from=date('Y-m-d')." ".$f1;
                                    $t1="23:59:59";
                                    $to=date('Y-m-d')." ".$t1;
                                    $query=mysqli_query($conn,"SELECT users.username as username,users.email as useremail,users.contact as usercontact,users.address as saddress,users.city as shippingcity,users.state as shippingstate,users.Pincode as shippingpincode,products.name as productname,orders.quantity as qty,orders.orderDate as orderdate, orders.price as oprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to'");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {
                                    ?>		
                                <tr>
                                    <td><?php echo htmlentities($cnt)?></td>
                                    <td><?php echo htmlentities($row['username']);?></td>
                                    <td><?php echo htmlentities($row['useremail']);?></td>                            
                                    <td><?php echo htmlentities($row['usercontact']);?></td>
                                    <td><?php echo htmlentities($row['saddress']);?></td>
                                    <td><?php echo htmlentities($row['productname']);?></td>
                                    <td><?php echo htmlentities($row['qty']);?></td>
                                    <td><?php echo htmlentities($row['oprice']);?></td>  
                                    <td><?php echo htmlentities($row['orderdate']);?></td>                                                                      
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
        </div>





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
    <?php }?>