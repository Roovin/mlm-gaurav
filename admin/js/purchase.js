$(document).ready(function(){
	
 $($('#bill-cover').height($('body').height()));	
 $($('#view-bill-cover').height($('body').height()));	
 $($('#edit-bill-cover').height($('body').height()));	
	
	var date = new Date();
var components = [
    date.getYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    date.getMilliseconds()
];

var stock_id = components.join("");
	$("#stock_id").html(stock_id);
	
	$("#close-bill").click(function(){
		$("#bill-cover").hide();
		$("#billing-output").html('');
	});
	
	$("#view-close-bill").click(function(){
		$("#view-bill-cover").hide();
		$("#bill").html('');
	});
	
	$("#cancel-bill").click(function(){
		$("#bill-cover").hide();
		$("#billing-output").html('');
	});
	
	$("#purchase-entry").click(function(){
	$("#purchase-container").hide();
	$("#purchase-entry-container").show();
		
	});
	
	$("#purchase-database").click(function(){
		$("#purchase-container").hide();
	$("#purchase-history-container").show();

	});
	
	$("#purchase-stock").click(function(){
		$("#purchase-container").hide();
	$("#stock-container").show();

	});
	
	$(".back_btn").click(function(){
		$(".back_close").hide();
		$("#purchase-container").show();
	});
	
	
});

function close_pro(element)
{
	$(element).attr("onclick","");
	var div_id = $(element).attr("value");
	var div_id_array = div_id.split("-");
	var element_id = div_id_array[1];
	var id = parseInt(element_id) - 1;
	
	$("#purchasing-"+element_id).remove();
	$(element).attr("value","closepro-"+id);
	$("#plus-button").attr("value","addpro-"+id);
	$(element).attr("onclick","close_pro(this);");
}


function add_more_pro(element)
{
	$(element).attr("onclick","");
	var div_id = $(element).attr("value");
	var div_id_array = div_id.split("-");
	var element_id = div_id_array[1];
	var id = parseInt(element_id) + 1;
	
	$("#load-more-loader").show();
	
	$.get("ajax/getcat.php",function(data){
		
		$("#load-more-product").append('<div id="purchasing-'+id+'" class="products"><div class="item-number">Product '+id+'<br><span id="pid-'+id+'"><font size="2">Scan Barcode for Product ID</font></span></div><div><div class="fields"><b>&nbsp;<span id="bar-'+id+'" onclick="genbar(this);" style="cursor:pointer;">Generate/Attach Barcode</span></b><br><input type="text" class="purchase-entry-fields" placeholder=" Bar Code" id="pbarcode-'+id+'" onkeyup="fetch_pro(event,this);"></div><br><br><br><div class="section-name" style="margin-top:20px;margin-left:-210px;">Product Accounts Information</div><br><br><div class="fields"><b>&nbsp;Product Category</b><br><select class="purchase-entry-fields" id="pcat-'+id+'" onchange="loadsubcat(this);">'+data+'</select></div><div class="fields"><b>&nbsp;Product Sub Category</b><br><select class="purchase-entry-fields" id="psubcat-'+id+'" onchange="loadproducts(this);"><option>Product Sub Category</option></select></div><div class="fields"><b>&nbsp;Select Product</b><br><select class="purchase-entry-fields" id="p-'+id+'"><option>Select Product</option></select></div><div class="fields"><b>&nbsp;Quantity</b><br><input type="text" class="purchase-entry-fields" placeholder=" Quantity" id="pquan-'+id+'" onkeyup="purchasecal(this);"></div><div class="fields"><b>&nbsp;Purchase Price Per Unit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Purchase Price" id="pprice-'+id+'" onkeyup="purchasecal(this);purchasecal2(this);"></div><div class="fields"><b>&nbsp;Total</b><br><input type="text" class="purchase-entry-fields" disabled placeholder=" Total" id="ptotal-'+id+'"></div><div class="fields"><b>&nbsp;GST Rate</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST Rate" id="pgstrate-'+id+'" onkeyup="purchasecal(this);purchasecal2(this);"></div><div class="fields"><b>&nbsp;GST Figure</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST Figure"disabled id="pgstfig-'+id+'"></div><div class="fields"><b>&nbsp;Net Purchase Price</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Purchase Price" disabled id="pnetprice-'+id+'"></div></div><div style="overflow:hidden;width:100%;padding-top:30px;"><div class="section-name" style="width:100%;text-align:left;">Product General Information</div><div class="fields"><b>&nbsp;Batch Number</b><br><input type="text" class="purchase-entry-fields" placeholder=" Batch Number" id="pbatch-'+id+'"></div><div class="fields"><b>&nbsp;MFD Date</b><br><input type="text" class="purchase-entry-fields" placeholder=" DD / MM / YYYY" id="pmfddate-'+id+'"></div><div class="fields"><b>&nbsp;Exp Date</b><br><input type="text" class="purchase-entry-fields" placeholder=" DD / MM / YYYY" id="pexpdate-'+id+'"></div><div class="fields"><b>&nbsp;Net Purchase Price Per Unit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Price Per Unit" id="pnetpriceperunit-'+id+'" disabled></div><div class="fields"><b>&nbsp;MRP</b><br><input type="text" class="purchase-entry-fields" placeholder=" MRP" id="pmrp-'+id+'" onkeyup="purchasecal2(this);"></div><div class="fields"><b>&nbsp;Discount%</b><br><input type="text" class="purchase-entry-fields" placeholder=" Discount" id="pdiscount-'+id+'" onkeyup="purchasecal2(this);"></div><div class="fields"><b>&nbsp;Sale Price</b><br><input type="text" class="purchase-entry-fields" placeholder=" Sale Price"disabled id="psaleprice-'+id+'"></div><div class="fields"><b>&nbsp;Gross Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Gross Profit"disabled id="pgrossprofit-'+id+'"></div><div class="fields"><b>&nbsp;GST on Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" GST on Profit"disabled id="pgstprofit-'+id+'"></div><div class="fields"><b>&nbsp;Net Profit</b><br><input type="text" class="purchase-entry-fields" placeholder=" Net Profit"disabled id="pnetprofit-'+id+'"></div><div class="fields"><b>&nbsp;Profit Cut (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit Cut" id="pprofitcut-'+id+'" onkeyup="purchasecal2(this);"></div><div class="fields"><b>&nbsp;Profit for Disburse (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit for Disburse"disabled id="pprofitdisburse-'+id+'"></div><div class="fields"><b>&nbsp;Profit For Business Partner (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" Profit for Business Partner" id="pprofitbp-'+id+'" onkeyup="purchasecal2(this);" value="35"></div><div class="fields"><b>&nbsp;Percentage Sharing on BV  (%)</b><br><input type="text" class="purchase-entry-fields" placeholder=" % for BV Calculation" id="pbvcalper-'+id+'" onkeyup="purchasecal2(this);" value="45"></div><div class="fields"><b>&nbsp;Business Volume</b><br><input type="text" class="purchase-entry-fields" placeholder=" Business Volume" disabled id="pbv-'+id+'"></div></div></div>');
		
				$(element).attr("value","addpro-"+id);
				$("#cross-button").attr("value","closepro-"+id);
				$("#load-more-loader").hide();
				$(element).attr("onclick","add_more_pro(this);");
			});
}


function loadsubcat(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	var category = $(element).val();
	$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#psubcat-"+product_number).html(data);
		$("#p-"+product_number).html('<option>Select Product</option>');
	});
}


function loadproducts(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	var subcat = $(element).val();

	$.post("ajax/getproducts.php",{subcat:subcat},function(data){
		$("#p-"+product_number).html(data);
	});
	
}


function purchasecal(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	
	var quantity = document.getElementById("pquan-"+product_number).value;
	var purchase_price = document.getElementById("pprice-"+product_number).value;
	var gst_rate = document.getElementById("pgstrate-"+product_number).value;
	
	var total  = parseFloat(quantity)*parseFloat(purchase_price);

	var gst_cal = parseFloat(gst_rate)/100;
	var gst_fig  = parseFloat(total) * parseFloat(gst_cal);

	var net_price = parseFloat(total) + parseFloat(gst_fig);

	
	$("#ptotal-"+product_number).val(total);
	$("#pgstfig-"+product_number).val(gst_fig);
	$("#pnetprice-"+product_number).val(net_price);
	
	var net_gst_per_unit = parseFloat(purchase_price)*parseFloat(gst_cal);
	var net_price_per_unit = parseFloat(purchase_price)+parseFloat(net_gst_per_unit);
	
	net_price_per_unit = net_price_per_unit.toFixed(3);
	
	$("#pnetpriceperunit-"+product_number).val(net_price_per_unit);
}


