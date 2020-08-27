<?php
include '../connection.php';

$cust_id = $_POST['cust_id'];
$sponser_id = $_POST['sponser_id'];
$parent_id = $_POST['parent_id'];
$position = $_POST['position'];
$bank = $_POST['bank'];
$account = $_POST['account'];
$ifsc = $_POST['ifsc'];
$min_purchase = $_POST['min_purchase'];

			
			$sql2 = "UPDATE customers SET sponser_id='$sponser_id',parent_id='$parent_id',position='$position',status='approved',bank='$bank',account_number='$account',ifsc_code='$ifsc',min_purchase_status='$min_purchase' WHERE customer_id='$cust_id'";
			$res2 = mysqli_query($con,$sql2);
			echo "Customer Added to the Network";
		


?>