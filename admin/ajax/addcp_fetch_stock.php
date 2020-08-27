<?php
include '../connection.php';
$product_id = $_POST['product_id'];

$sql = "SELECT name FROM products WHERE id='$product_id'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0)
{
	$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	$product_name = $row['name'];
	$len = strlen($product_name);
			if($len>34)
			{
			$product_name = substr($product_name, 0, 34)."...";
			}
	
	

	$sql = "SELECT * From stocks WHERE product_id='$product_id'";
	$res = mysqli_query($con,$sql);
	$product_count = mysqli_num_rows($res);
	if($product_count>0)
	{
	$x= 0;
	while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$x++;
		if($x==1)
		{
			$checked = "checked";
		}
		else
		{
			$checked="";
		}
		echo '<div class="selection_table" style="margin-top:0px;border-top:0px;background-color:transparent;color:black;">
		<div class="selection-table-data" style="width:20px;">
			<input type="radio" name="stock_id" value="'.$r['stock_id'].'" '.$checked.'>
		</div>
		<div class="selection-table-data" style="width:150px;">'.$r['stock_id'].'</div>
		<div class="selection-table-data" style="width:250px;">'.$product_name.'</div>
		<div class="selection-table-data" style="width:77px;border-right:0px;">'.$r['stock'].'</div>
	</div>';
	}
	}
	else
	{
		echo "Out of Stock";
	}
}
else
{
	echo "Invalid Product ID";
}

?>