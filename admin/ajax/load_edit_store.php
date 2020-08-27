<?php
include '../connection.php';
$database_id = $_POST['database_id'];

$sql = "SELECT * FROM stores WHERE id='$database_id'";
$res = mysqli_query($con,$sql);
while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	$account_stat = $r['active_status'];
	
	if($account_stat==1)
	{
		$option = '<option value="1">Active</option>';
	}
	else
	{
		$option = '<option value="0">Deactivated</option>';
	}
	
	
	echo '<div id="add-store-heading"><br><br>Edit Distributor</div>
	
	<div class="input-text" style="margin-top:30px;">&nbsp;Owner Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Owner Phone</div>
	<div class="input-container" style="">
		<input type="text" class="add-store-input" placeholder="  Owner Name" id="edit-store-owner-name" value="'.$r['owner_name'].'">
		<input type="text" class="add-store-input" style="margin-left:20px;" placeholder="  Owner Phone Number" id="edit-store-owner-phone" value="'.$r['owner_phone'].'">
	</div>
	
	<div class="input-text">&nbsp;Owner Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Store State</div>
	<div class="input-container">
		<input type="text" class="add-store-input" placeholder="  Owner Address" id="edit-store-owner-address" value="'.$r['owner_address'].'">
		<input type="text" class="add-store-input" style="margin-left:20px;" placeholder="  Store State" id="edit-store-store-state" value="'.$r['store_state'].'">
	</div>
	
	<div class="input-text">&nbsp;Store City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Store Address</div>
	<div class="input-container">
		<input type="text" class="add-store-input" placeholder="  Store City" id="edit-store-store-city" value="'.$r['store_city'].'">
		<input type="text" class="add-store-input" style="margin-left:20px;" placeholder="  Store Address" id="edit-store-store-address" value="'.$r['store_address'].'">
	</div>
	
	<div class="input-text">&nbsp;Profit On BV&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Security Amount</div>
	<div class="input-container">
		<input type="text" class="add-store-input" placeholder="  Profit On Business Volume" id="edit-store-profit-bv" value="'.$r['profit_on_bv'].'">
		<input type="text" class="add-store-input" style="margin-left:20px;" placeholder="  Security Amount" id="edit-store-security-amount" value="'.$r['security_amount'].'">
	</div>
	
	<div class="input-text">&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Status</div>
	<div class="input-container">
		<input type="password" class="add-store-input" placeholder="  Password" id="edit-store-password" value='.$r['password'].'>
		<select class="add-store-input" style="margin-left:20px;"  id="edit-store-account-stat">
			'.$option.'
			<option value="1">Activate</option>
			<option value="0">deactivate</option>
		</select>
	</div>
	<div class="input-text">&nbsp;Distributor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Network ID</div>
	<div class="input-container">
		<select class="add-store-input" id="edit-store-distri">
			<option>'.$r['distri_id'].'</option>';
		$sql3 = "SELECT distri_id FROM distributors";
		$res3 = mysqli_query($con,$sql3);
		while($p=mysqli_fetch_array($res3,MYSQLI_ASSOC))
		{
			echo '<option>'.$p['distri_id'].'</option>';
		}
			
		echo'</select>
		
		<input type="text" class="add-store-input" placeholder="  Network ID" id="edit-store-network-id" value="'.$r['network_id'].'" style="margin-left:20px;font-size:13px;">
		
		
	</div>
	
	<div class="input-container" style="margin-top:30px">
		<div class="edit-store-btn" id="updatestore-'.$r['id'].'" onclick="updatestore(this);">Update Store</div>
		<div class="edit-store-btn" onclick="update_cancel();">Cancel</div>
	</div>';
}

?>