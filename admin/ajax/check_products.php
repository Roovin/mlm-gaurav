<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];

$sql = "SELECT * FROM return_products WHERE transfer_id='$transfer_id'";
$res = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$pid = $r['product_id'];
	
	$sql2 = "SELECT name FROM products WHERE id='$pid'";
	$res2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($res2);
	$pname = $row2['name'];
	
	$stock_id = $r['stock_id'];
	
	$sql3 = "SELECT * FROM purchase WHERE product_id='$pid' AND stock_id='$stock_id'";
	$res3 = mysqli_query($con,$sql3);
	$row3 = mysqli_fetch_array($res3);
	
	$discount = $row3['discount'];
	$dis_cal = $discount/100;
	$dis_amt = $row3['mrp'] * $dis_cal;
	
	
	echo '<div class="return-row">
			<div class="return-data" style="width:70px;"><b>'.$pid.'</b></div>
			<div class="return-data" style="width:250px;"><b>'.$pname.'</b></div>
			<div class="return-data" style="width:120px;"><b>'.$row3['batch_number'].'</b></div>
			<div class="return-data" style="width:120px;"><b>'.$row3['barcode'].'</b></div>
			<div class="return-data" style="width:100px;"><b>'.$row3['mrp'].'</b></div>
			<div class="return-data" style="width:60px;"><b>'.$row3['discount'].'</b></div>
			<div class="return-data" style="width:80px;"><b>'.$dis_amt.'</b></div>
			<div class="return-data" style="width:80px;"><b>'.$row3['sale_price'].'</b></div>
			<div class="return-data" style="width:90px;border-right:0px;"><b>'.$r['quantity'].'</b></div>
		</div>';
}



?>