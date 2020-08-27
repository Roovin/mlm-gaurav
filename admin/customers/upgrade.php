<?php 
    session_start();
    error_reporting(0);
    include '../conn.php';
    $pid=$_SERVER['QUERY_STRING'];

    $admin= $_SESSION['customer_id'];
    $sql = mysqli_query($conn, "SELECT sponser_id FROM customers WHERE customer_id = '$admin'");
    $result = mysqli_fetch_array($sql);
    $sponser_id = $result['sponser_id'];
    $customer_name = $_SESSION['customer_name'];

    if(isset($_POST['submit'])){
        $upgrade_balance = $_POST['upgrade_balance'];
        // echo $upgrade_balance;exit;
        $customer_id = $_POST['customer_id'];
        $date = date('y-m-d');
        if($upgrade_balance == 399){
            $plane_name="BASIC";
        }elseif($upgrade_balance == 599){
            $plane_name = "SILVER";
        }elseif($upgrade_balance == 999){
            $plane_name = "GOLD";
        }elseif($upgrade_balance == 1999){
            $plane_name = "DIAMOND";
        }elseif($upgrade_balance == 3499){
            $plane_name = "RUBY";
        }elseif($upgrade_balance == 4999){
            $plane_name = "CROWN";
        }elseif($upgrade_balance == 9999){
            $plane_name = "ROYAL";
        }

        $sql1 = mysqli_query($conn, "SELECT is_member_active, sponser_id, account_balance FROM customers WHERE customer_id = '$sponser_id'");
        $result1 = mysqli_fetch_array($sql1);
        if($result1['is_member_active'] == 1){ 

            $member=$result['sponser_id'];
            $new_account_balance=$result['account_balance']+100;            
            $sql=mysqli_query($conn, "UPDATE customers SET account_balance='$new_account_balance' WHERE customer_id='$sponserId'");

            if($member){
                $sql1 = mysqli_query($conn, "SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member'");
                $result=mysqli_fetch_array($sql1);
                if($result['is_member_active'] == 1){
                    $sponser_id1=$result['sponser_id'];
                    $new_account_balance=$result['level_income']+50;
                    $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member'");
                  
                if($sponser_id1){                    
                    $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$sponser_id1'");
                    $result=mysqli_fetch_array($sql);
                    if($result['is_member_active'] == 1){
                        $member=$result['sponser_id'];                    
                        $new_account_balance=$result['level_income']+25;
                        $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$sponser_id1'");
                    
                        if($member){
                            $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member'");
                            $result=mysqli_fetch_array($sql);
                            if($result['is_member_active'] == 1){
                                $member1=$result['sponser_id'];
                                $new_account_balance=$result['level_income']+20;
                                $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member'");
                        
                                if($member1){
                                    $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member1'");
                                    $result=mysqli_fetch_array($sql);
                                    if($result['is_member_active'] == 1){
                                        $member2=$result['sponser_id'];
                                        $new_account_balance=$result['level_income']+12;
                                        $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member1'");
                        
                                        if($member2){
                                            // echo $sponser_id1;
                                            $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member2'");
                                            $result=mysqli_fetch_array($sql);
                                            if($result['is_member_active'] == 1){
                                                $member3=$result['sponser_id'];
                                                $new_account_balance=$result['level_income']+8;
                                                $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member2'");
                                
                                                if($member3){
                                                    // echo $sponser_id1;
                                                    $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member3'");
                                                    $result=mysqli_fetch_array($sql);
                                                    if($result['is_member_active'] == 1){
                                                        $member4=$result['sponser_id'];
                                                        // echo $result['level_income'];
                                                        $new_account_balance=$result['level_income']+5;
                                                        $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member3'");
                                                
                                                        if($member4){
                                                            // echo $sponser_id1;
                                                            $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member4'");
                                                            $result=mysqli_fetch_array($sql);
                                                            if($result['is_member_active'] == 1){
                                                                $member5=$result['sponser_id'];
                                                                // echo $result['level_income'];
                                                                $new_account_balance=$result['level_income']+4;
                                                                $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member4'");
                                                        
                                                                if($member5){
                                                                    // echo $sponser_id1;
                                                                    $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member5'");
                                                                    $result=mysqli_fetch_array($sql);
                                                                    if($result['is_member_active'] == 1){
                                                                        $member6=$result['sponser_id'];
                                                                        $new_account_balance=$result['level_income']+3;
                                                                        $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member5'");
                                                                
                                                                        if($member6){
                                                                            // echo $sponser_id1;
                                                                            $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member6'");
                                                                            $result=mysqli_fetch_array($sql);
                                                                            if($result['is_member_active'] == 1){
                                                                                $member7=$result['sponser_id'];
                                                                                // echo $result['level_income'];
                                                                                $new_account_balance=$result['level_income']+2;
                                                                                $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member6'");
                                                                        
                                                                                    if($member7){
                                                                                    // echo $sponser_id1;
                                                                                    $sql=mysqli_query($conn,"SELECT sponser_id, is_member_active, level_income FROM customers WHERE customer_id='$member7'");
                                                                                    $result=mysqli_fetch_array($sql);
                                                                                    if($result['is_member_active'] == 1){
                                                                                        $member8=$result['sponser_id'];
                                                                                        // echo $result['level_income'];
                                                                                        $new_account_balance=$result['level_income']+1;
                                                                                        $sql=mysqli_query($conn, "UPDATE customers SET level_income='$new_account_balance' WHERE customer_id='$member7'");
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $sql = mysqli_query($conn, "SELECT active_fund FROM customers WHERE customer_id = '$admin'");
        $result = mysqli_fetch_array($sql);
        $active_fund=$result['active_fund'];
        if($active_fund >= $upgrade_balance){
        
            $sql2 = mysqli_query($conn, "SELECT customer_id FROM active_plane WHERE customer_id = '$customer_id'");
                if($sql2){
                    $active_balance = $active_fund-$upgrade_balance;
                    $sql = mysqli_query($conn, "UPDATE customers SET active_fund = '$active_balance' WHERE customer_id = '$admin'"); 

                    $sql3 = mysqli_query($conn, "UPDATE active_plane SET plane_name = '$plane_name', amount = '$upgrade_balance' WHERE customer_id = '$customer_id'");
                    if($sql3){
                        echo "<script>alert('Pack is Update')</script>";
                    }
                }else{
                    
                    $sql = mysqli_query($conn, "INSERT INTO active_plane(customer_id, by_upgrade_id, plane_name, amount, active_date)values('$customer_id', '$admin', '$plane_name', '$upgrade_balance', '$date')");

                    $sql1 = mysqli_query($conn, "UPDATE customers SET is_member_active = 1 WHERE customer_id = '$customer_id'");
                    if($sql){
                        $active_balance = $active_fund-$upgrade_balance;
                        $sql = mysqli_query($conn, "UPDATE customers SET active_fund = '$active_balance' WHERE customer_id = '$admin'"); 
                        echo "<script>alert('Member Activate Successfull')</script>";
                    }
                }
            }else{
                echo "<script>alert('Balance is Low')</script>";
            }
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
                                    <h4 class="font-size-18"><?php echo strtoupper($customer_name);  ?></h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Veltrix</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Data Table</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>UPGRADE YOUR ID</h2>
                                        <?php 
                                            $sql=mysqli_query($conn, "SELECT active_fund FROM customers WHERE customer_id='$admin'");
                                            $row=mysqli_fetch_array($sql);
                                        ?>
                                        <h3 style="color:blue;">Active Fund: Rs. <?php echo $row['active_fund']; ?></h3>
                                        <form action="" method="POST">
                                            <div class="">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">ENTER MEMBER ID:</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="customer_id"  id="sponser_id" onkeyup="myfunction()" placeholder="Enter member id">
                                                    </div>
                                                    <div id="sponser" style="color:red; font-size:18px;margin-left: 50px;"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">PLEASE SELECT UPGRADE:</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <select class="form-control" name="upgrade_balance" id="filter-his-delivery" onchange="filter_his();">
                                                            <option value="399">Upgrade your Id 399</option>
                                                            <option value="599">Upgrade your Id 599</option>
                                                            <!-- <option>Travelling</option> -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="submit" >submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h2>UPGRADE YOUR TOPUP</h2>
                                        <?php 
                                            $sql=mysqli_query($conn, "SELECT active_fund FROM customers WHERE customer_id='$admin'");
                                            $row=mysqli_fetch_array($sql);
                                        ?>
                                        <h3 style="color:blue;">Active Fund: Rs. <?php echo $row['active_fund']; ?></h3>
                                        <form action="" method="POST">
                                            <div class="">
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">ENTER MEMBER ID:</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="customer_id"  id="sponser_detail" onkeyup="member_fun()" placeholder="Enter member id">
                                                    </div>
                                                    <div id="sponser_name" style="color:red; font-size:18px;margin-left: 50px;"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="txtEmailAddressBilling" class="col-lg-3 col-form-label">PLEASE ENTER TOPUP :</label>
                                                    <div class="" style="width: 25%;margin-left: -100px;">
                                                        <input class="form-control" type="text" name="Enter Amount Topup" placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" name="submit" >submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


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
    <script>
     function myfunction(){
        var sponser_name=document.getElementById("sponser_id").value;
       $.ajax({
           url:"ajax/sponser_name.php",
           data:{sponser_name},
           type:"post",
           success:function(data){
            $("#sponser").html(data)
           }
       });
   }
   function member_fun(){
       console.log("h");
        var sponser_name=document.getElementById("sponser_detail").value;
       $.ajax({
           url:"ajax/sponser_name.php",
           data:{sponser_name},
           type:"post",
           success:function(data){
            $("#sponser_name").html(data)
           }
       });
   }
    </script>
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






