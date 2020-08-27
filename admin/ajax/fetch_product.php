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
		echo "more";
	}
	
	
	

}
else
{
	echo "Invalid Barcode";
}




?>