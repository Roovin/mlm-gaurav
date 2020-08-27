$(document).ready(function(){
	
	$("#addstore-btn").click(function(){
		$("#stores-container").hide();
		$("#add-store-container").show();
	});
	
	$("#storedata-btn").click(function(){
		$("#stores-container").hide();
		$("#store-database-container").show();
	});
	
	$(".back-btn").click(function(){
		$(".back").hide();
		$("#stores-container").show();
	});
	
});


function add_store()
{
	$("#adds-btn").attr("onclick","");
	var distri_id = document.getElementById('add-store-distri-name').value;
	var owner_name = document.getElementById('add-store-owner-name').value;
	var owner_phone = document.getElementById('add-store-owner-phone').value;
	var owner_address = document.getElementById('add-store-owner-address').value;
	var store_state = document.getElementById('add-store-store-state').value;
	var store_city = document.getElementById('add-store-store-city').value;
	var store_address = document.getElementById('add-store-store-address').value;
	var profit_bv = document.getElementById('add-store-profit-bv').value;
	var security_amount = document.getElementById('add-store-security-amount').value;
	var password = document.getElementById('add-store-password').value;
	var network_id = document.getElementById('add-store-network-id').value;
	
	if($.trim(distri_id) == '')
	{
		alert("Please Select a Distributor");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(owner_name) == '')
	{
		alert("Please Enter Owner Name");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(owner_phone) == '')
	{
		alert("Please Enter Owner's Phone number");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if(isNaN(owner_phone))
	{
		alert("Owner's Phone Number is Invalid");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(owner_address) == '')
	{
		alert("Please Enter Owner's Address");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(store_state) == '')
	{
		alert("Please Enter Store's State");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(store_city) == '')
	{
		alert("Please Enter Store's City");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(store_address) == '')
	{
		alert("Please Enter Store's Address");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(profit_bv) == '')
	{
		alert("Please Enter a Value for Profit on Business Volume");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if(isNaN(profit_bv))
	{
		alert("Invalid value for Profit on Business Volume");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(security_amount) == '')
	{
		alert("Please Enter a value for Security Amount");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if(isNaN(security_amount))
	{
		alert("Invalid value for Security Amount");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(password) == '')
	{
		alert("Please Enter Password");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else if($.trim(network_id) == '')
	{
		alert("Please Enter Network ID");
		$("#adds-btn").attr("onclick","add_store();");
	}
	else
	{
		$("#add-store-loader").html('<div class="load_text">Processing Please Wait..</div><br><img src="./images/database_loader.gif" style="width:200px;">');
		$("#add-store-loader").show();
		$.post("ajax/add_store.php",{distri_id:distri_id,owner_name:owner_name,owner_phone:owner_phone,owner_address:owner_address,store_state:store_state,store_city:store_city,store_address:store_address,profit_bv:profit_bv,security_amount:security_amount,password:password,network_id:network_id},function(data){
			$("#add-store-loader").html('<div class="load_text"><br><br><br><b>Store Added</b></div>');
			
			$(".add-store-input").val('');
			$("#add-store-loader").show().delay(2000).fadeOut();
			
			$("#adds-btn").attr("onclick","add_store();");
			
		});
	}
}



function load_edit_store(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var database_id = element_array[1];
	$("#edit-store-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Processing Please Wait....</div><br><img src="./images/database_loader.gif" style="width:200px;">');
	$("#edit-store-container").show();
	$.post("ajax/load_edit_store.php",{database_id:database_id},function(data){
		$("#edit-store-container").html(data);
		$("#edit-store-container").show();
	});
}


function updatestore(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var database_id = element_array[1];
	var distri_id = document.getElementById('edit-store-distri').value;
	var active_status = $("#edit-store-account-stat").val();
	var owner_name = document.getElementById('edit-store-owner-name').value;
	var owner_phone = document.getElementById('edit-store-owner-phone').value;
	var owner_address = document.getElementById('edit-store-owner-address').value;
	var store_state = document.getElementById('edit-store-store-state').value;
	var store_city = document.getElementById('edit-store-store-city').value;
	var store_address = document.getElementById('edit-store-store-address').value;
	var profit_bv = document.getElementById('edit-store-profit-bv').value;
	var security_amount = document.getElementById('edit-store-security-amount').value;
	var password = document.getElementById('edit-store-password').value;
	var network_id = document.getElementById('edit-store-network-id').value;
	
	if($.trim(distri_id) == '')
	{
		alert("Please Select a Distributor");
	}
	else if($.trim(owner_name) == '')
	{
		alert("Please Enter Owner Name");
	}
	else if($.trim(owner_phone) == '')
	{
		alert("Please Enter Owner's Phone number");
	}
	else if(isNaN(owner_phone))
	{
		alert("Owner's Phone Number is Invalid");
	}
	else if($.trim(owner_address) == '')
	{
		alert("Please Enter Owner's Address");
	}
	else if($.trim(store_state) == '')
	{
		alert("Please Enter Store's State");
	}
	else if($.trim(store_city) == '')
	{
		alert("Please Enter Store's City");
	}
	else if($.trim(store_address) == '')
	{
		alert("Please Enter Store's Address");
	}
	else if($.trim(profit_bv) == '')
	{
		alert("Please Enter a Value for Profit on Business Volume");
	}
	else if(isNaN(profit_bv))
	{
		alert("Invalid value for Profit on Business Volume");
	}
	else if($.trim(security_amount) == '')
	{
		alert("Please Enter a value for Security Amount");
	}
	else if(isNaN(security_amount))
	{
		alert("Invalid value for Security Amount");
	}
	else if($.trim(password) == '')
	{
		alert("Please Enter Password");
	}
	else if($.trim(network_id) == '')
	{
		alert("Please Enter Network ID");
	}
	else
	{
		$("#edit-store-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Processing Please Wait....</div><br><img src="./images/database_loader.gif" style="width:200px;">');
		
		$.post("ajax/update_store.php",{database_id:database_id,distri_id:distri_id,owner_name:owner_name,owner_phone:owner_phone,owner_address:owner_address,store_state:store_state,store_city:store_city,store_address:store_address,profit_bv:profit_bv,security_amount:security_amount,password:password,active_status:active_status,network_id:network_id},function(data){
			$("#edit-store-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Store Updated</div>');
			
			$("#edit-store-container").show().delay(2000).fadeOut();
			
		});
	}	
}



function update_cancel()
{
	$("#edit-store-container").hide();
}



function filter_store()
{
	var store_id = document.getElementById('filter-store-id').value;
	var owner_name = document.getElementById('filter-owner-name').value;
	var owner_phone = document.getElementById('filter-owner-number').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;
	$("#data-loader-image").show();
	$.post("ajax/filter_store.php",{owner_name:owner_name,owner_phone:owner_phone,store_city:store_city,distri_id:distri_id,active_status:active_status,store_id:store_id},function(data){
		
		$.post("ajax/store_filter_total.php",{owner_name:owner_name,owner_phone:owner_phone,store_city:store_city,distri_id:distri_id,active_status:active_status,store_id:store_id},function(data2){
			
			var new_next_value = "next-0-10-"+data2;
			$("#filter_next_btn").attr("value",new_next_value);
			var new_prev_value = "prev-0-10-"+data2;
			$("#filter_prev_btn").attr("value",new_prev_value);
			$("#filter_next_btn").css("color","#2a3b4f");
			$("#filter_prev_btn").css("color","grey");
			$("#store-filter-output").html(data);
			$("#data-loader-image").hide();
		});
		
		
	});
	
}


function paging_next(element)
{
	var next_id = $(element).attr("value");
	var next_array = next_id.split("-");
	var upper_limit = next_array[1];
	var lower_limit = next_array[2];
	var total_elements = next_array[3];
	var owner_name = document.getElementById('filter-owner-name').value;
	var owner_phone = document.getElementById('filter-owner-number').value;
	var store_id = document.getElementById('filter-store-id').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;

	$("#data-loader-image").show();
	$.post("ajax/store_paging_next.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,owner_name:owner_name,owner_phone:owner_phone,store_id:store_id,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_next_btn").attr("value",new_id);
		$("#store-filter-output").html(data);
		
		var new_prev_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_prev_btn").attr("value",new_prev_id);
		$("#filter_prev_btn").css("color","#2a3b4f");
		
		}
		else
		{
			$(element).css("color","grey");
		}
		
		$("#data-loader-image").hide();
	});
}


function paging_prev(element)
{
	var prev_id = $(element).attr("value");
	var prev_array = prev_id.split("-");
	var upper_limit = prev_array[1];
	var lower_limit = prev_array[2];
	var total_elements = prev_array[3];
	var owner_name = document.getElementById('filter-owner-name').value;
	var owner_phone = document.getElementById('filter-owner-number').value;
	var store_id = document.getElementById('filter-store-id').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;
	
	$("#data-loader-image").show();
	$.post("ajax/store_paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,owner_name:owner_name,owner_phone:owner_phone,store_id:store_id,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_prev_btn").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_next_btn").attr("value",new_next_id);
		$("#filter_next_btn").css("color","#2a3b4f");
		
		$("#store-filter-output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image").hide();
	});
}



function fetch_bills()
{
	
	var date = document.getElementById('date').value;
	var store = document.getElementById('store').value;
	
	if(date=="")
	{
		 $('#counter option').prop('selected', function() {
        return this.defaultSelected;
		});
		
		alert("Please Select a Date First");
	}
	else
	{
	
	
	
	$.post("ajax/fetch_bills.php",{date:date,store:store},function(data){
		$("#coup-output").html(data);
	});
	}
}



function fetch_billpro(ele)
{
	var ele_id = $(ele).attr("id");
	var ele_array = ele_id.split("-");
	var billn = ele_array[1];
	
	$.post("ajax/fetchbill.php",{billn:billn},function(data){
		$("#bill-cover").html(data);
		$("#bill-container").show();
	});
}

function close_bill()
{
	$("#bill-container").hide();
	$("#bill-cover").html('');
}


function fetch_counterdata()
{
	var date = document.getElementById('date').value;
	var store = document.getElementById('store').value;
	
	
	if(date=="")
	{
		
	}
	else
	{
	$.post("ajax/counterdata.php",{date:date,store:store},function(data){
		data_array = data.split("-");
		var t_amount = data_array[0];
		var hvm_card = data_array[1];
		var dc_card = data_array[2];
		var paytm = data_array[3];
		var recharge = data_array[4];
		var today_cash = data_array[5];
		var paid = data_array[6];
		var balance = data_array[7];
		
		$("#total_sale").html(t_amount);
		$("#hvmcard_p").html(hvm_card);
		$("#dc_card").html(dc_card);
		$("#paytm_p").html(paytm);
		$("#recharge").html(recharge);
		$("#today_cash").html(today_cash);
		$("#tcash").val(today_cash);
		$("#paid").html(paid);
		$("#paid2").val(paid);
		$("#cash_on_counter").html(balance);
		$("#balance").val(balance);
	
	});
	}
}


function open_coup()
{
	$("#stores-container").hide();
	$("#coup-container").show();
}

function close_coup()
{
	$("#coup-container").hide();
	$("#stores-container").show();
}


function update_balance(e)
{
	var max_payment = $("#balance").val();
		var prepaid = parseInt($("#paid2").val());
		var store_payment = $("#store_payment").val();
		var payment = parseInt(store_payment) + prepaid;
		
		var balance = parseInt($("#tcash").val()) - parseInt(payment);
	if(e.keyCode=="13")
	{
		if(isNaN(store_payment))
		{
			alert("Please Enter a Valid Payment");
		}
		else if(store_payment=="")
		{
			alert("Please Enter Payment");
		}
		else
		{
			var store = $("#store").val();
			var date = $("#date").val();
			var today = $("#tcash").val();
			$.post("ajax/update_store_payment.php",{store_payment:store_payment,store:store,date:date,today:today},function(data){
				data_array = data.split("-");
				paid = data_array[0];
				balance = data_array[1];
				$("#paid2").val(paid);
				$("#balance").val(balance);
				alert("Payment Updated");
				$("#store_payment").val('');
			});
		}
	}
	else
	{
		
		if(isNaN(store_payment))
		{
			alert("Invalid value");
		}
		else
		{
			if(parseInt(payment)>=parseInt($("#tcash").val()))
			{
				$("#paid").html(max_payment);
				$("#store_payment").val(max_payment);
				$("#cash_on_counter").html(0);
			}
			else
			{
				
				$("#paid").html(payment);
				$("#cash_on_counter").html(balance);
				
			}
		}
		
	}
}


function delete_row(e)
{
	var e_id = $(e).attr("id");
	var e_array = e_id.split("-");
	var report_id = e_array[1];
	
	$("#tallyrow-"+report_id).hide();
	$.post("ajax/del_rep.php",{report_id:report_id},function(data){
		alert(data);
	})
}


function open_tally()
{
	$("#stores-container").hide();
	$("#tally-container").show();
}

function close_tally()
{
	$("#tally-container").hide();
	$("#stores-container").show();
}