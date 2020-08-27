<?php
include '../connection.php';
$upper_limit = $_POST['upper_limit'];
$lower_limit = $_POST['lower_limit'];
$total_elements = $_POST['total_elements'];
$product_name = mysqli_real_escape_string($con,$_POST['product_name']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$subcat = mysqli_real_escape_string($con,$_POST['subcat']);

if($total_elements>$lower_limit)
{
	$new_ulimit = $upper_limit -10;
	
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
	
	$sql = "SELECT * FROM products WHERE name LIKE '$product_name' AND category LIKE '$category' AND subcat LIKE '$subcat' LIMIT $new_ulimit, $lower_limit";

	$res = mysqli_query($con,$sql);

		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$name = $r['name'];
			$len = strlen($name);
			if($len>25)
			{
			$name = substr($name, 0, 27)."...";
			}
			
			echo '<div class="product-data-tableheading" style="">
			<div class="ptable-data" style="width:130px;font-size:12px;height:20px;">'.$r['id'].'</div>
			<div class="ptable-data editable" style="width:215px;font-size:12px;height:20px;" id="name-'.$r['id'].'" >'.$name.'</div>
			<div class="ptable-data editable" style="width:200px;font-size:12px;height:20px;" id="category-'.$r['id'].'" >'.$r['category'].'</div>
			<div class="ptable-data" style="width:200px;font-size:12px;height:20px;" id="subcat-'.$r['id'].'" >'.$r['subcat'].'</div>
			<div class="ptable-data editable" style="width:100px;font-size:12px;height:20px;" id="unit-'.$r['id'].'" >'.$r['unit'].'</div>
			<div class="ptable-data editable" style="width:100px;font-size:15px;height:20px;" id="stock_a-'.$r['id'].'" >'.$r['stock_a'].'</div>
			<div class="ptable-data border-eat editable" style="width:100px;font-size:15px;height:20px;" id="stock_b-'.$r['id'].'" >'.$r['stock_b'].'</div>
		</div>';
		}
	
}


?>