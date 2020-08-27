<?php
error_reporting(0);
session_start();
if(empty($_SESSION['customer_id']))
{
	header("location:index.php");
}

include '../conn.php';   	
$cust = $_SESSION['customer_id'];
$sql = "SELECT * FROM customers WHERE customer_id='$cust'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res);
$cust_name = $row['name'];
$wallet_balance = $row['wallet_balance'];
$account_balance = $row['account_balance'];
$cid = $row['id'];

$sql = "SELECT * FROM customers WHERE sponser_id='HVMCUST-2' limit 5;";
$res = mysqli_query($conn,$sql);
    
// for($i=1; $i<=$row[1]; $i++){
//     print_r($row[1]);

// }
// print_r($row);
// foreach($row as $data){
//     echo $data[0];
// }
// exit;
// print_r($row[1]);exit;
// print_r($row[1]);exit();

// while($row = mysqli_fetch_array($res)){
// // print_r($row[1]);
// $data = $row[1].'</br>';
// echo $data;
// }
// exit();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Dashboard | Admin Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<link href="assets/libs/chartist/chartist.min.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/home.css">
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="assets_1/css/animate.css">
	<link rel="stylesheet" href="assets_1/css/style.css">
	<link rel="stylesheet" href="assets_1/css/media-queries.css">
	<link rel="stylesheet" href="assets_1/css/carousel.css">
	<script defer src="./js/home.js"></script>
	
	<style>
		#home-option
		{
			background-color:#cdcdcf;
			border:1px solid #72757b;
			border-right:0px;
		}
		.icon-class{
			font-size: 25px;
			font-size: 25px;
			transform: translate(-148px, 28px);
		}
		.icon-row-1 {
			transform: translateX(-1px) translateY(0);
		}
		.icon-row-2 {
			transform: translateX(-293px) translateY(30px);
		}
		.icon-row-3 {
			transform: translateX(221px) translateY(5px);
		}
		.icon-row-4 {
			transform: translate(222px, 5px);
		}
		.icon-row-5 {
			transform: translate(370px, 5px);
		}
	</style>
	
	
	<!-- for tree view-->
	<style>
	ul, #myUL {
	  list-style-type: none;
	}

	#myUL {
	  margin: 0;
	  padding: 0;
	  text-align: left;
	}

	.caret {
	  cursor: pointer;
	  -webkit-user-select: none; /* Safari 3.1+ */
	  -moz-user-select: none; /* Firefox 2+ */
	  -ms-user-select: none; /* IE 10+ */
	  user-select: none;
	}

	.caret::before {
	  content: "\25B6";
	  color: black;
	  display: inline-block;
	  margin-right: 6px;
	  margin-right: 15px;    
	  font-size: 25px;
	}

	.caret-down::before {
	  -ms-transform: rotate(90deg); /* IE 9 */
	  -webkit-transform: rotate(90deg); /* Safari */'
	  transform: rotate(90deg);  
	}

	.nested {
	  display: none;
	}

	.active {
	  display: block;
	}
	</style>
	<!-- <script>
		var getDataOnClick = function(){
			console.log('clicked')
			var data = document.getElementById('person-1').textContent;
			console.log(data);
		}onclick="getDataOnClick('person-1')"
		onclick="getDataOnClick('person-2')"
		onclick="getDataOnClick('person-3')"
		onclick="getDataOnClick('person-4')"
		onclick="getDataOnClick('person-5')"
		onload="myfunction('')"
	</script> -->
</head>