function purchasecal2(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	
	var mrp = document.getElementById("pmrp-"+product_number).value;
	var discount = document.getElementById("pdiscount-"+product_number).value;
	
	var discount_cal = discount/100;
	var discount_amt = discount_cal * mrp;
	var sale_price = parseFloat(mrp)- parseFloat(discount_amt);
	sale_price = sale_price.toFixed(3);
	
	
	$("#psaleprice-"+product_number).val(sale_price);
	
	var net_purchase_price_per_unit = $("#pnetpriceperunit-"+product_number).val();
	var gross_profit = parseFloat(sale_price) - parseFloat(net_purchase_price_per_unit);

	gross_profit = gross_profit.toFixed(3);
	
	$("#pgrossprofit-"+product_number).val(gross_profit);
	
	var gst_rate = $("#pgstrate-"+product_number).val();
	var gst_rate_cal = parseFloat(gst_rate)/100;
	var gst_rate_cal2 = parseFloat(gst_rate_cal) + 1;
	var net_profit = parseFloat(gross_profit)/parseFloat(gst_rate_cal2);
	
	net_profit = net_profit.toFixed(3);
	
	$("#pnetprofit-"+product_number).val(net_profit);
	
	
	var gst_on_profit = parseFloat(gst_rate_cal)*parseFloat(net_profit);

	gst_on_profit = gst_on_profit.toFixed(3);
	$("#pgstprofit-"+product_number).val(gst_on_profit);
	
	var profit_percentage_cal = parseFloat(net_profit)*100;
	var profit_percentage = parseFloat(profit_percentage_cal)/sale_price;
	
	var profit_cut = document.getElementById("pprofitcut-"+product_number).value;
	
	var profit_cut_cal = parseFloat(profit_cut)/100;
	
	var profit_cut_percentage = parseFloat(profit_cut_cal)*parseFloat(profit_percentage);
	
	var profit_for_disburse = parseFloat(profit_percentage) - parseFloat(profit_cut_percentage);

	profit_for_disburse = profit_for_disburse.toFixed(3);
	
	
	$("#pprofitdisburse-"+product_number).val(profit_for_disburse);
	
	
	var profitpercent_on_disburse = document.getElementById("pprofitbp-"+product_number).value;
	var profitpercent_on_disburse_cal = parseFloat(profitpercent_on_disburse)/100;
	
	var profit_percent_of_bp = parseFloat(profitpercent_on_disburse_cal)*parseFloat(profit_for_disburse);
	
	var bv_cal1 = parseFloat(profit_percent_of_bp)*parseFloat(sale_price);
	
	var profit_on_bv = document.getElementById("pbvcalper-"+product_number).value;
	
	var business_volume = parseFloat(bv_cal1)/parseFloat(profit_on_bv);

	business_volume = business_volume.toFixed(3);
	$("#pbv-"+product_number).val(business_volume);
}



