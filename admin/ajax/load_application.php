<?php
include '../connection.php';
$cust_id = $_POST['cust_id'];

$sql = "SELECT * FROM customers WHERE customer_id='$cust_id'";
$res = mysqli_query($con,$sql);

while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
	echo '<div class="doc-loader" id="doc-loader">
			<div class="doc-top">
				<div class="close-btn" onclick="closedoc();">x</div>
				<br>
				<center>
					<div id="doc-space"></div>
				</center>
			</div>
		  </div>
	
	
	<div class="custapp_heading" style="font-size:20px">Application Details</div>
	
	<div class="custapp_box">
		<div class="custapp_label">Network Information</div>
		
		<div class="custapp_inputbox">Sponsor ID<br><input type="text" class="input_class" placeholder="  Sponsor ID" value="'.$r['sponser_id'].'" id="appsponid"><input type="hidden" value="'.$cust_id.'" id="applicationcustid"></div>
		
		<div class="custapp_inputbox">Parent ID<br><input type="text" class="input_class" placeholder="  Parent ID" value="'.$r['parent_id'].'" id="appparentid"></div>
		
		<div class="custapp_inputbox">
			Position<br>
			<select class="input_class" id="appposition" disabled>
				<option>'.$r['position'].'</option>
			</select>
		</div>
		
		<div class="custapp_inputbox">
			<div class="search-btn" onclick="searchparent();">Lock</div>
			<div class="search-btn" onclick="unlock();" style="margin-left:20px;">Unlock</div>
		</div>
		
		
	</div>
	
	
	<div class="custapp_box">
		<div class="custapp_label">Customer Details</div>
		
		<div class="custapp_inputbox">Name<br><input type="text" class="input_class" placeholder="  Sponsor ID" value="'.$r['name'].'" disabled></div>
		
		<div class="custapp_inputbox">Father Name<br><input type="text" class="input_class" placeholder="  Father Name" value="'.$r['father_name'].'" disabled></div>
		
		<div class="custapp_inputbox">
			Mobile<br>
			<input type="text" class="input_class" placeholder="  Mobile" value="'.$r['mobile'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			Email<br>
			<input type="text" class="input_class" placeholder="  Email" value="'.$r['email'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			DOB<br>
			<input type="date" class="input_class" placeholder="  Email" value="'.$r['dob'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			DOJ<br>
			<input type="date" class="input_class" value="'.$r['doj'].'" disabled>
		</div>
		
		<div class="custapp_inputbox" style="width:95%;">
			Permanent Address<br>
			<input type="text" class="input_class" placeholder="  Permanent Address" style="width:100%;" value="'.$r['address_permanent'].'" disabled>
		</div>
		
		<div class="custapp_inputbox" style="width:95%;">
			Temprory Address<br>
			<input type="text" class="input_class" placeholder="  Temprory Address" style="width:100%;" value="'.$r['address_temp'].'" disabled>
		</div>
		
	</div>';
	
	$sql2 = "SELECT * FROM Nominee WHERE customer_id='$cust_id'";
	$res2 = mysqli_query($con,$sql2);
	while($p=mysqli_fetch_array($res2,MYSQLI_ASSOC))
	{
	
	echo'<div class="custapp_box">
		<div class="custapp_label">Nominee Details</div>
		
		<div class="custapp_inputbox">Name<br><input type="text" class="input_class" placeholder="  Name" value="'.$p['name'].'" disabled></div>
		
		<div class="custapp_inputbox">Father Name<br><input type="text" class="input_class" placeholder="  Father Name" value="'.$p['father_name'].'" disabled></div>
		
		<div class="custapp_inputbox">
			Mobile<br>
			<input type="text" class="input_class" placeholder="  Mobile" value="'.$p['mobile'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			Email<br>
			<input type="text" class="input_class" placeholder="  Email" value="'.$p['email'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			DOB<br>
			<input type="date" class="input_class" value="'.$p['dob'].'" disabled>
		</div>
		
		<div class="custapp_inputbox">
			Relation<br>
			<input type="text" class="input_class" placeholder="  Relation" value="'.$p['relation'].'" disabled>
		</div>
		
		<div class="custapp_inputbox" style="width:95%;">
			Permanent Address<br>
			<input type="text" class="input_class" placeholder="  Permanent Address" style="width:100%;" value="'.$p['address_permanent'].'" disabled>
		</div>
		
		<div class="custapp_inputbox" style="width:95%;">
			Temprory Address<br>
			<input type="text" class="input_class" placeholder="  Temprory Address" style="width:100%;" value="'.$p['address_temp'].'" disabled>
		</div>
		
	</div>';
	}
	
	
	echo '<div class="custapp_box">
		<div class="custapp_label">Additional Information</div>
		
		<div class="custapp_inputbox">Adhar Card Number<br><input type="text" class="input_class" placeholder="  Adhar Card" value="'.$r['adhar'].'" disabled></div>
		
		<div class="custapp_inputbox">PAN Number<br><input type="text" class="input_class" placeholder="  PAN Number" value="'.$r['pan'].'" disabled></div>
		
		<div class="custapp_inputbox">
			Business Plan<br>
			<select class="input_class" disabled>
				<option>'.$r['business_type'].'</option>
				<option>BP</option>
				<option>OTP</option>
			</select>
		</div>
		
		<div class="custapp_inputbox">HVM Card Number<br><input type="text" class="input_class" placeholder="  HVM Card Number" value="'.$r['hvmcard'].'" disabled></div>
		
		<div class="custapp_inputbox">PAN Card<br><br><div class="doclink" id="'.$r['pan_file'].'" onclick="opendoc(this);">Open PAN Card</div></div>
		
		<div class="custapp_inputbox">ID Proof<br><br><div class="doclink" id="'.$r['id_file'].'" onclick="opendoc(this);">Open ID Card</div></div>
		
	</div>
	
	
	
	<div class="custapp_box">
		<div class="custapp_label">Bank Details</div>
		
		<div class="custapp_inputbox">Bank Name<br><input type="text" class="input_class" placeholder="  Bank Name" value="'.$r['bank'].'" id="bank_name"></div>
		
		<div class="custapp_inputbox">Account Number<br><input type="text" class="input_class" placeholder="  Account Number" value="'.$r['account_number'].'" id="account"></div>
		
		<div class="custapp_inputbox">IFSC Code<br><input type="text" class="input_class" placeholder="  IFSC Code" value="'.$r['ifsc_code'].'" id="ifsc"></div>
		
		
		<div class="custapp_inputbox">
			Min Purchase Restriction<br>
			<select class="input_class" id="min_purchase">
				<option>'.$r['min_purchase_status'].'</option>
				<option>Yes</option>
				<option>No</option>
			</select>
		</div>
		
	</div>
	
	
	
	
	<div class="ap-button" onclick="approve();">Approve</div>
	<div class="ap-button">Reject</div>
	<div class="ap-button" onclick="closeapplication();">Close</div>
	';
}


?>