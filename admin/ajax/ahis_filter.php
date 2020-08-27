<?php
include '../connection.php';
$date = $_POST['date'];
$store = $_POST['store'];

if($date=="")
{
	$date='%';
}

if($store=="")
{
	$store='%';
}


$sql = "SELECT return_info.id,return_info.date,return_info.return_by FROM `return_info` INNER JOIN return_products ON return_info.id=return_products.transfer_id AND return_info.return_to='Admin' AND return_products.status='Added' AND return_info.date LIKE '$date' AND return_info.return_by LIKE '$store'";


$res = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<div class="rhis-row">
				<div class="rhis-data" style="width:100px;">'.$r['id'].'</div>
				<div class="rhis-data" style="width:100px;">'.$r['date'].'</div>
				<div class="rhis-data" style="width:100px;">'.$r['return_by'].'</div>
				<div class="rhis-data" style="width:98px;border-right:0px;cursor:pointer;" id="ahis-'.$r['id'].'" onclick="fetch_ahispro(this);"><i class="far fa-eye"></i></div>
			</div>';
}


?>