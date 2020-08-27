function reject_req(e)
{
	$(e).attr("onclick","");
	var eid = $(e).attr("id");
	var eid_array = eid.split("-");
	var req_id = eid_array[1];
	$("#trans-"+req_id).attr("onclick","");
	$("#trans-"+req_id).css("background-color","grey");
	
	$.post("ajax/reject_req.php",{req_id:req_id},function(data){
		
		if(data=='success')
		{
		$(e).html('Rejected');
		$(e).css("background-color","grey");
		}
		else
		{
			alert(data);
		}
	});
}


function trans(e)
{
	$(e).attr("onclick","");
	var eid = $(e).attr("id");
	var eid_array = eid.split("-");
	var req_id = eid_array[1];
	
	$("#reject-"+req_id).attr("onclick","");
			$("#reject-"+req_id).css("background-color","grey");
	
	
	$.post("ajax/trans.php",{req_id:req_id},function(data){
		if(data=='success')
		{
			
			$(e).css("background-color","grey");
			$(e).html("Transfered");
		}
		else
		{
			$("#reject-"+req_id).attr("onclick","reject_req(this);");
			$("#reject-"+req_id).css("background-color","#2a3b4f");
			$(e).attr("onclick","trans(this);");
			
			alert(data);
		}
	});
}


function open_ftr()
{
	$("#noti-container").hide();
	$("#ftr-container").show();
}

function close_ftr()
{
	$("#noti-container").show();
	$("#ftr-container").hide();
}