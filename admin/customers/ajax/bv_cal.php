<?php
session_start();
include '../../connection.php';

$pmonth = $_POST['month'];
$pyear = $_POST['year'];


$cust = $_SESSION['customer'];
$sql = "SELECT * FROM customers WHERE customer_id='$cust'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$cid = $row['id'];


$sql = "SELECT child_id,position FROM closure WHERE parent_id='$cid' AND level='1'";
$res = mysqli_query($con,$sql);

$left_child = "";
$right_child = "";

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	if($r['position']=='Left')
	{
		$left_child = $r['child_id'];
	}
	
	if($r['position']=='Right')
	{
		$right_child = $r['child_id'];
	}	
}


$top_date = $pyear.'-'.$pmonth.'-'.'01';
$down_date = $pyear.'-'.$pmonth.'-'.'31';

$sql = "SELECT closure.child_id,customers.customer_id,custbills.id,bill_products.stock_id,bill_products.product_id,bill_products.qty,purchase.business_volume FROM `closure` INNER JOIN customers ON closure.child_id=customers.id AND closure.parent_id='$right_child' INNER JOIN custbills ON customers.customer_id=custbills.customer_id AND custbills.bill_date BETWEEN '$top_date' AND '$down_date' INNER JOIN bill_products ON bill_products.billing_id=custbills.id INNER JOIN purchase ON bill_products.product_id=purchase.product_id AND bill_products.stock_id=purchase.stock_id";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
$right_bv = 0;

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$qty = $r['qty'];
	$bv = $r['business_volume'];
	$t_bv = $qty * $bv;
	$right_bv += $t_bv;
}


$sql = "SELECT closure.child_id,customers.customer_id,custbills.id,bill_products.stock_id,bill_products.product_id,bill_products.qty,purchase.business_volume FROM `closure` INNER JOIN customers ON closure.child_id=customers.id AND closure.parent_id='$left_child' INNER JOIN custbills ON customers.customer_id=custbills.customer_id AND custbills.bill_date BETWEEN '$top_date' AND '$down_date' INNER JOIN bill_products ON bill_products.billing_id=custbills.id INNER JOIN purchase ON bill_products.product_id=purchase.product_id AND bill_products.stock_id=purchase.stock_id";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);
$left_bv = 0;

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$qty = $r['qty'];
	$bv = $r['business_volume'];
	$t_bv = $qty * $bv;
	$left_bv += $t_bv;
}


$sql = "SELECT custbills.id,bill_products.stock_id,bill_products.product_id,bill_products.qty,purchase.business_volume,custbills.customer_id FROM custbills INNER JOIN bill_products ON custbills.id=bill_products.billing_id AND custbills.customer_id='$cust' AND custbills.bill_date BETWEEN '$top_date' AND '$down_date' INNER JOIN purchase ON bill_products.product_id=purchase.product_id AND bill_products.stock_id=purchase.stock_id";

$res = mysqli_query($con,$sql);
$mid_bv = 0;
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$qty = $r['qty'];
	$bv = $r['business_volume'];
	$t_bv = $qty * $bv;
	$mid_bv += $t_bv;
}


function get_slab($plan,$bv)
{
		global $con;
		
		$sql = "SELECT slab_name,erange,percentage FROM marketing_slabs WHERE plan_id='$plan'";
		$res = mysqli_query($con,$sql);
		$output = array();
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$end_range = $r['erange'];
			if($bv<=$end_range)
			{
				$output[] = $r['slab_name'];
				$output[] = $r['percentage'];
				return $output;
				break;
			}
				
		}
}



function profit_cal($r_bv,$m_bv,$l_bv,$month,$year)
{
	global $con;
	$cmonth = date('m');
	$cyear = date('Y');
	
	if($month==$cmonth && $year==$cyear)
	{
		$error =  "Profit For This month will be shown Later";
		return $error;
	}
	else
	{
		$start_date = '01';
		$check_date = $year.'-'.$month.'-'.$start_date;
		$sql = "SELECT id,effective_date as edate from marketing_plan join (select max(effective_date) as date from marketing_plan where effective_date<='$check_date') test ON marketing_plan.effective_date=test.date";
		
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($res);
		$plan_id = $row['id'].'-';
		
		$total_group_bv = $r_bv+$m_bv+$l_bv;
		$total_group_bv = bcdiv($total_group_bv, 1, 0);
		
		$out = get_slab($plan_id,$total_group_bv);
		
		$tper = $out[1];
		$tslab = $out[0];
		$tper_cal = $tper/100;
		$tgroup_bonus = $tper_cal * $total_group_bv;
		
		
		$l_bv = bcdiv($l_bv, 1, 0);
		$out = get_slab($plan_id,$l_bv);
		$lper  =$out[1];
		$lslab = $out[0];
		
		if($tslab==$lslab)
		{
			$lper_cal = $lper/100;
			$lgroup_bonus = $lper_cal * $l_bv;
		}
		else
		{
			$lgroup_bonus = 0;
		}
		
		$r_bv = bcdiv($r_bv, 1, 0);
		$out = get_slab($plan_id,$r_bv);
		$rper  =$out[1];
		$rslab = $out[0];
		
		if($tslab==$rslab)
		{
			$rper_cal = $rper/100;
			$rgroup_bonus = $rper_cal * $r_bv;
		}
		else
		{
			$rgroup_bonus = 0;
		}
		
		$net_profit = $tgroup_bonus - $lgroup_bonus - $rgroup_bonus;
		
		return $net_profit;
		
	}
}

$net_profit = profit_cal($right_bv,$mid_bv,$left_bv,$pmonth,$pyear);

echo $right_bv.'#'.$mid_bv.'#'.$left_bv.'#'.$net_profit;

?>