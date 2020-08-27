<?php
include '../connection.php';
$cid = $_POST['cid'];
$status = $_POST['status'];
$date = $_POST['date'];

if($cid=="")
{
	$cid = '%';
}

if($status=="")
{
	$status = '%';
}

if($date=="")
{
	$date = '%';
}


$sql = "SELECT * FROM fund_trans WHERE customer_id LIKE '$cid' AND status LIKE '$status' AND date LIKE '$date'";

$res = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$cust_id = $r['customer_id'];
	
	$sql2 = "SELECT name,mobile FROM customers WHERE customer_id='$cust_id'";
	$res2 = mysqli_query($con,$sql2);
	$row = mysqli_fetch_array($res2);
	$name = $row['name'];
	$mobile = $row['mobile'];
	
	echo '<div class="ftr-row">
			<div class="ftr-col" style="width:100px;font-size:10px;">'.$r['customer_id'].'</div>
			<div class="ftr-col" style="width:200px;">'.$name.'</div>
			<div class="ftr-col" style="width:150px;">'.$mobile.'</div>
			<div class="ftr-col" style="width:150px;">'.$r['amount'].'</div>
			<div class="ftr-col" style="width:150px;">'.ucfirst($r['status']).'</div>
			<div class="ftr-col" style="width:144px;border-right:0px;">'.$r['date'].'</div>
		</div>';
}


?>