<?php
include '../connection.php';
$transfer_id = $_POST['transfer_id'];
$date = $_POST['date'];
$tampoo_number = $_POST['tampoo_number'];
$driver_number = $_POST['driver_phone'];

$sql = "UPDATE transfer_info SET date_of_transfer='$date',tampoo_number='$tampoo_number',driver_phone='$driver_number' WHERE id='$transfer_id'";
$res = mysqli_query($con,$sql);



?>