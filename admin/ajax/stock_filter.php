<?php
include '../connection.php';
$category = $_POST['category'];
$subcat = $_POST['subcat'];
$product = $_POST['product'];
$pid = $_POST['pid'];
$barcode = $_POST['barcode'];

if($product=="" && $subcat=="" && $category=="" && $pid=="" && $barcode=="")
{
	echo "Please Select atleast one Filter";
}
else
{

	if($category=="")
	{
		$category = "%";
	}
	else
	{
		$category = $category;
	}

	if($subcat=="")
	{
		$subcat="%";
	}
	else
	{
		$subcat = $subcat;
	}

	if($product=="")
	{
		$product = "%";
	}
	else
	{
		$product= $product;
	}
	
	$product_ids = array();
	
	if($pid=="")
	{
		if($barcode=="")
		{
			$sql = "SELECT id FROM products WHERE name LIKE '$product' AND category LIKE '$category' AND subcat LIKE '$subcat'";
			$res = mysqli_query($con,$sql);
			while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
				$product_ids[] = $r['id'];
			}
		}
		else
		{
			$sql = "SELECT product_id FROM purchase WHERE barcode='$barcode' LIMIT 1";
			$res = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($res);
			$product_id = $row['product_id'];
			$product_ids[] = $product_id;
		}
	}
	else
	{
		$product_ids[] = $pid;
	}
	
	$add = "(";
	for($i=0;$i<=sizeof($product_ids)-1;$i++)
	{
		if($i==sizeof($product_ids)-1)
		{
			$add .= $product_ids[$i].")";
		}
		else
		{
		$add .= $product_ids[$i].",";
		}
	}
	
	
	$sql = "SELECT stocks.stock_id,stocks.barcode,stocks.product_id,products.category,products.subcat,products.name,purchase.batch_number,purchase.mfd_date,purchase.exp_date,stocks.stock,purchase.net_purchase_price_per_unit,purchase.mrp,purchase.discount,purchase.sale_price,purchase.id as purid,purchase.gross_profit,purchase.gst_rate,purchase.net_profit,purchase.gst_on_profit,purchase.profit_cut,purchase.profit_disburse,purchase.profit_for_bp,purchase.profit_on_bv,purchase.business_volume,purchase.nmd_qty,purchase.nmd_dis,purchase.nmd_sp,purchase.nmd_bv,purchase.rsd_dis,purchase.rsd_sp,purchase.rsd_cb,purchase.rsd_bv,purchase.rmd_qty,purchase.rmd_dis,purchase.rmd_sp,purchase.rmd_cb,purchase.rmd_bv FROM stocks INNER JOIN products ON stocks.product_id=products.id AND stocks.product_id IN $add INNER JOIN purchase ON stocks.product_id=purchase.product_id AND stocks.stock_id=purchase.stock_id AND stocks.barcode=purchase.barcode";
	
	$res = mysqli_query($con,$sql);
	
	while($p=mysqli_fetch_array($res,MYSQLI_ASSOC))
	{
		$product_name = $p['name'];
		$length = strlen($product_name);
			if($length>25)
			{
			$product_name = substr($product_name, 0,25)."...";
			}	
			
		$product_category = $p['category'];
		$product_subcat = $p['subcat'];
		$stock_id = $p['stock_id'];
		$product_id = $p['product_id'];
		$barcode = $p['barcode'];
		
		$sql3 = "SELECT stock FROM distributors_stock WHERE stock_id='$stock_id' AND product_id='$product_id' AND barcode='$barcode'";
		$res3 = mysqli_query($con,$sql3);
		$distri_stock = 0;
			
		while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$distri_stock += $k['stock'];
		}
		
		
			
		$sql3 = "SELECT stock FROM stores_stock WHERE stock_id='$stock_id' AND product_id='$product_id' AND barcode=$barcode";
		$res3 = mysqli_query($con,$sql3);
		$store_stock = 0;
			
		while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$store_stock += $k['stock'];
		}
			
		$sql3 = "SELECT quantity FROM transfer WHERE stock_id='$stock_id' AND product_id='$product_id' AND delivery_status='Travelling'";
		$res3 = mysqli_query($con,$sql3);
		$distri_tstock = 0;
			
		while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$distri_tstock += $k['quantity'];
		}
			
		$sql3 = "SELECT quantity FROM store_transfer WHERE stock_id='$stock_id' AND product_id='$product_id' AND delivery_status='Travelling'";
		$res3 = mysqli_query($con,$sql3);
		$store_tstock = 0;
			
		while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			$store_tstock += $k['quantity'];
		}
			
		$infield_stock = $distri_stock + $store_stock + $distri_tstock + $store_tstock;
		
		$purchase_pu = $p['net_purchase_price_per_unit'];
		$mrp = $p['mrp'];
		$discount = $p['discount'];
		$sale_price = $p['sale_price'];
		$purchase_id = $p['purid'];
		$gross_profit = $p['gross_profit'];
		$gst_rate = $p['gst_rate'];
		$net_profit = $p['net_profit'];
		$gst_on_profit = $p['gst_on_profit'];
		$profit_cut = $p['profit_cut'];
		$profit_disburse = $p['profit_disburse'];
		$profit_for_bp = $p['profit_for_bp'];
		$profit_on_bv = $p['profit_on_bv'];
		$business_volume = $p['business_volume'];
		
		echo '<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;">1</div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;">'.$p['stock_id'].'</div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;">'.$p['barcode'].'</div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;">'.$p['product_id'].'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_category.'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_subcat.'</div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;">'.$product_name.'</div>
			<div class="stock-data" style="width:150px;background-color:#c5c5c7;">'.$p['batch_number'].'</div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;">'.$p['mfd_date'].'</div>
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;">'.$p['exp_date'].'</div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;">'.$p['stock'].'</div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;">'.$infield_stock.'</div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;" id="st_purchase_pricedisplay-'.$purchase_id.'">'.$purchase_pu.'<input type="hidden" value="'.$purchase_pu.'" id="st_purchase_price-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;" id="st_mrpdisplay-'.$purchase_id.'">'.$mrp.'<input type="hidden" value="'.$mrp.'" id="st_mrp-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$discount.'" style="width:100%;height:18px;" onkeyup="change_dis(this);" id="st_dis-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><div id="st_dsp-'.$purchase_id.'">'.$sale_price.'</div><input type="hidden" value="'.$sale_price.'" id="st_sp-'.$purchase_id.'"><input type="hidden" value="'.$gst_rate.'" id="st_gst_rate-'.$purchase_id.'"><input type="hidden" value="'.$profit_on_bv.'" id="st_profit_bv-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><div id="st_dbv-'.$purchase_id.'">'.$p['business_volume'].'</div><input type="hidden" value="'.$p['business_volume'].'" id="st_bv-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['nmd_qty'].'" style="width:100%;height:18px;" id="nmd_qty-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['nmd_dis'].'" style="width:100%;height:18px;" id="nmd_dis-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><div id="nmd_dsp-'.$purchase_id.'">'.$p['nmd_sp'].'</div><input type="hidden" value="'.$p['nmd_sp'].'" id="nmd_sp-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><div id="nmd_dbv-'.$purchase_id.'">'.$p['nmd_bv'].'</div><input type="hidden" value="'.$p['nmd_bv'].'" id="nmd_bv-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['rsd_dis'].'" style="width:100%;height:18px;" id="rsd_dis-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><div id="rsd_dsp-'.$purchase_id.'">'.$p['rsd_sp'].'</div><input type="hidden" value="'.$p['rsd_sp'].'" id="rsd_sp-'.$purchase_id.'"></div>
			
			
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['rsd_cb'].'" style="width:100%;height:18px;" id="rsd_cb-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			
			
			
			
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><div id="rsd_dbv-'.$purchase_id.'">'.$p['rsd_bv'].'</div><input type="hidden" value="'.$p['rsd_bv'].'" id="rsd_bv-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['rmd_qty'].'" style="width:100%;height:18px;" id="rmd_qty-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:40px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['rmd_dis'].'" style="width:100%;height:18px;" id="rmd_dis-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><div id="rmd_dsp-'.$purchase_id.'">'.$p['rmd_sp'].'</div><input type="hidden" value="'.$p['rmd_sp'].'" id="rmd_sp-'.$purchase_id.'"></div>
			
			
			<div class="stock-data" style="width:50px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['rmd_cb'].'" style="width:100%;height:18px;" id="rmd_cb-'.$purchase_id.'" onkeyup="change_dis(this);"></div>
			
			
			
			<div class="stock-data" style="width:93px;background-color:#c5c5c7;"><div id="rmd_dbv-'.$purchase_id.'">'.$p['rmd_bv'].'</div><input type="hidden" value="'.$p['rmd_bv'].'" id="rmd_bv-'.$purchase_id.'"></div>
			
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['profit_for_bp'].'" style="width:100%;height:18px;" id="pbp-'.$purchase_id.'" onkeyup="cal_all_bv(this);"></div>
			
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$p['profit_cut'].'" style="width:100%;height:18px;" id="pcut-'.$purchase_id.'" onkeyup="cal_all_bv(this);"></div>
			
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;height:13px;cursor:pointer;" id="update-'.$purchase_id.'" onclick="update();"><i class="fa fa-exchange"></i></div>
		</div>';
		
		
		
		
	}
	
	
	
	
	/**
	for($i=0;$i<=sizeof($product_ids)-1;$i++)
	{
		$product_id = $product_ids[$i];
		$sql2 = "SELECT * FROM stocks WHERE product_id='$product_id'";
		$res2 = mysqli_query($con,$sql2);
		$count = mysqli_num_rows($res2);
		
		if($count>0)
		{
			while($p=mysqli_fetch_array($res2,MYSQLI_ASSOC))
			{
				
			$sql3 = "SELECT name,category,subcat FROM products WHERE id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3,MYSQLI_ASSOC);
			$product_name = $row['name'];
			$length = strlen($product_name);
			if($length>25)
			{
			$product_name = substr($product_name, 0,25)."...";
			}	
			
			$product_category = $row['category'];
			$product_subcat = $row['subcat'];
			
			
			$stock_id = $p['stock_id'];
			
			$sql3 = "SELECT stock FROM distributors_stock WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$distri_stock = 0;
			
			while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
			{
				$distri_stock += $k['stock'];
			}
			
			$sql3 = "SELECT stock FROM stores_stock WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$store_stock = 0;
			
			while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
			{
				$store_stock += $k['stock'];
			}
			
			$sql3 = "SELECT quantity FROM transfer WHERE stock_id='$stock_id' AND product_id='$product_id' AND delivery_status='Travelling'";
			$res3 = mysqli_query($con,$sql3);
			$distri_tstock = 0;
			
			while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
			{
				$distri_tstock += $k['quantity'];
			}
			
			$sql3 = "SELECT quantity FROM store_transfer WHERE stock_id='$stock_id' AND product_id='$product_id' AND delivery_status='Travelling'";
			$res3 = mysqli_query($con,$sql3);
			$store_tstock = 0;
			
			while($k=mysqli_fetch_array($res3,MYSQLI_ASSOC))
			{
				$store_tstock += $k['quantity'];
			}
			
			
			
			$infield_stock = $distri_stock + $store_stock + $distri_tstock + $store_tstock;
			
			
			$sql3 = "SELECT net_purchase_price_per_unit FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$purchase_pu = $row['net_purchase_price_per_unit'];
			
			$sql3 = "SELECT mrp FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$mrp = $row['mrp'];
			
			$sql3 = "SELECT discount FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$discount = $row['discount'];
			
			$sql3 = "SELECT sale_price FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$sale_price = $row['sale_price'];
			
			$sql3 = "SELECT id FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$purchase_id = $row['id'];
			
			$sql3 = "SELECT gross_profit FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$gross_profit = $row['gross_profit'];
			
			$sql3 = "SELECT gst_rate FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$gst_rate = $row['gst_rate'];
			
			$sql3 = "SELECT net_profit FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$net_profit = $row['net_profit'];
			
			$sql3 = "SELECT gst_on_profit FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$gst_on_profit = $row['gst_on_profit'];
			
			$sql3 = "SELECT profit_cut FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$profit_cut = $row['profit_cut'];

			$sql3 = "SELECT profit_disburse FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$profit_disburse = $row['profit_disburse'];
			
			$sql3 = "SELECT profit_for_bp FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$profit_for_bp = $row['profit_for_bp'];
			
			$sql3 = "SELECT profit_on_bv FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$profit_on_bv = $row['profit_on_bv'];
			
			$sql3 = "SELECT business_volume FROM purchase WHERE stock_id='$stock_id' AND product_id='$product_id'";
			$res3 = mysqli_query($con,$sql3);
			$row = mysqli_fetch_array($res3);
			$business_volume = $row['business_volume'];
				
				
				echo '<div class="stock-data-tableheading">
			<div class="stock-data" style="width:100px;background-color:#c5c5c7;">1</div>
			<div class="stock-data" style="width:160px;background-color:#c5c5c7;">'.$p['stock_id'].'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_category.'</div>
			<div class="stock-data" style="width:180px;background-color:#c5c5c7;">'.$product_subcat.'</div>
			<div class="stock-data" style="width:245px;background-color:#c5c5c7;">'.$product_name.'</div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;">'.$p['stock'].'</div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;">'.$infield_stock.'</div>
			<div class="stock-data" style="width:130px;background-color:#c5c5c7;" id="st_purchase_pricedisplay-'.$purchase_id.'">'.$purchase_pu.'<input type="hidden" value="'.$purchase_pu.'" id="st_purchase_price-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;" id="st_mrpdisplay-'.$purchase_id.'">'.$mrp.'<input type="hidden" value="'.$mrp.'" id="st_mrp-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;padding-top:0px;"><input type="text" value="'.$discount.'" style="width:100%;height:18px;" onkeyup="change_dis(this);" id="st_dis-'.$purchase_id.'"></div>
			<div class="stock-data" style="width:80px;background-color:#c5c5c7;"><div id="st_sale_pricedisplay-'.$purchase_id.'">'.$sale_price.'</div><input type="hidden" value="'.$sale_price.'" id="st_sale_price-'.$purchase_id.'"><input type="hidden" value="'.$gross_profit.'" id="st_gross_profit-'.$purchase_id.'"><input type="hidden" value="'.$gst_rate.'" id="st_gst_rate-'.$purchase_id.'"><input type="hidden" id="st_net_profit-'.$purchase_id.'" value="'.$net_profit.'"><input type="hidden" value="'.$gst_on_profit.'" id="st_gst_profit-'.$purchase_id.'"><input type="hidden" value="'.$profit_cut.'" id="st_profit_cut-'.$purchase_id.'"><input type="hidden" value="'.$profit_disburse.'" id="st_profit_disburse-'.$purchase_id.'"><input type="hidden" value="'.$profit_for_bp.'" id="st_profit_bp-'.$purchase_id.'"><input type="hidden" value="'.$profit_on_bv.'" id="st_profit_bv-'.$purchase_id.'"><input type="hidden" value="'.$business_volume.'" id="st_business_volume-'.$purchase_id.'"></div>
			<div class="stock-data border-eat" style="width:80px;background-color:#c5c5c7;height:13px;cursor:pointer;" id="update-'.$purchase_id.'" onclick="update();"><i class="fa fa-exchange"></i></div>
		</div>';
			}
		}
	}
	**/
}

?>