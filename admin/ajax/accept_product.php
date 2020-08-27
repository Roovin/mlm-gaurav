<?php
include '../connection.php';
$database_id = $_POST['database_id'];

$sql = "SELECT status FROM return_products WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$status = $row['status'];

if($status=="Travelling")
{

$sql = "UPDATE return_products SET status='Added' WHERE id='$database_id'";
$res = mysqli_query($con,$sql);

$sql = "SELECT stock_id,product_id,quantity FROM return_products WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

$stock_id = $row['stock_id'];
$product_id = $row['product_id'];
$quantity = $row['quantity'];

$sql = "SELECT stock FROM stocks WHERE stock_id='$stock_id' AND product_id='$product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$stock = $row['stock'];

$new_stock = $stock + $quantity;

$sql = "UPDATE stocks SET stock='$new_stock' WHERE stock_id='$stock_id' AND product_id='$product_id'";
$res = mysqli_query($con,$sql);
}
else
{
	echo "Already Added";
}
?>