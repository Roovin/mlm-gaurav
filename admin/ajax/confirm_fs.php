<?php
include '../connection.php';
$total_products = $_POST['total_products'];
$mfdby = mysqli_real_escape_string($con,$_POST['mfdby']);
$purchase_date = $_POST['purchase_date'];
$bill_number = mysqli_real_escape_string($con,$_POST['bill_number']);
$stock_id = $_POST['stock_id'];
$quantity = $_POST['quantity'];
$purchase_price = 0;
$total = 0;
$gstrate = 0;
$gstfigure = 0;
$net_purchase_price = 0;
$batch_number = $_POST['batch_number'];
$mfd_date = $_POST['mfd_date'];
$expiry_date = $_POST['expiry_date'];
$net_purchase_price_per_unit = 0;
$mrp = 0;
$discount = 0;
$sale_price = 0;
$gross_profit = 0;
$gst_on_profit = 0;
$net_profit = 0;
$profit_cut = 0;
$profit_disburse = 0;
$profit_bp = 0;
$profit_bv = 0;
$business_volume = 0;
$barcode = $_POST['barcode'];
$product_id = $_POST['pid'];
$purchase_price_per_unit = 0;

$sql = "INSERT INTO billing_info (mfd_by,purchase_date,bill_number,stock_id)VALUES('$mfdby','$purchase_date','$bill_number','$stock_id')";
$res = mysqli_query($con,$sql);

echo $sql;

for($i=0;$i<=$total_products-1;$i++)
{
	
	$product_id2 = $product_id[$i];
	$quantity2 = $quantity[$i];
	$batch_number2 = $batch_number[$i];
	$mfd_date2 = $mfd_date[$i];
	$expiry_date2 = $expiry_date[$i];
	$barcode2 = $barcode[$i];
	
	
	
	$sql = "INSERT INTO purchase (stock_id,product_id,quantity,purchase_price_per_unit,total,gst_rate,gst_fig,net_purchase_price,batch_number,mfd_date,exp_date,net_purchase_price_per_unit,mrp,discount,sale_price,gross_profit,gst_on_profit,net_profit,profit_cut,profit_disburse,profit_for_bp,profit_on_bv,business_volume,barcode) VALUES('$stock_id',$product_id2,$quantity2,$purchase_price_per_unit,$total,$gstrate,$gstfigure,$net_purchase_price,'$batch_number2','$mfd_date2','$expiry_date2',$net_purchase_price_per_unit,$mrp,$discount,$sale_price,$gross_profit,$gst_on_profit,$net_profit,$profit_cut,$profit_disburse,$profit_bp,$profit_bv,$business_volume,'$barcode2')";
	
	$res = mysqli_query($con,$sql);
	
	$sql3 = "SELECT * FROM stocks WHERE product_id='$product_id2'";
	$res3 = mysqli_query($con,$sql3);
	$count2 = mysqli_num_rows($res3);
	
	
	
	$sql3 = "INSERT INTO stocks (stock_id,product_id,stock,barcode) VALUES('$stock_id',$product_id2,$quantity2,'$barcode2')";
	$res3 = mysqli_query($con,$sql3);
}



?>