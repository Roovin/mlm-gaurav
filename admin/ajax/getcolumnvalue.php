<?php
include '../connection.php';

$column = $_POST['column'];
$id = $_POST['column_id'];

$sql = "SELECT $column FROM products WHERE id=$id";

$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_NUM);
$value = $row[0];
echo $value;

?>