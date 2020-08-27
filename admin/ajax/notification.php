<?php
error_reporting(0);
    include '../conn.php';
    $notf = $_POST['join'];
    // $sql = "SELECT * FROM customers WHERE customer_id='$notf'";
    $sql = "UPDATE customers SET status='yes' WHERE customer_id='$notf'";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    if($result)
    {
        echo $notf;
    }
    // echo $row['name'];