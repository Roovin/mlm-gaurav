<?php
include '../connection.php';
$upper_limit = $_POST['upper_limit'];
$lower_limit = $_POST['lower_limit'];
$total_elements = $_POST['total_elements'];
$owner_name = mysqli_real_escape_string($con,$_POST['owner_name']);
$owner_phone = mysqli_real_escape_string($con,$_POST['owner_phone']);
$store_state = mysqli_real_escape_string($con,$_POST['store_state']);
$store_city = mysqli_real_escape_string($con,$_POST['store_city']);
$distri_id = mysqli_real_escape_string($con,$_POST['distri_id']);
$active_status = mysqli_real_escape_string($con,$_POST['active_status']);

if($total_elements>$lower_limit)
{
	$new_ulimit = $upper_limit -10;
	
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
	
	if($store_state=="")
	{
		$store_state = "%";
	}
	else
	{
		$store_state = $store_state.'%';
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
	
	$sql = "SELECT * FROM distributors WHERE owner_name LIKE '$owner_name' AND owner_phone LIKE '$owner_phone' AND store_state LIKE '$store_state' AND store_city LIKE '$store_city' AND distri_id LIKE '$distri_id' AND active_status LIKE '$active_status' ORDER BY id DESC LIMIT $new_ulimit, $lower_limit";

	$res = mysqli_query($con,$sql);

		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$status = $r['active_status'];
		if($status==1)
		{
			$status2 = "Active";
		}
		else
		{
			$status2 = "Inactive";
		}
		
		echo '<div class="distri-data-tableheading">
			<div class="distri-data" style="width:100px;">'.$r['distri_id'].'</div>
			<div class="distri-data" style="width:200px;">'.$r['owner_name'].'</div>
			<div class="distri-data" style="width:120px;">'.$r['owner_phone'].'</div>
			<div class="distri-data" style="width:150px;">'.$r['store_city'].'</div>
			<div class="distri-data" style="width:130px;">'.$r['store_state'].'</div>
			<div class="distri-data" style="width:80px;">'.$status2.'</div>
			<div class="distri-data" style="width:80px;height:18px;cursor:pointer;" onclick="load_edit_distri(this);" id="editdistri-'.$r['id'].'"><i class="fa fa-pencil"></i></div>
			<div class="distri-data" style="width:80px;height:18px;cursor:pointer;" id="distristock-'.$r['id'].'" onclick="checkdistri_stock(this);"><i class="fa fa-stack-overflow"></i></div>
			<div class="distri-data border-eat" style="width:80px;height:18px;cursor:pointer;" id="transferstock-'.$r['id'].'" onclick="generate_challan(this);"><i class="fa fa-exchange"></i></div>
		</div>';
		}
	
}


?>