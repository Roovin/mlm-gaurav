<?php
include '../../conn.php';
error_reporting(0);
// echo "fdjb";
$sponser_id=$_POST['sponser_name'];
// echo $sponser_id;
$sql = "SELECT name FROM customers WHERE customer_id='$sponser_id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
if($row){
    echo $row['name'];
}
else{
    echo "Sponser Id is Invalid";
}


?>