<?php
error_reporting(0);
session_start();

include ("../../conn.php");

$cust = $_POST['customer_id'];

$sql = "SELECT count(*) red_member from customers WHERE sponser_id='$cust' and paid_amount<='0'";
$result=mysqli_query($conn, $sql);
if($rows = mysqli_fetch_array($result))
{
	$red_member = $rows['red_member'];
}
$sql = "SELECT count(*) green_member from customers WHERE sponser_id='$cust' and paid_amount>'0'";
$result=mysqli_query($conn, $sql);
if($rows = mysqli_fetch_array($result))
{
	$green_member = $rows['green_member'];
}
$total_member=$red_member+$green_member;
echo $red_member."~".$green_member."~".$total_member;
?>