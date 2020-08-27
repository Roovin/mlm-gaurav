<?php
include '../connection.php';
$database_id = $_POST['database_id'];
$owner_name = mysqli_real_escape_string($con,$_POST['owner_name']);
$owner_phone = mysqli_real_escape_string($con,$_POST['owner_phone']);
$owner_address = mysqli_real_escape_string($con,$_POST['owner_address']);
$store_state = mysqli_real_escape_string($con,$_POST['store_state']);
$store_city = mysqli_real_escape_string($con,$_POST['store_city']);
$store_address = mysqli_real_escape_string($con,$_POST['store_address']);
$profit_bv = $_POST['profit_bv'];
$security_amount = $_POST['security_amount'];
$password = $_POST['password'];
$active_status = $_POST['active_status'];


$sql = "UPDATE distributors SET owner_name='$owner_name',owner_phone='$owner_phone',owner_address='$owner_address',store_state='$store_state',store_city='$store_city',store_address='$store_address',profit_on_bv='$profit_bv',security_amount='$security_amount',password='$password',active_status='$active_status' WHERE id='$database_id'";


$res = mysqli_query($con,$sql);

?>