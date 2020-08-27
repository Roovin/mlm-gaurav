<?php
error_reporting(0);
session_start();
include '../conn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT name FROM customers WHERE customer_id='$username' AND password='$password'";
$res = mysqli_query($conn,$sql);
//$count = mysqli_num_rows($res);

if($row=mysqli_fetch_array($res))
{
	session_start();
	$_SESSION['customer_id'] = $username;
	$_SESSION['customer_name'] = $row['name'];
	header("location:dashboard.php");
}
else
{
	header("location:index.php?error=yes");
}


?>