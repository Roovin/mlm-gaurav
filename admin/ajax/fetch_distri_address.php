<?php
include '../connection.php';
$database_id = $_POST['distri_database_id'];

$sql = "SELECT owner_address FROM distributors WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$owner_address = $row['owner_address'];


$sql = "SELECT distri_id FROM distributors WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
$distri_id = $row['distri_id'];

echo $owner_address."&".$distri_id;


?>