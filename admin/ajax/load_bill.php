<?php
$bill_id = $_POST['bill_id'];
include '../connection.php';
$sql = "SELECT * FROM billing_info WHERE id='$bill_id'";
$res = mysqli_query($con,$sql);
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<div id="edit-billing-info">
		<div class="edit-section-name">Billing Information</div><br>
		<div class="edit-fields"><b>&nbsp;MFD. By</b><br><input type="text" class="edit-entry-fields" placeholder=" MFD By" id="emfdby" value="'.$r['mfd_by'].'"></div>
		<div class="edit-fields"><b>&nbsp;Purchase Date</b><br><input type="date" class="edit-entry-fields" id="edit_purchase_date" value="'.$r['purchase_date'].'"></div>
		<div class="edit-fields"><b>&nbsp;Bill Number</b><br><input type="text" class="edit-entry-fields" placeholder=" Bill Number" id="edit-billno" value="'.$r['bill_number'].'"></div>
		<div class="edit-fields"><b>&nbsp;Stock ID</b><br><div style="margin-top:5px;" id="edit_stock_id">'.$r['stock_id'].'</div></div>
	</div>';
	
	$stock_id = $r['stock_id'];
	$sql2 = "SELECT * FROM purchase WHERE stock_id='$stock_id'";
	$res2 = mysqli_query($con,$sql2);
	$x=0;
	while($p=mysqli_fetch_array($res2,MYSQLI_ASSOC))
	{
		$x++;
		$product_id = $p['product_id'];
		$sql4 = "SELECT category FROM products WHERE id='$product_id'";
		$res4 = mysqli_query($con,$sql4);
		$row4 = mysqli_fetch_array($res4,MYSQLI_ASSOC);
		$category = $row4["category"];
		
		$sql4 = "SELECT id FROM product_category WHERE category='$category'";
		$res4 = mysqli_query($con,$sql4);
		$row4 = mysqli_fetch_array($res4,MYSQLI_ASSOC);
		$category_id = $row4["id"];
		
		$sql4 = "SELECT subcat FROM products WHERE id='$product_id'";
		$res4 = mysqli_query($con,$sql4);
		$row4 = mysqli_fetch_array($res4,MYSQLI_ASSOC);
		$subcat = $row4["subcat"];
		
		$sql4 = "SELECT name FROM products WHERE id='$product_id'";
		$res4 = mysqli_query($con,$sql4);
		$row4 = mysqli_fetch_array($res4,MYSQLI_ASSOC);
		$product_name = $row4["name"];
		
		
		echo '<!-- product Part-->
	<div class="products" id="purchasing-'.$x.'">
		
		<div class="item-number">Product '.$x.'</div>
		<div>
		<div class="section-name" style="margin-top:20px;">Product Accounts Information</div><input type="hidden" id="product_id-'.$x.'" value="'.$product_id.'"><br><br>
		<div class="fields"><b>&nbsp;Product Category</b><br><select class="purchase-entry-fields" id="ecat-'.$x.'" disabled><option>'.$category.'</option>	</select></div>
		<div class="fields"><b>&nbsp;Product Sub Category</b><br><select class="purchase-entry-fields" id="esubcat-'.$x.'" disabled><option>'.$subcat.'</option></select></div>
		<div class="fields"><b>&nbsp;Select Product</b><br><select class="purchase-entry-fields" id="ep-'.$x.'" disabled><option>'.$product_name.'</option></select></div>
		<div class="fields"><b>&nbsp;Quantity</b><br><input type="text" class="purchase-entry-fields" placeholder=" Quantity" id="equan-'.$x.'" onkeyup="purchasecal3(this);" value="'.$p['quantity'].'"></div>
		<div class="fields"><b>&nbsp;Purchase Price per Unit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Purchase Price" id="eprice-'.$x.'" onkeyup="purchasecal3(this);purchasecal4(this);" value="'.$p['purchase_price_per_unit'].'"></div>
		<div class="fields"><b>&nbsp;Total</b><br><input type="text" class="purchase-entry-fields" disabled placeholder=" Total" id="etotal-'.$x.'" value="'.$p['total'].'"></div>
		<div class="fields"><b>&nbsp;GST Rate (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST Rate" id="egstrate-'.$x.'" onkeyup="purchasecal3(this);purchasecal4(this);" value="'.$p['gst_rate'].'"></div>
		<div class="fields"><b>&nbsp;GST Figure</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST Figure"disabled id="egstfig-'.$x.'" value="'.$p['gst_fig'].'"></div>
		<div class="fields"><b>&nbsp;Net Purchase Price</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Purchase Price" disabled id="enetprice-'.$x.'" value="'.$p['net_purchase_price'].'"></div>
		</div>
		
		<div style="overflow:hidden;width:100%;padding-top:30px;">
		<div class="section-name" style="width:100%;text-align:left;">Product General Information</div>
		
		<div class="fields"><b>&nbsp;Batch Number</b><br><input type="text" class="purchase-entry-fields" placeholder=" Batch Number"id="ebatch-'.$x.'" value="'.$p['batch_number'].'"></div>
		<div class="fields"><b>&nbsp;MFD Date</b><br><input type="date" class="purchase-entry-fields" placeholder=" MFD Date" id="emfddate-'.$x.'" value="'.$p['mfd_date'].'"></div>
		<div class="fields"><b>&nbsp;Exp Date</b><br><input type="date" class="purchase-entry-fields" placeholder=" MFD Date" id="eexpdate-'.$x.'" value="'.$p['exp_date'].'"></div>
		<div class="fields"><b>&nbsp;Net Purchase Price Per Unit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Price Per Unit" id="enetpriceperunit-'.$x.'" disabled  value="'.$p['net_purchase_price_per_unit'].'"></div>
		<div class="fields"><b>&nbsp;MRP</b><br><input type="text" class="purchase-entry-fields" placeholder=" MRP" id="emrp-'.$x.'" onkeyup="purchasecal4(this);" value="'.$p['mrp'].'"></div>
		<div class="fields"><b>&nbsp;Discount (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Discount" id="ediscount-'.$x.'" onkeyup="purchasecal4(this);" value="'.$p['discount'].'"></div>
		<div class="fields"><b>&nbsp;Sale Price</b><br><input type="text" class="purchase-entry-fields" placeholder=" Sale Price"disabled id="esaleprice-'.$x.'" value="'.$p['sale_price'].'"></div>
		<div class="fields"><b>&nbsp;Gross Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Gross Profit"disabled id="egrossprofit-'.$x.'" value="'.$p['gross_profit'].'"></div>
		<div class="fields"><b>&nbsp;GST on Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST on Profit"disabled id="egstprofit-'.$x.'" value="'.$p['gst_on_profit'].'"></div>
		<div class="fields"><b>&nbsp;Net Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Profit"disabled id="enetprofit-'.$x.'" value="'.$p['net_profit'].'"></div>
		<div class="fields"><b>&nbsp;Profit Cut (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit Cut" id="eprofitcut-'.$x.'" onkeyup="purchasecal4(this);" value="'.$p['profit_cut'].'"></div>
		<div class="fields"><b>&nbsp;Profit for Disburse (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit for Disburse"disabled id="eprofitdisburse-'.$x.'" value="'.$p['profit_disburse'].'"></div>
		<div class="fields"><b>&nbsp;Profit For Business Partner (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit for Business Partner" id="eprofitbp-'.$x.'" onkeyup="purchasecal4(this);" value="'.$p['profit_for_bp'].'"></div>
		<div class="fields"><b>&nbsp;Percentage Sharing on BV (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" % for BV Calculation" id="ebvcalper-'.$x.'" onkeyup="purchasecal4(this);" value="'.$p['profit_on_bv'].'"></div>
		<div class="fields"><b>&nbsp;Business Volume</b><br><input type="text" class="purchase-entry-fields" placeholder="Business Volume"disabled id="ebv-'.$x.'" value="'.$p['business_volume'].'"></div>
		
		
		</div>
		
	</div>';
	}
	
	echo'<br><br><input type="hidden" value="'.$x.'" id="no_of_products"><div class="bill-btn" onclick="edit_confirm_purchase();">Confirm</div>
		<div class="bill-btn" onclick="close_edit_purchase();">Cancel</div><br><br>';
	
}


?>