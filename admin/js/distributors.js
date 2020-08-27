function close_edit_his1()
{
	$("#edit-trans-his-container").hide();
}


function addcp_close1()
{
	$("#addcp-container").hide();
}


function add_distri1()
{
	$("#distri-container").hide();
		$("#add-distri-container").show();
}


function trans_his1()
{
	$("#distri-container").hide();
	$("#transfer-his-container").show();
}

function back1()
{
	$(".back").hide();
		$("#distri-container").show();
}

function close_confirm1()
{
	$("#delete-confirmation").hide();
}

function close_confirm_challan1()
{
	$("#delete_chal_confirmation").hide();
}

function distri_database1()
{
	$("#distri-container").hide();
		$("#distri-database-container").show();
}

function cancel_transfer1()
{
	$("#transfer-container").hide();
}

function close_stock_check1()
{
	$("#check-stock-container").hide();
		$("#check-stock-product-code").val('');
		$("#check-stock-output").html('');
}

function add_distri()
{
	$("#addd-btn").attr("onclick","");
	
	var owner_name = document.getElementById('add-distri-owner-name').value;
	var owner_phone = document.getElementById('add-distri-owner-phone').value;
	var owner_address = document.getElementById('add-distri-owner-address').value;
	var store_state = document.getElementById('add-distri-store-state').value;
	var store_city = document.getElementById('add-distri-store-city').value;
	var store_address = document.getElementById('add-distri-store-address').value;
	var profit_bv = document.getElementById('add-distri-profit-bv').value;
	var security_amount = document.getElementById('add-distri-security-amount').value;
	var password = document.getElementById('add-distri-password').value;
	
	
	if($.trim(owner_name) == '')
	{
		alert("Please Enter Owner Name");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(owner_phone) == '')
	{
		alert("Please Enter Owner's Phone number");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if(isNaN(owner_phone))
	{
		alert("Owner's Phone Number is Invalid");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(owner_address) == '')
	{
		alert("Please Enter Owner's Address");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(store_state) == '')
	{
		alert("Please Enter Store's State");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(store_city) == '')
	{
		alert("Please Enter Store's City");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(store_address) == '')
	{
		alert("Please Enter Store's Address");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(profit_bv) == '')
	{
		alert("Please Enter a Value for Profit on Business Volume");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if(isNaN(profit_bv))
	{
		alert("Invalid value for Profit on Business Volume");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(security_amount) == '')
	{
		alert("Please Enter a value for Security Amount");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if(isNaN(security_amount))
	{
		alert("Invalid value for Security Amount");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else if($.trim(password) == '')
	{
		alert("Please Enter Password");
		$("#addd-btn").attr("onclick","add_distri();");
	}
	else
	{
		$("#add-distri-loader").html('<div class="load_text">Processing Please Wait..</div><br><img src="./images/database_loader.gif" style="width:200px;">');
		$("#add-distri-loader").show();
		$.post("ajax/add_distri.php",{owner_name:owner_name,owner_phone:owner_phone,owner_address:owner_address,store_state:store_state,store_city:store_city,store_address:store_address,profit_bv:profit_bv,security_amount:security_amount,password:password},function(data){
			$("#add-distri-loader").html('<div class="load_text"><br><br><br><b>Distributor Added</b></div>');
			
			$(".add-distri-input").val('');
			$("#add-distri-loader").show().delay(2000).fadeOut();
			$("#addd-btn").attr("onclick","add_distri();");
		});
	}
}


function load_edit_distri(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var database_id = element_array[1];
	$("#edit-distri-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Processing Please Wait....</div><br><img src="./images/database_loader.gif" style="width:200px;">');
	$("#edit-distri-container").show();
	$.post("ajax/load_edit_distri.php",{database_id:database_id},function(data){
		$("#edit-distri-container").html(data);
		$("#edit-distri-container").show();
	});
}


function updatedistri(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var database_id = element_array[1];
	var active_status = $("#edit-distri-account-stat").val();
	var owner_name = document.getElementById('edit-distri-owner-name').value;
	var owner_phone = document.getElementById('edit-distri-owner-phone').value;
	var owner_address = document.getElementById('edit-distri-owner-address').value;
	var store_state = document.getElementById('edit-distri-store-state').value;
	var store_city = document.getElementById('edit-distri-store-city').value;
	var store_address = document.getElementById('edit-distri-store-address').value;
	var profit_bv = document.getElementById('edit-distri-profit-bv').value;
	var security_amount = document.getElementById('edit-distri-security-amount').value;
	var password = document.getElementById('edit-distri-password').value;
	
	
	if($.trim(owner_name) == '')
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
	else
	{
		$("#edit-distri-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Processing Please Wait....</div><br><img src="./images/database_loader.gif" style="width:200px;">');
		
		$.post("ajax/update_distri.php",{database_id:database_id,owner_name:owner_name,owner_phone:owner_phone,owner_address:owner_address,store_state:store_state,store_city:store_city,store_address:store_address,profit_bv:profit_bv,security_amount:security_amount,password:password,active_status:active_status},function(data){
			$("#edit-distri-container").html('<div class="load_text" style="font-size:30px;"><br><br><br>Distributor Updated</div>');
			
			$("#edit-distri-container").show().delay(2000).fadeOut();
			
		});
	}	
}


function update_cancel()
{
	$("#edit-distri-container").hide();
}







function generate_challan(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	distri_database_id = element_array[1];
	
	$.post("ajax/fetch_distri_address.php",{distri_database_id:distri_database_id},function(data){
		
		var data_array = data.split("&");
		var distri_address = data_array[0];
		var distri_id = data_array[1];
		$("#distri-data").html('<div id="distri-data"><span style="font-size:13px"><b><input type="hidden" id="transdistriid" value="'+distri_id+'">'+distri_id+'</b></span><div style="font-size:10px;margin-top:5px;"><b>'+distri_address+'</b></div>');
		
		$("#transfer-container").show();
		
	});
}



function fetch_product(e)
{
	if(e.keyCode=='13')
	{
		$("#loader_img").show();
		var barcode = $("#bar-input").val();
		if(barcode=="")
		{
			alert("Please Scan a Barcode");
			$("#loader_img").hide();
		}
		else
		{
			$.post("ajax/fetch_product.php",{barcode:barcode},function(data){
				
				if(data=="Out of Stock")
				{
					alert(data);
					$("#loader_img").hide();
					$("#bar-input").val('');
				}
				else if(data=="Invalid Barcode")
				{
					alert(data);
					$("#loader_img").hide();
					$("#bar-input").val('');
				}
				else if(data=="more")
				{
					$.post("ajax/multi_stock.php",{barcode:barcode},function(data3){
						$("#ss-output").html(data3);
						$("#stock-selection").show();
						$("#loader_img").hide();
					});
				}
				else
				{
				var data_array = data.split("-");
				var stock_id = data_array[1];
				var product_id = data_array[3];
				var rows = $('.tranfer-row').length;
				var allow = "yes";
				
				for(var i=1;i<=rows-1;i++)
				{
					var cstock_id = $("#stockid-"+i).val();
					var cproduct_id = $("#proid-"+i).val();
					
					if(cstock_id==stock_id && cproduct_id==product_id)
					{
						allow = "no";
						break;
					}
					
					allow=="yes";
				}
				
				if(allow=="yes")
				{
				$.post("ajax/create_row.php",{stock_id:stock_id,product_id:product_id,rows:rows},function(data2){
					$("#transfer-output").append(data2);
					$('.tranfer-row').css("background-color","white");
					$('.tranfer-row').css("color","black") ;
					$("#row-"+rows).css("background-color","grey");
					$("#row-"+rows).css("color","white");
					var box_value = $("#tq-"+i).val();
					$("#tq-"+rows).val('');
					$("#tq-"+rows).focus();
					$("#tq-"+rows).val(box_value);
					$("#loader_img").hide();
					$("#bar-input").val('');
				});
				}
				else
				{
					$('.tranfer-row').css("background-color","white");
					$('.tranfer-row').css("color","black") ;
					$("#row-"+i).css("background-color","grey");
					$("#row-"+i).css("color","white");
					var box_value = $("#tq-"+i).val();
					$("#tq-"+i).val('');
					$("#tq-"+i).focus();
					$("#tq-"+i).val(box_value);
					$("#loader_img").hide();
					$("#bar-input").val('');
				}
				}	
			});
			
		}
	}
}


function create_row(element)
{
	$("#loader_img").show();
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var number = element_array[1];
	var stock_id = $("#ss_stockid-"+number).val();
	var product_id = $("#ss_proid-"+number).val();
	var rows = $('.tranfer-row').length;
	var allow = "yes";
	
	for(var i=1;i<=rows-1;i++)
	{
	var cstock_id = $("#stockid-"+i).val();
	var cproduct_id = $("#proid-"+i).val();
					
		if(cstock_id==stock_id && cproduct_id==product_id)
		{
			allow = "no";
			break;
		}
					
		allow=="yes";
	}
				
	if(allow=="yes")
	{
		$.post("ajax/create_row.php",{stock_id:stock_id,product_id:product_id,rows:rows},function(data2){
					$("#transfer-output").append(data2);
					$('.tranfer-row').css("background-color","white");
					$('.tranfer-row').css("color","black") ;
					$("#row-"+rows).css("background-color","grey");
					$("#row-"+rows).css("color","white");
					var box_value = $("#tq-"+rows).val();
					$("#tq-"+rows).val('');
					$("#tq-"+rows).focus();
					$("#tq-"+rows).val(box_value);
					$("#stock-selection").hide();
					$("#loader_img").hide();
					$("#bar-input").val('');
				});
	}
	else
	{
					$('.tranfer-row').css("background-color","white");
					$('.tranfer-row').css("color","black") ;
					$("#row-"+i).css("background-color","grey");
					$("#row-"+i).css("color","white");
					var box_value = $("#tq-"+i).val();
					$("#tq-"+i).val('');
					$("#tq-"+i).focus();
					$("#tq-"+i).val(box_value);
					$("#stock-selection").hide();
					$("#loader_img").hide();
					$("#bar-input").val('');
	}
}



function select_row(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var row_number = element_array[1];
		
	$('.tranfer-row').css("background-color","white");
	$('.tranfer-row').css("color","black") ;
	$("#row-"+row_number).css("background-color","grey");
	$("#row-"+row_number).css("color","white");
}


function update_stock(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var row_number = element_array[1];
	
	var stock_input = $("#tq-"+row_number).val();
	var actual_stock = $("#actual_stock-"+row_number).val();
	var dis_stock = $("#dis_stock-"+row_number).text();
	
	if(isNaN(stock_input))
	{
		$("#tq-"+row_number).val('0');
		alert("Please Enter a Valid Value");
	}
	else if(parseInt(stock_input)>=parseInt(actual_stock))
	{
		$("#dis_stock-"+row_number).html('0');
		$("#tq-"+row_number).val(actual_stock);
	}
	else
	{
		var dis = parseInt(actual_stock) - parseInt(stock_input);
		$("#dis_stock-"+row_number).html(dis);
	}
	
	
}


function change_cursor(event)
{
	if(event.keyCode=='13')
	{
		$("#bar-input").focus();
	}
}




function close_ss()
{
	$("#ss-output").html('');
	$("#stock-selection").hide();
}


function transfer_stock()
{
	$("#transfer_stock").attr("onclick","");
	$("#cloader").show();
	var transfer_date = $("#transdate").val();
	var tampoo_number = $("#transtampoonum").val();
	var driver_phone = $("#transdrivernum").val();
	var distri_id = $("#transdistriid").val();
	if(transfer_date=="")
	{
		alert("Please Select a Date");
		$("#transfer_stock").attr("onclick","transfer_stock();");
		$("#cloader").hide();
	}
	else if(tampoo_number=="")
	{
		alert("Please Enter Tampoo Number");
		$("#transfer_stock").attr("onclick","transfer_stock();");
		$("#cloader").hide();
	}
	else if(driver_phone=="")
	{
		alert("Please Enter Driver Phone Number");
		$("#transfer_stock").attr("onclick","transfer_stock();");
		$("#cloader").hide();
	}
	else
	{
		var rows = $('.tranfer-row').length;
		for(var i=1;i<=parseInt(rows)-1;i++)
		{
			var quantity = $("#tq-"+i).val();
			if(quantity=="")
			{
				$("#tq-"+i).val('0');
				var actual_stock = $("#actual_stock-"+i).val();
				$("#dis_stock-"+i).html(actual_stock);
				
			}
			
		}
		
		
		var pid_array = new Array();
		var stockid_array = new Array();
		var tstock = new Array();
		var barcode_array = new Array();
		
		for(var x=1;x<=parseInt(rows)-1;x++)
		{
			quantity = $("#tq-"+x).val();
			pid = $("#proid-"+x).val();
			stockid = $("#stockid-"+x).val();
			barcode = $("#barcode-"+x).text();
			
			if(quantity>0)
			{
				pid_array.push(pid);
				stockid_array.push(stockid);
				tstock.push(quantity);
				barcode_array.push(barcode);
			}
		}
		
		
		if(pid_array.length<=0)
		{
			alert("Please Select Atleast One Product");
			$("#cloader").hide();
			$("#transfer_stock").attr("onclick","transfer_stock();");
		}
		else
		{
			$.post("ajax/transfer_stock.php",{stock_id:stockid_array,product_id:pid_array,quantity:tstock,transfer_date:transfer_date,tampoo_number:tampoo_number,driver_phone:driver_phone,barcode:barcode_array,distri_id:distri_id},function(data){
				
				var data_array = data.split("-");
				var done = data_array[0];
				var chal_num = data_array[2];
				
				if(done=="Done")
				{
					
					var distri_data = $("#distri-data").text();
					var transdate = $("#transdate").val();
					var trans_tampoo = $("#transtampoonum").val();
					var transdrivernum = $("#transdrivernum").val();
					
					$("#challan-output").html('<div class="transfer-box"><div class="transfer-heading"><b>Delivery Challan</b></div><div class="transfer-box2"><div class="transfer-sub-box" style="width:299px;border-right:1px solid black;"><div class="transfer-data"><span style="color:grey;font-size:14px;"><b>Company Details</b></span><br><span style="font-size:13px"><b>HVM Retails (P) Ltd.</b></span><div style="font-size:10px;margin-top:5px;"><b>H.NO.80/5, BLOCK-G,NR-EKTA GROUP,KRISHNA CHOWK, ASHOK VIHAR PH-3,GURGAON Gurgaon - 122001 Haryana - India</b></div><div style="font-size:10px;"><b>GST NUMBER 22AAAAA0000A1Z5</b></div></div><div class="transfer-data"><span style="color:grey;font-size:14px;"><b>Delivering To</b></span><br><div id="distri-data">'+distri_data+'</div></div></div><div class="transfer-sub-box" style="width:300px;"><div class="transfer-data2">Transfer Date:'+transdate+'</div><div class="transfer-data2" style="height:49px;">challan Number:chal-'+chal_num+'</div><div class="transfer-data2">Tampoo Number:'+trans_tampoo+'</div><div class="transfer-data2">Driver PH:'+transdrivernum+'</div></div></div></div>');
					
					$("#challan-output").append('<div class="transfer-table" style="width:980px;"><div class="tranfer-row"><div class="tranfer-data" style="width:70px;"><b>PID</b></div><div class="tranfer-data" style="width:250px;"><b>Product Name</b></div><div class="tranfer-data" style="width:120px;"><b>Batch No.</b></div><div class="tranfer-data" style="width:120px;"><b>Barcode</b></div><div class="tranfer-data" style="width:100px;"><b>MRP</b></div><div class="tranfer-data" style="width:60px;"><b>DIS(%)</b></div><div class="tranfer-data" style="width:80px;"><b>DIS(AMT)</b></div><div class="tranfer-data" style="width:80px;"><b>Sale Price</b></div><div class="tranfer-data" style="width:90px;border-right:0px;"><b>Quantity</b></div>');
					
					var rows = $('.tranfer-row').length;
					
					for(var i=1;i<=rows-1;i++)
					{
						var product_id = $("#proid-"+i).val();
						var pname = $("#pname-"+i).text();
						var bnum = $("#bnum-"+i).text();
						var barcode = $("#barcode-"+i).text();
						var mrp = $("#mrp-"+i).text();
						var disper = $("#disper-"+i).text();
						var disamt = $("#disamt-"+i).text();
						var sp = $("#sp-"+i).text();
						var quantity = $("#tq-"+i).val();
						
						if(quantity>0)
						{
							$("#challan-output").append('<div class="tranfer-row" style="width:980px;"><div class="tranfer-data" style="width:70px;">'+product_id+'</div><div class="tranfer-data" style="width:250px;">'+pname+'</div><div class="tranfer-data" style="width:120px;">'+bnum+'</div><div class="tranfer-data" style="width:120px;">'+barcode+'</div><div class="tranfer-data" style="width:100px;">'+mrp+'</div><div class="tranfer-data" style="width:60px;">'+disper+'</div><div class="tranfer-data" style="width:80px;">'+disamt+'</div><div class="tranfer-data" style="width:80px;">'+sp+'</div><div class="tranfer-data" style="width:90px;border-right:0px;">'+quantity+'</div></div>')
						}
						
						
						
					}
					
					
					
					$("#challan-output").append('</div>');
					$("#challan-output").append('<br><br><br><div class="transfer-data-btn" onclick="print_challan2();">Print</div>&nbsp;&nbsp;<div class="transfer-data-btn" id="cancel_transfer" onclick="close_challan();">Close</div>');
					
					$("#cloader").hide();
					$("#transfer_stock").attr("onclick","transfer_stock();");
					$("#challan-output").show();
				}
				else
				{
					alert(data);
					$("#cloader").hide();
					$("#transfer_stock").attr("onclick","transfer_stock();");
				}
			});
		}
		
		
		
		
	}
	
}


function close_challan()
{
	$("#challan-output").html('');
	$("#challan-output").hide();
	$("#transfer-output").html('');
	$(".tranfer-input").val('');
	$("#distri-data").html('');
	$("#transfer-container").hide();
}




function checkdistri_stock(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	distri_database_id = element_array[1];
	
	$("#checkstocksubmit").attr("value",distri_database_id);
	$("#check-stock-container").show();
	
	$.post("ajax/check_distri_id.php",{distri_database_id:distri_database_id},function(data){
		$("#check-stock-heading").html("Checkout "+data+" Stock");
	});
}


function check_stock(element)
{
	var distri_database_id = $(element).attr("value");
	var product_id = $("#check-stock-product-code").val();
	
	if($.trim(product_id)=='')
	{
		alert("Please Enter Product Code");
	}
	else
	{
	
	$.post("ajax/check_stock.php",{database_id:distri_database_id,product_id:product_id},function(data){
		$("#check-stock-output").html(data);
	});
	}
}


function filter_distri()
{
	var owner_name = document.getElementById('filter-owner-name').value;
	var owner_phone = document.getElementById('filter-owner-number').value;
	var store_state = document.getElementById('filter-store-state').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;
	$("#data-loader-image").show();
	$.post("ajax/filter_distri.php",{owner_name:owner_name,owner_phone:owner_phone,store_state:store_state,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data){
		
		$.post("ajax/distri_filter_total.php",{owner_name:owner_name,owner_phone:owner_phone,store_state:store_state,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data2){
			
			var new_next_value = "next-0-10-"+data2;
			$("#filter_next_btn").attr("value",new_next_value);
			var new_prev_value = "prev-0-10-"+data2;
			$("#filter_prev_btn").attr("value",new_prev_value);
			$("#filter_next_btn").css("color","#2a3b4f");
			$("#filter_prev_btn").css("color","grey");
			$("#distri-filter-output").html(data);
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
	var store_state = document.getElementById('filter-store-state').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;

	$("#data-loader-image").show();
	$.post("ajax/distri_paging_next.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,owner_name:owner_name,owner_phone:owner_phone,store_state:store_state,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_next_btn").attr("value",new_id);
		$("#distri-filter-output").html(data);
		
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
	var store_state = document.getElementById('filter-store-state').value;
	var store_city = document.getElementById('filter-store-city').value;
	var distri_id = document.getElementById('filter-distri-id').value;
	var active_status = document.getElementById('filter-active-status').value;
	
	$("#data-loader-image").show();
	$.post("ajax/distri_paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,owner_name:owner_name,owner_phone:owner_phone,store_state:store_state,store_city:store_city,distri_id:distri_id,active_status:active_status},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_prev_btn").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filter_next_btn").attr("value",new_next_id);
		$("#filter_next_btn").css("color","#2a3b4f");
		
		$("#distri-filter-output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image").hide();
	});
}

function view_challan(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	transfer_id = element_array[1];
	
	$.post("ajax/load_challan.php",{transfer_id:transfer_id},function(data){
		$("#challan-show").html(data);
		$("#challan-show").show();
	});
}

function close_loadedchallan()
{
	$("#challan-show").html('');
	$("#challan-show").hide();
}



function editloadchallan(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	transfer_id = element_array[1];
	
	$("#edit-trans-his-container").show();
	$("#edit-his-cover").html('<img src="./images/database_loader.gif" style="width:300px;">');
	$.post("ajax/editloadchallan.php",{transfer_id:transfer_id},function(data){
		$("#edit-his-cover").html(data);
		
		$("#addcp-add").attr("value","addcp_add-"+transfer_id);
	});
}


function update_transfer_info(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var transfer_id = element_array[1];
	var date = document.getElementById('edit-his-date').value;
	var tampoo_number = document.getElementById('edit-his-tampoo-number').value;
	var driver_phone = document.getElementById('edit-his-driver-phone').value;

	if(date=="")
	{
		alert("Please Select a Date");
	}
	else if($.trim(tampoo_number)=='')
	{
		alert("Please Enter a Tampoo Number");
	}
	else if($.trim(driver_phone)=='')
	{
		alert("Please Enter a Driver Phone Number");
	}
	else
	{
		$("#transfer_info_error").html('<img src="./images/database_loader.gif" style="width:200px;margin-top:-40px;">');
		$.post("ajax/update_transfer_info.php",{transfer_id:transfer_id,date:date,tampoo_number:tampoo_number,driver_phone:driver_phone},function(data){
			$("#transfer_info_error").html('<font face="calibri" color="green">Challan Updated</font>');
		
		});
	}
}


function delete_challan_product(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var challan_product_id = element_array[1];
	var pname = $("#edit_his_product_name-"+challan_product_id).text();
	$("#confirm-pname").html(pname);
	$("#confirm-delete").attr("value","confirm_delete-"+challan_product_id);
	$("#delete-confirmation").show();
}


function confirm_delete(element)
{
	var element_id = $(element).attr("value");
	var element_array = element_id.split("-");
	var challan_product_id = element_array[1];
	$("#confirm-loader").show();
	$.post("ajax/confirm_delete_chalan_product.php",{challan_product_id:challan_product_id},function(data){
		
		if(data=="Cannot Delete!! Product is Added to Distributor Stock")
		{
			alert(data);
			$("#confirm-loader").hide();
		$("#delete-confirmation").hide();
		}
		else
		{
		$("#confirm-loader").hide();
		$("#delete-confirmation").hide();
		$("#challan_product_row-"+challan_product_id).remove();
		}
	});
}

function addcp_search()
{
	var product_id = document.getElementById('addcap-product-id').value;
	$.post("ajax/addcp_fetch_stock.php",{product_id:product_id},function(data){
		
		$("#addcp-output").html(data);
		
	});
}

function add_his_product()
{
	$("#addcp-container").show();
}

function addcp_add(element)
{
	element_id = $(element).attr("value");
	element_array = element_id.split("-");
	transfer_id = element_array[1];
	
	var product_id = document.getElementById('addcap-product-id').value;
	var quantity = document.getElementById('addcp-quan').value;
	var stock_id = $('input[name=stock_id]:checked').val();
	
	if($.trim(product_id)=='')
	{
		alert("Please Enter Product Code");
	}
	else if($.trim(quantity)=='')
	{
		alert("Please Enter quantity");
	}
	else if(isNaN(quantity))
	{
		alert("Invalid Value for Quantity");
	}
	else if(stock_id=="" || stock_id==null)
	{
		alert("Can find Stock ID");
	}
	else
	{
		$("#addcp-loader").show();
		$.post("ajax/addcp_add.php",{transfer_id:transfer_id,product_id:product_id,quantity:quantity,stock_id:stock_id},function(data){
			
			if(data=='Product Added to Challan' || data=='Quantity Added to Existing Product')
			{
				$("#addcap-product-id").val('');
				$("#addcp-output").html('');
				$("#addcp-quan").val('');
				
				$.post("ajax/getallchallanproducts.php",{transfer_id:transfer_id},function(data2){
					$("#challan-list").html(data2);
				});
			}
			
			
			alert(data);
			$("#addcp-loader").hide();
		});
	}
}


function deletechallan(element)
{
	element_id = $(element).attr("id");
	element_array = element_id.split("-");
	transfer_id = element_array[1];
	
	var challan_number = $("#chlno-"+transfer_id).text();
	
	$("#challan-number").html(challan_number);
	$("#confirm-delete-challan").attr("value",transfer_id);
	$("#delete_chal_confirmation").show();
}

function confirm_delete_challan(element)
{
	transfer_id = $(element).attr("value");
	$("#confirm-loader-challan").show();
	$.post("ajax/delete_challan.php",{transfer_id:transfer_id},function(data){
		if(data=="Deleted")
		{
			$("#delete_chal_confirmation").hide();
			$("#chalrow-"+transfer_id).remove();
			alert(data);
			$("#confirm-loader-challan").hide();
		}
		else if(data=="Cannot Delete!!!One or All of  the Products are Added to Distributor's Stock")
		{
			$("#delete_chal_confirmation").hide();
			alert(data);
			$("#confirm-loader-challan").hide();
		}
		alert(data);
	});
}

function filter_his()
{
	var distri_id = document.getElementById('filter-his-distriid').value;
	var date = document.getElementById('filter-his-date').value;
	var challan_num = document.getElementById('filter-his-challannum').value;
	var deliver_status = document.getElementById('filter-his-delivery').value;
	
	$("#data-loader-image2").show();
	$.post("ajax/filter_his_transfer.php",{distri_id:distri_id,date:date,challan_num:challan_num,deliver_status:deliver_status},function(data){
		
		$.post("ajax/his_filter_total.php",{distri_id:distri_id,date:date,challan_num:challan_num,deliver_status:deliver_status},function(data2){
			
			var new_next_value = "next-0-10-"+data2;
			$("#filterhis_next_btn").attr("value",new_next_value);
			var new_prev_value = "prev-0-10-"+data2;
			$("#filterhis_prev_btn").attr("value",new_prev_value);
			$("#filterhis_next_btn").css("color","#2a3b4f");
			$("#filterhis_prev_btn").css("color","grey");
			$("#filter_his_output").html(data);
			$("#data-loader-image2").hide();
			
		});
		
		
		
	});
}



function paginghis_next(element)
{
	var next_id = $(element).attr("value");
	var next_array = next_id.split("-");
	var upper_limit = next_array[1];
	var lower_limit = next_array[2];
	var total_elements = next_array[3];
	var distri_id = document.getElementById('filter-his-distriid').value;
	var date = document.getElementById('filter-his-date').value;
	var challan_num = document.getElementById('filter-his-challannum').value;
	var deliver_status = document.getElementById('filter-his-delivery').value;

	$("#data-loader-image2").show();
	$.post("ajax/his_paging_next.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,distri_id:distri_id,date:date,challan_num:challan_num,deliver_status:deliver_status},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filterhis_next_btn").attr("value",new_id);
		$("#filter_his_output").html(data);
		
		var new_prev_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#filterhis_prev_btn").attr("value",new_prev_id);
		$("#filterhis_prev_btn").css("color","#2a3b4f");
		
		}
		else
		{
			$(element).css("color","grey");
		}
		
		$("#data-loader-image2").hide();
	});
}


function paginghis_prev(element)
{
	var prev_id = $(element).attr("value");
	var prev_array = prev_id.split("-");
	var upper_limit = prev_array[1];
	var lower_limit = prev_array[2];
	var total_elements = prev_array[3];
	var distri_id = document.getElementById('filter-his-distriid').value;
	var date = document.getElementById('filter-his-date').value;
	var challan_num = document.getElementById('filter-his-challannum').value;
	var deliver_status = document.getElementById('filter-his-delivery').value;
	
	$("#data-loader-image2").show();
	$.post("ajax/his_paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,distri_id:distri_id,date:date,challan_num:challan_num,deliver_status:deliver_status},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#filterhis_prev_btn").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#filterhis_next_btn").attr("value",new_next_id);
		$("#filterhis_next_btn").css("color","#2a3b4f");
		
		$("#filter_his_output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image2").hide();
	});
}


function print_challan()
{
	restorepage = document.body.innerHTML;
	printcontent = document.getElementById('challan-show').innerHTML;
							document.body.innerHTML = printcontent;
							window.print();
							document.body.innerHTML = restorepage;
}


function print_challan2()
{
	restorepage = document.body.innerHTML;
	printcontent = document.getElementById('challan-output').innerHTML;
							document.body.innerHTML = printcontent;
							window.print();
							document.body.innerHTML = restorepage;
}
function member_ntf(element)
{
	var element_id = $(element).attr("id");
	var element_array = element_id.split("-");
	var shift = element_array.shift();
	var join=element_array.join('-',element_array);
	console.log(join);
	$.ajax({
		url:"ajax/notification.php",
		data:{join},
		type:"post",
		success:function(data){
			// console.log(data);
			window.location.reload();
		}
	})
	// console.log(transfer_id);
	// console.log(element);
}

