<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];

$sql = "SELECT * FROM transfer_info WHERE id='$transfer_id'";
$res = mysqli_query($con,$sql);
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$distri_id = $r['distri_id'];
	
	$sql2 = "SELECT store_address FROM distributors WHERE distri_id='$distri_id'";
	$res2 = mysqli_query($con,$sql2);
	$row = mysqli_fetch_array($res2,MYSQLI_ASSOC);
	$store_address = $row['store_address'];
	
	
	echo'<div class="transfer-box" id="loaded-challan">
		<div class="transfer-heading"><b>Delivery Challan</b></div>
		<div class="transfer-box2">
			<div class="transfer-sub-box" style="width:299px;border-right:1px solid black;">
				<div class="transfer-data">
					<span style="color:grey;font-size:14px;"><b>Company Details</b></span><br>
					<span style="font-size:13px"><b>HVM Retails (P) Ltd.</b></span>
					
					<div style="font-size:10px;margin-top:5px;"><b>H.NO.80/5, BLOCK-G,NR-EKTA GROUP,KRISHNA CHOWK, ASHOK VIHAR PH-3,GURGAON Gurgaon - 122001 Haryana - India</b></div>
					<div style="font-size:10px;"><b>GST NUMBER : 22AAAAA0000A1Z5</b></div>
				</div>
				
				<div class="transfer-data">
					<span style="color:grey;font-size:14px;">
					<b>Delivering To</b></span><br>
					<div id="distri-data">
					<span style="font-size:13px"><b>'.$r['distri_id'].'</b></span>
					<div style="font-size:10px;margin-top:5px;"><b>'.$store_address.'</b></div>
					</div>
				</div>
			</div>
			<div class="transfer-sub-box" style="width:300px;">
				<div class="transfer-data2">
					'.$r['date_of_transfer'].'
				</div>
				<div class="transfer-data2" style="height:49px;">
					'.$r['challan_number'].'
				</div>
				<div class="transfer-data2">
					'.$r['tampoo_number'].'
				</div>
				<div class="transfer-data2">
					'.$r['driver_phone'].'
				</div>
			</div>
		</div>
		</div>
		<div class="transfer-table" style="width:980px;">
			<div class="tranfer-row">
				<div class="tranfer-data" style="width:70px;"><b>PID</b></div>
				<div class="tranfer-data" style="width:250px;"><b>Product Name</b></div>
				<div class="tranfer-data" style="width:120px;"><b>Batch No.</b></div>
				<div class="tranfer-data" style="width:120px;"><b>Barcode</b></div>
				<div class="tranfer-data" style="width:100px;"><b>MRP</b></div>
				<div class="tranfer-data" style="width:60px;"><b>DIS(%)</b></div>
				<div class="tranfer-data" style="width:80px;"><b>DIS(AMT)</b></div>
				<div class="tranfer-data" style="width:80px;"><b>Sale Price</b></div>
				<div class="tranfer-data" style="width:90px;border-right:0px;"><b>Quantity</b></div>
			
			</div>';
		$sql3 = "SELECT * FROM transfer WHERE transfer_id='$transfer_id'";
		$res3 = mysqli_query($con,$sql3);
		$sno = 0;
		while($p=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$sno++;
			$product_id = $p['product_id'];
			$stock_id = $p['stock_id'];
			
			$sql4 = "SELECT name FROM products WHERE id='$product_id'";
			$res4 = mysqli_query($con,$sql4);
			$row2 = mysqli_fetch_array($res4,MYSQLI_ASSOC);
			$product_name = $row2['name'];
			
			$sql4 = "SELECT * FROM purchase WHERE product_id='$product_id' AND stock_id='$stock_id'";
			$res4 = mysqli_query($con,$sql4);
			$row3 = mysqli_fetch_array($res4);
			
			$batch_num = $row3['batch_number'];
			$barcode = $row3['barcode'];
			$mrp = $row3['mrp'];
			$discount = $row3['discount'];
			$dis_cal = $discount/100;
			$dis_amt = $mrp * $dis_cal;
			$sale_price = $row3['sale_price'];
			
			
			echo '<div class="tranfer-row">
				<div class="tranfer-data" style="width:70px;">'.$product_id.'</div><div class="tranfer-data" style="width:250px;">'.$product_name.'</div><div class="tranfer-data" style="width:120px;">'.$batch_num.'</div><div class="tranfer-data" style="width:120px;">'.$barcode.'</div>
				<div class="tranfer-data" style="width:100px;">'.$mrp.'</div>
				<div class="tranfer-data" style="width:60px;">'.$discount.'</div>
				<div class="tranfer-data" style="width:80px;">'.$dis_amt.'</div>
				<div class="tranfer-data" style="width:80px;">'.$sale_price.'</div>
				<div class="tranfer-data" style="width:90px;border-right:0px;">'.$p['quantity'].'</div>
			
			</div>';
		}
	echo'</div><br><div class="transfer-data-btn" onclick="print_challan();">Print</div>&nbsp;&nbsp;<div class="transfer-data-btn" id="close-challan" onclick="close_loadedchallan();">Close</div>';
}


?>