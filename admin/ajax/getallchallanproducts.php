<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];

$sql = "SELECT * FROM transfer WHERE transfer_id='$transfer_id'";
$res = mysqli_query($con,$sql);
$x=0;
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$product_id = $r['product_id'];
	$sql2 = "SELECT name FROM products WHERE id='$product_id'";
	$res2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($res2,MYSQLI_ASSOC);
	$product_name = $row2['name'];
	
	$len = strlen($product_name);
			if($len>25)
			{
			$product_name = substr($product_name, 0, 25)."...";
			}
			
	if($r['delivery_status']=='Travelling')
	{
		$color1="#1c94e0";
		$color2="red";
		$onclick = "delete_challan_product(this);";
	}
	else
	{
		$color1="grey";
		$color2="grey";
		$onclick = "";
	}		
	
	$x++;
	echo '<div id="challan-list"><div id="challan_product_row-'.$r['id'].'" class="edit-his-row" style="margin-top:0px;border-top:0px;">
				<div class="edit-his-cell" style="width:50px;">'.$x.'</div>
				<div class="edit-his-cell" style="width:150px;">'.$r['product_id'].'</div>
				<div class="edit-his-cell" style="width:330px;" id="edit_his_product_name-'.$r['id'].'">'.$product_name.'</div>
				<div class="edit-his-cell" style="width:100px;">'.$r['quantity'].'</div>
				<div class="edit-his-cell delete-icon" style="width:51px;border-right:0px;background-color:'.$color2.'" id="delete_challan_product-'.$r['id'].'" onclick="'.$onclick.'">
					<i class="fa fa-trash-o"></i>
				</div>
			</div></div>';
}
?>