<?php
include '../connection.php';
$product_id = $_POST['product_id'];
$descr = $_POST['descr'];

$sql = "UPDATE products SET descr='$descr' WHERE id='$product_id'";
$res = mysqli_query($con,$sql);

echo "Product Description Updated";

?>