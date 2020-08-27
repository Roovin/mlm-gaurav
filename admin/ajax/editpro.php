<?php
include '../connection.php';

$column_name = $_POST['column_name'];

if($column_name=="name" || $column_name=="unit" || $column_name=="stock_a" || $column_name=="stock_b")
{
$id = $_POST['column_id'];
$value = mysqli_real_escape_string($con,$_POST['value']);
	
	
	
$sql = "UPDATE products SET $column_name='$value' WHERE id=$id";
$res = mysqli_query($con,$sql);
}
elseif($column_name=="editcat" || $column_name=="editsubcat")
{
	$id = $_POST['column_id'];
	$value1 = mysqli_real_escape_string($con,$_POST['value1']);
	$value2 = mysqli_real_escape_string($con,$_POST['value2']);
	$column1 = $_POST['column1'];
	$column2 = $_POST['column2'];
	
	$sql = "UPDATE products SET $column1='$value1',$column2='$value2' WHERE id=$id";
	$res = mysqli_query($con,$sql);
	
}
?>