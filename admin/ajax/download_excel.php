<?php
include '../connection.php';
$month = $_POST['month'];
$year = $_POST['year'];

$sql = "SELECT * FROM profit_database WHERE month='$month' AND year='$year'";
$res = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$customer_id[] = $r['customer_id'];
	$name[] = $r['name'];
	$mobile[] = $r['mobile'];
	$adhar[] = $r['adhar'];
	$self_bv[] = $r['self_bv'];
	$left_bv[] = $r['left_bv'];
	$right_bv[] = $r['right_bv'];
	$total_slab[] = $r['total_slab'];
	$left_slab[] = $r['left_slab'];
	$right_slab[] = $r['right_slab'];
	$total_per[] = $r['total_per'];
	$left_per[] = $r['left_per'];
	$right_per[] = $r['right_per'];
	$profit[] = $r['profit'];
	$status[] = $r['status'];
	$months[] = $r['month'];
	$years[] = $r['year'];
	$dot[] = $r['dot'];
}

$export_data = array();

for($i=0;$i<=sizeof($customer_id)-1;$i++)
{
	$temp_array = array();
	$temp_array["customer Id"] = $customer_id[$i];
	$temp_array["Name"] = $name[$i];
	$temp_array["Mobile"] = $mobile[$i]; 
	$temp_array['Adhar'] = $adhar[$i];
	$temp_array['Self BV'] = $self_bv[$i];
	$temp_array['Left BV'] = $left_bv[$i];
	$temp_array['Right BV']  = $right_bv[$i];
	$temp_array['Total Slab'] = $total_slab[$i];
	$temp_array['Left Slab'] = $left_slab[$i];
	$temp_array['Right Slab'] = $right_slab[$i];
	$temp_array['Total Percentage'] = $total_per[$i];
	$temp_array['Left Percentage'] = $left_per[$i];
	$temp_array['Right Percentage'] = $right_per[$i];
	$temp_array['Profit'] = $profit[$i];
	$temp_array['Status'] = $status[$i];
	$temp_array['Month'] = $months[$i];
	$temp_array['Year'] = $years[$i];
	$temp_array['Date of Transfer'] = $dot[$i];
	$export_data[] = $temp_array;
	unset($temp_array);
}

$filename = '../profit_report/profit.csv';       
      header("Content-type: text/csv");       
      header("Content-Disposition: attachment; filename=$filename");       
      $output = fopen($filename, "w");       
      $header = array_keys($export_data[0]);       
      fputcsv($output, $header);       
      foreach($export_data as $row)       
      {  
           fputcsv($output, $row);  
      }       
      fclose($output);

	echo '<br><br><a href="./profit_report/profit.csv" style="color:black;"><u>Download</u></a>';
?>