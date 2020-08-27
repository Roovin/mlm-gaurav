<?php
include '../connection.php';
$challan_product_id = $_POST['challan_product_id'];

$sql = "SELECT delivery_status FROM transfer WHERE id='$challan_product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$delivery_status = $row['delivery_status'];

if($delivery_status=="Travelling")
{

$sql = "SELECT stock_id FROM transfer WHERE id='$challan_product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$stock_id = $row['stock_id'];

$sql = "SELECT product_id FROM transfer WHERE id='$challan_product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$product_id = $row['product_id'];

$sql = "SELECT quantity FROM transfer WHERE id='$challan_product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$quantity = $row['quantity'];


$sql = "SELECT stock FROM stocks WHERE product_id='$product_id' AND stock_id='$stock_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$stock = $row['stock'];

$new_stock = $stock + $quantity;
$sql = "UPDATE stocks SET stock='$new_stock' WHERE product_id='$product_id' AND stock_id='$stock_id'";
$res = mysqli_query($con,$sql);

$sql = "DELETE FROM transfer WHERE id='$challan_product_id'";
$res = mysqli_query($con,$sql);
}
else
{
	echo "Cannot Delete!! Product is Added to Distributor Stock";
}
?>