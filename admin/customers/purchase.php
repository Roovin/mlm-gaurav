<?php
session_start();
if(empty($_SESSION['customer']))
{
	header("location:index.php");
}
else
{
	include '../connection.php';
	
	$cust = $_SESSION['customer'];
	$sql = "SELECT * FROM customers WHERE customer_id='$cust'";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$cust_name = $row['name'];
	$wallet_balance = $row['wallet_balance'];
	$account_balance = $row['account_balance'];
	
	
?>
<html>
<head>
<!-- Fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<!-- Fonts-->
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/profit.css">
<script src="https://use.fontawesome.com/2fbeded976.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<script src="../js/jquery-1.9.0.min.js"></script>
<script src="./js/profit.js"></script>
<style>
#purchase-option
{
	background-color:#cdcdcf;
	border:1px solid #72757b;
	border-right:0px;
}
</style>

</head>
<body>
<?php include 'header.php'; ?>

<center>
<div style="padding-top:200px;font-size:50px;font-family:Impact;color:#666666;width:600px;">Hey There!! We are still working on this feature, Keep coming back you will surely see an updation in near future</div>

</center>


</body>

</html>

<?php
}
?>