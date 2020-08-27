<?php
include '../connection.php';
$stock_id = $_POST['stock_id'];
$product_code = $_POST['product_code'];

if($product_code=="" && $stock_id=="")
{
$sql = "SELECT * FROM stocks";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
echo $count;
		
}
else
{
	if($product_code=="")
	{
		$product_code = "%";
	}
	else
	{
		$product_code = $product_code.'%';
	}
	
	if($stock_id=="")
	{
		$stock_id = "%";
	}
	else
	{
		$stock_id = $stock_id.'%';
	}
	

	
	$sql = "SELECT * FROM stocks WHERE stock_id LIKE '$stock_id' AND product_id LIKE '$product_code'";
	
	

	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
		
	echo $count;	
	
}


?>