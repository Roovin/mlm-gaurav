<?php
include '../connection.php';
$subcat = mysqli_real_escape_String($con,$_POST['subcat']);

if($subcat=="")
{
	echo '<option value="">Select Product</option>';
}
else
{	


$sql = "SELECT name FROM products WHERE subcat='$subcat'";
$res = mysqli_query($con,$sql);

echo '<option value="">Select Product</option>';
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<option>'.$r['name'].'</option>';
}

}

?>