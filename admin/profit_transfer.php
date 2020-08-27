<?php 
session_start();
error_reporting(0);
if(empty($_SESSION['admin'])){
    header("location : index.php");
}else{
    include ('conn.php');
    
    
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
            <!-- Left Sidebar End -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18">Profit Transfer</h4>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="margin-right: -52%">
                                        <!-- <h4 class="card-title">Example</h4> -->
                                        <form  method="post" enctype="multipart/form-data" >
                                            <!-- <div data-repeater-list="group-a"> -->
                                                <div data-repeater-item class="row">
                                                    <div  class="form-group col-lg-2">
                                                        <label for="name"></label>
                                                        <input type="text" id="cust_id" name="cust_id" class="form-control" onkeyup="empty_btn();" placeholder="Cusomer ID"/>
                                                    </div>
        
                                                    <div  class="form-group col-lg-2">
                                                        <label for="transfered">Select Month</label>
                                                        <select class="ftr-fields" name="month" onchange="empty_btn()" style="width: 105%; height: 53%;" id="pt-month">
                                                            <option value="">Select Month</option>
                                                            <?php
                                                                for($i=1; $i<=12; $i++){
                                                                    echo '<option>'.$i.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <!-- <input type="email" id="email" class="form-control"/> -->
                                                    </div>
        
                                                    <div  class="form-group col-lg-2">
                                                        <label for="subject">Select Year</label>
                                                        <select class="ftr-fields" name="year" onchange="empty_btn()" style="width: 105%; height: 53%;" id="pt-year">
                                                            <option value="">Select Year</option>
                                                            <?php
                                                                for($i=2018; $i<=2030; $i++){
                                                                    echo '<option>'.$i.'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                        <input type="submit" class="btn btn-primary btn-block" style="width: 12%; height: 30%; margin: 1%;" name="submit" onclick="fetch_profit();">
                                                </div>
                                                <!-- <input type="submit" class="pt-btn" style="height:27px;margin-top:17px;" onclick="fetch_profit();"> -->
	

	                                                <div id="pt-out"></div>
                                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
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

<!-- form repeater js -->
<script src="assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

<script src="assets/js/pages/form-repeater.int.js"></script>

<script src="assets/js/app.js"></script>
<!-- <script src="./js/jquery-1.9.0.min.js"></script> -->
<!-- <script src="./js/customers.js"></script> -->


</body>

<!-- Mirrored from themesbrand.com/veltrix-mvc/vertical/form-repeater.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Jul 2020 09:34:53 GMT -->
</html>
<script>
function empty_btn()
{
	$("#pt-btn").remove();
}



function fetch_profit()
{
	
	var cust_id = $("#cust_id").val();
	var month = $("#pt-month").val();
	var year = $("#pt-year").val();
	
	// console.log(cust_id);
	if(cust_id=="")
	{
		alert("Please Enter a Customer ID");
	}
	else if(month=="")
	{
		alert("Please Select a Month");
	}
	else if(year=="")
	{
		alert("Please Select a Year");
	}
	else
	{
		$.post("ajax_fetch_profit.php",{cust_id:cust_id,month:month,year:year},function(data){
			if(data=="Invalid Customer ID")
			{
				alert(data);
			}
			else if(data=="Invalid Year Selected")
			{
				alert(data);
			}
			else if(data=='Invalid Month Selected')
			{
				alert(data);
			}
			else if(data=='Not Calculated')
			{
				alert(data);
			}
			else
			{
				alert(data);
				$("#pt-out").html(data);
			}
		});
	}
}


</script>
<?php 
}
?>

            
