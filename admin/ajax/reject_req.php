<?php
include '../connection.php';
$rid = $_POST['req_id'];


$sql = "SELECT status FROM fund_trans WHERE id='$rid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$status = $row['status'];

if($status=='pending')
{

$sql = "UPDATE fund_trans SET status='rejected',date=curdate() WHERE id='$rid'";
$res = mysqli_query($con,$sql);

if($res)
{
	$sql = "SELECT customer_id,amount FROM fund_trans WHERE id='$rid'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res);
		$customer_id = $row['customer_id'];
		$req_amount = $row['amount'];

		$sql = "SELECT mobile FROM customers WHERE customer_id='$customer_id'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res);
		$mobile = $row['mobile'];
	
	
	
	$msg = "Dear Customer, Your Fund Transfer Request for Rs $req_amount/- has been Rejected Due to Insufficiant Balance.HVM Retails (P) Ltd";
		
		
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
	echo "Action already taken";
}

?>