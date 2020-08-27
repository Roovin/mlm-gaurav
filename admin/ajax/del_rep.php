<?php
include '../connection.php';
$report_id = $_POST['report_id'];
$sql = "DELETE FROM store_stock_report WHERE id='$report_id'";
$res = mysqli_query($con,$sql);
echo "Report Deleted";
?>