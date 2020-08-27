<?php
include '../connection.php';
session_start();
$store = $_POST['store'];
$store_payment = $_POST['store_payment'];
$date = $_POST['date'];


$sql = "SELECT payment FROM store_payment WHERE date='$date' AND store='$store'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count==1)
{
	$row = mysqli_fetch_array($res);
	$old_payment = $row['payment'];
	$new_payment = $old_payment + $store_payment;
	
	$sql = "UPDATE store_payment SET payment='$new_payment' WHERE store='$store' AND date='$date'";
	$res = mysqli_query($con,$sql);
}
else
{
	$sql = "INSERT INTO store_payment (date,store,payment) VALUES('$date','$store',$store_payment)";
	$res = mysqli_query($con,$sql);
}	


$today_cash = $_POST['today'];
 
$sql = "SELECT payment FROM store_payment WHERE date='$date' AND store='$store'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0)
{
$row = mysqli_fetch_array($res);
$paid = $row['payment'];
}
else
{
	$paid = 0;
}

$balance = $today_cash - $paid;
echo $paid.'-'.$balance;

?>