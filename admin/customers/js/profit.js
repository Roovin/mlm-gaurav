function bv_cal()
{
	var month = document.getElementById('pmonth').value;
	var year = document.getElementById('pyear').value;
	
	if(month!="" && year!="")
	{
		$.post("ajax/bv_cal.php",{month:month,year:year},function(data){
			//alert(data);
		
			data_array = data.split("#");
			rbv = data_array[0];
			mbv = data_array[1];
			lbv = data_array[2];
			profit = data_array[3];
			
			$("#rbv").html(rbv);
			$("#mbv").html(mbv);
			$("#lbv").html(lbv);
			$("#profit-display").html('Rs '+profit+'/-');
	
		})
	}
}

function req_trans()
{
	var bname = $("#bname").val();
	var bacc = $("#bacc").val();
	var bholder = $("#bholder").val();
	var bifsc = $("#bifsc").val();
	var bamount = $("#bamount").val();
	if(bname=="")
	{
		alert("Please Enter Bank Name");
	}
	else if(bacc=="")
	{
		alert("Please Enter Account Number");
	}
	else if(bholder=="")
	{
		alert("Please Enter Account Holder Name");
	}
	else if(bifsc=="")
	{
		alert("Please Enter IFSC Code");
	}
	else if(bamount=="")
	{
		alert("Please Enter Amount to be Transfered");
	}
	else
	{
		$.post("ajax/req_otp.php",{bamount:bamount},function(data){
			if(data=='success')
			{
				$("#fotp-box").show();
			}
			else
			{
				alert(data);
			}
		});
	}
}



function submit_otp()
{
	var bname = $("#bname").val();
	var bacc = $("#bacc").val();
	var bholder = $("#bholder").val();
	var bifsc = $("#bifsc").val();
	var bamount = $("#bamount").val();
	var otp = $("#fotp").val();
	
	if(bname=="")
	{
		alert("Please Enter Bank Name");
	}
	else if(bacc=="")
	{
		alert("Please Enter Account Number");
	}
	else if(bholder=="")
	{
		alert("Please Enter Account Holder Name");
	}
	else if(bifsc=="")
	{
		alert("Please Enter IFSC Code");
	}
	else if(bamount=="")
	{
		alert("Please Enter Amount to be Transfered");
	}
	else if(otp=="")
	{
		alert("Please Enter OTP");
	}
	else
	{
		$.post("ajax/fund_req.php",{bname:bname,bacc:bacc,bholder:bholder,bifsc:bifsc,otp:otp,bamount:bamount},function(data){
			if(data=="Requested")
			{
				$("#fotp-box").html('<img src="../images/check.gif" id="check"><div class="ctext">We Have Recieved Your Request, We May Take 2-3 Business Days To Process Your Request.</div><div class="ctext" style="margin-top:20px;"><u>Thank You For Your Patience</u></div>')
			}
			else
			{
				alert(data);
			}
		});
	}
	
	
}