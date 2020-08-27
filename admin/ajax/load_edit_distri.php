<?php
include '../connection.php';
$database_id = $_POST['database_id'];

$sql = "SELECT * FROM distributors WHERE id='$database_id'";
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
	
	
	echo '<div id="add-distri-heading"><br><br>Edit Distributor</div>
	
	<div class="input-text" style="margin-top:30px;">&nbsp;Owner Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Owner Phone</div>
	<div class="input-container" style="">
		<input type="text" class="add-distri-input" placeholder="  Owner Name" id="edit-distri-owner-name" value="'.$r['owner_name'].'">
		<input type="text" class="add-distri-input" style="margin-left:20px;" placeholder="  Owner Phone Number" id="edit-distri-owner-phone" value="'.$r['owner_phone'].'">
	</div>
	
	<div class="input-text">&nbsp;Owner Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Store State</div>
	<div class="input-container">
		<input type="text" class="add-distri-input" placeholder="  Owner Address" id="edit-distri-owner-address" value="'.$r['owner_address'].'">
		<input type="text" class="add-distri-input" style="margin-left:20px;" placeholder="  Store State" id="edit-distri-store-state" value="'.$r['store_state'].'">
	</div>
	
	<div class="input-text">&nbsp;Store City &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Store Address</div>
	<div class="input-container">
		<input type="text" class="add-distri-input" placeholder="  Store City" id="edit-distri-store-city" value="'.$r['store_city'].'">
		<input type="text" class="add-distri-input" style="margin-left:20px;" placeholder="  Store Address" id="edit-distri-store-address" value="'.$r['store_address'].'">
	</div>
	
	<div class="input-text">&nbsp;Profit On BV&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Security Amount</div>
	<div class="input-container">
		<input type="text" class="add-distri-input" placeholder="  Profit On Business Volume" id="edit-distri-profit-bv" value="'.$r['profit_on_bv'].'">
		<input type="text" class="add-distri-input" style="margin-left:20px;" placeholder="  Security Amount" id="edit-distri-security-amount" value="'.$r['security_amount'].'">
	</div>
	
	<div class="input-text">&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Status</div>
	<div class="input-container">
		<input type="password" class="add-distri-input" placeholder="  Password" id="edit-distri-password" value='.$r['password'].'>
		<select class="add-distri-input" style="margin-left:20px;"  id="edit-distri-account-stat">
			'.$option.'
			<option value="1">Activate</option>
			<option value="0">deactivate</option>
		</select>
	</div>
	
	<div class="input-container" style="margin-top:30px">
		<div class="edit-distri-btn" id="updatedistri-'.$r['id'].'" onclick="updatedistri(this);">Update Distributor</div>
		<div class="edit-distri-btn" onclick="update_cancel();">Cancel</div>
	</div>';
}

?>