<?php
include '../connection.php';
$fc_value = $_POST['fc_value'];
$fc_valid = $_POST['fc_valid'];
$fc_status = $_POST['fc_status'];

$sql = "UPDATE auto_coupons SET value='$fc_value',validity='$fc_valid',status='$fc_status' WHERE type='fc'";
$res = mysqli_query($con,$sql);
echo "Coupon Updated";

?>