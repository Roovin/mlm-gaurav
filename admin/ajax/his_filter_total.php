<?php
include '../connection.php';

$distri_id = mysqli_real_escape_string($con,$_POST['distri_id']);
$date = $_POST['date'];
$challan_num = $_POST['challan_num'];
$deliver_status = $_POST['deliver_status'];

if($distri_id=="" && $date=="" && $challan_num=="" && $deliver_status=="")
{
	$sql = "SELECT * FROM transfer_info ORDER BY id DESC";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);	
	echo $count;
}
else
{
	if($distri_id=="")
		{
			$distri_id = "%";
		}
		else
		{
			$distri_id = $distri_id."%";
		}
		
		
		if($date=="")
		{
			$date = "%";
		}
		else
		{
			$date= $date;
		}
		
		if($challan_num=="")
		{
			$challan_num = "%";
		}
		else
		{
			$challan_num = $challan_num."%";
		}
		
		if($deliver_status=="")
		{
			$deliver_status = "%";
		}
		else
		{
			$deliver_status = $deliver_status."%";
		}
	
	$sql2 = "SELECT * FROM transfer_info WHERE distri_id LIKE '$distri_id' AND date_of_transfer LIKE '$date' AND challan_number LIKE '$challan_num' ORDER BY id DESC";
	$res2 = mysqli_query($con,$sql2);
	$count2=0;
	while($r=mysqli_fetch_array($res2,MYSQLI_ASSOC))
	{
		$transfer_id = $r['id'];
		$sql3 = "SELECT * FROM transfer WHERE transfer_id='$transfer_id' AND delivery_status LIKE '$deliver_status'";
		$res3 = mysqli_query($con,$sql3);
		$count = mysqli_num_rows($res3);
		
		if($count>0)
			{
				$count2++;
			}
	}
	echo $count2;
	
	
	
	
}



?>