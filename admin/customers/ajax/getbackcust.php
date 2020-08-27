<?php
session_start();
include '../../conn.php';

if(empty($_SESSION['his']))
{
	echo $_SESSION['customer'];
}
else
{
	
$his = $_SESSION['his'];

$his_size = sizeof($his);

if($his_size>1)
{

$second_last_element_index = $his_size-2;

$back_cust = $his[$second_last_element_index];

unset($his[sizeof($his)-1]);

$_SESSION['his'] = $his;

echo $back_cust;
}
else
{
	$his = $_SESSION['his'];
	unset($his[0]);
	$_SESSION['his'] = $his;
	echo $_SESSION['customer'];
}
}

?>