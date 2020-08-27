<?php
include '../conn.php';
$owner_name = mysqli_real_escape_string($conn,$_POST['owner_name']);
$owner_phone = mysqli_real_escape_string($conn,$_POST['owner_phone']);
$owner_address = mysqli_real_escape_string($conn,$_POST['owner_address']);
$store_state = mysqli_real_escape_string($conn,$_POST['store_state']);
$store_city = mysqli_real_escape_string($conn,$_POST['store_city']);
$store_address = mysqli_real_escape_string($conn,$_POST['store_address']);
$active_status = 1;
$profit_bv = $_POST['profit_bv'];
$security_amount = $_POST['security_amount'];

$password = mysqli_real_escape_string($conn,$_POST['password']);

$sql = "SELECT id FROM distributors ORDER BY id DESC LIMIT 1";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$max_id = $row['id'];

$new_id = $max_id + 1;
$distri_id = "HVMDIS-".$new_id;
$distri_id = mysqli_real_escape_string($conn,$distri_id);
$revenue = 0;
$balance = 0;

$sql = "INSERT INTO distributors (owner_name,owner_phone,owner_address,store_state,store_city,store_address,active_status,profit_on_bv,security_amount,distri_id,password,revenue,balance)VALUES('$owner_name','$owner_phone','$owner_address','$store_state','$store_city','$store_address',$active_status,$profit_bv,$security_amount,'$distri_id','$password',$revenue,$balance)";
$res = mysqli_query($conn,$sql);

?>