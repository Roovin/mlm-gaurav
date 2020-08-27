<?php
include '../connection.php';
$upper_limit = $_POST['upper_limit'];
$lower_limit = $_POST['lower_limit'];
$total_elements = $_POST['total_elements'];
$distri_id = $_POST['distri_id'];
$date = $_POST['date'];
$challan_num = $_POST['challan_num'];
$deliver_status = $_POST['deliver_status'];

if($total_elements>$lower_limit)
{
	if($distri_id=="" && $date=="" && $challan_num=="" && $deliver_status=="")
	{
		$new_ulimit = $upper_limit -10;
		
		$x=0;
		$sql = "SELECT * FROM transfer_info ORDER BY id DESC LIMIT $new_ulimit, $lower_limit";
		$res = mysqli_query($con,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$x++;
			echo '<div class="transfer-his-row" id="chalrow-'.$r['id'].'">
			<div class="transfer-his-cell" style="width:100px;">'.$x.'</div>
			<div class="transfer-his-cell" style="width:150px;">'.$r['distri_id'].'</div>
			<div class="transfer-his-cell" style="width:120px;">'.$r['date_of_transfer'].'</div>
			<div class="transfer-his-cell" style="width:200px;" id="chlno-'.$r['id'].'">'.$r['challan_number'].'</div>
			<div class="transfer-his-cell" style="width:200px;">'.$r['tampoo_number'].'</div>
			<div class="transfer-his-cell" style="width:120px;">'.$r['driver_phone'].'</div>
			<div class="transfer-his-cell" style="width:50px;cursor:pointer;" id="viewchallan-'.$r['id'].'" onclick="view_challan(this);"><i class="fa fa-eye"></i></div>
			<div class="transfer-his-cell" style="width:50px;cursor:pointer;" id="editloadchallan-'.$r['id'].'" onclick="editloadchallan(this);"><i class="fa fa-pencil"></i></div>
			<div id="deletechallan-'.$r['id'].'" onclick="deletechallan(this);" class="transfer-his-cell" style="width:50px;border-right:0px;cursor:pointer;"><i class="fa fa-trash-o"></i></div>
		</div>';
		}
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
		$new_limit = $upper_limit -10;
		
		
		$loopbreaker = 0;
		$loopinitializer = 0;
		$x=0;
		$sql = "SELECT * FROM transfer_info WHERE distri_id LIKE '$distri_id' AND date_of_transfer LIKE '$date' AND challan_number LIKE '$challan_num' ORDER BY id DESC";
		$res = mysqli_query($con,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$transfer_id = $r['id'];
			$sql2 = "SELECT * FROM transfer WHERE transfer_id='$transfer_id' AND delivery_status LIKE '$deliver_status'";
			$res2 = mysqli_query($con,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
				$loopinitializer++;
				if($loopinitializer>$new_limit)
				{
				if($loopbreaker==10)
				{
				break;
				}
				$x++;
				
			echo '<div class="transfer-his-row" id="chalrow-'.$r['id'].'">
			<div class="transfer-his-cell" style="width:100px;">'.$x.'</div>
			<div class="transfer-his-cell" style="width:150px;">'.$r['distri_id'].'</div>
			<div class="transfer-his-cell" style="width:120px;">'.$r['date_of_transfer'].'</div>
			<div class="transfer-his-cell" style="width:200px;" id="chlno-'.$r['id'].'">'.$r['challan_number'].'</div>
			<div class="transfer-his-cell" style="width:200px;">'.$r['tampoo_number'].'</div>
			<div class="transfer-his-cell" style="width:120px;">'.$r['driver_phone'].'</div>
			<div class="transfer-his-cell" style="width:50px;cursor:pointer;" id="viewchallan-'.$r['id'].'" onclick="view_challan(this);"><i class="fa fa-eye"></i></div>
			<div class="transfer-his-cell" style="width:50px;cursor:pointer;" id="editloadchallan-'.$r['id'].'" onclick="editloadchallan(this);"><i class="fa fa-pencil"></i></div>
			<div id="deletechallan-'.$r['id'].'" onclick="deletechallan(this);" class="transfer-his-cell" style="width:50px;border-right:0px;cursor:pointer;"><i class="fa fa-trash-o"></i></div>
		</div>';
				
		
				$loopbreaker++;
			}
			}
		}
	}
}


?>