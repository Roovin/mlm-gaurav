<?php
$bill_id = $_POST['bill_id'];

include '../conn.php';
$sql = "SELECT * FROM billing_info WHERE id='$bill_id'";
$res = mysqli_query($conn,$sql);
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$stock_id = $r['stock_id'];
	$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id'";
	$res2 = mysqli_query($conn,$sql2);
	echo'<div id="view-close-bill" style="float:right;border-radius:100%;width:28px;height:25px;background-color:red;color:white;font-family:calibri;padding-top:5px;text-align:center;margin-right:15px;margin-top:-15px;padding-left:2px;cursor:pointer;" onclick="close_bill2();">X</div>
		<div id="view-bill-mfd-name"><b><div>'.$r['mfd_by'].'</div></b></div>
		<div id="bill-info">
			<div class="view-bill-info">Bill Number:&nbsp;&nbsp;&nbsp;<span>'.$r['bill_number'].'</span></div>
			<div class="view-bill-info">Purchase Date:&nbsp;&nbsp;&nbsp;<span>'.$r['purchase_date'].'</span></div>
		</div>
		<div id="view-bill-info2">
			<div class="view-bill-info">Stock ID:&nbsp;&nbsp;&nbsp;<span >'.$r['stock_id'].'</span></div>
			<div class="view-bill-info"></div>
		</div>
		<div id="view-bill-details">
			<div class="view-bsno"><b>Sno</b></div>
			<div class="view-bsno" style="width:200px;"><b>Products</b></div>
			<div class="view-bsno" style="width:70px;"><b>Quantity</b></div>
			<div class="view-bsno" style="width:120px;"><b>Rate</b></div>
			<div class="view-bsno" style="width:120px;"><b>Total Cost</b></div>
			<div class="view-bsno"><b>GST (%)</b></div>
			<div class="view-bsno" style="width:100px;"><b>GST (Fig.)</b></div>
			<div class="view-bsno" style="width:113px;border-right:0px;"><b>Net Price</b></div>
		</div>
		<div>';
		$x=0;
		$total_cost = 0;
		$total_gst = 0;
		$total_net_cost = 0;
		while($p=mysqli_fetch_array($res2,MYSQLI_ASSOC))
		{
			$x++;
			$product_id = $p['product_id'];
			$sql3 = "SELECT name FROM products WHERE id='$product_id'";
			$res3 = mysqli_query($conn,$sql3);
			$rrow = mysqli_fetch_array($res3,MYSQLI_ASSOC);
			$product_name = $rrow['name'];
			
			$total_cost += $p['total'];
			$total_gst += $p['gst_fig'];
			$total_net_cost += $p['net_purchase_price'];
			
			
			echo '<div class="view-bill-details"><div class="bsno"><b>'.$x.'</b></div><div class="bsno" style="width:200px;">'.$product_name.'</div><div class="bsno" style="width:70px;">'.$p['quantity'].'</div><div class="bsno" style="width:120px;">'.$p['purchase_price_per_unit'].'</div><div class="bsno" style="width:120px;">'.$p['total'].'</div><div class="bsno">'.$p['gst_rate'].'</div><div class="bsno" style="width:100px;">'.$p['gst_fig'].'</div><div class="bsno" style="width:113px;border-right:0px;">'.$p['net_purchase_price'].'</div></div>';
		}
		echo'</div>
		<div class="view-bill-details">
			<div class="view-bsno" style="border-right:1px solid white;"></div>
			<div class="view-bsno" style="width:200px;border-right:1px solid white;"><b>Grand Total</b></div>
			<div class="view-bsno" style="width:70px;border-right:1px solid white;"></div>
			<div class="view-bsno" style="width:120px;"></div>
			<div class="view-bsno" style="width:120px;">'.$total_cost.'</div>
			<div class="view-bsno"></div>
			<div class="view-bsno" style="width:100px;">'.$total_gst.'</div>
			<div class="view-bsno" style="width:113px;border-right:0px;">'.$total_net_cost.'</div>
		</div>';
}

?>