<body data-sidebar="dark" onload="myfunction('<?php echo $cust; ?>')">

	<!-- Begin page -->
	<div id="layout-wrapper">

		<?php include 'top-header.php';?>

		<!-- ========== Left Sidebar Start ========== -->
		<?php include 'sidebar.php';?>
		<!-- Left Sidebar End -->
		
		
		<center style="margin: 10%; padding-left: 10%;">
		<div style="float: left;width: 60%;">
			<ul id="myUL">
				<li>				
					<!--<span class="caret">-->
					<span id="admin" style="cursor: pointer; color:green">
						<span class="user-icon">
							<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
							<?= $cust_name; ?>
						</span>
					</span>
					<!--<ul class="nested">-->
					<ul>
					<?php
					$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$cust' limit 5";
					$result=mysqli_query($conn, $query);
					$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
					foreach($data as $key)
					{
						$customer_id = $key['customer_id'];
						$customer_name = $key['name'];
						$paid_amount = $key['paid_amount'];
						if($paid_amount>0)
							$color = "green";
						else
							$color = "red";
						?>				
						<li>
							<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>" style="color:<?= $color; ?>">
								<span class="user-icon">
									<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
									<?= $customer_name; ?>									
								</span>
							</span>						
							<ul class="nested">
							<?php
							$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
							$result=mysqli_query($conn, $query);
							$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
							foreach($data as $key)
							{
								$customer_id = $key['customer_id'];
								$customer_name = $key['name'];
								$paid_amount = $key['paid_amount'];
								if($paid_amount>0)
									$color = "green";
								else
									$color = "red";
								?>
								<li>
									<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
										<span class="user-icon">
											<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
											<?= $customer_name; ?>
										</span>
									</span>						
									<ul class="nested">
									<?php
									$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
									$result=mysqli_query($conn, $query);
									$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
									foreach($data as $key)
									{
										$customer_id = $key['customer_id'];
										$customer_name = $key['name'];
										$paid_amount = $key['paid_amount'];
										if($paid_amount>0)
											$color = "green";
										else
											$color = "red";
										?>
										<li>
											<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
												<span class="user-icon">
													<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
													<?= $customer_name; ?>
												</span>
											</span>						
											<ul class="nested">
											<?php
											$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
											$result=mysqli_query($conn, $query);
											$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
											foreach($data as $key)
											{
												$customer_id = $key['customer_id'];
												$customer_name = $key['name'];
												$paid_amount = $key['paid_amount'];
												if($paid_amount>0)
													$color = "green";
												else
													$color = "red";
												?>
												<li>
													<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
														<span class="user-icon">
															<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
															<?= $customer_name; ?>
														</span>
													</span>						
													<ul class="nested">
													<?php
													$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
													$result=mysqli_query($conn, $query);
													$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
													foreach($data as $key)
													{
														$customer_id = $key['customer_id'];
														$customer_name = $key['name'];
														$paid_amount = $key['paid_amount'];
														if($paid_amount>0)
															$color = "green";
														else
															$color = "red";
														?>
														<li>
															<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
																<span class="user-icon">
																	<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
																	<?= $customer_name; ?>
																</span>
															</span>						
															<ul class="nested">
																<?php
																$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
																$result=mysqli_query($conn, $query);
																$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
																foreach($data as $key)
																{
																	$customer_id = $key['customer_id'];
																	$customer_name = $key['name'];
																	$paid_amount = $key['paid_amount'];
																	if($paid_amount>0)
																		$color = "green";
																	else
																		$color = "red";
																	?>
																	<li>
																		<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
																			<span class="user-icon">
																				<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
																				<?= $customer_name; ?>
																			</span>
																		</span>						
																		<ul class="nested">
																			<?php
																			$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
																			$result=mysqli_query($conn, $query);
																			$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
																			foreach($data as $key)
																			{
																				$customer_id = $key['customer_id'];
																				$customer_name = $key['name'];
																				$paid_amount = $key['paid_amount'];
																				if($paid_amount>0)
																					$color = "green";
																				else
																					$color = "red";
																				?>
																				<li>
																					<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
																						<span class="user-icon">
																							<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
																							<?= $customer_name; ?>
																						</span>
																					</span>						
																					<ul class="nested">
																						<?php
																						$query = "SELECT customer_id, name, paid_amount FROM customers WHERE sponser_id='$customer_id' limit 5";
																						$result=mysqli_query($conn, $query);
																						$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
																						foreach($data as $key)
																						{
																							$customer_id = $key['customer_id'];
																							$customer_name = $key['name'];
																							$paid_amount = $key['paid_amount'];
																							if($paid_amount>0)
																								$color = "green";
																							else
																								$color = "red";
																							?>
																							<li>
																								<span class="caret" id="<?= $customer_id; ?>" value="<?= $customer_name; ?>	" style="color:<?= $color; ?>">
																									<span class="user-icon">
																										<i class="fas fa-user-tie" style="color:'.$font_color.'"></i>					
																										<?= $customer_name; ?>
																									</span>
																								</span>						
																								<ul class="nested">
																								
																								</ul>
																							</li>
																						<?php
																						} ?>
																					</ul>
																				</li>
																			<?php
																			} ?>
																		</ul>
																	</li>
																<?php
																} ?>
															</ul>
														</li>
													<?php
													} ?>
													</ul>												
												</li>
											<?php
											} ?>
											</ul>									
										</li>
									<?php
									} ?>								
									</ul>
								</li>
							<?php
							} ?>
							</ul>
						</li>													
					<?php
					} ?>
					</ul>
				</li>
			</ul>
		</div>
		<div style="float: right;width: 40%;">
			<center><h2  id="customer_name" style="background: #ec536c !important;color: white;padding: 12px;margin: 0;"><?= $cust_name; ?></h2>
			<table class="table table-bordered dt-responsive nowrap" style="border-collapse: inherit; border-spacing: 0; width: 100%; margin:0">
				<?php  
				$sql = "SELECT count(*) red_member from customers WHERE sponser_id='$cust' and paid_amount<='0'";
				$result=mysqli_query($conn, $sql);
				if($rows = mysqli_fetch_array($result))
				{
					$red_member = $rows['red_member'];
				}
				$sql = "SELECT count(*) green_member from customers WHERE sponser_id='$cust' and paid_amount>'0'";
				$result=mysqli_query($conn, $sql);
				if($rows = mysqli_fetch_array($result))
				{
					$green_member = $rows['green_member'];
				}
				$total_member=$red_member+$green_member;?>
				<tr style="background: aliceblue;">
					<td style="width:50%;text-align: right;"><b>Customer ID</b></td>
					<td id="customer_id">
						<?php echo htmlentities($cust); ?>
					</td> 												
				</tr>  
				<tr style="background: antiquewhite;">
					<td style="width:50%;text-align: right;"><b>Red Member</b></td>
					<td id="red_member">
						<?php echo htmlentities($red_member); ?>
					</td> 												
				</tr> 
				<tr style="background: aliceblue;">
					<td style="width:50%;text-align: right;"><b>Green Member</b></td>
					<td id="green_member">
						<?php echo htmlentities($green_member); ?>
					</td> 												
				</tr> 
				<tr style="background: antiquewhite;">
					<td style="width:50%;text-align: right;"><b>Total Member</b></td>
					<td id="total_member">
						<?php echo htmlentities($total_member); ?>
					</td> 												
				</tr> 								
			</table>
		</div>
		</center>
