<?php
include '../connection.php';
session_start();
$date = $_POST['date'];
$store = $_POST['store'];

$sql = "SELECT amount_rec,hvm_card,dc_card,paytm FROM custbills WHERE bill_date='$date' AND store_id='$store'";
$res = mysqli_query($con,$sql);

$total_amount = 0;
$hvm_card = 0;
$dc_card = 0;
$paytm = 0;

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$total_amount += $r['amount_rec'];
	$hvm_card += $r['hvm_card'];
	$dc_card += $r['dc_card'];
	$paytm += $r['paytm'];
}


$sql = "SELECT amount FROM hvmcard_transactions WHERE date(date)='$date' AND store='$store' AND transaction_type='recharge'";
$res = mysqli_query($con,$sql);
$recharge = 0;
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$recharge += $r['amount'];
}


$today_cash  = $total_amount - $hvm_card - $dc_card - $paytm + $recharge;

$sql = "SELECT payment FROM store_payment WHERE date='$date' AND store='$store'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0)
{
$row = mysqli_fetch_array($res);
$paid = $row['payment'];
}
else
{
	$paid = 0;
}

$balance = $today_cash - $paid;

echo $total_amount.'-'.$hvm_card.'-'.$dc_card.'-'.$paytm.'-'.$recharge.'-'.$today_cash.'-'.$paid.'-'.$balance;

?>