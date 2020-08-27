<?php
include '../connection.php';

$value = $_POST['value'];
$thres = $_POST['thres'];
$validity = $_POST['validity'];
$status = $_POST['status'];
$coupon_id = $_POST['coupon_id'];

$sql = "UPDATE auto_coupons SET value='$value',threshold='$thres',validity='$validity',status='$status' WHERE id='$coupon_id'";
$res = mysqli_query($con,$sql);
echo "Coupon Updated";

?>