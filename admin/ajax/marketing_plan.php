<?php
include '../connection.php';

$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
$per_min = $_POST['per_min'];
$led_min = $_POST['led_min'];
$dir_min = $_POST['dir_min'];
$persra = $_POST['persra'];
$perera = $_POST['perera'];
$perpera = $_POST['perpera'];
$dirsra = $_POST['dirsra'];
$direra = $_POST['direra'];
$dirpera = $_POST['dirpera'];
$ledsra = $_POST['ledsra'];
$ledera = $_POST['ledera'];
$ledpera = $_POST['ledpera'];


$edate = $year.'-'.$month.'-'.$date;

$sql = "SELECT * FROM marketing_plan WHERE effective_date='$edate'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>=1)
{
	echo "Plan Already Exists With this Effective Date";
}
else
{
	$sql = "INSERT INTO marketing_plan (effective_date) VALUES('$edate')";
	$res = mysqli_query($con,$sql);
	
	$sql = "SELECT MAX(id) as id FROM marketing_plan";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	$max_id = $row['id'];
	
	$sql = "INSERT INTO marketing_slabs (plan_id,slab_name,srange,erange,percentage,min_purchase) VALUES ";
	
	for($i=0;$i<=sizeof($persra)-1;$i++)
	{
		$slab_name = "Performance Slab";
		$persr = $persra[$i];
		$perer = $perera[$i];
		$perper = $perpera[$i];
		
		$sql .= "($max_id,'$slab_name',$persr,$perer,$perper,$per_min),";
	}
	
	for($i=0;$i<=sizeof($dirsra)-1;$i++)
	{
		$slab_name = "Director Slab";
		$dirsr = $dirsra[$i];
		$direr = $direra[$i];
		$dirper = $dirpera[$i];
		
		$sql .= "($max_id,'$slab_name',$dirsr,$direr,$dirper,$dir_min),";
	}
	
	
	
	for($i=0;$i<=sizeof($ledsra)-1;$i++)
	{
		$slab_name = "Leadership Slab";
		$ledsr = $ledsra[$i];
		$leder = $ledera[$i];
		$ledper = $ledpera[$i];
		
		$last_row = sizeof($ledsra)-1;
		
		if($last_row==$i)
		{
			$sql .= "($max_id,'$slab_name',$ledsr,$leder,$ledper,$led_min)";
		}
		else
		{
		
		$sql .= "($max_id,'$slab_name',$ledsr,$leder,$ledper,$led_min),";
		}
	}
	
	$res = mysqli_query($con,$sql);
	echo "Plan will be Effective From $edate";
	
}

?>