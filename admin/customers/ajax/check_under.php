<?php
session_start();
$cust_id = $_SESSION['customer'];
$child_id = $_POST['child_id'];

include '../../connection.php';

$sql = "SELECT id FROM customers WHERE customer_id='$child_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$ch_id = $row['id'];

$sql = "SELECT id FROM customers WHERE customer_id='$cust_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$c_id = $row['id'];

$sql = "SELECT * FROM closure WHERE parent_id='$c_id' AND child_id='$ch_id'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count==1)
{
	echo "yes";
}
else
{
	echo $child_id.' is not under you';
}





?>