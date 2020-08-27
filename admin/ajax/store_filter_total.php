<?php
include '../connection.php';
$owner_name = mysqli_real_escape_string($con,$_POST['owner_name']);
$owner_phone = mysqli_real_escape_string($con,$_POST['owner_phone']);
$store_id = mysqli_real_escape_string($con,$_POST['store_id']);
$store_city = mysqli_real_escape_string($con,$_POST['store_city']);
$distri_id = mysqli_real_escape_string($con,$_POST['distri_id']);
$active_status = mysqli_real_escape_string($con,$_POST['active_status']);

if($owner_name=="" && $owner_phone=="" && $store_id=="" && $store_city=="" && $distri_id=="" && $active_status=="")
{
$sql = "SELECT * FROM stores";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
echo $count;
		
}
else
{
	if($owner_name=="")
	{
		$owner_name = "%";
	}
	else
	{
		$owner_name = $owner_name.'%';
	}
	
	if($owner_phone=="")
	{
		$owner_phone = "%";
	}
	else
	{
		$owner_phone = $owner_phone.'%';
	}
	
	if($store_id=="")
	{
		$store_id = "%";
	}
	else
	{
		$store_id = $store_id.'%';
	}
	
	
	if($store_city=="")
	{
		$store_city = "%";
	}
	else
	{
		$store_city = $store_state.'%';
	}
	
	if($distri_id=="")
	{
		$distri_id = "%";
	}
	else
	{
		$distri_id = $distri_id.'%';
	}
	
	if($active_status=="")
	{
		$active_status = "%";
	}
	else
	{
		$active_status = $active_status.'%';
	}
	
	$sql = "SELECT * FROM stores WHERE owner_name LIKE '$owner_name' AND owner_phone LIKE '$owner_phone' AND store_id LIKE '$store_id' AND store_city LIKE '$store_city' AND distri_id LIKE '$distri_id' AND active_status LIKE '$active_status'";
	
	

	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
		
	echo $count;	
	
}


?>