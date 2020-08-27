<?php
include '../connection.php';
$cid = $_POST['cust_id'];
$month = $_POST['month'];
$year = $_POST['year'];

$sql = "SELECT id FROM customers WHERE customer_id='$cid'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

$cmonth = date('m');
$cyear = date('Y');
$allow = "no";


if($count<1)
{
	echo "Invalid Customer ID";
}
elseif($year>$cyear)
{
	echo "Invalid Year Selected";
}
else
{
	if($year==$cyear)
	{
		if($month>=$cmonth)
		{
			echo "Invalid Month Selected";
		}
		else
		{
			$allow = "yes";
		}
	}
	elseif($year<$cyear)
	{
		$allow = "yes";
	}
}



if($allow=="yes")
{
	$sql = "SELECT * FROM profit_database WHERE customer_id='$cid' AND month='$month' AND year='$year'";
	$res = mysqli_query($con,$sql);
	$count1 = mysqli_num_rows($res);
	
	if($count1==1)
	{
		echo '	<div class="t-container">
		<div class="t-row">
			<div class="t-cell" style="width:150px;"><b>Customer ID</b></div>
			<div class="t-cell" style="width:200px;"><b>Name</b></div>
			<div class="t-cell" style="width:150px;"><b>Mobile</b></div>
			<div class="t-cell" style="width:150px;"><b>Adhar</b></div>
			<div class="t-cell" style="width:150px;"><b>Self BV</b></div>
			<div class="t-cell" style="width:150px;"><b>Left BV</b></div>
			<div class="t-cell" style="width:150px;"><b>Right BV</b></div>
			<div class="t-cell" style="width:150px;"><b>Total Slab</b></div>
			<div class="t-cell" style="width:150px;"><b>Left Slab</b></div>
			<div class="t-cell" style="width:150px;"><b>Right Slab</b></div>
			<div class="t-cell" style="width:150px;"><b>Total Percentage</b></div>
			<div class="t-cell" style="width:150px;"><b>Left Percentage</b></div>
			<div class="t-cell" style="width:150px;"><b>Right Percentage</b></div>
			<div class="t-cell" style="width:150px;"><b>Profit</b></div>
			<div class="t-cell" style="width:150px;"><b>status</b></div>
			<div class="t-cell" style="width:150px;"><b>Date of Transfer</b></div>
		</div>';
		
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			echo '<div class="t-row">
			<div class="t-cell" style="width:150px;">'.$r['customer_id'].'</div>
			<div class="t-cell" style="width:200px;">'.$r['name'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['mobile'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['adhar'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['self_bv'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['left_bv'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['right_bv'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['total_slab'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['left_slab'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['right_slab'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['total_per'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['left_per'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['right_per'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['profit'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['status'].'</div>
			<div class="t-cell" style="width:150px;">'.$r['dot'].'</div>
		</div>';
		}
		echo '</div>';
		
		$sql = "SELECT status FROM profit_database WHERE customer_id='$cid' AND month='$month' AND year='$year'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
		
		$status = $row['status'];		
		if($status=='pending')
		{
			$btn='<div id="pt-btn" class="pt-btn" onclick="transfer_profit();">Transfer to Wallet</div>';
		}
		else
		{
			$btn='';
		}
		
		
		
	echo $btn.'<br>';
	}
	else
	{
		echo "Not Calculated";
	}
	
	
}



?>