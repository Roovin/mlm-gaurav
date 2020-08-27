<?php
include 'conn.php';


$username = $_POST['username'];
$password = $_POST['password'];

$hashuser = $username;
$hashpass = md5($password);


$sql = "SELECT * FROM admin WHERE username='$hashuser' AND password='$hashpass'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if($count == 1)
{
    session_start();
	$_SESSION['admin'] = $username;
	header("location:dashboard.php");
}
else
{
    echo "<script>alert('Invalid Credentials!') ;</script>";
    header("location:index.php?error=yes");
    
}


?>