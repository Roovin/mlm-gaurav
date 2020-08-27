<?php
include '../connection.php';
$database_id = $_POST['database_id'];
$product_id = $_POST['product_id'];

$sql = "SELECT distri_id FROM distributors WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$distri_id = $row['distri_id'];

$sql = "SELECT * FROM distributors_stock WHERE distri_id='$distri_id' ANd product_id='$product_id'";
$res = mysqli_query($con,$sql);

$count = mysqli_num_rows($res);
if($count>0)
{

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$product_id = $r['product_id'];
	$sql2 = "SELECT name FROM products WHERE id='$product_id'";
	$res2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
	$product_name = $row2['name'];
	$len = strlen($product_name);
			if($len>25)
			{
			$product_name = substr($product_name, 0, 25)."...";
			}
	
	echo '<div class="check-stock-table" style="margin-top:0px;border-top:0px;">
			<div class="check-stock-cell" style="width:150px;">'.$r['stock_id'].'</div>
			<div class="check-stock-cell" style="width:250px;">'.$product_name.'</div>
			<div class="check-stock-cell" style="width:98px;border-right:0px;">'.$r['stock'].'</div>
		</div>';
}
}
else
{
	echo "Product Not Available";
}


?>