<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];

$sql = "SELECT * FROM transfer WHERE transfer_id='$transfer_id'";
$res = mysqli_query($con,$sql);

$delete = "yes";

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	if($r['delivery_status']=="Added")
	{
		$delete = "no";
		break;
	}
}


if($delete=="yes")
{
$sql = "SELECT * FROM transfer WHERE transfer_id='$transfer_id'";
$res = mysqli_query($con,$sql);
	while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$product_id = $r['product_id'];
		$stock_id = $r['stock_id'];
		$quantity = $r['quantity'];
		$table_id = $r['id'];
		
		$sql2 = "SELECT stock FROM stocks WHERE product_id='$product_id' AND stock_id='$stock_id'";
		$res2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
		$old_stock = $row2['stock'];
		
		$new_stock = $old_stock + $quantity;
		
		$sql2 = "UPDATE stocks SET stock='$new_stock' WHERE product_id='$product_id' AND stock_id='$stock_id'";
		$res2 = mysqli_query($con,$sql2);
		
		$sql2 = "DELETE FROM transfer WHERE id='$table_id'";
		$res2 = mysqli_query($con,$sql2);
	}
	
	$sql = "DELETE FROM transfer_info WHERE id='$transfer_id'";
	$res = mysqli_query($con,$sql);
	echo "Deleted";
}
else
{
	echo "Cannot Delete!!!One or All of  the Products are Added to Distributor's Stock";
}

?>