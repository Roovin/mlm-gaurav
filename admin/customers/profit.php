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
#profit-option
{
	background-color:#cdcdcf;
	border:1px solid #72757b;
	border-right:0px;
}
</style>

</head>
<body>
<?php include 'header.php'; ?>

<div id="profit-container">
	<div id="profit-heading">
	Select Month and Year to Check Profit
	</div>
	<center>
	<select class="profit-fields" id="pmonth" onchange="bv_cal();">
	<option value="">Select Month</option>
	<?php
	for($i=1;$i<=12;$i++)
	{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	
	?>
	</select>
	
	<select class="profit-fields" id="pyear" onchange="bv_cal();">
	<option value="">Select Year</option>
	<?php
	for($i=2017;$i<=2025;$i++)
	{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
	?>
	</select>
	
	<div id="demographics">
		<div id="head">Selected Month Summary</div>
		<div class="inner">
		<br>
		<b>Left Side BV</b><br><br>
		<span id="lbv">0</span>
		</div>
		<div class="inner">
		<br>
		<b>Your BV</b><br><br>
		<span id="mbv">0</span>
		</div>
		<div class="inner" style="border-right:0px;">
		<br>
		<b>Right BV</b><br><br>
		<span id="rbv">0</span>
		</div>
	</div>
	
	
	</center>
</div>

<center>
<div class="pl-section">
	<div class="pl-boxes">
		<div class="pl-head"><u>Selected Month Profit</u></div>
	
		<div id="profit-display"></div>
	</div>
	<div class="pl-boxes" id="ftrans">
	
	
	
	
	<!-- OTP Box-->
	<div class="fotp-box" id="fotp-box">
		<div class="fotp-head"><u>Please Enter the OTP you Recieved on Your Mobile</u></div>
	
		<input type="text" style="width:100px;height:30px;margin-top:30px;" placeholder="   Enter OTP" id="fotp">
		
		<div id="otp-btn" onclick="submit_otp();">Submit OTP</div>
		<br>
		<div onclick="req_trans();" style="cursor:pointer;"><i><u>Resend OTP</u></i></div>
	</div>
	<!-- OTP Box-->
	
		<div class="pl-head"><u>Fund Transfer Request</u></div>
		<div class="w-box">
			<div class="w-text"><b>Wallet Balance:</b></div>
			<div class="w-text"><?php echo $wallet_balance; ?></div>
			<input type="text" class="pl-fields" placeholder="    Bank Name" id="bname">
			<input type="text" class="pl-fields" placeholder="    Account Number" id="bacc">
			<input type="text" class="pl-fields" placeholder="    Account Holder" id="bholder">
			<input type="text" class="pl-fields" placeholder="    IFSC Code" id="bifsc">
			
			<input type="text" class="pl-fields" placeholder="    Amount" id="bamount">
			
			<div id="req-btn" onclick="req_trans();">Request Transfer</div>
			
		</div>
		
	
	</div>
</div>
</center>

</body>

</html>

<?php
}
?>