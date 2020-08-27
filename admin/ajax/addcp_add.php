<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$stock_id = $_POST['stock_id'];


$sql = "SELECT stock FROM stocks WHERE product_id='$product_id' AND stock_id='$stock_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$stock = $row['stock'];
$count1 = mysqli_num_rows($res);

if($count1>0)
{

if($stock>$quantity)
{
	$sql = "SELECT * FROM transfer WHERE transfer_id='$transfer_id' AND stock_id='$stock_id' AND product_id='$product_id'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
	
	if($count>0)
	{
		$row2 = mysqli_fetch_array($res,MYSQLI_ASSOC);
		$delivery_status = $row2['delivery_status'];
		if($delivery_status=="Travelling")
		{
		$old_quantity = $row2['quantity'];
		$new_quantity = $old_quantity + $quantity;
		
		$new_stock = $stock - $quantity;
		
		$sql = "UPDATE stocks SET stock='$new_stock' WHERE product_id='$product_id' AND stock_id='$stock_id'";
		$res = mysqli_query($con,$sql);
		
		
		$sql2 = "UPDATE transfer SET quantity='$new_quantity' WHERE transfer_id='$transfer_id' AND stock_id='$stock_id' AND product_id='$product_id'";
		$res2 = mysqli_query($con,$sql2);
		echo "Quantity Added to Existing Product";
		}
		else
		{
			echo "Product Already reached Distributor";
		}
	}
	else
	{
		$new_stock = $stock - $quantity;
		
		$sql = "UPDATE stocks SET stock='$new_stock' WHERE product_id='$product_id' AND stock_id='$stock_id'";
		$res = mysqli_query($con,$sql);
		
		
		$sql = "INSERT INTO transfer (transfer_id,product_id,stock_id,quantity,delivery_status) VALUES($transfer_id,$product_id,'$stock_id',$quantity,'Travelling')";
		$res = mysqli_query($con,$sql);
		echo "Product Added to Challan";
	}
}
else
{
	echo "Stock is Less then Quantity Required";
}
}
else
{
	echo "Product Code and Stock Do not Match";
}

/**

**/

?>