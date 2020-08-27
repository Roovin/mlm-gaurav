<?php
include '../connection.php';
$product_id = $_POST['product_id'];

$sql = "SELECT image FROM products WHERE id='$product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$image = $row['image'];

echo $image;

?>