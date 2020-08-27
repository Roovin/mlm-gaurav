<?php
session_start();
include '../../connection.php';
$customer_id = $_SESSION['customer'];
session_commit();
$amount = $_POST['bamount'];



$sql = "SELECT wallet_balance FROM customers WHERE customer_id='$customer_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$wallet_balance = $row['wallet_balance'];

$balance_difference = $wallet_balance - 5000;


if($wallet_balance<5000)
{
	echo "Balance Less Than 5000 Cannot be Transfered";
}
elseif($balance_difference<$amount)
{
	echo 'Only '.$balance_difference.' Can be Transfered';
}
else
{
	$sql = "SELECT mobile FROM customers WHERE customer_id='$customer_id'";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$mobile = $row['mobile'];
	
	$purpuse = "funds";
	
	$sql = "SELECT * FROM otp WHERE customer_id='$customer_id' AND mobile='$mobile' AND pupuse='$purpuse'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
	$otp = mt_rand(100000,999999);
	$status = "Problem";
	if($count>0)
	{
		$sql = "UPDATE otp SET otp='$otp' WHERE customer_id='$customer_id' AND mobile='$mobile' AND pupuse='$purpuse'";
		$res = mysqli_query($con,$sql);
		$status = "Updated";
	}
	else
	{
		$sql = "INSERT INTO otp (customer_id,mobile,otp,pupuse) VALUES ('$customer_id','$mobile',$otp,'$purpuse')";
		$res = mysqli_query($con,$sql);
		echo "done";
		$status = "Updated";
	}
	
	
	if($status=="Updated")
	{
		$msg = "Dear Customer, Your OTP for Fund Transfer Request is ".$otp;
		
		
		$url = 'http://api.msg91.com/api/sendhttp.php?country=91&sender=HVMRET&route=4&response=json&mobiles='.$mobile.'&authkey=237371A07jBbIK5b9a396e&message='.$msg;
		
		$res = file_get_contents("$url", False);

		$response = json_decode($res, TRUE);
		
		echo $response["type"];
	}
	
}


?>