<?php
session_start();
error_reporting(0);
if(empty($_SESSION['admin']))
{
	header("location:index.php");
}
else
{
	include 'conn.php';
    session_commit();
    // $sql = "SELECT stocks.stock_id,stocks.product_id,stocks.stock,purchase.mrp,purchase.sale_price,purchase.net_purchase_price_per_unit FROM stocks INNER JOIN purchase ON stocks.stock_id=purchase.stock_id AND stocks.product_id=purchase.product_id AND stocks.stock>0;";

    // $res = mysqli_query($conn,$sql);
    
    // $stock_mrp = 0;
    // $stock_sale = 0;
    // $stock_purchase = 0;
    
    // while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
    // {
    //     $stock_mrp += $r['stock'] * $r['mrp'];
    //     $stock_sale += $r['stock'] * $r['sale_price'];
    //     $stock_purchase += $r['stock'] * $r['net_purchase_price_per_unit'];
    // }
    // print_r($stock_sale);exit();

?>
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Manage Purchase | Admin Dashboard</title>
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
        
        <script src="./js/jquery-1.9.0.min.js"></script>
        <link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/purchase.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<script src="./js/jquery-1.9.0.min.js"></script>
		<script src="./js/purchase.js"></script>
        <!-- <script src="./js/purchase.js"></script> -->

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
            
<!--Stock Worth start-->
<div id="stock-container" class="back_close" style="margin-left:240px; margin-top:95px">
<center>
<?php
$sql = "SELECT stocks.stock_id,stocks.product_id,stocks.stock,purchase.mrp,purchase.sale_price,purchase.net_purchase_price_per_unit FROM stocks INNER JOIN purchase ON stocks.stock_id=purchase.stock_id AND stocks.product_id=purchase.product_id AND stocks.stock>0;";

$res = mysqli_query($conn,$sql);

$stock_mrp = 0;
$stock_sale = 0;
$stock_purchase = 0;

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$stock_mrp += $r['stock'] * $r['mrp'];
	$stock_sale += $r['stock'] * $r['sale_price'];
	$stock_purchase += $r['stock'] * $r['net_purchase_price_per_unit'];
}

?>

	<div class="worth">
		<div class="worth-box">
			<div class="worth-heading">Total Stock Worth (MRP)</div>
			<div class="worth-price"><?php echo $stock_mrp; ?></div>
		</div>
		<div class="worth-box">
			<div class="worth-heading">Total Stock Worth (SALE)</div>
			<div class="worth-price"><?php echo $stock_sale; ?></div>
		</div>
		<div class="worth-box">
			<div class="worth-heading">Total Stock Worth (PURCHASE)</div>
			<div class="worth-price"><?php echo $stock_purchase; ?></div>
		</div>
	</div>
	<!--Stock Worth Ends-->



	<div id="stock-heading">Stock Maintainance</div>
	<br>
	<div style="font-family:calibri;font-size:20px;">Search By Barcode <br><input type="text" id="stockbar" style="width:250px;height:40px;margin-top:10px;" id="pbar" placeholder="   Barcode" onkeypress="stockbar_filter(event);"></div>
	
	<div id="stock_filter_container">
	
		<div class="stock_filter_fields">
			<b>Product ID</b><br>
			<input type="text" class="stock-filter-input" id="stock_filter_pid" style="background-color:white;" placeholder="   Product ID" onkeyup="change_filters();">
		</div>
	
	
		<div class="stock_filter_fields">
			<b>Category</b><br>
			<select class="stock-filter-input" id="stock_filter_cat" style="background-color:white; padding-top:0px" onchange="loadscat();">
				<option value="">Select Category</option>
				<?php
				$sql = "SELECT category FROM product_category";
				$res = mysqli_query($conn,$sql);
				while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
				{
					echo '<option>'.$r['category'].'</option>';
				}
				?>
			</select>
		</div>
		<div class="stock_filter_fields">
			<b>Sub Category</b><br>
			<select class="stock-filter-input" id="stock_filter_subcat" style="background-color:white;">
				<option value="">Select Sub Category</option>
			</select>
		</div>
		
		<div class="stock_filter_fields">
			<b>Product</b><br>
			<input type="text" class="stock-filter-input" id="stock_filter_product" style="background-color:white;" placeholder="  Product Name">
		</div>
		
		<div class="stock_filter_fields">
			<br>
			<div class="stock-filter-input" onclick="stock_filter();" style="background-color:#2a3b4f;color:white;text-align:center;width:100px;padding-top:10px;height:30px;cursor:pointer;">Search</div>
		</div>
	</div>
	
	<div id="product-database-loader">
		<img id="data-loader-image2" src="./images/database_loader.gif" style="height:400%;margin-top:-45px;display:none;">
	</div>
	
	
	
	<div id="stock-data-table">
	<!-- faltu-->
		<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:150px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:542px;background-color:#c5c5c7;height:12px;"><b>Discount (Normal)</b></div>
			<div class="stock-data" style="width:664px;background-color:#c5c5c7;height:12px;"><b>Discount (Member)</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
		</div>
		
		<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:150px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;height:12px;"><b>Single Qty</b></div>
			<div class="stock-data" style="width:286px;background-color:#c5c5c7;height:12px;"><b>Multiple Qty</b></div>
			<div class="stock-data" style="width:306px;background-color:#c5c5c7;height:12px;"><b>Single Qty</b></div>
			<div class="stock-data" style="width:347px;background-color:#c5c5c7;height:12px;"><b>Multiple Qty</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;height:12px;"></div>
			
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;height:12px;"></div>
		</div>
		
		
	<!-- Faltu-->
	
	
		<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;"><b>Sno.</b></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;"><b>Stock ID</b></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;"><b>Barcode</b></div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;"><b>Product ID</b></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;"><b>Category</b></div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;"><b>Sub Category</b></div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;"><b>Product</b></div>
			<div class="stock-data" style="width:150px;background-color:#c5c5c7;"><b>Batch Number</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;"><b>Mfd</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;"><b>Exp</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>stock</b></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;"><b>stock in Field</b></div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;"><b>Purchase Price</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>MRP</b></div>
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;"><b>Dis%</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>SP</b></div>
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><b>BV</b></div>
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;"><b>QTY</b></div>
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;"><b>DIS%</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>SP</b></div>
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><b>BV</b></div>
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;"><b>Dis%</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>SP</b></div>
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;"><b>CB</b></div>
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><b>BV</b></div>
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;"><b>QTY</b></div>
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;"><b>DIS%</b></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><b>SP</b></div>
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;"><b>CB</b></div>
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><b>BV</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;"><b>Profit for BP</b></div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;"><b>Profit Cut</b></div>
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;"><b>Update</b></div>
		</div>
		
		<div id="stock_filter_output">
	</div>	
</center>    
<!-- End Page-content -->
                

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
<?php
}
?>