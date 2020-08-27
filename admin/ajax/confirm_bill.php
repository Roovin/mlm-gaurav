<?php
include '../connection.php';
$total_products = $_POST['total_products'];
$mfdby = mysqli_real_escape_string($con,$_POST['mfdby']);
$purchase_date = $_POST['purchase_date'];
$bill_number = mysqli_real_escape_string($con,$_POST['bill_number']);
$stock_id = $_POST['stock_id'];
$pcategory = $_POST['pcategory'];
$psubcategory = $_POST['psubcategory'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$purchase_price = $_POST['purchase_price'];
$total = $_POST['total'];
$gstrate = $_POST['gstrate'];
$gstfigure = $_POST['gstfigure'];
$net_purchase_price = $_POST['net_purchase_price'];
$batch_number = $_POST['batch_number'];
$mfd_date = $_POST['mfd_date'];
$expiry_date = $_POST['expiry_date'];
$net_purchase_price_per_unit = $_POST['net_purchase_price_per_unit'];
$mrp = $_POST['mrp'];
$discount = $_POST['discount'];
$sale_price = $_POST['sale_price'];
$gross_profit = $_POST['gross_profit'];
$gst_on_profit = $_POST['gst_on_profit'];
$net_profit = $_POST['net_profit'];
$profit_cut = $_POST['profit_cut'];
$profit_disburse = $_POST['profit_disburse'];
$profit_bp = $_POST['profit_bp'];
$profit_bv = $_POST['profit_bv'];
$business_volume = $_POST['business_volume'];
$barcode = $_POST['barcode'];


$sql = "INSERT INTO billing_info (mfd_by,purchase_date,bill_number,stock_id)VALUES('$mfdby','$purchase_date','$bill_number','$stock_id')";
$res = mysqli_query($con,$sql);

for($i=0;$i<=$total_products-1;$i++)
{
	$product2 = mysqli_real_escape_string($con,$product[$i]);
	$category2 = mysqli_real_escape_string($con,$pcategory[$i]);
	$subcategory2 = mysqli_real_escape_string($con,$psubcategory[$i]);
	$sql2 = "SELECT id FROM products WHERE name='$product2' AND category='$category2' AND subcat='$subcategory2'";
	$res2 = mysqli_query($con,$sql2);
	$row = mysqli_fetch_array($res2,MYSQLI_NUM);
	$product_id = $row[0];
	$quantity2 = $quantity[$i];
	$purchase_price_per_unit2 = $purchase_price[$i];
	$total2 = $total[$i];
	$gstrate2 = $gstrate[$i];
	$gstfigure2 = $gstfigure[$i];
	$net_purchase_price2 = $net_purchase_price[$i];
	$batch_number2 = $batch_number[$i];
	$mfd_date2 = $mfd_date[$i];
	$expiry_date2 = $expiry_date[$i];
	$net_purchase_price_per_unit2 = $net_purchase_price_per_unit[$i];
	$mrp2 = $mrp[$i];
	$discount2 = $discount[$i];
	$sale_price2 = $sale_price[$i];
	$gross_profit2 = $gross_profit[$i];
	$gst_on_profit2 = $gst_on_profit[$i];
	$net_profit2 = $net_profit[$i];
	$profit_cut2 = $profit_cut[$i];
	$profit_disburse2 = $profit_disburse[$i];
	$profit_bp2 = $profit_bp[$i];
	$profit_bv2 = $profit_bv[$i];
	$business_volume2 = $business_volume[$i];
	$barcode2 = $barcode[$i];
	
	
	
	$sql = "INSERT INTO purchase (stock_id,product_id,quantity,purchase_price_per_unit,total,gst_rate,gst_fig,net_purchase_price,batch_number,mfd_date,exp_date,net_purchase_price_per_unit,mrp,discount,sale_price,gross_profit,gst_on_profit,net_profit,profit_cut,profit_disburse,profit_for_bp,profit_on_bv,business_volume,barcode) VALUES('$stock_id',$product_id,$quantity2,$purchase_price_per_unit2,$total2,$gstrate2,$gstfigure2,$net_purchase_price2,'$batch_number2','$mfd_date2','$expiry_date2',$net_purchase_price_per_unit2,$mrp2,$discount2,$sale_price2,$gross_profit2,$gst_on_profit2,$net_profit2,$profit_cut2,$profit_disburse2,$profit_bp2,$profit_bv2,$business_volume2,'$barcode2',1,$discount2,$sale_price2,$business_volume2,$discount2,$sale_price2,$business_volume2,1,$discount2,$sale_price2,$business_volume2)";
	
	$res = mysqli_query($con,$sql);
	
	$sql3 = "SELECT * FROM stocks WHERE product_id='$product_id'";
	$res3 = mysqli_query($cons,$sql3);
	$count2 = mysqli_num_rows($res3);
	
	if($count2>0)
	{
		$status = 0;
	}
	else
	{
		$status = 1;
	}
	
	$sql3 = "INSERT INTO stocks (stock_id,product_id,stock,barcode) VALUES('$stock_id',$product_id,$quantity2,'$barcode2')";
	$res3 = mysqli_query($con,$sql3);
	
	
}



?>