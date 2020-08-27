<?php
include '../connection.php';
$barcode = $_POST['barcode'];


$sql = "SELECT * FROM purchase WHERE barcode='$barcode' ORDER BY id DESC LIMIT 1";
$res = mysqli_query($con,$sql);

$count = mysqli_num_rows($res);

if($count==0)
{
	echo "New Product";
}
else
{

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$product_id = $r['product_id'];
	$sql2 = "SELECT name,category,subcat FROM products WHERE id='$product_id'";
	$res2 = mysqli_query($con,$sql2);
	$row = mysqli_fetch_array($res2);
	$pname = $row['name'];
	$pcat = $row['category'];
	$psubcat = $row['subcat'];
	
	echo $pcat.'~'.$psubcat.'~'.$pname.'~'.$product_id;	
}
}
?>