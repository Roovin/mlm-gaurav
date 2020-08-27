<?php
include '../connection.php';
$store = $_POST['store'];
$date = $_POST['date'];

$sql = "SELECT bill_date,id,amount_rec FROM custbills WHERE store_id='$store' AND bill_date='$date'";
$res = mysqli_query($con,$sql);
$x=0;
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$x++;
	echo '<div class="coup-row">
			<div class="coup-data" style="width:50px;">'.$x.'</div>
			<div class="coup-data" style="width:100px;">'.$r['bill_date'].'</div>
			<div class="coup-data" style="width:150px;">'.$r['id'].'</div>
			<div class="coup-data" style="width:100px;">'.$store.'</div>
			<div class="coup-data" style="width:100px;">'.$r['amount_rec'].'</div>
			<div class="coup-data" style="width:50px;border-right:0px;cursor:pointer;" id="billid-'.$r['id'].'" onclick="fetch_billpro(this);"><i class="fas fa-eye"></i></div>
		</div>';
}

?>