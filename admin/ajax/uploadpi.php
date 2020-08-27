<?php
include '../connection.php';
$image = $_FILES['file'];
$product_id = $_POST['product_id'];
$type = $image['type'];

	$filename = $image['name'];
	$parts = explode(".",$filename);
	$ext = $parts[1];
	$newname = $product_id.".".$ext;
	
	move_uploaded_file($image['tmp_name'],'../images/products/'.$newname);

	$sql = "UPDATE products SET image='$newname' WHERE id=$product_id";
	$res = mysqli_query($con,$sql);
	

?>