<?php
include '../connection.php';
$bill = $_POST['billn'];

$sql = "SELECT bill_date,time,customer_id FROM custbills WHERE id='$bill'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$bill_date = $row['bill_date'];
$time  = $row['time'];
$customer_id = $row['customer_id'];

$sql = "SELECT id FROM bill_products WHERE billing_id='$bill'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

echo '<div class="bill-line" style="border-bottom:0px;">
			<div class="bill-box" style="border-right:1px solid black;"><b>&nbsp;&nbsp;Date:</b> '.$bill_date.'</div>
			<div class="bill-box"><b>&nbsp;&nbsp;Bill Time:</b> '.$time.'</div>
		</div>
		<div class="bill-line">
			<div class="bill-box" style="border-right:1px solid black;">&nbsp;&nbsp;<b>Customer ID:</b> '.$customer_id.'</div>
			<div class="bill-box">&nbsp;&nbsp;<b>Quantity:</b> '.$count.'</div>
		</div>
		<div class="bill-line2">
			<div class="bill-data" style="width:50px;">PID</div>
			<div class="bill-data" style="width:299px;">PRODUCT</div>
			<div class="bill-data" style="width:50px;">QTY</div>
			<div class="bill-data" style="width:50px;">RATE</div>
			<div class="bill-data" style="width:100px;">GROSS AMT.</div>
			<div class="bill-data" style="width:50px;">DISC</div>
			<div class="bill-data" style="width:99px;">NET AMT.</div>
			<div class="bill-data" style="width:60px;">CGST</div>
			<div class="bill-data" style="width:60px;">SGST</div>
			<div class="bill-data" style="width:60px;">UNIT</div>
			<div class="bill-data" style="width:60px;">BV</div>
		</div>';


$sql = "SELECT bill_products.product_id,products.name,bill_products.qty,purchase.mrp,purchase.gst_rate,products.unit,purchase.business_volume,purchase.discount FROM bill_products INNER JOIN products ON bill_products.product_id=products.id INNER JOIN purchase ON bill_products.product_id=purchase.product_id AND bill_products.stock_id=purchase.stock_id AND bill_products.billing_id='$bill'";

$res = mysqli_query($con,$sql);

$total_bill = 0;
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	
	$gross = $r['mrp'] * $r['qty'];
	$dis_cal = $r['discount']/100;
	$dis_amt = $dis_cal*$r['mrp'];
	
	$total_discount = $dis_amt * $r['qty'];
	$net_amt = $gross - $total_discount;
	$cgst = $r['gst_rate']/2;
	$total_bill += $net_amt;
	
	echo '<div class="bill-line2" style="border-bottom:0px;color:grey;">
			<div class="bill-data" style="width:50px;">'.$r['product_id'].'</div>
			<div class="bill-data" style="width:299px;">'.$r['name'].'</div>
			<div class="bill-data" style="width:50px;">'.$r['qty'].'</div>
			<div class="bill-data" style="width:50px;">'.$r['mrp'].'</div>
			<div class="bill-data" style="width:100px;">'.$gross.'</div>
			<div class="bill-data" style="width:50px;">'.$total_discount.'</div>
			<div class="bill-data" style="width:99px;">'.$net_amt.'</div>
			<div class="bill-data" style="width:60px;">'.$cgst.'</div>
			<div class="bill-data" style="width:60px;">'.$cgst.'</div>
			<div class="bill-data" style="width:60px;">'.$r['unit'].'</div>
			<div class="bill-data" style="width:60px;">'.$r['business_volume'].'</div>
		</div>';
	
}	

$sql = "SELECT amount_rec FROM custbills WHERE id='$bill'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$amount_rec = $row['amount_rec'];

echo '<div id="bill-out"></div>
		
		<div class="line">=========</div>
		<div class="line"><b>Total</b>&nbsp;&nbsp;&nbsp; '.$total_bill.'</div>
		<div class="line"><b>Round Off</b>&nbsp;&nbsp;&nbsp; '.$amount_rec.'</div>';	
		
		


?>