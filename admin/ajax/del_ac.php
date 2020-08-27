<?php
include '../connection.php';

$coupon_id = $_POST['coupon_id'];

$sql = "DELETE FROM auto_coupons WHERE id='$coupon_id'";
$res = mysqli_query($con,$sql);
echo "Coupon Deleted";
?>