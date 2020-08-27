<?php
include '../connection.php';

$mfdby = mysqli_real_escape_string($con,$_POST['mfdby']);
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$product_code = $_POST['product_code'];

if($mfdby=="" && $from_date=="" && $to_date=="" && $product_code=="")
{
	$sql = "SELECT * FROM billing_info ORDER BY id DESC";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);	
}
else
{
	if($mfdby=="")
	{
		$mfdby = "%";
	}
	else
	{
		$mfdby = $mfdby."%";
	}
	

	
	if($product_code=="")
	{
		$product_code="%";
	}
	else
	{
		$product_code=$product_code."%";
	}
	
	
	if(!empty($from_date) && !empty($to_date))
	{
		$count2 = 0;
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' AND purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY purchase_date ASC";
		$res = mysqli_query($con,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($con,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
				$count2++;
			}
		}
		
		echo $count2;
		
		
	}
	else if(!empty($from_date) && empty($to_date))
	{
		$count2 = 0;
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' AND purchase_date='$from_date' ORDER BY id ASC LIMIT 10";
		$res = mysqli_query($con,$sql);
		
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($con,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
				$count2++;
			}
		}
		echo $count2;
	}
	elseif(empty($from_date) && empty($to_date))
	{
		$count2=0;
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' ORDER BY id ASC";
		$res = mysqli_query($con,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($con,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
			
			$count2++;
		
			}
		}
		echo $count2;
	}
	
}


?>