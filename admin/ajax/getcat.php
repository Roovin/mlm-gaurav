<?php
include '../connection.php';
$sql = "SELECT category FROM product_category";
$res = mysqli_query($con,$sql);
echo '<option value="">Select Category</option>';
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<option>'.$r['category'].'</option>';
}



?>