<?php
    session_start();
    $admin_name = $_SESSION['admin'];
    if(empty($_SESSION['admin']))
    {
        header("location:index.php");
    }
    else
    {
        include 'conn.php';

        if(isset($_POST['transfer_fund'])){
            $active_fund = $_POST['fund'];
            $member_id = $_POST['member_id'];
            $date = date('Y-m-d h:i:s');
            // echo $date; exit;

            $sql1 = mysqli_query($conn, "SELECT active_fund FROM customers WHERE customer_id = '$member_id'");
            $result = mysqli_fetch_array($sql1);
            $fund=$active_fund+$result['active_fund'];
            $sql = mysqli_query($conn, "UPDATE customers SET active_fund = '$fund' WHERE customer_id = '$member_id' ");

            $sql4 = mysqli_query($conn, "INSERT INTO admin_report(member_id, transfer_fund, date)VALUES('$member_id', '$active_fund', '$date')");

            $sql2 = mysqli_query($conn, "SELECT total_transfer FROM admin WHERE username = '$admin_name'");
            $result1 = mysqli_fetch_array($sql2);
            $tranfer=$fund+$result1['total_transfer'];
            $sql3 = mysqli_query($conn, "UPDATE admin SET total_transfer = '$tranfer' WHERE username = '$admin_name'");

            if($sql){
                echo "<script>alert('Add Fund Successfull')</script>";
            }else{
                echo "<script>alert('Add Fund Is Not Successfull')</script>";
            }
        }
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Add Customers | Admin Dashboard</title>
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
                                    <h4 class="font-size-18">Add Customers</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Customers</a></li>
                                        <li class="breadcrumb-item active">Add Customers</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="margin-left: 205px">
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Add Fund</h2></div>
                                        <form action="" method="post">
                                            <div class="form-group row text">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Enter Member Id</label>
                                                <div class="col-sm-8 ">
                                                    <input class="form-control" type="text"  name="member_id" placeholder="Enter Member Id" onkeyup = "myfunction()" id="member"> 
                                                </div>
                                            </div>
                                            <div id="sponser" style="color:red; font-size:18px;margin-left: 50px;"></div>
                                            <div class="form-group row text">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Enter Amount</label>
                                                <div class="col-sm-8 ">
                                                    <input class="form-control" type="text"  name="fund" placeholder="Enter Amount" id="add-distri-owner-name"> 
                                                </div>
                                            </div>
                                            <button style="background-color:#17a085; margin-left:250px;" class="btn btn-primary btn-lg waves-effect waves-light" name="transfer_fund" id="addd-btn">Transfer Fund</button>                                                                                                                                                                                                                     
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                                        
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
<script>
     function myfunction(){
        var sponser_name=document.getElementById("member").value;
       $.ajax({
           url:"customers/ajax/sponser_name.php",
           data:{sponser_name},
           type:"post",
           success:function(data){
            $("#sponser").html(data)
           }
       });
   }
</script>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<script src="assets/js/app.js"></script>

</body>
</html>
<?php } ?>