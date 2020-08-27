<?php
include '../connection.php';
$upper_limit = $_POST['upper_limit'];
$lower_limit = $_POST['lower_limit'];
$total_elements = $_POST['total_elements'];
$stock_id = $_POST['stock_id'];
$product_code = $_POST['product_code'];

if($total_elements>$lower_limit)
{
	$new_ulimit = $upper_limit -10;
	
	if($stock_id=="")
	{
		$stock_id = "%";
	}
	else
	{
		$stock_id = $stock_id."%";
	}
	
	if($product_code=="")
	{
		$product_code = "%";
	}
	else
	{
		$product_code = $product_code."%";
	}
	
	$sql="SELECT * FROM stocks WHERE stock_id LIKE '$stock_id' AND product_id LIKE '$product_code' ORDER BY id DESC LIMIT $new_ulimit, $lower_limit";

	$res = mysqli_query($con,$sql);
	$x=$new_ulimit;
	while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$x++;
		$product_id = $r['product_id'];
		$sql2 = "SELECT name FROM products WHERE id='$product_id'";
		$res2 = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($res2,MYSQLI_ASSOC);
		$product_name = $row['name'];
		$length = strlen($product_name);
		if($length>25)
		{
		$product_name = substr($product_name, 0,25)."...";
		}
		
		$sql2 = "SELECT category FROM products WHERE id='$product_id'";
		$res2 = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($res2,MYSQLI_ASSOC);
		$product_category = $row['category'];
		
		$sql2 = "SELECT subcat FROM products WHERE id='$product_id'";
		$res2 = mysqli_query($con,$sql2);
		$row = mysqli_fetch_array($res2,MYSQLI_ASSOC);
		$product_subcat = $row['subcat'];
		
		
		echo '
		<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;">'.$x.'</div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;">'.$r['stock_id'].'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_category.'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_subcat.'</div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;">'.$product_name.'</div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;">'.$r['stock'].'</div>
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;height:18px;cursor:pointer;" id="transfer-'.$r['id'].'" onclick="transfer(this);"><i class="fa fa-exchange"></i></div>
		</div>';
		
	}
	
}


?>