function submit_bill()
{
	var div_val = $("#plus-button").attr("value");
	var div_array = div_val.split("-");
	var total_products = div_array[1];
	var purchase_date = $("#purchase_date").val();
	var pdate_array = purchase_date.split("/");
	var pdate_array_length = pdate_array.length;
	
	if(!isNaN(pdate_array[0]) && !isNaN(pdate_array[1]) && !isNaN(pdate_array[2]) )
	{
		var isDate = "yes";
	}
	else
	{
		var isDate = "No";
	}
	
	
	if($("#pmfdby")=="" || $.trim( $('#pmfdby').val() ) == '')
		{
			alert("Please Enter Manufactured By");
			var success = "no";
		}
		else if($("#purchase_date")=="" || $.trim( $('#purchase_date').val() ) == '')
		{
			alert("Please Enter Purchase Date");
			var success = "no";
		}
		else if(pdate_array_length!=3)
		{
			alert("Date Format Not Correct");
			var success = "no";
		}
		else if (isDate=="No")
		{
			alert("Date Format Not Correct");
			var success = "no";
		}
		else if($("#billno")=="" || $.trim( $('#billno').val() ) == '')
		{
			alert("Please Enter Bill Number");
			var success = "no";
		}
		else
		{
	
	
	for(var i=1;i<=parseInt(total_products);i++)
	{
		var mfd_datei = $("#pmfddate-"+i).val();
		var mfd_array = mfd_datei.split("/");
		
		if(!isNaN(mfd_array[0]) && !isNaN(mfd_array[1]) && !isNaN(mfd_array[2]) )
		{
		var isDate2 = "yes";
		}
		else
		{
		var isDate2 = "No";
		}
		
		var pex_datei = $("#pexpdate-"+i).val();
		var pex_array = pex_datei.split("/");
		
		if(!isNaN(pex_array[0]) && !isNaN(pex_array[1]) && !isNaN(pex_array[2]) )
		{
		var isDate3 = "yes";
		}
		else
		{
		var isDate3 = "No";
		}
		
		
		if($("#pcat-"+i).val()=="" || $.trim( $('#pcat-'+i).val() ) == '')
		{
			alert("Please Select a Category in Product "+i);
			var success = "no";
			break;
		}
		else if($("#psubcat-"+i)=="" || $.trim( $('#psubcat-'+i).val() ) == '')
		{
			alert("Please Select a Sub Category in Product "+i);
			var success = "no";
			break;
		}
		else if($("#p-"+i)=="" || $.trim( $('#p-'+i).val() ) == '')
		{
			alert("Please Select a Product in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pquan-"+i)=="" || $.trim( $('#pquan-'+i).val() ) == '')
		{
			alert("Please Enter a value for quantity in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pquan-'+i).val()))
		{
			alert("Invalid Value for Quantity in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pprice-"+i)=="" || $.trim( $('#pprice-'+i).val() ) == '')
		{
			alert("Please Enter a value for Purchase Price in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pprice-'+i).val()))
		{
			alert("Invalid Value for Purchase Price in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pgstrate-"+i)=="" || $.trim( $('#pgstrate-'+i).val() ) == '')
		{
			alert("Please Enter a value for GST Rate in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pgstrate-'+i).val()))
		{
			alert("Invalid Value for GST Rate in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pbatch-"+i)=="" || $.trim( $('#pbatch-'+i).val() ) == '')
		{
			alert("Please Enter Batch Number in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pmfddate-"+i)=="" || $.trim( $('#pmfddate-'+i).val() ) == '')
		{
			alert("Please Select a Manufacturing Date in Product "+i);
			var success = "no";
			break;
		}
		
		else if(mfd_array.length!=3)
		{
				alert("Manufacturing Date Incorrect");
				var success = "no";
				break;
		}
		else if(isDate2=="No")
		{
			alert("Manufacturing Date Incorrect");
				var success = "no";
				break;
		}
		
		else if($("#pexpdate-"+i)=="" || $.trim( $('#pexpdate-'+i).val() ) == '')
		{
			alert("Please Select a Expiry Date in Product "+i);
			var success = "no";
			break;
		}
		else if(pex_array.length!=3)
		{
				alert("Expiry Date Incorrect");
				var success = "no";
				break;
		}
		else if(isDate3=="No")
		{
			alert("Expiry Date Incorrect");
				var success = "no";
				break;
		}
		else if($("#pmrp-"+i)=="" || $.trim( $('#pmrp-'+i).val() ) == '')
		{
			alert("Please Enter a value for MRP in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pmrp-'+i).val()))
		{
			alert("Invalid Value for MRP in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pdiscount-"+i)=="" || $.trim( $('#pdiscount-'+i).val() ) == '')
		{
			alert("Please Enter a value for Discount in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pdiscount-'+i).val()))
		{
			alert("Invalid Value for Discount in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pprofitcut-"+i)=="" || $.trim( $('#pprofitcut-'+i).val() ) == '')
		{
			alert("Please Enter a value for Profit Cut in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pprofitcut-'+i).val()))
		{
			alert("Invalid Value for Profit Cut in Product "+i);
			var success = "no";
			break;
		}
		
		else if($("#pprofitbp-"+i)=="" || $.trim( $('#pprofitbp-'+i).val() ) == '')
		{
			alert("Please Enter a value of Profit for Business Partner in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pprofitbp-'+i).val()))
		{
			alert("Invalid Value for Profit for Business Partner in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pbvcalper-"+i)=="" || $.trim( $('#pbvcalper-'+i).val() ) == '')
		{
			alert("Please Enter a value of percentage sharing on BV in Product "+i);
			var success = "no";
			break;
		}
		else if(isNaN($('#pbvcalper-'+i).val()))
		{
			alert("Invalid Value for Percentage Sharing on BV in Product "+i);
			var success = "no";
			break;
		}
		else if($("#pbarcode-"+i)=="" || $.trim( $('#pbarcode-'+i).val() ) == '')
		{
			alert("No barcode Input for Product "+i);
			var success = "no";
		}
		else
		{
			var success = "yes";
		}
		
	}
		}
		
		
	if(success=="yes")
	{
		var mfd_name = $("#pmfdby").val();
		var bill_number = $("#billno").val();
		var purchase_date = $("#purchase_date").val();
		var purchase_date_array = purchase_date.split("/");
		var date = purchase_date_array[0];
		var month = purchase_date_array[1];
		var year = purchase_date_array[2];
		
		purchase_date = date+'-'+month+'-'+year;
		
		
		var stock_id = $("#stock_id").text();
		
		var grand_total_cost = 0;
		var grand_total_gst = 0;
		var grand_total_price = 0;
		
		for(var k=1;k<=total_products;k++)
		{
			var product_name = $("#p-"+k).val();
			var quantity = $("#pquan-"+k).val();
			var rate = $("#pprice-"+k).val();
			var total_cost = $("#ptotal-"+k).val();
			var gst_percent = $("#pgstrate-"+k).val();
			var gst_fig = $("#pgstfig-"+k).val();
			var net_purchase_cost = $("#pnetprice-"+k).val();
			grand_total_cost += parseFloat(total_cost);
			grand_total_gst += parseFloat(gst_fig);
			grand_total_price += parseFloat(net_purchase_cost);
			
			$("#billing-output").append('<div class="bill-details"><div class="bsno"><b>'+k+'</b></div><div class="bsno" style="width:200px;">'+product_name+'</div><div class="bsno" style="width:70px;">'+quantity+'</div><div class="bsno" style="width:120px;">'+rate+'</div><div class="bsno" style="width:120px;">'+total_cost+'</div><div class="bsno">'+gst_percent+'</div><div class="bsno" style="width:100px;">'+gst_fig+'</div><div class="bsno" style="width:113px;border-right:0px;">'+net_purchase_cost+'</div></div>');
		}
		
		
		$("#print-mfd-name").html(mfd_name);
		$("#print-bill-number").html(bill_number);
		$("#print-purchase-date").html(purchase_date);
		$("#print-stock-id").html(stock_id);
		$("#grand_total_cost").html(grand_total_cost);
		$("#grand_total_gst").html(grand_total_gst);
		$("#grand_total_price").html(grand_total_price);
		$("#bill-cover").show();
		$("html, body").scrollTop($("#purchase-entry-heading").offset().top);
	}
	
}





function confirm_bill()
{
	$("#confirm-bill").attr("onclick","");
	var div_val = $("#plus-button").attr("value");
	var div_array = div_val.split("-");
	var total_products = div_array[1];
	var mfdby = $.trim($('#pmfdby').val());
	var purchase_date = $.trim($('#purchase_date').val());
	
	var purchase_date_array = purchase_date.split("/");
	var date = purchase_date_array[0];
	var month = purchase_date_array[1];
	var year = purchase_date_array[2];
		
		purchase_date = year+'-'+month+'-'+date;
	
	
	var bill_number = $.trim($('#billno').val());
	var stock_id = $("#stock_id").text();
	
	var pcategory = new Array();
	var psubcategory = new Array();
	var product = new Array();
	var quantity = new Array();
	var quantity = new Array();
	var purchase_price = new Array();
	var total = new Array();
	var gstrate = new Array();
	var gstfigure = new Array();
	var net_purchase_price = new Array();
	var batch_number = new Array();
	var mfd_date = new Array();
	var expiry_date = new Array();
	var net_purchase_price_per_unit = new Array();
	var mrp = new Array();
	var discount = new Array();
	var sale_price = new Array();
	var gross_profit = new Array();
	var gst_on_profit = new Array();
	var net_profit = new Array();
	var profit_cut = new Array();
	var profit_disburse = new Array();
	var profit_bp = new Array();
	var profit_bv = new Array();
	var business_volume = new Array();
	var barcode = new Array();
	
	for(var i=1;i<=parseInt(total_products);i++)
	{
		var mfd2 = $.trim($('#pmfddate-'+i).val());
		var mfd_array = mfd2.split("/");
		var mfd_day = mfd_array[0];
		var mfd_month = mfd_array[1];
		var mfd_year = mfd_array[2];
		var mf_date = mfd_year+'-'+mfd_month+'-'+mfd_day;
		
		var exp2 = $.trim($('#pexpdate-'+i).val());
		var exp_array = exp2.split("/");
		var exp_day = exp_array[0];
		var exp_month = exp_array[1];
		var exp_year = exp_array[2];
		var exp_date = exp_year+'-'+exp_month+'-'+exp_day;
		
		
		
		pcategory.push($.trim($('#pcat-'+i).val()));
		psubcategory.push($.trim($('#psubcat-'+i).val()));
		product.push($.trim($('#p-'+i).val()));
		quantity.push($.trim($('#pquan-'+i).val()));
		purchase_price.push($.trim($('#pprice-'+i).val()));
		total.push($.trim($('#ptotal-'+i).val()));
		gstrate.push($.trim($('#pgstrate-'+i).val()));
		gstfigure.push($.trim($('#pgstfig-'+i).val()));
		net_purchase_price.push($.trim($('#pnetprice-'+i).val()));
		batch_number.push($.trim($('#pbatch-'+i).val()));
		mfd_date.push(mf_date);
		expiry_date.push(exp_date);
		net_purchase_price_per_unit.push($.trim($('#pnetpriceperunit-'+i).val()));
		mrp.push($.trim($('#pmrp-'+i).val()));
		discount.push($.trim($('#pdiscount-'+i).val()));
		sale_price.push($.trim($('#psaleprice-'+i).val()));
		gross_profit.push($.trim($('#pgrossprofit-'+i).val()));
		gst_on_profit.push($.trim($('#pgstprofit-'+i).val()));
		net_profit.push($.trim($('#pnetprofit-'+i).val()));
		profit_cut.push($.trim($('#pprofitcut-'+i).val()));
		profit_disburse.push($.trim($('#pprofitdisburse-'+i).val()));
		profit_bp.push($.trim($('#pprofitbp-'+i).val()));
		profit_bv.push($.trim($('#pbvcalper-'+i).val()));
		business_volume.push($.trim($('#pbv-'+i).val()));
		barcode.push($.trim($('#pbarcode-'+i).val()));
	}
	
	$("html, body").scrollTop($("#purchase-entry-heading").offset().top);
	$("#bill").hide();
	$("#bill-loader").show();
	
	$.post("ajax/confirm_bill.php",{total_products:total_products,mfdby:mfdby,purchase_date:purchase_date,bill_number:bill_number,stock_id:stock_id,pcategory:pcategory,psubcategory:psubcategory,product:product,quantity:quantity,purchase_price:purchase_price,total:total,gstrate:gstrate,gstfigure:gstfigure,net_purchase_price:net_purchase_price,batch_number:batch_number,mfd_date:mfd_date,expiry_date:expiry_date,net_purchase_price_per_unit:net_purchase_price_per_unit,mrp:mrp,discount:discount,sale_price:sale_price,gross_profit:gross_profit,gst_on_profit:gst_on_profit,net_profit:net_profit,profit_cut:profit_cut,profit_disburse:profit_disburse,profit_bp:profit_bp,profit_bv:profit_bv,business_volume:business_volume,barcode:barcode},function(data){
		
		for(i=2;i<=total_products;i++)
		{
			$("#purchasing-"+i).remove();
		}
		
		$("input").val('');
		$("#plus-button").attr("value","addpro-1");
		$("select").prop('selectedIndex',0);
		$("#billing-output").html('');
		$("#bill-loader").hide();
		$("#bill").show();
		generate_stock_id();
		$("#bill-cover").hide();
		$("#confirm-bill").attr("onclick","confirm_bill();");
	});
	
}


function generate_stock_id()
{
		var date = new Date();
var components = [
    date.getYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    date.getMilliseconds()
];

var stock_id = components.join("");
	$("#stock_id").html(stock_id);
}

function billview(element)
{
	var div_id = $(element).attr("id");
	console.log(div_id);
	var div_array = div_id.split("-");
	var bill_id = div_array[1];
	
		$("#view-bill").html('<div>Processing Please Wait...<br><img src="./images/database_loader.gif" style="width:200px;"></div>');
		$("#view-bill-cover").show();
	$.post("ajax/billview.php",{bill_id:bill_id},function(data){
		$("#view-bill").html(data);
		$("#view-bill-cover").show();
		
	});
	
}

function close_bill2()
{
	$("#bill").html('');
	$("#view-bill-cover").hide();
}


function editbill(element)
{
	var div_id = $(element).attr("id");
	var div_array = div_id.split("-");
	var bill_id = div_array[1];
	
	$.post("ajax/load_bill.php",{bill_id:bill_id},function(data){
		$("#edit-bill-output").html(data);
		$("#edit-bill-cover").show();
	});
	
}



function loadproducts2(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	var subcat = $(element).val();

	$.post("ajax/getproducts.php",{subcat:subcat},function(data){
		$("#ep-"+product_number).html(data);
	});
}

function loadsubcat2(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	var category = $(element).val();
	$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#esubcat-"+product_number).html(data);
		$("#ep-"+product_number).html('<option>Select Product</option>');
	});
}


function purchasecal3(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	
	var quantity = document.getElementById("equan-"+product_number).value;
	var purchase_price = document.getElementById("eprice-"+product_number).value;
	var gst_rate = document.getElementById("egstrate-"+product_number).value;
	
	var total  = parseFloat(quantity)*parseFloat(purchase_price);
	
	var gst_cal = parseFloat(gst_rate)/100;
	var gst_fig  = parseFloat(total) * parseFloat(gst_cal);
	
	var net_price = parseFloat(total) + parseFloat(gst_fig);
	
	
	$("#etotal-"+product_number).val(total);
	$("#egstfig-"+product_number).val(gst_fig);
	$("#enetprice-"+product_number).val(net_price);
	
	var net_gst_per_unit = parseFloat(purchase_price)*parseFloat(gst_cal);
	var net_price_per_unit = parseFloat(purchase_price)+parseFloat(net_gst_per_unit);
	

	
	
	$("#enetpriceperunit-"+product_number).val(net_price_per_unit);
}





function purchasecal4(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var product_number = div_id_array[1];
	
	var mrp = document.getElementById("emrp-"+product_number).value;
	var discount = document.getElementById("ediscount-"+product_number).value;
	var dis_cal = parseFloat(discount)/100;
	var dis_fig = parseFloat(mrp)*parseFloat(dis_cal);
	var sale_price = parseFloat(mrp)- parseFloat(dis_fig);
	
	
	$("#esaleprice-"+product_number).val(sale_price);
	
	var net_purchase_price_per_unit = $("#enetpriceperunit-"+product_number).val();
	var gross_profit = parseFloat(sale_price) - parseFloat(net_purchase_price_per_unit);

	
	$("#egrossprofit-"+product_number).val(gross_profit);
	
	var gst_rate = $("#egstrate-"+product_number).val();
	var gst_rate_cal = parseFloat(gst_rate)/100;
	var gst_rate_cal2 = parseFloat(gst_rate_cal) + 1;
	var net_profit = parseFloat(gross_profit)/parseFloat(gst_rate_cal2);

	$("#enetprofit-"+product_number).val(net_profit);
	
	
	var gst_on_profit = parseFloat(gst_rate_cal)*parseFloat(net_profit);

	$("#egstprofit-"+product_number).val(gst_on_profit);
	
	var profit_percentage_cal = parseFloat(net_profit)*100;
	var profit_percentage = parseFloat(profit_percentage_cal)/sale_price;
	
	var profit_cut = document.getElementById("eprofitcut-"+product_number).value;
	
	var profit_cut_cal = parseFloat(profit_cut)/100;
	
	var profit_cut_percentage = parseFloat(profit_cut_cal)*parseFloat(profit_percentage);
	
	var profit_for_disburse = parseFloat(profit_percentage) - parseFloat(profit_cut_percentage);

	
	
	
	$("#eprofitdisburse-"+product_number).val(profit_for_disburse);
	
	
	var profitpercent_on_disburse = document.getElementById("eprofitbp-"+product_number).value;
	var profitpercent_on_disburse_cal = parseFloat(profitpercent_on_disburse)/100;
	
	var profit_percent_of_bp = parseFloat(profitpercent_on_disburse_cal)*parseFloat(profit_for_disburse);
	
	var bv_cal1 = parseFloat(profit_percent_of_bp)*parseFloat(sale_price);
	
	var profit_on_bv = document.getElementById("ebvcalper-"+product_number).value;
	
	var business_volume = parseFloat(bv_cal1)/parseFloat(profit_on_bv);

	$("#ebv-"+product_number).val(business_volume);
}



function edit_confirm_purchase()
{
	var total_products = document.getElementById('no_of_products').value;
	
	if($("#emfdby")=="" || $.trim( $('#emfdby').val() ) == '')
		{
			alert("Please Enter Manufactured By");
			var success = "no";
		}
		else if($("#edit_purchase_date")=="" || $.trim( $('#edit_purchase_date').val() ) == '')
		{
			alert("Please Enter Purchase Date");
			var success = "no";
		}
		else if($("#edit-billno")=="" || $.trim( $('#edit-billno').val() ) == '')
		{
			alert("Please Enter Bill Number");
			var success = "no";
		}
		else
		{
			for(var i=1;i<=parseInt(total_products);i++)
			{
			
				if($("#equan-"+i)=="" || $.trim( $('#equan-'+i).val() ) == '')
				{
					alert("Please Enter a value for quantity in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#equan-'+i).val()))
				{
					alert("Invalid Value for Quantity in Product "+i);
					var success = "no";
					break;
				}
				else if($("#eprice-"+i)=="" || $.trim( $('#eprice-'+i).val() ) == '')
				{
					alert("Please Enter a value for Purchase Price in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#eprice-'+i).val()))
				{
					alert("Invalid Value for Purchase Price in Product "+i);
					var success = "no";
					break;
				}
				else if($("#egstrate-"+i)=="" || $.trim( $('#egstrate-'+i).val() ) == '')
				{
					alert("Please Enter a value for GST Rate in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#egstrate-'+i).val()))
				{
					alert("Invalid Value for GST Rate in Product "+i);
					var success = "no";
					break;
				}
				else if($("#ebatch-"+i)=="" || $.trim( $('#ebatch-'+i).val() ) == '')
				{
					alert("Please Enter Batch Number in Product "+i);
					var success = "no";
					break;
				}
				else if($("#emfddate-"+i)=="" || $.trim( $('#emfddate-'+i).val() ) == '')
				{
					alert("Please Select a Manufacturing Date in Product "+i);
					var success = "no";
					break;
				}
				else if($("#eexpdate-"+i)=="" || $.trim( $('#eexpdate-'+i).val() ) == '')
				{
					alert("Please Select a Expiry Date in Product "+i);
					var success = "no";
					break;
				}
				else if($("#emrp-"+i)=="" || $.trim( $('#emrp-'+i).val() ) == '')
				{
					alert("Please Enter a value for MRP in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#emrp-'+i).val()))
				{
					alert("Invalid Value for MRP in Product "+i);
					var success = "no";
					break;
				}
				else if($("#ediscount-"+i)=="" || $.trim( $('#ediscount-'+i).val() ) == '')
				{
					alert("Please Enter a value for Discount in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#ediscount-'+i).val()))
				{
					alert("Invalid Value for Discount in Product "+i);
					var success = "no";
					break;
				}
				else if($("#eprofitcut-"+i)=="" || $.trim( $('#eprofitcut-'+i).val() ) == '')
				{
					alert("Please Enter a value for Profit Cut in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#eprofitcut-'+i).val()))
				{
					alert("Invalid Value for Profit Cut in Product "+i);
					var success = "no";
					break;
				}
				else if($("#eprofitbp-"+i)=="" || $.trim( $('#eprofitbp-'+i).val() ) == '')
				{
					alert("Please Enter a value of Profit for Business Partner in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#eprofitbp-'+i).val()))
				{
					alert("Invalid Value for Profit for Business Partner in Product "+i);
					var success = "no";
					break;
				}
				else if($("#ebvcalper-"+i)=="" || $.trim( $('#ebvcalper-'+i).val() ) == '')
				{
					alert("Please Enter a value of percentage sharing on BV in Product "+i);
					var success = "no";
					break;
				}
				else if(isNaN($('#ebvcalper-'+i).val()))
				{
					alert("Invalid Value for Percentage Sharing on BV in Product "+i);
					var success = "no";
					break;
				}
				else
				{
					var success = "yes";
				}
		
			}
			
		}
		
		
		if(success=="yes")
		{
			var mfdby = $.trim($('#emfdby').val());
			var purchase_date = $.trim($('#edit_purchase_date').val());
			var bill_number = $.trim($('#edit-billno').val());
			var stock_id = $("#edit_stock_id").text();
			var product_id = new Array();
			var quantity = new Array();
			var purchase_price = new Array();
			var total = new Array();
			var gstrate = new Array();
			var gstfigure = new Array();
			var net_purchase_price = new Array();
			var batch_number = new Array();
			var mfd_date = new Array();
			var expiry_date = new Array();
			var net_purchase_price_per_unit = new Array();
			var mrp = new Array();
			var discount = new Array();
			var sale_price = new Array();
			var gross_profit = new Array();
			var gst_on_profit = new Array();
			var net_profit = new Array();
			var profit_cut = new Array();
			var profit_disburse = new Array();
			var profit_bp = new Array();
			var profit_bv = new Array();
			var business_volume = new Array();

	
			for(var i=1;i<=parseInt(total_products);i++)
			{
				product_id.push($('#product_id-'+i).val());
				quantity.push($.trim($('#equan-'+i).val()));
				purchase_price.push($.trim($('#eprice-'+i).val()));
				total.push($.trim($('#etotal-'+i).val()));
				gstrate.push($.trim($('#egstrate-'+i).val()));
				gstfigure.push($.trim($('#egstfig-'+i).val()));
				net_purchase_price.push($.trim($('#enetprice-'+i).val()));
				batch_number.push($.trim($('#ebatch-'+i).val()));
				mfd_date.push($.trim($('#emfddate-'+i).val()));
				expiry_date.push($.trim($('#eexpdate-'+i).val()));
				net_purchase_price_per_unit.push($.trim($('#enetpriceperunit-'+i).val()));
				mrp.push($.trim($('#emrp-'+i).val()));
				discount.push($.trim($('#ediscount-'+i).val()));
				sale_price.push($.trim($('#esaleprice-'+i).val()));
				gross_profit.push($.trim($('#egrossprofit-'+i).val()));
				gst_on_profit.push($.trim($('#egstprofit-'+i).val()));
				net_profit.push($.trim($('#enetprofit-'+i).val()));
				profit_cut.push($.trim($('#eprofitcut-'+i).val()));
				profit_disburse.push($.trim($('#eprofitdisburse-'+i).val()));
				profit_bp.push($.trim($('#eprofitbp-'+i).val()));
				profit_bv.push($.trim($('#ebvcalper-'+i).val()));
				business_volume.push($.trim($('#ebv-'+i).val()));
			}
			
			$("#edit-bill-output").html('<div>Processing Please Wait...<br><img src="./images/database_loader.gif" style="width:200px;"></div>');
			
			$("html, body").scrollTop($("#purchase-history-container").offset().top);
			
			$.post("ajax/edit_confirm_bill.php",{total_products:total_products,mfdby:mfdby,purchase_date:purchase_date,bill_number:bill_number,stock_id:stock_id,product_id:product_id,quantity:quantity,purchase_price:purchase_price,total:total,gstrate:gstrate,gstfigure:gstfigure,net_purchase_price:net_purchase_price,batch_number:batch_number,mfd_date:mfd_date,expiry_date:expiry_date,net_purchase_price_per_unit:net_purchase_price_per_unit,mrp:mrp,discount:discount,sale_price:sale_price,gross_profit:gross_profit,gst_on_profit:gst_on_profit,net_profit:net_profit,profit_cut:profit_cut,profit_disburse:profit_disburse,profit_bp:profit_bp,profit_bv:profit_bv,business_volume:business_volume},function(data){
				
				$("#edit-bill-output").html('<div>Purchase Entry Updated</div><br>');
			});
			
			$("#edit-bill-cover").show().delay(2000).fadeOut();
		}
}

function close_edit_purchase()
{
	$("#edit-bill-cover").fadeOut();
}


function delete_purchase(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var bill_id = div_id_array[1];
	alert("abhi nahi banaya but bill ID is "+bill_id);
}


function his_filter()
{
	var mfdby = document.getElementById('his_filter_mfdby').value;
	var from_date = document.getElementById('his_filter_fromdate').value;
	var to_date = document.getElementById('his_filter_todate').value;
	var product_code = document.getElementById('his_filter_productcode').value;
	
		$("#data-loader-image").show();
	$.post("ajax/filter_history.php",{mfdby:mfdby,from_date:from_date,to_date:to_date,product_code:product_code},function(data){
		
		$.post("ajax/purchase_filter_total.php",{mfdby:mfdby,from_date:from_date,to_date:to_date,product_code:product_code},function(data2){
			
			var new_next_value = "next-0-10-"+data2;
			$("#next-button").attr("value",new_next_value);
			var new_prev_value = "prev-0-10-"+data2;
			$("#prev-button").attr("value",new_prev_value);
			$("#next-button").css("color","#2a3b4f");
			$("#prev-button").css("color","grey");
			$("#his_filter_output").html(data);
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
	var mfdby = document.getElementById('his_filter_mfdby').value;
	var from_date = document.getElementById('his_filter_fromdate').value;
	var to_date = document.getElementById('his_filter_todate').value;
	var product_code = document.getElementById('his_filter_productcode').value;
	

	$("#data-loader-image").show();
	$.post("ajax/purchase_paging_next.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,mfdby:mfdby,from_date:from_date,to_date:to_date,product_code:product_code},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button").attr("value",new_id);
		$("#his_filter_output").html(data);
		
		var new_prev_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#prev-button").attr("value",new_prev_id);
		$("#prev-button").css("color","#2a3b4f");
		
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
	var mfdby = document.getElementById('his_filter_mfdby').value;
	var from_date = document.getElementById('his_filter_fromdate').value;
	var to_date = document.getElementById('his_filter_todate').value;
	var product_code = document.getElementById('his_filter_productcode').value;
	
	$("#data-loader-image").show();
	$.post("ajax/purchase_paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,mfdby:mfdby,from_date:from_date,to_date:to_date,product_code:product_code},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#prev-button").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button").attr("value",new_next_id);
		$("#next-button").css("color","#2a3b4f");
		
		$("#his_filter_output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image").hide();
	});
}


function stockbar_filter(e)
{
	if(e.keyCode=='13')
	{
		$('#stock_filter_cat').removeAttr('selected').find('option:first').attr('selected', 'selected');
		$("#stock_filter_subcat").html('<option value="">Select Sub-Category</option>');
		
		$("#stock_filter_product").val('');
		
		$("#stock_filter_pid").val('');
		
		
		stock_filter();
	}
}

function change_filters()
{
	$("#stockbar").val('');
	$('#stock_filter_cat').removeAttr('selected').find('option:first').attr('selected', 'selected');
		$("#stock_filter_subcat").html('<option value="">Select Sub-Category</option>');
		
		$("#stock_filter_product").val('');
}


function stock_filter()
{
	var category = document.getElementById('stock_filter_cat').value;
	var subcat = document.getElementById('stock_filter_subcat').value;
	var product = document.getElementById('stock_filter_product').value;
	var pid = document.getElementById('stock_filter_pid').value;
	var barcode = document.getElementById('stockbar').value;
	
	$("#data-loader-image2").show();
	
	$.post("ajax/stock_filter.php",{category:category,subcat:subcat,product:product,pid:pid,barcode:barcode},function(data){
		
			$("#stock_filter_output").html(data);
			$("#data-loader-image2").hide();

		
		
	})
}


function paging_next2(element)
{
	var next_id = $(element).attr("value");
	var next_array = next_id.split("-");
	var upper_limit = next_array[1];
	var lower_limit = next_array[2];
	var total_elements = next_array[3];
	var stock_id = document.getElementById('stock_filter_stockid').value;
	var product_code = document.getElementById('stock_filter_productcode').value;
	

	$("#data-loader-image2").show();
	$.post("ajax/stock_paging_next.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,stock_id:stock_id,product_code:product_code},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button2").attr("value",new_id);
		$("#stock_filter_output").html(data);
		
		var new_prev_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#prev-button2").attr("value",new_prev_id);
		$("#prev-button2").css("color","#2a3b4f");
		
		}
		else
		{
			$(element).css("color","grey");
		}
		
		$("#data-loader-image2").hide();
	});
}

function paging_prev2(element)
{
	var prev_id = $(element).attr("value");
	var prev_array = prev_id.split("-");
	var upper_limit = prev_array[1];
	var lower_limit = prev_array[2];
	var total_elements = prev_array[3];
	var stock_id = document.getElementById('stock_filter_stockid').value;
	var product_code = document.getElementById('stock_filter_productcode').value;
	
	$("#data-loader-image2").show();
	$.post("ajax/stock_paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,stock_id:stock_id,product_code:product_code},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#prev-button2").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button2").attr("value",new_next_id);
		$("#next-button2").css("color","#2a3b4f");
		
		$("#stock_filter_output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image2").hide();
	});
}


function genbar(element)
{
	var product_element_id = $(element).attr("id");
	var product_element_array = product_element_id.split("-");
	var product_number =product_element_array[1];
	
		var date = new Date();
var components = [
    date.getYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    date.getMilliseconds()
];

var bar_com = components.join("");
var barcode_number = bar_com;
$("#pbarcode-"+product_number).val(barcode_number);
}


function loadscat()
{
	var category = document.getElementById('stock_filter_cat').value;
	$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#stock_filter_subcat").html(data);
		//$("#p-"+product_number).html('<option>Select Product</option>');
	});
}


function change_dis(element)
{
	var element_id = $(element).attr("id");
	var element_id_array = element_id.split("-");
	var purchase_id = element_id_array[1];
	var distype = element_id_array[0];
	var distype_array = distype.split("_");
	var dis_type = distype_array[0];
		
	var nsd_dis = $("#st_dis-"+purchase_id).val();
	var nsd_sp = $("#st_sale_price-"+purchase_id).val();
	var nsd_bv = $("#nsd_bv-"+purchase_id).val();
	
	
	var nmd_qty = $("#nmd_qty-"+purchase_id).val();
	var nmd_dis = $("#nmd_dis-"+purchase_id).val();
	var nmd_sp = $("#nmd_sp-"+purchase_id).val();
	var nmd_bv = $("#nmd_bv-"+purchase_id).val();
	
	
	
	var rsd_dis = $("#rsd_dis-"+purchase_id).val();
	var rsd_sp = $("#rsd_sp-"+purchase_id).val();
	var rsd_cb = $("#rsd_cb-"+purchase_id).val();
	var rsd_bv = $("#rsd_bv-"+purchase_id).val();
	
	
	var rmd_qty = $("#rmd_qty-"+purchase_id).val();
	var rmd_dis = $("#rmd_dis-"+purchase_id).val();
	var rmd_sp = $("#rmd_sp-"+purchase_id).val();
	var rmd_cb = $("#rmd_cb-"+purchase_id).val();
	var rmd_bv = $("#rmd_bv-"+purchase_id).val();
	
	var pbp = $("#pbp-"+purchase_id).val();
	var pcut = $("#pcut-"+purchase_id).val();

	if(dis_type=='st')
	{
		dis = nsd_dis;
		dis2 = nsd_dis;
	}
	else if(dis_type=='nmd')
	{
		dis = nmd_dis;
		dis2 = nmd_dis;
	}
	else if(dis_type=='rsd')
	{
		dis = parseFloat(rsd_dis) + parseFloat(rsd_cb);
		dis2 = rsd_dis;
	}
	else if(dis_type=='rmd')
	{
		dis = parseFloat(rmd_dis) + parseFloat(rmd_cb);
		dis2 = rmd_dis;
	}
	
	var bv = cal_bv(dis,purchase_id,pbp,pcut);
	$("#"+dis_type+"_dbv-"+purchase_id).html(bv);
	$("#"+dis_type+"_bv-"+purchase_id).val(bv);
	
	var sp = cal_sp(dis2,purchase_id);
	$("#"+dis_type+"_dsp-"+purchase_id).html(sp);
	$("#"+dis_type+"_sp-"+purchase_id).val(sp);
	
	$("#update-"+purchase_id).attr("onclick","update2(this);")
}


function cal_sp(dis,purchase_id)
{
	var purchase_price = $("#st_purchase_price-"+purchase_id).val();
	var mrp = $("#st_mrp-"+purchase_id).val();
	
	var dis_cal = parseFloat(dis)/100;
	var dis_fig = parseFloat(mrp)*parseFloat(dis_cal);
	var sale_price = parseFloat(mrp)- parseFloat(dis_fig);
	
	return sale_price;
}




function cal_bv(dis,purchase_id,pbp,pcut)
{
	var purchase_price = $("#st_purchase_price-"+purchase_id).val();
	var mrp = $("#st_mrp-"+purchase_id).val();
	
	var dis_cal = parseFloat(dis)/100;
	var dis_fig = parseFloat(mrp)*parseFloat(dis_cal);
	var sale_price = parseFloat(mrp)- parseFloat(dis_fig);
	var gross_profit = parseFloat(sale_price) - parseFloat(purchase_price);
	
	var gst_rate = $("#st_gst_rate-"+purchase_id).val();
	var gst_rate_cal = parseFloat(gst_rate)/100;
	var gst_rate_cal2 = parseFloat(gst_rate_cal) + 1;
	var net_profit = parseFloat(gross_profit)/parseFloat(gst_rate_cal2);
	
	
	var profit_percentage_cal = parseFloat(net_profit)*100;
	var profit_percentage = parseFloat(profit_percentage_cal)/sale_price;
	
	var profit_cut = pcut;
	
	var profit_cut_cal = parseFloat(profit_cut)/100;
	
	var profit_cut_percentage = parseFloat(profit_cut_cal)*parseFloat(profit_percentage);
	
	var profit_for_disburse = parseFloat(profit_percentage) - parseFloat(profit_cut_percentage);

	var profitpercent_on_disburse = parseFloat(pbp);
	var profitpercent_on_disburse_cal = parseFloat(profitpercent_on_disburse)/100;
	
	var profit_percent_of_bp = parseFloat(profitpercent_on_disburse_cal)*parseFloat(profit_for_disburse);
	
	var bv_cal1 = parseFloat(profit_percent_of_bp)*parseFloat(sale_price);
	
	
	var profit_on_bv = $("#st_profit_bv-"+purchase_id).val();
	
	var business_volume = parseFloat(bv_cal1)/parseFloat(profit_on_bv);
	
	if(parseFloat(business_volume)<=0)
	{
		business_volume=0;
	}
	
	
	return business_volume.toFixed(3);
}


function cal_all_bv(ele)
{
	var element_id = $(ele).attr("id");
	var element_array = element_id.split("-");
	var purchase_id = element_array[1];
	var pbp = $("#pbp-"+purchase_id).val();
	var pcut = $("#pcut-"+purchase_id).val();
	
	var nsd_dis = $("#st_dis-"+purchase_id).val();
	
	var nsd_bv = cal_bv(nsd_dis,purchase_id,pbp,pcut);
	
	$("#st_dbv-"+purchase_id).html(nsd_bv);
	$("#st_bv-"+purchase_id).val(nsd_bv);
	
	
	var nmd_dis = $("#nmd_dis-"+purchase_id).val();
	var nmd_bv = cal_bv(nmd_dis,purchase_id,pbp,pcut);
	
	$("#nmd_dbv-"+purchase_id).html(nmd_bv);
	$("#nmd_bv-"+purchase_id).val(nmd_bv);
	
	
	var rsd_dis = $("#rsd_dis-"+purchase_id).val();
	var rsd_cb = $("#rsd_cb-"+purchase_id).val();
	
	var tdis = parseFloat(rsd_dis) + parseFloat(rsd_cb);
	
	var rsd_bv = cal_bv(tdis,purchase_id,pbp,pcut);
	
	$("#rsd_dbv-"+purchase_id).html(rsd_bv);
	$("#rsd_bv-"+purchase_id).val(rsd_bv);

	var rmd_dis = $("#rmd_dis-"+purchase_id).val();
	var rmd_cb = $("#rmd_cb-"+purchase_id).val();
	var tdis2 = parseFloat(rmd_dis) + parseFloat(rmd_cb);
	
	var rmd_bv = cal_bv(tdis2,purchase_id,pbp,pcut);
	
	$("#rmd_dbv-"+purchase_id).html(rmd_bv);
	$("#rmd_bv-"+purchase_id).val(rmd_bv);
	
	$("#update-"+purchase_id).attr("onclick","update2(this);");
}



function update()
{
	alert("No Changes");
}

function update2(element)
{
	element_id = $(element).attr("id");
	element_array = element_id.split("-");
	purchase_id = element_array[1];
	
	var nsd_dis = $("#st_dis-"+purchase_id).val();
	var nsd_sp = $("#st_sp-"+purchase_id).val();
	var nsd_bv = $("#st_bv-"+purchase_id).val();
	var nmd_qty = $("#nmd_qty-"+purchase_id).val();
	var nmd_dis = $("#nmd_dis-"+purchase_id).val();
	var nmd_sp = $("#nmd_sp-"+purchase_id).val();
	var nmd_bv = $("#nmd_bv-"+purchase_id).val();
	
	var rsd_dis = $("#rsd_dis-"+purchase_id).val();
	var rsd_sp = $("#rsd_sp-"+purchase_id).val();
	var rsd_cb = $("#rsd_cb-"+purchase_id).val();
	var rsd_bv = $("#rsd_bv-"+purchase_id).val();
	
	var rmd_qty = $("#rmd_qty-"+purchase_id).val();
	var rmd_dis = $("#rmd_dis-"+purchase_id).val();
	var rmd_sp = $("#rmd_sp-"+purchase_id).val();
	var rmd_cb = $("#rmd_cb-"+purchase_id).val();
	var rmd_bv = $("#rmd_bv-"+purchase_id).val();
	var pbp = $("#pbp-"+purchase_id).val();
	var pcut = $("#pcut-"+purchase_id).val();
	
	
	
	
	
	if(nsd_dis=="")
	{
		alert("Please Enter a Value for Discount (Normal Single Discount)");
	}
	else if(isNaN(nsd_dis))
	{
		alert("Invalid Value for Discount (Normal Single discount)");
	}
	else if(nsd_sp=="")
	{
		alert("Empty Selling Price (Normal single Discount)");
	}
	else if(isNaN(nsd_sp))
	{
		alert("Invalid Value for Seliing Price (Normal Single Discount)");
	}
	else if(nsd_bv=="")
	{
		alert("Empty Business Volume (Normal single Discount)");
	}
	else if(isNaN(nsd_bv))
	{
		alert("Invalid Value for Business Volume (Normal Single Discount)");
	}
	else if(nmd_qty=="")
	{
		alert("Empty Quantity (Normal Multiple Discount)");
	}
	else if(isNaN(nmd_qty))
	{
		alert("Invalid Value for Quantity (Normal Multiple Discount)");
	}
	else if(nmd_dis=="")
	{
		alert("Empty Discount (Normal Multiple Discount)");
	}
	else if(isNaN(nmd_dis))
	{
		alert("Invalid Value for Discount (Normal Multiple Discount)");
	}
	else if(nmd_sp=="")
	{
		alert("Empty Selling Price (Normal Multiple Discount)");
	}
	else if(isNaN(nmd_sp))
	{
		alert("Invalid Value for Selling Price (Normal Multiple Discount)");
	}
	else if(nmd_bv=="")
	{
		alert("Empty Business Volume (Normal Multiple Discount)");
	}
	else if(isNaN(nmd_bv))
	{
		alert("Invalid Value for Business Volume (Normal Multiple Discount)");
	}
	else if(rsd_dis=="")
	{
		alert("Empty Discount (Member Single Discount)");
	}
	else if(isNaN(rsd_dis))
	{
		alert("Invalid Value for Discount (Member Single Discount)");
	}
	else if(rsd_sp=="")
	{
		alert("Empty Seliing Price (Member Single Discount)");
	}
	else if(isNaN(rsd_sp))
	{
		alert("Invalid Value for Seliing Price (Member Single Discount)");
	}
	else if(rsd_cb=="")
	{
		alert("Empty Cash Back (Member Single Discount)");
	}
	else if(isNaN(rsd_cb))
	{
		alert("Invalid Value for Cash Back (Member Single Discount)");
	}
	else if(rsd_bv=="")
	{
		alert("Empty Business Volume (Member Single Discount)");
	}
	else if(isNaN(rsd_bv))
	{
		alert("Invalid Value for Business Volume (Member Single Discount)");
	}
	else if(rmd_qty=="")
	{
		alert("Empty Quantity (Member Multiple Discount)");
	}
	else if(isNaN(rmd_qty))
	{
		alert("Invalid Value for Quantity (Member Multiple Discount)");
	}
	else if(rmd_dis=="")
	{
		alert("Empty Discount (Member Multiple Discount)");
	}
	else if(isNaN(rmd_dis))
	{
		alert("Invalid Value for Discount (Member Multiple Discount)");
	}
	else if(rmd_sp=="")
	{
		alert("Empty Seliing Price (Member Multiple Discount)");
	}
	else if(isNaN(rmd_sp))
	{
		alert("Invalid Value for Seliing Price (Member Multiple Discount)");
	}
	else if(rmd_cb=="")
	{
		alert("Empty Cash Back (Member Multiple Discount)");
	}
	else if(isNaN(rmd_cb))
	{
		alert("Invalid Value for Cash Back (Member Multiple Discount)");
	}
	
	
	else if(rmd_bv=="")
	{
		alert("Empty Business Volume (Member Multiple Discount)");
	}
	else if(isNaN(rmd_bv))
	{
		alert("Invalid Value for Business Volume (Member Multiple Discount)");
	}
	else if(pbp=="")
	{
		alert("Profit For Business Partner Cannot be Empty");
	}
	else if(isNaN(pbp))
	{
		alert("Invalid Value for Profit For Business Partner");
	}
	else if(pcut=="")
	{
		alert("Profit Cut Cannot be Empty");
	}
	else if(isNaN(pcut))
	{
		alert("Invalid Value for Profit Cut");
	}
	else
	{
		$.post("ajax/updatedis.php",{purchase_id:purchase_id,nsd_dis:nsd_dis,nsd_sp:nsd_sp,nsd_bv:nsd_bv,nmd_qty:nmd_qty,nmd_dis:nmd_dis,nmd_sp:nmd_sp,nmd_bv:nmd_bv,rsd_dis:rsd_dis,rsd_sp:rsd_sp,rsd_cb:rsd_cb,rsd_bv:rsd_bv,rmd_qty:rmd_qty,rmd_dis:rmd_dis,rmd_sp:rmd_sp,rmd_cb:rmd_cb,rmd_bv:rmd_bv,pbp:pbp,pcut:pcut},function(data){
			alert(purchase_id+'-'+data);
			
		});
	}
	
}


function fetch_travelling(ele)
{
	ele_id = $(ele).attr("id");
	ele_array = ele_id.split("-");
	transfer_id = ele_array[1];
		
		$.post("ajax/fetch_travelling.php",{transfer_id:transfer_id},function(data){
		$("#accept-products-output").html(data);
		$("#close_accept").attr("value",transfer_id);
		$("#acceptpro-view").show();
		$("#acceptpview-heading").html('Check Products For Transfer ID '+transfer_id);
	});

}


function close_acceptproview()
{
	
	var transfer_id = $("#close_accept").attr("value");
	
	$.post("ajax/getremaining.php",{transfer_id:transfer_id},function(data){
		if(data==0)
		{
			$("#rhis-"+transfer_id).hide();
		}
	});
	
	$("#accept-products-output").html('');
	$("#acceptpview-heading").html('');
	$("#acceptpro-view").hide();
}

function accept_product(ele)
{
	ele_id = $(ele).attr("id");
	ele_array = ele_id.split("-");
	database_id = ele_array[1];
	
	$.post("ajax/accept_product.php",{database_id:database_id},function(data){
		$(ele).text('Added')
		$(ele).css("background-color","red");
		$(ele).css("color","white");
		$(ele).attr("onclick","");
	})
}

function open_accept()
{
	$("#purchase-container").hide();
	$("#accept-container").show();
}


function close_accept()
{
	$("#accept-container").hide();
	$("#purchase-container").show();
}


function fetch_his_date()
{
	fetch_ahis();
}

function fetch_his_store(e)
{
	if(e.keyCode=='13')
	{
		fetch_ahis();
	}
}


function fetch_ahis()
{
	var date = document.getElementById('ahis_date').value;
	var store = document.getElementById('ahis-store').value;
	
	$.post("ajax/ahis_filter.php",{date:date,store:store},function(data){
		$("#ahis-output").html(data);
	});
}


function fetch_ahispro(element)
{
	element_id = $(element).attr("id");
	element_array = element_id.split("-");
	transfer_id = element_array[1];
	
	$.post("ajax/check_products.php",{transfer_id:transfer_id},function(data){
		$("#ahis-products-output").html(data);
		$("#ahispro-view").show();
		$("#ahispview-heading").html('Check Products For Transfer ID '+transfer_id);
	});
}


function close_ahispro()
{
	$("#ahis-products-output").html('');
		$("#ahispro-view").hide();
		$("#ahispview-heading").html('');
}

function open_ahis()
{
	$("#purchase-container").hide();
	$("#ahis-container").show();
}

function close_ahis()
{
	$("#ahis-container").hide();
	$("#task-container").show();
}


function fetch_pro(e,element)
{
	if(e.keyCode=="13")
	{
		var ele_id = $(element).attr("id");
		var ele_array = ele_id.split("-");
		var pnum = ele_array[1];
		
		var barcode = $(element).val();
		$.post("ajax/fetch_pro.php",{barcode:barcode},function(data){
			
			
			if(data=="New Product")
			{
				alert(data);
			}
			else
			{
			
			data_array = data.split("~");
			
			$("#pcat-"+pnum).html('<option>'+data_array[0]+'</option>');
			
			$("#psubcat-"+pnum).html('<option>'+data_array[1]+'</option>');
			
			$("#p-"+pnum).html('<option>'+data_array[2]+'</option>');
			
			$("#pprice-"+pnum).val(data_array[3]);
			$("#pgstrate-"+pnum).val(data_array[4]);
			$("#pmrp-"+pnum).val(data_array[5]);
			$("#pdiscount-"+pnum).val(data_array[6]);
			$("#psaleprice-"+pnum).val(data_array[7]);
			$("#pgrossprofit-"+pnum).val(data_array[8]);
			$("#pgstprofit-"+pnum).val(data_array[9]);
			$("#pnetprofit-"+pnum).val(data_array[10]);
			$("#pprofitcut-"+pnum).val(data_array[11]);
			$("#pprofitdisburse-"+pnum).val(data_array[12]);
			$("#pprofitbp-"+pnum).val(data_array[13]);
			$("#pbvcalper-"+pnum).val(data_array[14]);
			$("#pbv-"+pnum).val(data_array[15]);
			
			$("#pid-"+pnum).html('<font size="2">Product ID : '+data_array[16]+'</font>')
			}
		});
	}
}



function generate_fstock_id()
{
		var date = new Date();
var components = [
    date.getYear(),
    date.getMonth(),
    date.getDate(),
    date.getHours(),
    date.getMinutes(),
    date.getSeconds(),
    date.getMilliseconds()
];

var stock_id = components.join("");
	$("#fstock_id").html(stock_id);
	$("#fstock_id_input").val(stock_id);
}

function open_fs()
{
	$("#purchase-container").hide();
	$("#fs-container").show();
	
	generate_fstock_id();
}

function back_fs()
{
	$("#purchase-container").show();
	$("#fs-container").hide();

}

function load_pro(e,element)
{
	
	if(e.keyCode=='13')
	{
		var ele_id = $(element).attr("id");
		var ele_array = ele_id.split("-");
		var pnum = ele_array[1];
		
		var barcode = $(element).val();
		$.post("ajax/load_pro.php",{barcode:barcode},function(data){
			if(data=='New Product')
			{
				alert(data);
			}
			else
			{
				var data_array = data.split("~");
				$("#fpcat-"+pnum).html('<option>'+data_array[0]+'</option>');
				
				$("#fsubcat-"+pnum).html('<option>'+data_array[1]+'</option>');
				
				$("#fspname-"+pnum).html('<option>'+data_array[2]+'</option>');
				
				$("#fpid-"+pnum).html("Product ID "+data_array[3]);
			}
		});
		
	}
}


function fs_add(element)
{
	var id = $(element).attr("value");
	var pnum = parseInt(id) + 1;
		$("#fs-products").append('<div class="fs-products" id="fs_products-'+pnum+'"><div class="fs-pnum">Product '+pnum+'<br><span id="fpid-'+pnum+'">Scan Product for product ID</span></div><div class="fs-inputbox"><b>Scan Barcode</b><br><input type="text" placeholder="Barcode" class="fs-field" id="fsbarcode-'+pnum+'" onkeyup="load_pro(event,this);"></div><br><br><br><br><div class="fs-inputbox"><b>Product Category</b><br><select class="fs-field" id="fpcat-'+pnum+'"><option value="">Select Category</option></select></div><div class="fs-inputbox"><b>Product Sub Category</b><br><select class="fs-field" id="fsubcat-'+pnum+'"><option value="">Select Sub Category</option></select></div><div class="fs-inputbox"><b>Product Name</b><br><select class="fs-field" id="fspname-'+pnum+'"><option value="">Product Name</option></select></div><div class="fs-inputbox"><b>Quantity</b><br><input type="text" placeholder="Quantity" class="fs-field" id="fsquan-'+pnum+'"></div><div class="fs-inputbox"><b>Batch Number</b><br><input type="text" placeholder="Batch Number" class="fs-field" id="fsbatch-'+pnum+'"></div><div class="fs-inputbox"><b>MFD Date</b><br><input type="date" class="fs-field" id="fsmfd_date-'+pnum+'"></div><div class="fs-inputbox"><b>Exp Date</b><br><input type="date" class="fs-field" id="fsexp_date-'+pnum+'"></div></div>');
		
		$(element).attr("value",pnum);
		$("#fs-close").attr("value",pnum);
		
}


function fclose_pro(element)
{
	var pnum  = $(element).attr("value");
	var prev = parseInt(pnum) -1;
	
	$("#fs_products-"+pnum).remove();
	
	$(element).attr("value",prev);
	$("#fs-add").attr("value",prev);	
	
}

function validate_bill()
{
	var mfd_by = $("#fmfd_by").val();
	var pur_date = $("#fpur_date").val();
	var bill_num = $("#fbill_num").val();
	var stock_id = $("#fstock_id_input").val();
	
	if(mfd_by=="")
	{
		alert("Please Enter a value for MFD BY");
	}
	else if(pur_date=="")
	{
		alert("Please Select a Purchase Date"); 
	}
	else if(bill_num=="")
	{
		alert("Please Enter Bill Number");
	}
	else if(stock_id=="") 
	{
		alert("Stock ID not Assigned Please Refresh");
	}
	else
	{
		var pnum = $("#fs-add").attr("value");
		var allow = "no";
		for(var i=1;i<=pnum;i++)
		{
			var barcode = $("#fsbarcode-"+i).val();
			var pcat = $("#fpcat-"+i).val();
			var psubcat = $("#fsubcat-"+i).val();
			var pname = $("#fspname-"+i).val();
			var pquan = $("#fsquan-"+i).val();
			var batch = $("#fsbatch-"+i).val();
			var mfd_date = $("#fsmfd_date-"+i).val();
			var exp_date = $("#fsexp_date-"+i).val();
			
			if(barcode=="")
			{
				alert("barcode is Empty in product "+i);
				allow = "no";
				break;
			}
			else if(pcat=="")
			{
				alert("Product Category is empty in Product "+i);
				allow = "no";
				break;
			}
			else if(psubcat=="")
			{
				alert("Product Sub Category is Blank in Product "+i);
				allow = "no";
				break;
			}
			else if(pname=="")
			{
				alert("Product Name is Empty in Product "+i);
				allow = "no";
				break;
			}
			else if(pquan=="")
			{
				alert("Product Quantity is blank in Product "+i);
				allow = "no";
				break;
			}
			else if(isNaN(pquan))
			{
				alert("Incorrect Value for Quantity in Product "+i);
				allow = "no";
				break;
			}
			else if(batch=="")
			{
				alert("Batch number is blank in Product "+i);
				allow = "no";
				break;
			}
			else if(mfd_date=="")
			{
				alert("MFD Date is blank in Product "+i);
				allow = "no";
				break;
			}
			else if(exp_date=="")
			{
				alert("Exp Date is blank in Product "+i);
				allow = "no";
				break;
			}
			else
			{
				allow="yes";
			}
		}
		
		if(allow=="yes")
		{
			$("#fsc-mfd").html(mfd_by);
			$("#fsc-purdate").html(pur_date);
			$("#bill_no").html(bill_num);
			
			for(var p=1;p<=pnum;p++)
			{
				var lpid = $("#fpid-"+p).text();
				lpid = lpid.slice(11);
				var lpname = $("#fspname-"+p).val();
				var lquan = $("#fsquan-"+p).val();
				
				
				$("#fsc-output").append('<div class="fsc-row"><div class="fsc-col" style="width:50px;">'+p+'</div><div class="fsc-col" style="width:60px;">'+lpid+'</div><div class="fsc-col" style="width:340px;">'+lpname+'</div><div class="fsc-col" style="width:46px;">'+lquan+'</div></div>');
			}
			
			
			
			$("#fsc-container").show();
		}
		
		
		
		
	}
}



function close_fsc()
{
	$("#fsc-mfd").html('');
			$("#fsc-purdate").html('');
			$("#bill_no").html('');
	
	$("#fsc-output").html('');
	$("#fsc-container").hide();
}


function save_fs()
{
	$("#fs_save").attr("onclick","");
	
	var mfd_by = $("#fmfd_by").val();
	var pur_date = $("#fpur_date").val();
	var bill_num = $("#fbill_num").val();
	var stock_id = $("#fstock_id_input").val();	
	var pnum = $("#fs-add").attr("value");
	
	var pid = new Array();
	var barcode = new Array();
	var qty = new Array();
	var batch = new Array();
	var mfd_date = new Array();
	var exp_date = new Array();
	
	for(var i=1;i<=pnum;i++)
	{
		pid.push($.trim($('#fpid-'+i).text().slice(11)));
		barcode.push($.trim($('#fsbarcode-'+i).val()));
		qty.push($.trim($('#fsquan-'+i).val()));
		batch.push($.trim($('#fsbatch-'+i).val()));
		mfd_date.push($.trim($('#fsmfd_date-'+i).val()));
		exp_date.push($.trim($('#fsexp_date-'+i).val()));
	}
	
	$.post("ajax/confirm_fs.php",{total_products:pnum,mfdby:mfd_by,purchase_date:pur_date,bill_number:bill_num,stock_id:stock_id,quantity:qty,batch_number:batch,mfd_date:mfd_date,expiry_date:exp_date,pid:pid,barcode:barcode},function(data){
		alert("Stock Updated");
		$("#fsc-mfd").html('');
			$("#fsc-purdate").html('');
			$("#bill_no").html('');
	
	$("#fsc-output").html('');
	$("#fsc-container").hide();
	
	for(var k=2;k<=pnum;k++)
	{
		$("#fs_products-"+k).remove();
	}
	
	$("#fs-add").attr("value","1");
	$("#fs-close").attr("value","1");

	var mfd_by = $("#fmfd_by").val('');
	var pur_date = $("#fpur_date").val('');
	var bill_num = $("#fbill_num").val('');
	generate_fstock_id();
	$("#fsbarcode-1").val('');
	$("#fsquan-1").val('');
	$("#fsbatch-1").val('');
	$("#fsexp_date-1").val('');
	$("#fsmfd_date-1").val('');
	$("#fpcat-1").html('<option value="">Select Product Category</option>');
	$("#fsubcat-1").html('<option value="">Select Product Sub Category</option>');
	$("#fspname-1").html('<option value="">Select Product</option>');
	
	$("#fs_save").attr("onclick","save_fs();");
	});
	
	
	
}