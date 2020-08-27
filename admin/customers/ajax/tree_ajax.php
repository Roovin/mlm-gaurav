<?php
    // error_reporting(0);
    $cust = $_POST['id'];
    // echo $cust;
    session_start();
    include '../../conn.php';

	// $sql = "SELECT * FROM customers WHERE customer_id='$cust'";
	// $res = mysqli_query($conn,$sql);
	// $row = mysqli_fetch_array($res);
	// $cust_name = $row['name'];
	// $wallet_balance = $row['wallet_balance'];
	// $account_balance = $row['account_balance'];
    // $cid = $row['id'];
    
    
    $sql = "SELECT * FROM customers WHERE sponser_id='$cust'";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        
        echo $row[1];
        echo ",";
    }
    exit();


    
    


?>