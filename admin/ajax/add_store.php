<?php
include '../connection.php';
$distri_id = mysqli_real_escape_string($con,$_POST['distri_id']);
$owner_name = mysqli_real_escape_string($con,$_POST['owner_name']);
$owner_phone = mysqli_real_escape_string($con,$_POST['owner_phone']);
$owner_address = mysqli_real_escape_string($con,$_POST['owner_address']);
$store_state = mysqli_real_escape_string($con,$_POST['store_state']);
$store_city = mysqli_real_escape_string($con,$_POST['store_city']);
$store_address = mysqli_real_escape_string($con,$_POST['store_address']);
$active_status = 1;
$profit_bv = $_POST['profit_bv'];
$security_amount = $_POST['security_amount'];
$network_id = $_POST['network_id'];

$password = mysqli_real_escape_string($con,$_POST['password']);

$sql = "SELECT id FROM stores ORDER BY id DESC LIMIT 1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$max_id = $row['id'];

$new_id = $max_id + 1;
$store_id = "HVMSTORE-".$new_id;
$distri_id = mysqli_real_escape_string($con,$distri_id);
$revenue = 0;
$balance = 0;

$sql = "INSERT INTO stores (distri_id,owner_name,owner_phone,owner_address,store_state,store_city,store_address,active_status,profit_on_bv,security_amount,store_id,password,revenue,balance,network_id)VALUES('$distri_id','$owner_name','$owner_phone','$owner_address','$store_state','$store_city','$store_address',$active_status,$profit_bv,$security_amount,'$store_id','$password',$revenue,$balance,'$network_id')";
$res = mysqli_query($con,$sql);

?>