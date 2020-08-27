<?php
$column_id = $_POST['column_id'];
include '../connection.php';

$sql = "DELETE FROM products WHERE id=$column_id";
$res = mysqli_query($con,$sql);

echo "Product Deleted";
?>