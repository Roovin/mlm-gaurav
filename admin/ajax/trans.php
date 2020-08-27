<?php
include '../connection.php';
$rid = $_POST['req_id'];

$sql = "SELECT status FROM fund_trans WHERE id='$rid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$status = $row['status'];

if($status=='pending')
{


$sql = "SELECT customer_id,amount FROM fund_trans WHERE id='$rid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$customer_id = $row['customer_id'];
$req_amount = $row['amount'];

$sql = "SELECT wallet_balance,mobile FROM customers WHERE customer_id='$customer_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$mobile = $row['mobile'];
$wallet_balance = $row['wallet_balance'];

$diff = $wallet_balance - $req_amount;

if($diff>=5000)
{
	$sql = "UPDATE customers SET wallet_balance='$diff' WHERE customer_id='$customer_id'";
	$res = mysqli_query($con,$sql);
	
	if($res)
	{
		$sql = "UPDATE fund_trans SET status='transfered' WHERE id='$rid'";
		$res = mysqli_query($con,$sql);
		
		$msg = "Dear Customer, Your Fund Transfer Request for Rs $req_amount/- has been processed.Please note it may take up to 24 hours for the funds to appear.HVM Retails (P) Ltd";
		
		
		$url = 'http://api.msg91.com/api/sendhttp.php?country=91&sender=HVMRET&route=4&response=json&mobiles='.$mobile.'&authkey=237371A07jBbIK5b9a396e&message='.$msg;
		
		$res = file_get_contents("$url", False);
	
		$response = json_decode($res, TRUE);
		
		echo $response["type"];
		
	}
	else
	{
		echo "Something Went Wrong";
	}
	
}
else
{
	echo "Requested Amount is higher than available amount";
}
}
else
{
	echo "Action already taken";
}

?>