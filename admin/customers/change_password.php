<?php 
session_start();
error_reporting(0);
include '../conn.php';

$admin= $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];

$err_msg="";
if(isset($_POST['submit'])){      
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
	$sql = "select id from customers where customer_id='$admin' and password='$current_password'";
	$result = mysqli_query($conn, $sql);
	if($rows = mysqli_fetch_array($result))
	{
		if($new_password == $confirm_password)
		{
			$sql = "update customers set password='$new_password' where customer_id='$admin'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_affected_rows($conn))
			{
				$err_msg = "Password Updated Successfully";
			}			
		}
		else
		{
			$err_msg = "New Password and Confirm Password Not Mathch";
		}		
	}	
	else
	{
		$err_msg = "Invelid Current Password";
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
                                    <h4 class="font-size-18">Change Password</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MLM</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Member Profile</a></li>
										<li class="breadcrumb-item"><a href="javascript: void(0);">Change Password</a></li>
                                        <!-- <li class="breadcrumb-item active">Add Customers</li> -->
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <form method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="py-2 text-center" style="margin-left: -20%; color: #000">Customer Application</h2></div>
                                        <div class="form-group row text">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Sponser ID</label>
                                            <div class="col-sm-8 ">
                                                <input class="form-control" type="text"  name="sponserId" id="appsponid" placeholder="Sponser ID"  required> 
                                                <div class="invalid-feedback">
                                                    Please provide a valid Mobile.
                                             </div>
                                            </div>
                                        </div>                                                                               
                                    </div> -->

                                    <div class="card-body" style="margin-left: 205px">                                        
                                        <div><h2 class="text-center py-3" style="margin-left: -20%; color: #000">Change Password</h2></div>                                        
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password"  name="current_password" placeholder="Current Password" required >                                                
                                            </div>
                                        </div>                                                                                  
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password"  name="new_password" placeholder="New Password" required >                                                
                                            </div>
                                        </div>                                                                                  
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="password"  name="confirm_password" placeholder="Confirm Password" required >                                                
                                            </div>
                                        </div>                                                                                                                          
										<button style="background-color:#17a085; margin-left:300px;" class="btn btn-primary btn-lg waves-effect waves-light" name="submit">Submit</button>                                                           										
                                    </div>
									<center><label style="color:red; font-size:16px;"><?= $err_msg; ?></label></center>
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