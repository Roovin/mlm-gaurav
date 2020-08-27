<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];

$sql = "SELECT id FROM return_products WHERE status='Travelling' AND transfer_id='$transfer_id'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

echo $count;

?>