<?php
include '../connection.php';
$category = mysqli_real_escape_string($con,$_POST['category']);

if($category=="")
{
	echo '<option value="">Select Sub Category</option>';
}
else
{	


$sql = "SELECT id FROM product_category WHERE category='$category'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_NUM);
$category_id = $row[0];

$sql = "SELECT sub_category FROM product_sub_category WHERE category_id='$category_id'";
echo '<option value="">Select Sub Category</option>';
$res = mysqli_query($con,$sql);
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<option>'.$r['sub_category'].'</option>';
}

}

?>