<!--
		</center>
			<input type="text" placeholder="   Child Customer ID" style="width:150px;height:30px;margin-top:20px;" onkeyup="open_map(event);" id="child_id">
		<center>
		
		<div style="margin-left:140px;">
			<?php
			/*$sql = "SELECT child_id, position FROM closure WHERE parent_id='$cid' AND level='1'";
			$res = mysqli_query($conn,$sql);
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

			$cur_month = date('m');
			$cur_year = date('Y');

			$top_date = $cur_year.'-'.$cur_month.'-'.'01';
			$down_date = $cur_year.'-'.$cur_month.'-'.'31';

			$sql = "SELECT closure.child_id,customers.customer_id,custbills.id,bill_products.stock_id,bill_products.product_id,bill_products.qty,purchase.business_volume FROM `closure` INNER JOIN customers ON closure.child_id=customers.id AND closure.parent_id='$right_child' INNER JOIN custbills ON customers.customer_id=custbills.customer_id AND custbills.bill_date BETWEEN '$top_date' AND '$down_date' INNER JOIN bill_products ON bill_products.billing_id=custbills.id INNER JOIN purchase ON bill_products.product_id=purchase.product_id AND bill_products.stock_id=purchase.stock_id";
			$res = mysqli_query($conn,$sql);
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
			$res = mysqli_query($conn,$sql);
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
			$res = mysqli_query($conn,$sql);
			$mid_bv = 0;
			while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
			{
				$qty = $r['qty'];
				$bv = $r['business_volume'];
				$t_bv = $qty * $bv;
				$mid_bv += $t_bv;
			}*/
			?>
		</div>

		<center style="padding-left: 3%;">
			<div id="demographics">
				<div id="head">This Month Summary</div>
				<div class="inner">
				<br>
				<b>Left Side BV</b><br><br>
				<?php //echo $left_bv;?>
				</div>
				<div class="inner">
				<br>
				<b>Your BV</b><br><br>
				<?php //echo $mid_bv;?>
				</div>
				<div class="inner" style="border-right:0px;">
				<br>
				<b>Right BV</b><br><br>
				<?php //echo $right_bv;?>
				</div>
			</div>
		</center>-->
    </div
        
	<!-- END layout-wrapper -->
	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>
	
	<!-- JAVASCRIPT -->
	<script src="../js/jquery-1.9.0.min.js"></script>
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>

	<!-- Peity chart-->
	<script src="assets/libs/peity/jquery.peity.min.js"></script>
	<!-- slider javascript -->
	<script src="assets_1/js/jquery-3.3.1.min.js"></script>
	<script src="assets_1/js/jquery-migrate-3.0.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="assets_1/js/jquery.backstretch.min.js"></script>
	<script src="assets_1/js/wow.min.js"></script>
	<script src="assets_1/js/scripts.js"></script>

	<!-- Plugin Js-->
	<script src="assets/libs/chartist/chartist.min.js"></script>
	<script src="assets/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>

	<script src="assets/js/pages/dashboard.init.js"></script>

	<script src="assets/js/app.js"></script>
	
		
	<script>
	var toggler = document.getElementsByClassName("caret");
	var i;

	for (i = 0; i < toggler.length; i++) {
	  toggler[i].addEventListener("click", function() {
		this.parentElement.querySelector(".nested").classList.toggle("active");
		this.classList.toggle("caret-down");
	  });
	}
	
	
	
	$("#admin").click(function() { 
		window.location.reload();
	});
	
	$(".caret").click(function() { 
	var customer_id = $(this).attr('id'); 
	var customer_name = $(this).attr('value');
	$.ajax({
			url:"ajax/get_customer_detail.php",
			method:"POST",
			data:{
				customer_id:customer_id
			},
			success:function(data){
				var arr = data.split("~");
				document.getElementById("customer_id").innerHTML = customer_id;
				document.getElementById("red_member").innerHTML = arr[0];
				document.getElementById("green_member").innerHTML = arr[1];
				document.getElementById("total_member").innerHTML = arr[2];
				document.getElementById("customer_name").innerHTML = customer_name;
			}
		});
	});
		
	</script>

</body>
</html>    