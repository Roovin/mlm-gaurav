<?php
include '../conn.php';

$month = $_POST['month'];
$year = $_POST['year'];


$cmonth = date('m');
$cyear = date('Y');

if($month<$cmonth && $year<=$cyear)
{

$sql = "SELECT id FROM customers";
$res = mysqli_query($conn,$sql);
$total_cust = mysqli_num_rows($res);

$sql = "SELECT * FROM profit_database WHERE month='$month' AND year='$year'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);

if($count==0)
{
	echo "new";
}
else
{
	echo "re";
}
}
else
{
	echo "Invalid Month/Year Selected";
}
?>