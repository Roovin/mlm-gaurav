<?php
include '../connection.php';

$cur_date = date("Y-m-d");

$start_date = '01';
$start_month = date('m');
$start_year = date('Y');
$check_date = $start_year.'-'.$start_month.'-'.$start_date;


$sql = "SELECT id,effective_date as edate from marketing_plan join (select max(effective_date) as date from marketing_plan where effective_date<='$check_date') test ON marketing_plan.effective_date=test.date";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$plan_id = $row['id'];
$effective_date = $row['edate'];

$sql = "SELECT min_purchase FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Performance Slab' LIMIT 1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$per_min = $row['min_purchase'];


$sql = "SELECT min_purchase FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Leadership Slab' LIMIT 1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$led_min = $row['min_purchase'];

$sql = "SELECT min_purchase FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Director Slab' LIMIT 1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$dir_min = $row['min_purchase'];

echo '<div class="cmp-heading"><u>Current Marketing Plan</u></div>
			
			<div class="cpdate-cover">
				<div class="cpdate-text">Effective Date:</div>
				<div class="cpdate-text" style="margin-left:10px;">'.$effective_date.'</div>
			</div>
			<div class="cmp-heading" style="margin-top:20px;"><u>Performance Slab</u></div>
			
			<div class="cpdate-cover">
				<div class="cpdate-text">Min Purchase</div>
				<div class="cpdate-text" style="margin-left:10px;">'.$per_min.'</div>
			</div>
			
			<div class="cp-rows" style="margin-top:10px;">
				<div class="cp-cell" style="width:150px;"><b>Start Range</b></div>
				<div class="cp-cell" style="width:150px;"><b>End Range</b></div>
				<div class="cp-cell"><b>Percentage</b></div>
			</div>';
			
			$sql = "SELECT * FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Performance Slab'";
			$res = mysqli_query($con,$sql);
			
			while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
			echo'<div class="cp-rows">
				<div class="cp-cell" style="width:150px;">'.$r['srange'].'</div>
				<div class="cp-cell" style="width:150px;">'.$r['erange'].'</div>
				<div class="cp-cell">'.$r['percentage'].'</div>
			</div>';
			}
			
			echo'<div class="cmp-heading" style="margin-top:20px;"><u>Director Slab</u></div>
			
			<div class="cpdate-cover">
				<div class="cpdate-text">Min Purchase</div>
				<div class="cpdate-text" style="margin-left:10px;">'.$dir_min.'</div>
			</div>
			
			<div class="cp-rows" style="margin-top:10px;">
				<div class="cp-cell" style="width:150px;"><b>Start Range</b></div>
				<div class="cp-cell" style="width:150px;"><b>End Range</b></div>
				<div class="cp-cell"><b>Percentage</b></div>
			</div>';
			
			$sql = "SELECT * FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Director Slab'";
			$res = mysqli_query($con,$sql);
			
			while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
			
			echo'<div class="cp-rows">
				<div class="cp-cell" style="width:150px;">'.$r['srange'].'</div>
				<div class="cp-cell" style="width:150px;">'.$r['erange'].'</div>
				<div class="cp-cell">'.$r['percentage'].'</div>
			</div>';
			}
			
			echo'<div class="cmp-heading" style="margin-top:20px;"><u>Leadership Slab</u></div>
			
			<div class="cpdate-cover">
				<div class="cpdate-text">Min Purchase</div>
				<div class="cpdate-text" style="margin-left:10px;">'.$led_min.'</div>
			</div>
			
			<div class="cp-rows" style="margin-top:10px;">
				<div class="cp-cell" style="width:150px;"><b>Start Range</b></div>
				<div class="cp-cell" style="width:150px;"><b>End Range</b></div>
				<div class="cp-cell"><b>Percentage</b></div>
			</div>';
			$sql = "SELECT * FROM marketing_slabs WHERE plan_id='$plan_id' AND slab_name='Leadership Slab'";
			$res = mysqli_query($con,$sql);
			
			while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
			
			echo'<div class="cp-rows">
				<div class="cp-cell" style="width:150px;">'.$r['srange'].'</div>
				<div class="cp-cell" style="width:150px;">'.$r['erange'].'</div>
				<div class="cp-cell">'.$r['percentage'].'</div>
			</div>';
			}

?>