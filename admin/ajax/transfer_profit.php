<?php
include '../connection.php';
$cid = $_POST['cust_id'];
$month = $_POST['month'];
$year = $_POST['year'];

$sql = "SELECT profit FROM profit_database WHERE customer_id='$cid' AND month='$month' AND year='$year' AND status='pending'";

$res = mysqli_query($con,$sql);

$count = mysqli_num_rows($res);

if($count>0)
{

$row = mysqli_fetch_array($res);
$profit = $row['profit'];

$cdate = date('Y-m-d');


$sql = "UPDATE profit_database SET status='transfered',dot=curdate() WHERE customer_id='$cid' AND month='$month' AND year='$year'";


$res = mysqli_query($con,$sql);

$sql = "SELECT wallet_balance FROM customers WHERE customer_id='$cid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$wallet_balance = $row['wallet_balance'];

$new_balance = $wallet_balance + $profit;

$sql = "UPDATE customers SET wallet_balance='$new_balance' WHERE customer_id='$cid'";
$res = mysqli_query($con,$sql);


$sql = "SELECT mobile,password FROM customers WHERE customer_id='$cid'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$mobile = $row['mobile'];
$password = $row['password'];

if($month==1)
{
	$wm = "Jan";
}
elseif($month==2)
{
	$wm = "Feb";
}
elseif($month==3)
{
	$wm = "Mar";
}
elseif($month==4)
{
	$wm = "Apr";
}
elseif($month==5)
{
	$wm = "May";
}
elseif($month==6)
{
	$wm = "Jun";
}
elseif($month==7)
{
	$wm = "Jul";
}
elseif($month==8)
{
	$wm = "Aug";
}
elseif($month==9)
{
	$wm = "Sept";
}
elseif($month==10)
{
	$wm = "Oct";
}
elseif($month==11)
{
	$wm = "Nov";
}
elseif($month==12)
{
	$wm = "Dec";
}


$msg = "Dear Customer, Your Profit of Rs ".$profit." for ".$wm."/".$year." has been transfered to your Wallet";

$url = 'http://api.msg91.com/api/sendhttp.php?country=91&sender=HVMRET&route=4&response=json&mobiles='.$mobile.'&authkey=237371A07jBbIK5b9a396e&message='.$msg;

$res = file_get_contents("$url", False);

		$response = json_decode($res, TRUE);
		
		if($response["type"]=="success")
		{
			
				echo "Profit Transfered";
			
		}

}
else
{
	echo "Already Transfered";
}
?>