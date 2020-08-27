<?php 
session_start();
error_reporting(0);
if(empty($_SESSION['customer_id'])){
    header("location : index.php");
}else{
    include('../conn.php');
    $admin= $_SESSION['customer_id'];
    $customer_name = $_SESSION['customer_name'];
    
	$direct_member = 0;
//	$total_member = 0;
	$wallet_balance = 0;
	$direct_income = 0;
	$sql="SELECT wallet_balance, account_balance FROM customers WHERE customer_id='$admin'";
	$result=mysqli_query($conn, $sql);
	if($row=mysqli_fetch_array($result))
	{
		$wallet_balance = $row['wallet_balance'];
		$direct_income = $row['account_balance'];
    }
?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/libs/chartist/chartist.min.css" rel="stylesheet">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <style>
            .single th{
                border: 1px solid #ddd;
                padding: 8px;
            }
            
            @media only screen and (max-width: 500px){
                .navbar h4{
                    margin-left: 13px;
                }
            }
            
        </style>

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
                            <!--<div class="table-responsive">-->
                            <?php 
                                $sql = mysqli_query($conn, "SELECT news FROM news");
                                // $result = mysqli_fetch_array($sql)
                                $news = "";
                                while($result = mysqli_fetch_array($sql)){
                                    $news .= $result['news']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            ?>
                                <?php } ?>
                                <marquee behavior="" direction="" style="color:red; font-size:20px;"><?php echo $news; ?> </marquee>
                            <div class="col-sm-6">
                                <div class="page-title-box">

                                    <div style="font-size:18px;">
                                        Welcome
                                        <?php
                                            $sql = mysqli_query($conn, "SELECT is_member_active FROM customers WHERE customer_id = '$admin'");
                                            $result = mysqli_fetch_array($sql);
                                            $paid_amount = $result['is_member_active'];;
                                            if($paid_amount > 0){ ?>
                                                <b style="color:green ;"><?php echo ucwords($customer_name); ?></b>
                                           <?php }else{ ?>
                                                <b style="color: #ec536c;"><?php echo ucwords($customer_name); ?></b>
                                          <?php }
                                        ?>
                                    </div>
                                    <!-- <h4 class="font-size-18">Welcome <?php //echo $row['name']; ?></h4> -->
                                    <div>
                                        User Id:
                                        <b style="color:green;"><?php echo $admin; ?></b>
                                    </div>
                                    <div>
                                        Status:
                                        <?php
                                            if($paid_amount > 0){ ?>
                                                <b style="color:green;">Active</b>
                                           <?php }  else{ ?>
                                               <b style="color:red;">InActive</b>
                                          <?php } 
                                        ?>    
                                            
                                        
                                        </div>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active">Welcome to Members Dashboard</li>
                                    </ol>
                                    <!-- <span class="fa fa-whatsapp">
                                        <img src="\assets\images\whatsapp.png" alt="">
                                    </span> -->
                                    <i class="fa fa-whatsapp"></i>
                                
                                        <!-- <i src="\assets\images\whatsapp.png"><img src="\assets\images\whatsapp.png" alt=""></i> -->
                                    
                                    
                                    <a href="whatsapp://send?https://www.youtube.com/watch?v=Ar1QWd78r7o" title="Share on whatsapp"></a>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                <?php 
                                    // include('sponser_detail.php');
                                    $sql = "select * from customers where customer_id = (SELECT sponser_id from customers WHERE customer_id='$admin')";
									$result=mysqli_query($conn, $sql);
									if($rows = mysqli_fetch_array($result))
                                ?>
                                    <div style="font-size:18px">
                                            <h4>Your Sponser Detail</h4>
                                        <div>
                                            Sponser Id:
                                            <b style="color:green;"><?php echo $rows['customer_id']; ?></b>
                                        </div>
                                        <div>
                                            Sponser Name:
                                            <b style="color:green;"><?php echo $rows['name']; ?></b>
                                        </div>
                                        <div>
                                            Sponser Contact:
                                            <b style="color:green;"><?php echo $rows['mobile']; ?></b>
                                        </div>
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item active"></li>
                                        </ol>
                                    </div>
                                </div>
                            <!--</div>-->
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-danger text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/01.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">LEVEL</h5>
                                            <?php
                                                $sql = mysqli_query($conn, "SELECT COUNT(*) AS total FROM customers WHERE sponser_id='$admin'");
                                                $result = mysqli_fetch_array($sql);
                                                $direct_member = $result['total'];                                                
                                                if($direct_member >= 2 && $direct_member < 5){ ?>
                                                    <h4 class="font-weight-medium font-size-24">1st 
                                                <?php }
                                                elseif($direct_member >= 5 && $direct_member < 8){ ?>
                                                        <h4 class="font-weight-medium font-size-24">2nd 
                                                <?php  }
                                                elseif($direct_member >= 8 && $direct_member < 12){ ?>
                                                    <h4 class="font-weight-medium font-size-24">3rd 
                                                <?php  }
                                                elseif($direct_member >= 12 && $direct_member < 16){ ?>
                                                    <h4 class="font-weight-medium font-size-24">4th 
                                                <?php  }
                                                elseif($direct_member >= 16 && $direct_member < 21){ ?>
                                                    <h4 class="font-weight-medium font-size-24">5th
                                                <?php  }
                                                elseif($direct_member >= 21 && $direct_member < 26){ ?>
                                                    <h4 class="font-weight-medium font-size-24">6th
                                                <?php  }
                                                elseif($direct_member >= 26 && $direct_member < 32){ ?>
                                                    <h4 class="font-weight-medium font-size-24">7th
                                                <?php  }
                                                elseif($direct_member >= 32 && $direct_member < 38){ ?>
                                                    <h4 class="font-weight-medium font-size-24">8th
                                                <?php  }
                                                elseif($direct_member >= 38 && $direct_member < 46){ ?>
                                                    <h4 class="font-weight-medium font-size-24">9th
                                                <?php  }
                                                elseif($direct_member >= 46 && $direct_member < 54){ ?>
                                                    <h4 class="font-weight-medium font-size-24">10th
                                                <?php  }
                                                elseif($direct_member >= 54 && $direct_member < 64){ ?>
                                                    <h4 class="font-weight-medium font-size-24">11th
                                                <?php  }
                                                elseif($direct_member >= 64 && $direct_member < 74){ ?>
                                                    <h4 class="font-weight-medium font-size-24">12th
                                                <?php  }
                                                elseif($direct_member >= 74 && $direct_member < 86){ ?>
                                                    <h4 class="font-weight-medium font-size-24">13th
                                                <?php  } 
                                                elseif($direct_member >= 86 && $direct_member < 101){ ?>
                                                    <h4 class="font-weight-medium font-size-24">14th
                                                <?php  } 
                                                elseif($direct_member >= 101){ ?>
                                                    <h4 class="font-weight-medium font-size-24">15th
                                                <?php  }
                                                else{ ?>
                                                    <h4 class="font-weight-medium font-size-24">0
                                                <?php  } 
                                                                            
                                                ?>
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-success">
                                                <p class="mb-0">+ 12%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">LEVEL</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-warning text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/02.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Direct Member</h5>
                                            <?php 
                                            /*$sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$admin'";
                                            $result=mysqli_query($conn, $sql);
                                            $row=mysqli_fetch_array($result);    
                                            $direct = $row['total'];*/                                       
                                            ?>
                                            <h4 class="font-weight-medium font-size-24"><?php echo $direct_member; ?> </h4>
                                              
                                                <!-- <i class="mdi mdi-arrow-down text-danger ml-2"></i> -->
                                            <!-- <div class="mini-stat-label bg-danger">
                                                <p class="mb-0">- 28%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="view_members.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>
                                            <p class="text-white-50 mb-0 mt-1">Direct Member</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-success text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/03.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Active Down line</h5>
                                            <?php
                                                include("total_member_count.php");
                                            ?>
                                                    <h4 class="font-weight-medium font-size-24"><?php echo $total_member; ?>    
                                                 <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-info">
                                                <p class="mb-0"> 00%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Active Down line</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Active Fund</h5>
                                            <?php
                                                 $sql="SELECT active_fund FROM customers WHERE customer_id='$admin'";
                                                 $result=mysqli_query($conn, $sql);
                                                 $row=mysqli_fetch_array($result);
                                            ?>

                                          <h4 class="font-weight-medium font-size-24">Rs.<?php echo $row['active_fund']; ?>
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="active_fund.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Active Fund</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-danger text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Direct Income</h5>
                                            <?php
                                                /*$sql = "SELECT account_balance FROM customers where customer_id='$admin'";
                                                $result=mysqli_query($conn, $sql);
                                                $row=mysqli_fetch_array($result);
                                                $direct_income=$row['account_balance'];*/

                                            ?>
                                            <h4 class="font-weight-medium font-size-24">Rs.<?php  echo  $direct_income; ?>
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>
                                                
                                            <p class="text-white-50 mb-0 mt-1">Direct Income</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-warning text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Single Leg Income</h5>
                                            <?php
                                            
											$temp_total_member = $total_member;
											$payable_amount = 0;
                                            if($direct_member >= 2){
												if($temp_total_member >= 50){
                                                    $payable_amount += 1000; 
													$temp_total_member -= 50;
                                                }
                                                if($temp_total_member >= 100){
                                                    $payable_amount += 1500;
													$temp_total_member -= 100;
                                                }
                                                if($temp_total_member >= 250){
                                                    $payable_amount += 2000; 
													$temp_total_member -= 250;
                                                }
                                                if($temp_total_member >= 1000){
                                                    $payable_amount += 4000;
													$temp_total_member -= 1000;
                                                }
                                                if($temp_total_member >= 2000){
                                                    $payable_amount += 6000;
													$temp_total_member -= 2000;
                                                }
                                                if($temp_total_member >= 2500){
                                                    $payable_amount += 7500; 
													$temp_total_member -= 2500;
                                                }   
                                                if($temp_total_member >= 5000){
                                                    $payable_amount += 10000; 
													$temp_total_member -= 5000;
                                                }
                                                if($temp_total_member >= 7500){
                                                    $payable_amount += 15000;
													$temp_total_member -= 7500;
                                                }
                                                elseif($temp_total_member >= 15000){
                                                    $payable_amount += 21000;
													$temp_total_member -= 15000;
                                                }
                                                elseif($temp_total_member >= 25000){
                                                    $payable_amount += 25000;
													$temp_total_member -= 25000;
                                                }
                                                elseif($temp_total_member >= 50000){
                                                    $payable_amount += 50000; 
													$temp_total_member -= 50000;
                                                }
                                                elseif($temp_total_member >= 75000){
                                                    $payable_amount += 75000; 
													$temp_total_member -= 75000;
                                                }
                                                elseif($temp_total_member >= 125000){
                                                    $payable_amount += 125000; 
													$temp_total_member -= 125000;
                                                }
                                                elseif($temp_total_member >= 150000){
                                                    $payable_amount += 150000; 													
                                                }                                                
                                            }											
                                            ?>
											<h4 class="font-weight-medium font-size-24"><?= $payable_amount; ?></h4>                                            
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="single_leg_income.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Single leg income</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-success text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Level Income</h5>
                                                <?php
                                                // echo $admin;
                                                    $sql = mysqli_query($conn, "SELECT level_income FROM customers WHERE customer_id='$admin'");
                                                    $result = mysqli_fetch_array($sql);
                                                    $level_income = $result['level_income'];
                                                   ?>
                                                    <h4 class="font-weight-medium font-size-24"><?php echo $level_income; ?>
                                                    
                                            <!-- <h4 class="font-weight-medium font-size-24">Rs.0 -->
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Level Income</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Autopool Income</h5>
                                            <?php
                                                    $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$admin'";
                                                    $result=mysqli_query($conn, $sql);
                                                    $row=mysqli_fetch_array($result);
                                                    $member=$row['total'];

                                                    $sql="SELECT customer_id FROM customers WHERE sponser_id='$admin'";
                                                    $result=mysqli_query($conn, $sql);
                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                    $count=0;
                                                    foreach($data as $key){
                                                        $customer_id = $key['customer_id'];
                                                        // echo $customer_id;
                                                        $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                        $result=mysqli_query($conn, $sql);
                                                        $row=mysqli_fetch_assoc($result);   
                                                        $count += $row['total'];

                                                        $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                        $result=mysqli_query($conn, $sql);
                                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                        $count1=0;

                                                        foreach($data as $key){
                                                            $customer_id = $key['customer_id'];
                                                            $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                            $result=mysqli_query($conn, $sql);
                                                            $row=mysqli_fetch_assoc($result);   
                                                            $count1 += $row['total'];
                                                        
                                                            $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                            $result=mysqli_query($conn, $sql);
                                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                            $count3=0;

                                                            foreach($data as $key){
                                                                $customer_id = $key['customer_id'];
                                                                $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                $result=mysqli_query($conn, $sql);
                                                                $row=mysqli_fetch_assoc($result);   
                                                                $count3 += $row['total'];
                                                                
                                                                $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                $result=mysqli_query($conn, $sql);
                                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                $count4=0;

                                                                foreach($data as $key){
                                                                    $customer_id = $key['customer_id'];
                                                                    $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                    $result=mysqli_query($conn, $sql);
                                                                    $row=mysqli_fetch_assoc($result);   
                                                                    $count4 += $row['total'];
            
                                                                    $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                    $result=mysqli_query($conn, $sql);
                                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                    $count5=0;

                                                                    foreach($data as $key){
                                                                        $customer_id = $key['customer_id'];
                                                                        $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                        $result=mysqli_query($conn, $sql);
                                                                        $row=mysqli_fetch_assoc($result);   
                                                                        $count5 += $row['total'];
                
                                                                        $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                        $result=mysqli_query($conn, $sql);
                                                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                        $count6=0;

                                                                        foreach($data as $key){
                                                                            $customer_id = $key['customer_id'];
                                                                            $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                            $result=mysqli_query($conn, $sql);
                                                                            $row=mysqli_fetch_assoc($result);   
                                                                            $count6 += $row['total'];
                    
                                                                            $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                            $result=mysqli_query($conn, $sql);
                                                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                            $count7=0;

                                                                            foreach($data as $key){
                                                                                $customer_id = $key['customer_id'];
                                                                                $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                                $result=mysqli_query($conn, $sql);
                                                                                $row=mysqli_fetch_assoc($result);   
                                                                                $count7 += $row['total'];
                        
                                                                                $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                                $result=mysqli_query($conn, $sql);
                                                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                $count8=0;

                                                                                foreach($data as $key){
                                                                                    $customer_id = $key['customer_id'];
                                                                                    $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$customer_id'";
                                                                                    $result=mysqli_query($conn, $sql);
                                                                                    $row=mysqli_fetch_assoc($result);   
                                                                                    $count8 += $row['total'];
                            
                                                                                    $sql="SELECT customer_id FROM customers WHERE sponser_id='$customer_id'";
                                                                                    $result=mysqli_query($conn, $sql);
                                                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                    $count9=0;
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                    $total=$member+$count+$count1+$count2+$count3+$count4+$count5+$count6+$count7+$count8;
                                                    // echo $total;
                                                    $sql="SELECT autopool_income FROM customers WHERE customer_id='$admin'";
                                                    $result=mysqli_query($conn, $sql);
                                                    $row=mysqli_fetch_array($result);
                                                    $amount = $row['autopool_income'];
                                                    
                                                    if($amount == 599){ 

                                                        if($total == 10){
                                                            $auto_income = 500;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 2500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 7500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 25000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 62500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 156250;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 781250;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                    if($amount == 999){ 

                                                        if($total == 10){
                                                            $auto_income = 1000;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 5000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 15000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 50000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 125000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 312500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 1562500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                    if($amount == 1999){ 

                                                        if($total == 10){
                                                            $auto_income = 2000;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 10000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 30000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 100000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 250000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 625000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 3125000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                    if($amount == 3499){ 

                                                        if($total == 10){
                                                            $auto_income = 3000;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 15000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 45000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 150000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 375000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 937500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 4687500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                    if($amount == 4999){ 

                                                        if($total == 10){
                                                            $auto_income = 5000;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 25000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 75000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 250000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 625000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 1562500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 7812500;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                    if($amount == 9999){ 

                                                        if($total == 10){
                                                            $auto_income = 10000;
                                                            $category = "Silver"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 50)
                                                        {
                                                            $auto_income = 50000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 250)
                                                        {
                                                            $auto_income = 150000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 1250)
                                                        {
                                                            $auto_income = 500000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 3250)
                                                        {
                                                            $auto_income = 1250000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }   
                                                        elseif($total == 31250)
                                                        {
                                                            $auto_income = 3125000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                        elseif($total == 156250)
                                                        {
                                                            $auto_income = 15625000;
                                                            $category = "Gold"; ?>
                                                            <h4 class="font-weight-medium font-size-24"><?php echo "Rs- ".$auto_income; echo $category;
                                                        }
                                                    }
                                                ?>

                                            <h4 class="font-weight-medium font-size-24">Rs.0 
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="autopool_income.php" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Autopool Income</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-danger text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Rewards</h5>
                                            <?php
                                                $sql="SELECT count(*) AS total FROM customers WHERE sponser_id='$admin'";
                                                $result=mysqli_query($conn, $sql);
                                                while($row=mysqli_fetch_array($result)){ 
                                                    $row['total'];
                                                    if($row['total'] == 10){
                                                        $reward = 100;
                                                    }
                                                    elseif($row['total'] == 50){
                                                        $reward = 500; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward; 
                                                    }
                                                    elseif($row['total'] == 250){
                                                        $reward = 2500; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward;
                                                    }
                                                    elseif($row['total'] == 1250){
                                                        $reward = 11000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward;  
                                                    }
                                                    elseif($row['total'] == 6250){
                                                        $reward = 25000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward; 
                                                    }
                                                    elseif($row['total'] == 31250){
                                                        $reward = 50000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward; 
                                                    }
                                                    elseif($row['total'] == 156250){
                                                        $reward = 125000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward; 
                                                    }
                                                    elseif($row['total'] == 781250){
                                                        $reward = 300000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs-".$reward; 
                                                    }
                                                    elseif($row['total'] == 3906250){
                                                        $reward = 700000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs.".$reward; 
                                                    }
                                                    elseif($row['total'] == 19531250){
                                                        $reward = 1100000; ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs.".$reward; 
                                                    }
                                                    else{ ?>
                                                        <h4 class="font-weight-medium font-size-24"><?php echo "Rs. 0";
                                                    }
                                                }
                                            ?>
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Rewards</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-warning text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Royalty</h5>
                                            <h4 class="font-weight-medium font-size-24">Rs. 0
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Royalty</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-success text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Topup</h5>
                                            <h4 class="font-weight-medium font-size-24">Rs. 0 
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Topup</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Purchase</h5>
                                        
                                            <h4 class="font-weight-medium font-size-24">Rs. 0 <?php //echo $total_member; ?></h4>
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>
                                            <p class="text-white-50 mb-0 mt-1">Purchase</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-danger text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">I-Wallet</h5>
                                                <?php 
                                                    $e_wallet=$direct_income+$payable_amount+$rupee_id+$level_income;
                                                ?>
                                            <h4 class="font-weight-medium font-size-24">Rs. <?php echo $e_wallet; ?>
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">I-Wallet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-warning text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">E-Wallet</h5>
                                            <h4 class="font-weight-medium font-size-24">Rs.0 
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">E-Wallet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-success text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">S-Wallet</h5>
                                            <?php
                                                // $sql = "select * from purchase where customer_id = '$admin'";
                                                // $e_wallet=$direct_income+$payable_amount+$rupee_id;

                                            ?>
                                            <h4 class="font-weight-medium font-size-24">Rs.0
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">S-Wallet</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <!-- <div class="float-left mini-stat-img mr-4">
                                                <img src="assets/images/services-icon/04.png" alt="">
                                            </div> -->
                                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Withdrawl</h5>
                                            <h4 class="font-weight-medium font-size-24">Rs. 0
                                                <!-- <i class="mdi mdi-arrow-up text-success ml-2"></i></h4> -->
                                            <!-- <div class="mini-stat-label bg-warning">
                                                <p class="mb-0">+ 84%</p>
                                            </div> -->
                                        </div>
                                        <div class="pt-2">
                                            <div class="float-right">
                                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                            </div>

                                            <p class="text-white-50 mb-0 mt-1">Withdrawl</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $temp_total_member = $total_member;
                        $temp_direct_member = $direct_member;
                        ?>
                        <div class="table-responsive">
                        <center><h2  id="customer_name" style="background: #ec536c !important;color: white;padding: 8px;margin: 0;border-radius: 20px 20px 0 0;border: 1px solid #fff;border-bottom: 0;">Single Leg Income</h2>
                        <table class="single"style="width:100%;text-align: center;border: 1px solid #ddd;">
                            <tbody style="background-color: #626ed4!important; color: white;">
                                <tr style="background: #ec536c;">
                                    <th  style = "font-weight: normal;font-size:15px;">Level</th>
                                    <th style = "font-weight: normal;font-size:15px;">Req. Direct</th>
                                    <th style = "font-weight: normal;font-size:15px;">Current Direct</th>
                                    <th style = "font-weight: normal;font-size:15px;">Req. Count</th>
                                    <th style = "font-weight: normal;font-size:15px;">Current Count</th>
                                    <th style = "font-weight: normal;font-size:15px;">Income</th>
                                    <th style = "font-weight: normal;font-size:15px;">Upgrade/product</th>
                                    <th style = "font-weight: normal;font-size:15px;">Status</th>
                                </tr>
                                <?php
                                    // echo $total_member;
                                ?>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">1</td>
                                    <td style="border: 1px solid #ddd">2</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 2){
                                            echo 2; 
                                            $temp_direct_member -= 2;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+50</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag2 = 0;
                                        if($temp_total_member >= 50)
                                        {
                                            echo 50; 
                                            $temp_total_member -= 50;
                                            $flag2 = 1;
                                        }
                                        else
                                        {
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        }
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">1000</td>
                                    <td style="border: 1px solid #ddd"> </td>
                                    
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">2</td>
                                    <td style="border: 1px solid #ddd">3</td>
                                     <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 3){
                                            echo 3; 
                                            $temp_direct_member -= 3;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+100</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 100){
                                            echo 100;
                                            $temp_total_member -= 100;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;border: 1px solid #ddd;text-align: right;padding-right: 30px;">1500</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">3</td>
                                    <td style="border: 1px solid #ddd">3</td>
                                     <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 3){
                                            echo 3; 
                                            $temp_direct_member -= 3;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+250</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 250){
                                            echo 250;
                                            $temp_total_member -= 250;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">2000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">4</td>
                                    <td style="border: 1px solid #ddd">4</td>
                                     <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 4){
                                            echo 4; 
                                            $temp_direct_member -= 4;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+500</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 500){
                                            echo 500;
                                            $temp_total_member -= 500;
                                            $flag = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">3000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">5</td>
                                    <td style="border: 1px solid #ddd">4</td>
                                     <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 4){
                                            echo 4; 
                                            $temp_direct_member -= 4;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+1000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 1000){
                                            echo 1000;
                                            $temp_total_member -= 1000;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">4000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">6</td>
                                    <td style="border: 1px solid #ddd">5</td>
                                     <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 5){
                                            echo 5; 
                                            $temp_direct_member -= 5;
                                            $flag1 = 0;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+2000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag2 = 0;
                                        if($temp_total_member >= 2000){
                                            echo 2000;
                                            $temp_total_member -= 2000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">6000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">7</td>
                                    <td style="border: 1px solid #ddd">5</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 5){
                                            echo 5; 
                                            $temp_direct_member -= 5;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+2500</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 2500){
                                            echo 2500;
                                            $temp_total_member -= 2500;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">7500</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">8</td>
                                    <td style="border: 1px solid #ddd">6</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 6){
                                            echo 6; 
                                            $temp_direct_member -= 6;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+5000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 5000){
                                            echo 5000;
                                            $temp_total_member -= 5000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member; 
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">10000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">9</td>
                                    <td style="border: 1px solid #ddd">6</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 6){
                                            echo 6; 
                                            $temp_direct_member -= 6;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+7500</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 7500){
                                            echo 7500;
                                            $temp_total_member -= 7500;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">15000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">10</td>
                                    <td style="border: 1px solid #ddd">8</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 8){
                                            echo 8; 
                                            $temp_direct_member -= 8;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td>+15000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 15000){
                                            echo 15000;
                                            $temp_total_member -= 15000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">21000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">11</td>
                                    <td style="border: 1px solid #ddd">8</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 8){
                                            echo 8; 
                                            $temp_direct_member -= 8;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+25000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 25000){
                                            echo 25000;
                                            $temp_total_member -= 25000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">25000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">12</td>
                                    <td style="border: 1px solid #ddd">10</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0; 
                                        if($temp_direct_member >= 10){
                                            echo 10; 
                                            $temp_direct_member -= 10;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+50000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 50000){
                                            echo 50000;
                                            $temp_total_member -= 50000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">50000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">13</td>
                                    <td style="border: 1px solid #ddd">10</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 10){
                                            echo 10; 
                                            $temp_direct_member -= 10;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+75000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 75000){
                                            echo 75000;
                                            $temp_total_member -= 75000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">75000</td>

                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: antiquewhite; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">14</td>
                                    <td style="border: 1px solid #ddd">12</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 12){
                                            echo 12; 
                                            $temp_direct_member -= 12;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+125000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 125000){
                                            echo 125000;
                                            $temp_total_member -= 125000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">125000</td>
                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                <tr style="background: aliceblue; color:black;font-weight: 500;">
                                    <td style="border: 1px solid #ddd">15</td>
                                    <td style="border: 1px solid #ddd">15</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php
                                        $flag1 = 0;
                                        if($temp_direct_member >= 15){
                                            echo 15; 
                                            $temp_direct_member -= 15;
                                            $flag1 = 1;
                                        }
                                        else{
                                            echo $temp_direct_member;
                                            $temp_direct_member = 0;    
                                        } ?>
                                    </td>
                                    <td style="border: 1px solid #ddd">+150000</td>
                                    <td style="border: 1px solid #ddd">
                                        <?php 
                                        $flag2 = 0;
                                        if($temp_total_member >= 150000){
                                            echo 150000;
                                            $temp_total_member -= 150000;
                                            $flag2 = 1;
                                        }
                                        else{
                                            echo $temp_total_member;
                                            $temp_total_member = 0;
                                        } 
                                        ?>
                                    </td>
                                    <td style="border: 1px solid #ddd;text-align: right;padding-right: 30px;">150000</td>
                                    <td style="border: 1px solid #ddd"> </td>
                                    <?php if($flag1 && $flag2){ ?>
                                    <td style="border: 1px solid #ddd; background:green; color:white">Done</td>
                                   <?php }else{ ?>
                                        <td style="border: 1px solid #ddd; background: #ec536c !important; color:white">N/A</td> 
                                    <?php } ?>
                                </tr>
                                
                            </tbody>
                        </table>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
<!--                 
                <footer class="footer">
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
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/grNDB" class="btn btn-primary btn-block mt-3" target="_blank"><i class="mdi mdi-cart mr-1"></i> Purchase Now</a>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Peity chart-->
        <script src="assets/libs/peity/jquery.peity.min.js"></script>

        <!-- Plugin Js-->
        <script src="assets/libs/chartist/chartist.min.js"></script>
        <script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
<?php } ?>
