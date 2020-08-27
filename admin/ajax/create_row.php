<?php
include '../connection.php';
$stock_id  = $_POST['stock_id'];
$product_id = $_POST['product_id'];
$rows = $_POST['rows'];



$sql2 = "SELECT name FROM products WHERE id='$product_id'";
$res2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($res2);
$pname = $row2['name'];


$sql3 = "SELECT stock FROM stocks WHERE stock_id='$stock_id' AND product_id='$product_id'";
$res3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($res3);
$stock = $row3['stock'];


$sql = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

$mrp = $row['mrp'];
$discount = $row['discount'];
$discount_cal = $discount/100;
$discount_amt = $mrp * $discount_cal;




echo '<div class="tranfer-row" id="row-'.$rows.'">
			<div class="tranfer-data" style="width:70px;">'.$row['product_id'].'<input type="hidden" id="stockid-'.$rows.'" value="'.$stock_id.'"><input type="hidden" id="proid-'.$rows.'" value="'.$product_id.'"></div>
			<div class="tranfer-data" style="width:250px;" id="pname-'.$rows.'">'.$pname.'</div>
			<div class="tranfer-data" style="width:120px;" id="bnum-'.$rows.'">'.$row['batch_number'].'</div>
			<div class="tranfer-data" style="width:120px;" id="barcode-'.$rows.'">'.$row['barcode'].'</div>
			<input type="hidden" id="actual_stock-'.$rows.'" value="'.$row3['stock'].'">
			<div class="tranfer-data" style="width:120px;" id="dis_stock-'.$rows.'">'.$row3['stock'].'</div>
			<div class="tranfer-data" style="width:100px;" id="mrp-'.$rows.'">'.$row['mrp'].'</div>
			<div class="tranfer-data" style="width:60px;" id="disper-'.$rows.'">'.$row['discount'].'</div>
			<div class="tranfer-data" style="width:80px;" id="disamt-'.$rows.'">'.$discount_amt.'</div>
			<div class="tranfer-data" style="width:80px;" id="sp-'.$rows.'">'.$row['sale_price'].'</div>
			<div class="tranfer-data" style="width:90px;border-right:0px;"><input id="tq-'.$rows.'" type="text" style="width:50%;height:100%;margin-top:-3px;" value="0" onclick="select_row(this);" onkeyup="update_stock(this);change_cursor(event);"></div>
		</div>';



?>