<?php
include '../connection.php';
$product_name = mysqli_real_escape_string($con,$_POST['product_name']);
$category = mysqli_real_escape_string($con,$_POST['category']);
$sub_category = mysqli_real_escape_string($con,$_POST['sub_category']);
$product_unit = mysqli_real_escape_string($con,$_POST['product_unit']);
$cat_version = $_POST['cat_version'];
$subcat_version = $_POST['subcat_version'];
$stock_a = $_POST['stock_a'];
$stock_b = $_POST['stock_b'];
$desc = "";
$img = "default.jpg";




if($cat_version=="old_cat")
{
	if($subcat_version=="old-sub")
	{
		$sql = "SELECT * FROM products WHERE name='$product_name' AND category='$category' AND subcat='$sub_category'";
		$res = mysqli_query($con,$sql);
		$count2 = mysqli_num_rows($res);
		
		if($count2==0)
		{
		$sql = "INSERT INTO products (name,category,subcat,unit,stock_a,stock_b,descr,image)VALUES('$product_name','$category','$sub_category','$product_unit',$stock_a,$stock_b,'$desc','$img')";
		$res = mysqli_query($con,$sql);
		echo "Product Added Succesfully";
		}
		else
		{
			echo "Product Already Exists";
		}
	}
	elseif($subcat_version=="new-sub")
	{
		$sql = "SELECT id FROM product_category WHERE category='$category'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res,MYSQLI_NUM);
		$category_id = $row[0];
		
		$sql = "SELECT * FROM product_sub_category WHERE category_id='$category_id' AND sub_category='$sub_category'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);
		
		if($count==0)
		{
			$sql = "INSERT INTO product_sub_category (category_id,sub_category) VALUES($category_id,'$sub_category')";
			$res = mysqli_query($con,$sql);
		}
		
		$sql = "SELECT * FROM products WHERE name='$product_name' AND category='$category' AND subcat='$sub_category'";
		$res = mysqli_query($con,$sql);
		$count2 = mysqli_num_rows($res);
		
		if($count2==0)
		{
		$sql = "INSERT INTO products (name,category,subcat,unit,stock_a,stock_b,descr,image)VALUES('$product_name','$category','$sub_category','$product_unit',$stock_a,$stock_b,'$desc','$img')";
		$res = mysqli_query($con,$sql);
		echo "Product Added Succesfully";
		}
		else
		{
			echo "Product Already Exists";
		}
	}
}
else
{
	$sql = "SELECT * FROM product_category WHERE category='$category'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
	
	
	if($count==0)
	{
		$sql = "INSERT INTO product_category (category) VALUES('$category')";
		$res = mysqli_query($con,$sql);
		
		$sql = "SELECT id FROM product_category WHERE category='$category'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res,MYSQLI_NUM);
		$category_id = $row[0];
		
		
		$sql = "INSERT INTO product_sub_category (category_id,sub_category) VALUES($category_id,'$sub_category')";
		$res = mysqli_query($con,$sql);
		
		$sql = "SELECT * FROM products WHERE name='$product_name' AND category='$category' AND subcat='$sub_category'";
		$res = mysqli_query($con,$sql);
		$count2 = mysqli_num_rows($res);
		
		if($count2==0)
		{
		$sql = "INSERT INTO products (name,category,subcat,unit,stock_a,stock_b,descr,image)VALUES('$product_name','$category','$sub_category','$product_unit',$stock_a,$stock_b,'$desc','$img')";
		$res = mysqli_query($con,$sql);
		echo "Product Added Succesfully";
		}
		else
		{
			echo "Product Already Exists";
		}
		
	}
	else
	{
		echo "Category Already Exists";
	}
	

	
}




?>