<?php
include '../connection.php';
$product_name = mysqli_real_escape_string($con,$_POST['product_name']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$subcat = mysqli_real_escape_string($con,$_POST['subcat']);

if($product_name=="" && $category=="" && $subcat=="")
{
$sql = "SELECT * FROM products";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
echo $count;
		
}
else
{
	if($product_name=="")
	{
		$product_name = "%";
	}
	else
	{
		$product_name = $product_name.'%';
	}
	
	if($category=="")
	{
		$category = "%";
	}
	else
	{
		$category = $category.'%';
	}
	
	
	if($subcat=="")
	{
		$subcat = "%";
	}
	else
	{
		$subcat = $subcat.'%';
	}
	
	$sql = "SELECT * FROM products WHERE name LIKE '$product_name' AND category LIKE '$category' AND subcat LIKE '$subcat'";
	
	

	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
		
	echo $count;	
	
}


?>