<?php
include '../connection.php';
$barcode = $_POST['barcode'];

$sql = "SELECT * FROM stocks WHERE barcode='$barcode'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0)
{
		$fstock_id = array();
		$fproduct_id = array();
	$sql2 = "SELECT * FROM stocks WHERE barcode='$barcode' AND stock>0";
	$res2 = mysqli_query($con,$sql2);
	while($r=mysqli_fetch_array($res2,MYSQLI_ASSOC))
	{
		$fstock_id[] = $r['stock_id'];
		$fproduct_id[] = $r['product_id'];
	}
	
	if(sizeof($fstock_id)==0)
	{
		echo "Out of Stock";
	}
	elseif(sizeof($fstock_id)==1)
	{
		echo "stock_id-".$fstock_id[0]."-product_id-".$fproduct_id[0];
	}
	elseif(sizeof($fstock_id)>1)
	{
		$sql3 = "SELECT * FROM stocks WHERE barcode='$barcode' AND stock>0";
		$res3 = mysqli_query($con,$sql3);
		
		$x = 0;
		while($p=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$x++;
			$product_id = $p['product_id'];
			$stock_id = $p['stock_id'];
			
			$sql5 = "SELECT name FROM products WHERE id='$product_id'";
			$res5 = mysqli_query($con,$sql5);
			$row1 = mysqli_fetch_array($res5);
			$pname = $row1['name'];
			
			$sql5 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res5 = mysqli_query($con,$sql5);
			$row2 = mysqli_fetch_array($res5);
			$mrp = $row2['mrp'];
			$discount = $row2['discount'].'%';
			$sale_price = $row2['sale_price'];
			
			
			
		echo '<div class="ss-row">
			<div class="ss-data" style="width:30px;">'.$x.'<input type="hidden" id="ss_stockid-'.$x.'" value="'.$p['stock_id'].'"><input type="hidden" id="ss_proid-'.$x.'" value="'.$p['product_id'].'"></div>
			<div class="ss-data" style="width:245px;">'.$pname.'</div>
			<div class="ss-data" style="width:50px;">'.$mrp.'</div>
			<div class="ss-data" style="width:100px;">'.$discount.'</div>
			<div class="ss-data" style="width:100px;">'.$sale_price.'</div>
			<div class="ss-data" style="width:70px;">'.$p['stock'].'</div>
			<div class="ss-data" style="width:49px;border-right:0px;"><div style="width:80%;height:90%;background-color:grey;padding-top:2px;margin-top:-2px;color:white;cursor:pointer;" id="ssadd-'.$x.'" onclick="create_row(this);">Add</div></div>
		</div>';
		}
	}
	
	
	

}
else
{
	echo "Invalid Barcode";
}




?>