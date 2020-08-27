<?php
include '../connection.php';

$value = $_POST['value'];
$thres = $_POST['thres'];
$validity = $_POST['validity'];

$sql = "SELECT * FROM auto_coupons where threshold='$thres'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0)
{
	echo "Coupon at this threshold already exists";
}
else
{
	$sql = "INSERT INTO auto_coupons (type,value,threshold,validity,status) VALUES('sc',$value,$thres,$validity,'on')";
	$res = mysqli_query($con,$sql);
	
	$c_id = mysqli_insert_id($con);
	echo $c_id;
}	


?>