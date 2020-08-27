<?php
include '../connection.php';
$category  = $_POST['cat'];
$subcat = $_POST['subcat'];
$product = $_POST['product'];

$sql = "SELECT image FROM products WHERE name='$product' AND category='$category' AND subcat='$subcat'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$image = $row['image'];


$sql = "SELECT descr FROM products WHERE name='$product' AND category='$category' AND subcat='$subcat'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$desc = $row['descr'];


$sql = "SELECT id FROM products WHERE name='$product' AND category='$category' AND subcat='$subcat'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$id = $row['id'];


echo $product.'#'.$desc.'#'.$image.'#'.$id;
?>