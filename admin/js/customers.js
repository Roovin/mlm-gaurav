function loadapplication(element)
{
	$("#application_loader").show();
	var id = $(element).attr("id");
	$.post("ajax/load_application.php",{cust_id:id},function(data){
		$("#application_loader").html(data);
	});
}

function opendoc(element)
{
	
	var image = $(element).attr("id");
	$("#doc-space").html('<img src="./customers/documents/'+image+'" style="height:100%;">');
	$("#doc-loader").show();
}

function closedoc()
{
	$("#doc-loader").hide();
}

function closeapplication()
{
	$("#application_loader").hide();
	$("#application_loader").html('');
}

function approve()
{
	var cust_id = document.getElementById('applicationcustid').value;
	var sponser_id = document.getElementById('appsponid').value;
	var parent_id = document.getElementById('appparentid').value;
	var position = document.getElementById('appposition').value;
	var bank = document.getElementById('bank_name').value;
	var account = document.getElementById('account').value;
	var ifsc = document.getElementById('ifsc').value;
	var min_purchase = document.getElementById('min_purchase').value;
	
	if(parent_id=="")
	{
		alert("Parent ID Cannot Be Blank");
	}
	else if(position=="Automatic")
	{
		alert("Position Not Selected");
	}
	else
	{
	$.post("ajax/approve.php",{cust_id:cust_id,sponser_id:sponser_id,parent_id:parent_id,position:position,bank:bank,account:account,ifsc:ifsc,min_purchase:min_purchase},function(data){
		
		if(data=='Customer Added to the Network')
		{
			alert(data);
			$("#application_loader").hide();
			$("#application_loader").html('');
			$("#row-"+cust_id).remove();
		}
		else
		{
		
		alert(data);
		}
	});
	}
	
}




$(document).ready(function(){
	$("#addstore-btn").click(function(){
		$("#stores-container").hide();
		$("#custapp_container").show();
	});
	
	
	$("#back_custapp").click(function(){
		$("#stores-container").show();
		$("#custapp_container").hide();
	});
	
	$("#addcust-btn").click(function(){
		$("#stores-container").hide();
		$(".custadd_container").show();
	});
	
	$("#custadd_back").click(function(){
		$("#stores-container").show();
		$(".custadd_container").hide();
	});
});





