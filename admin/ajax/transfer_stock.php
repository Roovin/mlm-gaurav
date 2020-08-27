<?php
include '../connection.php';

$stock_id = $_POST['stock_id'];
$product_id=$_POST['product_id'];
$quantity = $_POST['quantity'];
$transfer_date = $_POST['transfer_date'];
$tampoo_number = $_POST['tampoo_number'];
$driver_phone = $_POST['driver_phone'];
$barcode = $_POST['barcode'];
$distri_id = $_POST['distri_id'];

$status = "True";

for($i=0;$i<=sizeof($quantity)-1;$i++)
{
	$cstock_id = $stock_id[$i];
	$cproduct_id = $product_id[$i];
	$cquantity = $quantity[$i];
	
	$sql = "SELECT stock FROM stocks WHERE stock_id='$cstock_id' AND product_id='$cproduct_id'";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$astock = $row['stock'];
	
	if($cquantity<=$astock)
	{
		$status = "True";
	}
	else
	{
		$status = "False";
		$remaining_stock = $astock;
		break;
	}
}


if($status=="True")
{
	$sql1 = "SELECT id FROM transfer_info ORDER BY id DESC LIMIT 1";
	$res1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_array($res1);
	$max_id = $row1['id'];
	
	$next_id = $max_id+1;
	$challan_number = "chal-".$next_id;
	
	$sql2 = "INSERT INTO transfer_info (distri_id,date_of_transfer,challan_number,tampoo_number,driver_phone) VALUES('$distri_id','$transfer_date','$challan_number','$tampoo_number','$driver_phone')";
	$res2 = mysqli_query($con,$sql2);
	
	$sql1 = "SELECT id FROM transfer_info ORDER BY id DESC LIMIT 1";
	$res1 = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_array($res1);
	$transfer_id = $row1['id'];
	
	
	
	
	for($i=0;$i<=sizeof($quantity)-1;$i++)
	{
		$pstock_id = $stock_id[$i];
		$pproduct_id = $product_id[$i];
		$pquantity = $quantity[$i];
		$pbarcode = $barcode[$i];
		$sql = "SELECT stock FROM stocks WHERE stock_id='$pstock_id' AND product_id='$pproduct_id'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res);
		$astock = $row['stock'];
		
		$new_stock = $astock - $pquantity;
		
		$sql = "UPDATE stocks SET stock='$new_stock' WHERE stock_id='$pstock_id' AND product_id='$pproduct_id'";
		$res = mysqli_query($con,$sql);
		
		$sql = "INSERT INTO transfer (transfer_id,product_id,stock_id,quantity,delivery_status) VALUES($transfer_id,$pproduct_id,'$pstock_id',$pquantity,'Travelling')";
		$res = mysqli_query($con,$sql);
		
		
		
	}
	
	echo 'Done-'.$challan_number;
	
}
else
{
	echo "Available Stock For Product ID:".$cproduct_id." is ".$remaining_stock;
}





?>