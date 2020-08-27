<?php

error_reporting(0);
session_start();
include ('conn.php');

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

echo "<script type='text/javascript'>location.href = 'index.php';</script>";

?>