function validate_req()
{
	$("#req_btn").attr("onclick","");
	var sponser_id = document.getElementById('appsponid').value;
	var cust_name = document.getElementById('cust_name').value;
	var cust_father_name = document.getElementById('cust_father_name').value;
	var cust_mobile = document.getElementById('cust_mobile').value;
	var cust_email = document.getElementById('cust_email').value;
	var cust_dob = document.getElementById('cust_dob').value;
	var cust_doj = document.getElementById('cust_doj').value;
	var cust_paddress = document.getElementById('cust_paddress').value;
	var cust_taddress = document.getElementById('cust_taddress').value;
	var nom_name = document.getElementById('nom_name').value;
	var nom_father_name = document.getElementById('nom_father_name').value;
	var nom_mobile = document.getElementById('nom_mobile').value;
	var nom_email = document.getElementById('nom_email').value;
	var nom_dob = document.getElementById('nom_dob').value;
	var nom_relation = document.getElementById('nom_relation').value;
	var nom_paddress = document.getElementById('nom_paddress').value;
	var nom_taddress = document.getElementById('nom_taddress').value;
	var cust_adhar = document.getElementById('cust_adhar').value;
	var cust_pan = document.getElementById('cust_pan').value;
	var cust_bp = document.getElementById('cust_bp').value;
	var cust_hvmcard = document.getElementById('cust_hvmcard').value;
	var cust_pan_file = document.getElementById('cust_pan_file').value;
	var cust_id_file = document.getElementById('cust_id_file').value;
	var restriction = $("input[name='restriction']:checked").val();
    var bank = document.getElementById('bank_name2').value;        
    var account = document.getElementById('account2').value;        
    var ifsc = document.getElementById('ifsc2').value;        
    var min_purchase = document.getElementById('min_purchase2').value;        
	
	
	
	
	if(sponser_id=="")
	{
		alert("Please Enter a Sponser ID");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_name=="" || $.trim(cust_name) == '')
	{
		alert("Customer Name Cannot be Empty");
		$("#req_btn").attr("onclick","validate_req();");
	}
	/**else if(cust_father_name=="" || $.trim(cust_father_name) == '')
	{
		alert("Please Enter Customer Father Name");
		$("#req_btn").attr("onclick","validate_req();");
	}
	**/
	else if(cust_mobile=="" || $.trim(cust_mobile) == '')
	{
		alert("Please Enter Customer Mobile Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	/**
	else if(cust_email=="" || $.trim(cust_email) == '')
	{
		alert("Please Enter Customer Email");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_dob=="" || $.trim(cust_dob) == '')
	{
		alert("Please Enter Customer Date of Birth");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_doj=="" || $.trim(cust_doj) == '')
	{
		alert("Please Enter Customer Date of Joining");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_paddress=="" || $.trim(cust_paddress) == '')
	{
		alert("Please Enter Customer Permanent Address");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_taddress=="" || $.trim(cust_taddress) == '')
	{
		alert("Please Enter Customer Temprory Address");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_paddress=="" || $.trim(cust_paddress) == '')
	{
		alert("Please Enter Customer Permanent Address");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_name=="" || $.trim(nom_name) == '')
	{
		alert("Please Enter Nominee Name");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_father_name=="" || $.trim(nom_father_name) == '')
	{
		alert("Please Enter Nominee Father Name");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_mobile=="" || $.trim(nom_mobile) == '')
	{
		alert("Please Enter Nominee Mobile Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_email=="" || $.trim(nom_email) == '')
	{
		alert("Please Enter Nominee Email");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_dob=="" || $.trim(nom_dob) == '')
	{
		alert("Please Enter Nominee Date of Birth");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_relation=="" || $.trim(nom_relation) == '')
	{
		alert("Please Enter Nominee Relation");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_paddress=="" || $.trim(nom_paddress) == '')
	{
		alert("Please Enter Nominee Permanent Address");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(nom_taddress=="" || $.trim(nom_taddress) == '')
	{
		alert("Please Enter Nominee Temprory Address");
		$("#req_btn").attr("onclick","validate_req();");
	}
	**/
	else if(cust_adhar=="" || $.trim(cust_adhar) == '')
	{
		alert("Please Enter Customer Adhar Card Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	/**
	else if(cust_pan=="" || $.trim(cust_pan) == '')
	{
		alert("Please Enter Customer PAN Card Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_bp=="" || $.trim(cust_bp) == '')
	{
		alert("Please Select Customer Business Plan");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_hvmcard=="" || $.trim(cust_hvmcard) == '')
	{
		alert("Please Enter HVM Card Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(cust_pan_file=="")
	{
		alert("Please Select Customer PAN Card");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if (cust_id_file=="")
	{
		alert("Please Select Customer ID Proof");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(bank=="" || $.trim(bank) == '')
	{
		alert("Please Enter Bank Name");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(account=="" || $.trim(account) == '')
	{
		alert("Please Enter Account Number");
		$("#req_btn").attr("onclick","validate_req();");
	}
	else if(ifsc=="" || $.trim(ifsc) == '')
	{
		alert("Please Enter IFSC Code");
		$("#req_btn").attr("onclick","validate_req();");
	}
	**/
	else
	{
		$(window).scrollTop(0);
		$("#loader-cover").show();
		
		
		
		
		
		var file1 = $("#cust_pan_file").prop("files")[0];
		var file2 = $("#cust_id_file").prop("files")[0];
		//var type1 = file1['type'];
		//var type2 = file2['type'];
		
	
			var formdata = new FormData();
			formdata.append("file1", file1);
			formdata.append("file2", file2);
			formdata.append("sponser_id", sponser_id);
			formdata.append("cust_name", cust_name);
			formdata.append("cust_father_name", cust_father_name);
			formdata.append("cust_mobile", cust_mobile);
			formdata.append("cust_email", cust_email);
			formdata.append("cust_dob", cust_dob);
			formdata.append("cust_doj", cust_doj);
			formdata.append("cust_paddress", cust_paddress);
			formdata.append("cust_taddress", cust_taddress);
			formdata.append("nom_name", nom_name);
			formdata.append("nom_father_name", nom_father_name);
			formdata.append("nom_mobile", nom_mobile);
			formdata.append("nom_email", nom_email);
			formdata.append("nom_dob", nom_dob);
			formdata.append("nom_relation", nom_relation);
			formdata.append("nom_paddress", nom_paddress);
			formdata.append("nom_taddress", nom_taddress);
			formdata.append("cust_adhar", cust_adhar);
			formdata.append("cust_pan", cust_pan);
			formdata.append("cust_bp", cust_bp);
			formdata.append("cust_hvmcard", cust_hvmcard);
			formdata.append("restriction", restriction);
			formdata.append("bank", bank);
			formdata.append("account", account);
			formdata.append("ifsc", ifsc);
			formdata.append("min_purchase", min_purchase);
			
			var ajax = new XMLHttpRequest();
			
			ajax.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				data = this.responseText;
				alert(data);
				
					if(data=="User Added to the Network")
					{
						$(".input-fields").val('');
						$("#req_btn").attr("onclick","validate_req();");
					}
				}
			};
			
			
			ajax.addEventListener("load", completeHandler, false);
			ajax.open("POST", "ajax/cust_application.php");
			ajax.send(formdata);
			
		
	}
}

function completeHandler(event){
	$("#loader-cover").hide();
	$(".input-fields").val('');
	$("#req_btn").attr("onclick","validate_req();");
}



function filter_ftr()
{
	var cid = $("#cid").val();
	var status = $("#ftr-status").val();
	var date = $("#ftr-date").val();
	
	$.post("ajax/ftr_filter.php",{cid:cid,status:status,date:date},function(data){
		$("#ftr-out").html(data);
	});
}

function open_ftr()
{
	$("#ftr-container").show();
	$("#stores-container").hide();
}

function close_ftr()
{
	$("#ftr-container").hide();
	$("#stores-container").show();
}


function set_btn()
{
	$("#btn-out").html('');
	$("#pc-output").html('');	
	var month = $("#pc-month").val();
	var year = $("#pc-year").val();
	
	if(month!="" && year!="")
	{
		$.post("ajax/get_btn.php",{month:month,year:year},function(data){
			if(data=="new")
			{
				$("#btn-out").html('<div class="pc-btn" onclick="cal_profit(1);" id="cal">Calculate</div>');
			}
			else if(data=='re')
			{
				$("#btn-out").html('<div class="pc-btn" onclick="recal_profit(1);" id="recal" style="width:150px;float:left;margin-left:50px;">Re-Calculate</div><div class="pc-btn" style="width:150px;float:left;margin-left:10px;" onclick="download_excel();">Download Excel</div><br>');
			}
			else
			{
				$("#btn-out").html('');
				alert(data);
			}
		});
	}
}


function cal_profit(id)
{
	$("#cal").hide();
	var month = $("#pc-month").val();
	var year = $("#pc-year").val();
	
	if(month=="")
	{
		alert("Please Select a Month First");
		$("#cal").show();
	}
	else if(year=="")
	{
		alert("Please Select a Year First");
		$("#cal").show();
	}
	else
	{
	$.post("ajax/cal_profit.php",{month:month,year:year,id:id},function(data){
		
		data_array = data.split('#');
		next_id = data_array[0];
		next_name = data_array[1];
		next_cust = data_array[2];
		
		if(next_id=="")
		{
			$("#pc-output").html('Calculation Finished');	
			
			$("#btn-out").html('<div class="pc-btn" style="width:150px;margin-left:10px;" onclick="download_excel();">Download Excel</div><br>');
			
			
		}
		else
		{
		$("#pc-output").html('Calculating profit for '+next_name+'('+next_cust+')...');	cal_profit(next_id);
		}
	});
	}
}



function recal_profit(id)
{
	$("#btn-output").html('');
	var month = $("#pc-month").val();
	var year = $("#pc-year").val();
	
	if(month=="")
	{
		alert("Please Select a Month First");
		$("#recal").show();
	}
	else if(year=="")
	{
		alert("Please Select a Year First");
		$("#recal").show();
	}
	else
	{
	$.post("ajax/recal_profit.php",{month:month,year:year,id:id},function(data){
		
		data_array = data.split('#');
		next_id = data_array[0];
		next_name = data_array[1];
		next_cust = data_array[2];
		
		if(next_id=="")
		{
			$("#pc-output").html('Calculation Finished');	
			$("#btn-out").html('<div class="pc-btn" style="width:150px;margin-left:10px;" onclick="download_excel();">Download Excel</div><br>');
		}
		else
		{
		$("#pc-output").html('Calculating Profit for '+next_name+'('+next_cust+')...');	recal_profit(next_id);
		}
	});
	}
}


function download_excel()
{
	var month = $("#pc-month").val();
	var year = $("#pc-year").val();
	
	if(month=="")
	{
		alert("Please Select a Month First");
	}
	else if(year=="")
	{
		alert("Please Select a Year First");
	}
	else
	{
		$("#pc-output").html('<img src="./images/database_loader.gif" style="width:80%;height:100%;">');
		$.post("ajax/download_excel.php",{month:month,year:year},function(data){
			$("#pc-output").html(data);
		});
	}
}

function open_pc()
{
	
	$("#stores-container").hide();
	$("#pc-container").show();
}

function close_pc()
{
	
	$("#stores-container").show();
	$("#pc-container").hide();
}

function fetch_profit()
{
	var cust_id = $("#cust_id").val();
	var month = $("#pt-month").val();
	var year = $("#pt-year").val();
	
	if(cust_id=="")
	{
		alert("Please Enter a Customer ID");
	}
	else if(month=="")
	{
		alert("Please Select a Month");
	}
	else if(year=="")
	{
		alert("Please Select a Year");
	}
	else
	{
		$.post("ajax/fetch_profit.php",{cust_id:cust_id,month:month,year:year},function(data){
			if(data=="Invalid Customer ID")
			{
				alert(data);
			}
			else if(data=="Invalid Year Selected")
			{
				alert(data);
			}
			else if(data=='Invalid Month Selected')
			{
				alert(data);
			}
			else if(data=='Not Calculated')
			{
				alert(data);
			}
			else
			{
				$("#pt-out").html(data);
			}
		});
	}
}


function empty_btn()
{
	$("#pt-btn").remove();
}


function transfer_profit()
{
	$("#pt-btn").attr("onclick","");
	var cust_id = $("#cust_id").val();
	var month = $("#pt-month").val();
	var year = $("#pt-year").val();
	
	if(cust_id=="")
	{
		alert("Please Enter a Customer ID");
	}
	else if(month=="")
	{
		alert("Please Select a Month");
	}
	else if(year=="")
	{
		alert("Please Select a Year");
	}
	else
	{
		$.post("ajax/transfer_profit.php",{cust_id:cust_id,month:month,year:year},function(data){
			
			if(data=='Profit Transfered')
			{
				alert(data);
			}
			else
			{
				alert(data);
			}
			
			
		});
	}
}


function open_pt()
{
	$("#pt-container").show();
	$("#stores-container").hide();
}

function close_pt()
{
	$("#pt-container").hide();
	$("#stores-container").show();
}