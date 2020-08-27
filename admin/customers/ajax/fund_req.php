<?php
session_start();
include '../../connection.php';
$customer_id = $_SESSION['customer'];
session_commit();

$bank = $_POST['bname'];
$acc = $_POST['bacc'];
$holder = $_POST['bholder'];
$ifsc = $_POST['bifsc'];
$otp = $_POST['otp'];
$amount = $_POST['bamount'];


	$sql = "SELECT mobile FROM customers WHERE customer_id='$customer_id'";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$mobile = $row['mobile'];
	
	$purpuse = "funds";
	
	$sql = "SELECT otp FROM otp WHERE customer_id='$customer_id' AND mobile='$mobile' AND pupuse='$purpuse'";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$dotp = $row['otp'];
	
	if($otp==$dotp)
	{
		$sql = "SELECT * FROM fund_trans WHERE customer_id='$customer_id' AND status='pending'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);
		
		if($count>0)
		{
			echo "A Request is Already Pending";
		}
		else
		{
			$sql = "INSERT INTO fund_trans (customer_id,bank,holder,account,ifsc,amount,status,date) VALUES('$customer_id','$bank','$holder','$acc','$ifsc',$amount,'pending',curdate())";
			
			$res = mysqli_query($con,$sql);
			
			echo "Requested";
		}
	}
	else
	{
		echo "Incorrect OTP";
	}
	
	


?>