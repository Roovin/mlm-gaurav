<?php
include '../connection.php';
$total_products = $_POST['total_products'];
$mfdby = mysqli_real_escape_string($con,$_POST['mfdby']);
$purchase_date = $_POST['purchase_date'];
$bill_number = $_POST['bill_number'];
$stock_id = $_POST['stock_id'];
$product_id = $_POST['product_id'];
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



$sql = "UPDATE billing_info SET mfd_by='$mfdby',purchase_date='$purchase_date',bill_number='$bill_number' WHERE stock_id='$stock_id'";
$res = mysqli_query($con,$sql);

for($i=0;$i<=$total_products-1;$i++)
{
	$product_id2 = $product_id[$i];
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
	
	
	$sql = "UPDATE purchase SET quantity='$quantity2',purchase_price_per_unit='$purchase_price_per_unit2',total='$total2',gst_rate='$gstrate2',gst_fig='$gstfigure2',net_purchase_price='$net_purchase_price2',batch_number='$batch_number2',mfd_date='$mfd_date2',exp_date='$expiry_date2',net_purchase_price_per_unit='$net_purchase_price_per_unit2',mrp='$mrp2',discount='$discount2',sale_price='$sale_price2',gross_profit='$gross_profit2',gst_on_profit='$gst_on_profit2',net_profit='$net_profit2',profit_cut='$profit_cut2',profit_disburse='$profit_disburse2',profit_for_bp='$profit_bp2',profit_on_bv='$profit_bv2',business_volume='$business_volume2' WHERE stock_id='$stock_id' AND product_id='$product_id2'";

	$res = mysqli_query($con,$sql);
	
	$sql = "UPDATE stocks SET stock='$quantity2' WHERE stock_id='$stock_id' AND product_id='$product_id2'";
	$res = mysqli_query($con,$sql);
	
	
	
}






?>