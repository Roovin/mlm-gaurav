<?php
include '../conn.php';

$mfdby = mysqli_real_escape_string($conn,$_POST['mfdby']);
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$product_code = $_POST['product_code'];

if($mfdby=="" && $from_date=="" && $to_date=="" && $product_code=="")
{
	$sql = "SELECT * FROM billing_info ORDER BY id DESC LIMIT 10";
		$res = mysqli_query($conn,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
		// 	echo '<div class="purchase-data-tableheading">
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['id'].'</div>
		// 	<div class="purchase-data" style="width:245px;font-size:13px;height:18px;">'.$r['mfd_by'].'</div>
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['purchase_date'].'</div>
		// 	<div class="purchase-data" style="width:150px;font-size:13px;height:18px;">'.$r['bill_number'].'</div>
		// 	<div class="purchase-data" style="width:160px;font-size:13px;height:18px;">'.$r['stock_id'].'</div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer;" id="billview-'.$r['id'].'" onclick="billview(this);"><i class="fa fa-eye"></i></div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer" onclick="editbill(this);" id="editbill-'.$r['id'].'"><i class="fa fa-pencil"></i></div>
		// 	<div class="purchase-data border-eat" style="width:80px;height:18px;cursor:pointer;" id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></div>
		// </div>';
		echo '<tr id="his_filter_output">
		<td> '.  $r['id'] . '</td>
		<td>'.$r['mfd_by'].'</td>
		<td>'.$r['purchase_date'].'</td>
		<td>'.$r['bill_number'].'</td>
		<td>'.$r['stock_id'].'</td>
		<td onclick="billview(this);"id="billview-'.$r['id'].'"><i class="fa fa-eye" style="cursor: pointer;"></i></td>
		<td id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></td>
	</tr>';
		}
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
		$loopbreaker = 0;	
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' AND purchase_date BETWEEN '$from_date' AND '$to_date' ORDER BY purchase_date ASC";
		$res = mysqli_query($conn,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($conn,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
				if($loopbreaker==10)
				{
				break;
				}
				
		// 	echo'<div class="purchase-data-tableheading">
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['id'].'</div>
		// 	<div class="purchase-data" style="width:245px;font-size:13px;height:18px;">'.$r['mfd_by'].'</div>
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['purchase_date'].'</div>
		// 	<div class="purchase-data" style="width:150px;font-size:13px;height:18px;">'.$r['bill_number'].'</div>
		// 	<div class="purchase-data" style="width:160px;font-size:13px;height:18px;">'.$r['stock_id'].'</div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer;" id="billview-'.$r['id'].'" onclick="billview(this);"><i class="fa fa-eye"></i></div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer" onclick="editbill(this);" id="editbill-'.$r['id'].'"><i class="fa fa-pencil"></i></div>
		// 	<div class="purchase-data border-eat" style="width:80px;height:18px;cursor:pointer;" id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></div>
		// </div>';
		echo '<tr id="his_filter_output">
		<td> '.  $r['id'] . '</td>
		<td>'.$r['mfd_by'].'</td>
		<td>'.$r['purchase_date'].'</td>
		<td>'.$r['bill_number'].'</td>
		<td>'.$r['stock_id'].'</td>
		<td onclick="billview(this);"id="billview-'.$r['id'].'"><i class="fa fa-eye" style="cursor: pointer;"></i></td>
		<td id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></td>
	</tr>';
		
				$loopbreaker++;
			
			}
		}
		
		// <td>2011/04/25</td>
		
		
	}
	else if(!empty($from_date) && empty($to_date))
	{
		$loopbreaker = 0;
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' AND purchase_date='$from_date' ORDER BY id ASC LIMIT 10";
		$res = mysqli_query($conn,$sql);
		
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($conn,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
		// 	echo '<div class="purchase-data-tableheading">
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['id'].'</div>
		// 	<div class="purchase-data" style="width:245px;font-size:13px;height:18px;">'.$r['mfd_by'].'</div>
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['purchase_date'].'</div>
		// 	<div class="purchase-data" style="width:150px;font-size:13px;height:18px;">'.$r['bill_number'].'</div>
		// 	<div class="purchase-data" style="width:160px;font-size:13px;height:18px;">'.$r['stock_id'].'</div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer;" id="billview-'.$r['id'].'" onclick="billview(this);"><i class="fa fa-eye"></i></div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer" onclick="editbill(this);" id="editbill-'.$r['id'].'"><i class="fa fa-pencil"></i></div>
		// 	<div class="purchase-data border-eat" style="width:80px;height:18px;cursor:pointer;" id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></div>
		// </div>';
		echo '<tr id="his_filter_output">
		<td> '.  $r['id'] . '</td>
		<td>'.$r['mfd_by'].'</td>
		<td>'.$r['purchase_date'].'</td>
		<td>'.$r['bill_number'].'</td>
		<td>'.$r['stock_id'].'</td>
		<td onclick="billview(this);"id="billview-'.$r['id'].'"><i class="fa fa-eye" style="cursor: pointer;"></i></td>
		<td id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></td>
	</tr>';
				if($loopbreaker==10)
				{
				break;
				}
		
				$loopbreaker++;
		
			}
		}
	}
	elseif(empty($from_date) && empty($to_date))
	{
		$loopbreaker = 0;
		$sql = "SELECT * FROM billing_info WHERE mfd_by LIKE '$mfdby' ORDER BY id ASC";
		$res = mysqli_query($conn,$sql);
		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$stock_id = $r['stock_id'];
			$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id' AND product_id LIKE '$product_code'";
			$res2 = mysqli_query($conn,$sql2);
			$count = mysqli_num_rows($res2);
			
			if($count>0)
			{
		// 	echo '<div class="purchase-data-tableheading">
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['id'].'</div>
		// 	<div class="purchase-data" style="width:245px;font-size:13px;height:18px;">'.$r['mfd_by'].'</div>
		// 	<div class="purchase-data" style="width:100px;font-size:13px;height:18px;">'.$r['purchase_date'].'</div>
		// 	<div class="purchase-data" style="width:150px;font-size:13px;height:18px;">'.$r['bill_number'].'</div>
		// 	<div class="purchase-data" style="width:160px;font-size:13px;height:18px;">'.$r['stock_id'].'</div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer;" id="billview-'.$r['id'].'" onclick="billview(this);"><i class="fa fa-eye"></i></div>
		// 	<div class="purchase-data" style="width:80px;height:18px;cursor:pointer" onclick="editbill(this);" id="editbill-'.$r['id'].'"><i class="fa fa-pencil"></i></div>
		// 	<div class="purchase-data border-eat" style="width:80px;height:18px;cursor:pointer;" id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></div>
		// </div>';
		echo '<tr id="his_filter_output">
		<td> '.  $r['id'] . '</td>
		<td>'.$r['mfd_by'].'</td>
		<td>'.$r['purchase_date'].'</td>
		<td>'.$r['bill_number'].'</td>
		<td>'.$r['stock_id'].'</td>
		<td onclick="billview(this);"id="billview-'.$r['id'].'"><i class="fa fa-eye" style="cursor: pointer;"></i></td>
		<td id="deletepurchase-'.$r['id'].'" onclick="delete_purchase(this);"><i class="fa fa-trash"></i></td>
	</tr>';
				if($loopbreaker==10)
				{
				break;
				}
		
				$loopbreaker++;
		
		
			}
		}
		
	}
	
}


?>