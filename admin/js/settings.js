function addbox(ele)
{
	ele_id = $(ele).attr("id");
	ele_val = $(ele).attr("value");
	
	next_box  = parseInt(ele_val) +1;
	
	
	
	if(ele_id=='perslab')
	{
		if($("#director-slab").length)
		{
			alert("Slab already Ended");
		}
		else
		{
		
		var persr_val = $("#persr-"+ele_val).val();
		var perer_val = $("#perer-"+ele_val).val();
		var perper_val = $("#perper-"+ele_val).val();
		
		if(persr_val=="")
		{
			alert("Missing Start Range");
		}
		else if(isNaN(persr_val))
		{
			alert("Invalid Value for Start Range");
		}
		else if (perer_val=="")
		{
			alert("Missing End Range");
		}
		else if(isNaN(perer_val))
		{
			alert("Invalid Value for End Range");
		}
		else if(perper_val=="")
		{
			alert("Missing Percentage");
		}
		else if(isNaN(perper_val))
		{
			alert("Invalid Value For Percentage");
		}
		else if(parseInt(persr_val)>=parseInt(perer_val))
		{
			alert("End Range Should be Greater");
		}
		else
		{
		
		var new_val = parseInt(perer_val)+1;
			
		
		$("#perslab-out").append('<div class="slab-line-cover" id="perscover-'+next_box+'"><input type="text" class="slab-val" placeholder="  Start Range" id="persr-'+next_box+'" value="'+new_val+'" disabled><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="perer-'+next_box+'"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="perper-'+next_box+'"></div>');
		
		$("#persr-"+ele_val).attr("disabled","disabled");
		$("#perer-"+ele_val).attr("disabled","disabled");
		$("#perper-"+ele_val).attr("disabled","disabled");
		
		$(ele).attr("value",next_box);
		$("#rperslab").attr("value",next_box);
		}
		}
	}
	else if(ele_id=="dirslab")
	{
		if($("#leadership-slab").length)
		{
			alert("Slab already Ended");
		}
		else
		{
		var dirsr_val = $("#dirsr-"+ele_val).val();
		var direr_val = $("#direr-"+ele_val).val();
		var dirper_val = $("#dirper-"+ele_val).val();
		
		if(dirsr_val=="")
		{
			alert("Missing Start Range");
		}
		else if(isNaN(dirsr_val))
		{
			alert("Invalid Value for Start Range");
		}
		else if (direr_val=="")
		{
			alert("Missing End Range");
		}
		else if(isNaN(direr_val))
		{
			alert("Invalid Value for End Range");
		}
		else if(dirper_val=="")
		{
			alert("Missing Percentage");
		}
		else if(isNaN(dirper_val))
		{
			alert("Invalid Value For Percentage");
		}
		else if(parseInt(dirsr_val)>=parseInt(direr_val))
		{
			alert("End Range Should be Greater");
		}
		else
		{
		
		var new_val = parseInt(direr_val)+1;
			
		
		$("#dirslab-out").append('<div class="slab-line-cover" id="dirscover-'+next_box+'"><input type="text" class="slab-val" placeholder="  Start Range" id="dirsr-'+next_box+'" value="'+new_val+'" disabled><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="direr-'+next_box+'"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="dirper-'+next_box+'"></div>');
		
		$("#dirsr-"+ele_val).attr("disabled","disabled");
		$("#direr-"+ele_val).attr("disabled","disabled");
		$("#dirper-"+ele_val).attr("disabled","disabled");
		
		$(ele).attr("value",next_box);
		$("#rdirslab").attr("value",next_box);
		}
		
		
		}
		
		
	}
	else if(ele_id=='ledslab')
	{
		var ledsr_val = $("#ledsr-"+ele_val).val();
		var leder_val = $("#leder-"+ele_val).val();
		var ledper_val = $("#ledper-"+ele_val).val();
		
		if(dirsr_val=="")
		{
			alert("Missing Start Range");
		}
		else if(isNaN(ledsr_val))
		{
			alert("Invalid Value for Start Range");
		}
		else if (leder_val=="")
		{
			alert("Missing End Range");
		}
		else if(isNaN(leder_val))
		{
			alert("Invalid Value for End Range");
		}
		else if(ledper_val=="")
		{
			alert("Missing Percentage");
		}
		else if(isNaN(ledper_val))
		{
			alert("Invalid Value For Percentage");
		}
		else if(parseInt(ledsr_val)>=parseInt(leder_val))
		{
			alert("End Range Should be Greater");
		}
		else
		{
		
		var new_val = parseInt(leder_val)+1;
			
		
		$("#ledslab-out").append('<div class="slab-line-cover" id="ledscover-'+next_box+'"><input type="text" class="slab-val" placeholder="  Start Range" id="ledsr-'+next_box+'" value="'+new_val+'" disabled><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="leder-'+next_box+'"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="ledper-'+next_box+'"></div>');
		
		$("#ledsr-"+ele_val).attr("disabled","disabled");
		$("#leder-"+ele_val).attr("disabled","disabled");
		$("#ledper-"+ele_val).attr("disabled","disabled");
		
		$(ele).attr("value",next_box);
		$("#rledslab").attr("value",next_box);
		}
	}
}



function removebox(ele)
{
	ele_id = $(ele).attr("id");
	ele_val = $(ele).attr("value");
	
	prev_box  = parseInt(ele_val) -1;
	
	if(ele_id=='rperslab')
	{
		if($("#director-slab").length)
		{
			alert("Slab Already Ended");
		}
		else if(ele_val==1)
		{
			alert("Cannot Delete First Row");
		}
		else
		{
		$("#perscover-"+ele_val).remove();
		$(ele).attr("value",prev_box);
		
		if(prev_box == 1)
		{
			$("#persr-"+prev_box).removeAttr("disabled","enabled");
			$("#perer-"+prev_box).removeAttr("disabled","enabled");
			$("#perper-"+prev_box).removeAttr("disabled","enabled");
			$(ele).attr("value",prev_box);
			$("#perslab").attr("value",prev_box);
		}
		else
		{
			$("#perer-"+prev_box).removeAttr("disabled");
			$("#perper-"+prev_box).removeAttr("disabled");
			$(ele).attr("value",prev_box);
			$("#perslab").attr("value",prev_box);
		}
		
		}
	}
	else if(ele_id=='rdirslab')
	{
		if($("#leadership-slab").length)
		{
			alert("Slab Already Ended");
		}
		else if(ele_val==1)
		{
			alert("Cannot Delete First Row");
		}
		else
		{
		
		$("#dirscover-"+ele_val).remove();
		$(ele).attr("value",prev_box);
			$("#direr-"+prev_box).removeAttr("disabled");
			$("#dirper-"+prev_box).removeAttr("disabled");
			$(ele).attr("value",prev_box);
			$("#dirslab").attr("value",prev_box);
		}

	}
	else if(ele_id=='rledslab')
	{
		
		if(ele_val==1)
		{
			alert("Cannot Delete First Row");
		}
		else
		{
		$("#ledscover-"+ele_val).remove();
		$(ele).attr("value",prev_box);
			$("#leder-"+prev_box).removeAttr("disabled");
			$("#ledper-"+prev_box).removeAttr("disabled");
			$(ele).attr("value",prev_box);
			$("#ledslab").attr("value",prev_box);
		}
	}
	
}


function endslab()
{
	if($("#leadership-slab").length)
	{
		alert("All the Slabs Already Exists");
	}
	else if($("#director-slab").length)
	{
		//alert("LeaderShip need to be added");
		
		prevSlabTupple = $("#dirslab").attr("value");
		
		if(prevSlabTupple<=0)
		{
			alert("Please Add atleast one Range in Director Slab");
		}
		else if($("#dirsr-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for Start Range in Director Slab");
		}
		else if(isNaN($("#dirsr-"+prevSlabTupple).val()))
		{
			alert("Invalid value for Start Range in Director Slab");
		}
		else if($("#direr-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for End Range in Director Slab");
		}
		else if(isNaN($("#direr-"+prevSlabTupple).val()))
		{
			alert("Invalid value for End Range in Director Slab");
		}
		else if($("#dirper-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for Percentage in Director Slab");
		}
		else if(isNaN($("#dirper-"+prevSlabTupple).val()))
		{
			alert("Invalid value for Percentage in Director Slab");
		}
		else if(parseInt($("#dirsr-"+prevSlabTupple).val())>=parseInt($("#direr-"+prevSlabTupple).val()))
		{
			alert("End Range should be greater than Starting Range in Director Slab");
		}
		else
		{
			var next_val = parseInt($("#direr-"+prevSlabTupple).val()) +1;
			$("#slab-out").append('<div id="leadership-slab"><div class="cmp-heading" style="margin-top:20px;"><u>LeaderShip Slab</u></div><div class="cmp-date-box"><div class="date-text">Min. Purchase</div><input type="text" class="date-fields" placeholder="  Min Purchase" id="led_min"></div><div id="ledslab-out"><div class="slab-line-cover" id="ledscover-1"><input type="text" class="slab-val" placeholder="  Start Range" id="ledsr-1" value="'+next_val+'" disabled><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="leder-1"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="ledper-1"></div></div><div class="button-box"><div class="slab-btn" id="rledslab" value="1" onclick="removebox(this);">-</div><div class="slab-btn" id="ledslab" value="1" onclick="addbox(this);">+</div></div></div>');
			
			$("#dirsr-"+prevSlabTupple).attr("disabled","disabled");
			$("#direr-"+prevSlabTupple).attr("disabled","disabled");
			$("#dirper-"+prevSlabTupple).attr("disabled","disabled");
		}
		
		
		
	}
	else if($("#performance-slab").length)
	{
		prevSlabTupple = $("#perslab").attr("value");
		
		if(prevSlabTupple<=0)
		{
			alert("Please Add atleast one Range in Performance Slab");
		}
		else if($("#persr-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for Start Range in Performance Slab");
		}
		else if(isNaN($("#persr-"+prevSlabTupple).val()))
		{
			alert("Invalid value for Start Range in Performance Slab");
		}
		else if($("#perer-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for End Range in Performance Slab");
		}
		else if(isNaN($("#perer-"+prevSlabTupple).val()))
		{
			alert("Invalid value for End Range in Performance Slab");
		}
		else if($("#perper-"+prevSlabTupple).val()=="")
		{
			alert("Please Enter the value for Percentage in Performance Slab");
		}
		else if(isNaN($("#perper-"+prevSlabTupple).val()))
		{
			alert("Invalid value for Percentage in Performance Slab");
		}
		else if(parseInt($("#persr-"+prevSlabTupple).val())>=parseInt($("#perer-"+prevSlabTupple).val()))
		{
			alert("End Range should be greater than Starting Range in performance Slab");
		}
		else
		{
			var next_val = parseInt($("#perer-"+prevSlabTupple).val()) +1;
			$("#slab-out").append('<div id="director-slab"><div class="cmp-heading" style="margin-top:20px;"><u>Director Slab</u></div><div class="cmp-date-box"><div class="date-text">Min. Purchase</div><input type="text" class="date-fields" placeholder="  Min Purchase" id="dir_min"></div><div id="dirslab-out"><div class="slab-line-cover" id="dirscover-1"><input type="text" class="slab-val" placeholder="  Start Range" id="dirsr-1" value="'+next_val+'" disabled><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="direr-1"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="dirper-1"></div></div><div class="button-box"><div class="slab-btn" id="rdirslab" value="1" onclick="removebox(this);">-</div><div class="slab-btn" id="dirslab" value="1" onclick="addbox(this);">+</div></div></div>');
			
			$("#persr-"+prevSlabTupple).attr("disabled","disabled");
			$("#perer-"+prevSlabTupple).attr("disabled","disabled");
			$("#perper-"+prevSlabTupple).attr("disabled","disabled");
		}
		
	}
}


function remove_slab()
{
	if($("#leadership-slab").length)
	{
		$("#leadership-slab").remove();
		prevSlabTupple = $("#dirslab").attr("value");
		$("#direr-"+prevSlabTupple).removeAttr("disabled");
		$("#dirper-"+prevSlabTupple).removeAttr("disabled");
		
	}
	else if($("#director-slab").length)
	{
		$("#director-slab").remove();
		prevSlabTupple = $("#perslab").attr("value");
		
		if(prevSlabTupple==1)
		{
			$("#persr-"+prevSlabTupple).removeAttr("disabled");
			$("#perer-"+prevSlabTupple).removeAttr("disabled");
		$("#perper-"+prevSlabTupple).removeAttr("disabled");
		}
		else
		{
		$("#perer-"+prevSlabTupple).removeAttr("disabled");
		$("#perper-"+prevSlabTupple).removeAttr("disabled");
		}
	}
	else
	{
		alert("Performance Slab Cannot be Removed");
	}
}


function submit_plan()
{
	var pdate = $("#pdate").val();
	var pmonth = $("#pmonth").val();
	var pyear = $("#pyear").val();
	var per_min = $("#per_min").val();
	var led_min = $("#led_min").val();
	var dir_min = $("#dir_min").val();
	
	var last_row = $("#ledslab").attr("value");
	var endrled  = $("#leder-"+last_row).val();
	
	if(pdate=="")
	{
		alert("Please Select a Effective Date");
	}
	else if(pmonth=="")
	{
		alert("Please Select a Effective Month");
	}
	else if(pyear=="")
	{
		alert("Please Select a Effective Year");
	}
	else if($("#leadership-slab").length==0)
	{
		alert("Please Create All the Slabs First");
	}
	else if(per_min=="")
	{
		alert("Please Enter a Value for Minimum Purchase in Performance Slab");
	}
	else if(isNaN(per_min))
	{
		alert("Please Enter a Valid value for Minimum Purchase in Performance slab");
	}
	else if(led_min=="")
	{
		alert("Please Enter a Value for Minimum Purchase in LeaderShip Slab");
	}
	else if(isNaN(led_min))
	{
		alert("Please Enter a Valid value for Minimum Purchase in LeaderShip slab");
	}
	else if(dir_min=="")
	{
		alert("Please Enter a Value for Minimum Purchase in Director Slab");
	}
	else if(isNaN(dir_min))
	{
		alert("Please Enter a Valid value for Minimum Purchase in Director slab");
	}
	else if(endrled=="")
	{
		alert("Missing End Range in LeaderShip Slab");
	}
	else if(isNaN(endrled))
	{
		alert("Invalid value for End Range in LeaderShip Slab");
	}
	else if($("#ledper-"+last_row).val()=="")
	{
		alert("Missing percentage in LeaderShip Slab");
	}
	else if(isNaN($("#ledper-"+last_row).val()))
	{
		alert("Invalid value for percentage in LeaderShip Slab");
	}
	else
	{
		var perrows = $("#perslab").attr("value");
		var dirrows = $("#dirslab").attr("value");
		var ledrows = $("#ledslab").attr("value");
		
		
		
		var persra = new Array();
		var perera = new Array();
		var perpera = new Array();
		
		for(var i=1;i<=perrows;i++)
		{
			persra.push($("#persr-"+i).val());
			perera.push($("#perer-"+i).val());
			perpera.push($("#perper-"+i).val());
		}
		
		
		var dirsra = new Array();
		var direra = new Array();
		var dirpera = new Array();
		
		for(var i=1;i<=dirrows;i++)
		{
			dirsra.push($("#dirsr-"+i).val());
			direra.push($("#direr-"+i).val());
			dirpera.push($("#dirper-"+i).val());
		}
		
		
		var ledsra = new Array();
		var ledera = new Array();
		var ledpera = new Array();
		
		for(var i=1;i<=ledrows;i++)
		{
			ledsra.push($("#ledsr-"+i).val());
			ledera.push($("#leder-"+i).val());
			ledpera.push($("#ledper-"+i).val());
		}
		
		
		
		
		
		$.post("ajax/marketing_plan.php",{date:pdate,month:pmonth,year:pyear,per_min:per_min,led_min:led_min,dir_min,dir_min,persra:persra,perera:perera,perpera:perpera,dirsra:dirsra,direra:direra,dirpera:dirpera,ledsra:ledsra,ledera:ledera,ledpera:ledpera},function(data){
			
			var data2 = data.substring(0,4);
			if(data2=='Plan')
			{
			alert(data);
			load_plan();
			$("#leadership-slab").remove();
			$("#director-slab").remove();
			$("#perslab-out").html('<div class="slab-line-cover" id="perscover-1"><input type="text" class="slab-val" placeholder="  Start Range" id="persr-1"><input type="text" class="slab-val" style="margin-left:10px;" placeholder="  End Range" id="perer-1"><input type="text" class="slab-val" style="width:50px;margin-left:10px;" placeholder="  %age" id="perper-1"></div>');
			
			$('#pdate').removeAttr('selected').find('option:Select Date').attr('selected', 'selected');
			$('#pmonth').removeAttr('selected').find('option:Select Month').attr('selected', 'selected');
			$('#pyear').removeAttr('selected').find('option:Select Year').attr('selected', 'selected');
			
			}
			else
			{
				alert('Technical Problem');
			}
		});
	}
}


function load_plan()
{
	$("#cmp").html('<center><img src="images/database_loader.gif" style="width:200px;height:200px;"></center>');
	$.get("ajax/load_plan.php",function(data){
		$("#cmp").html(data);
	});
}


function open_mp()
{
	$("#settings-container").hide();
	$("#mp-container").show();
}

function close_mp()
{
	$("#settings-container").show();
	$("#mp-container").hide();
}


function setcs_on()
{
	$("#fc-on").css("background-color","#87E5B3");
	$("#fc-on").css("color","white");
	$("#fc-off").css("background-color","#2a3b4f");
	$("#fc-off").css("color","#2a3b4f");
	
	$("#fc-status").val("on");
}

function setcs_off()
{
	$("#fc-on").css("background-color","#2a3b4f");
	$("#fc-on").css("color","#2a3b4f");
	$("#fc-off").css("background-color","#A2A0A0");
	$("#fc-off").css("color","white");
	$("#fc-status").val("off");
}

function update_fc()
{
	var fc_value = $("#fc_value").val();
	var fc_valid = $("#fc-valid").val();
	var fc_status = $("#fc-status").val();
	
	$.post("ajax/update_fc.php",{fc_value:fc_value,fc_valid:fc_valid,fc_status:fc_status},function(data){
		alert(data);
	});
	
}



function cancel_ac()
{
	$("#add_ac_con").hide();
	$("#cstable-con").show();
}

function add_ac_open()
{
	$("#add_ac_con").show();
	$("#cstable-con").hide();
}

function add_ac()
{
	var value = $("#ac-val").val();
	var thres = $("#ac-thres").val();
	var validity = $("#ac-valid").val();
	
	if(value=="")
	{
		alert("Value cannot be blank");
	}
	else if(isNaN(value))
	{
		alert("Invalid value for coupon");
	}
	else if(thres=="")
	{
		alert("Threshold cannot be blank");
	}
	else if(isNaN(thres))
	{
		alert("Invalid value for threshold");
	}
	else if(validity=="")
	{
		alert("validity cannot be blank");
	}
	else if(isNaN(validity))
	{
		alert("Invalid value for validity");
	}
	else
	{
		$.post("ajax/add_ac.php",{value:value,thres:thres,validity:validity},function(data){
			
			if(data=="Coupon at this threshold already exists")
			{
				alert(data);
			}
			else
			{
			$("#ac-val").val('');
			$("#ac-thres").val('');
			$("#ac-valid").val('');
			
			$("#add_ac_con").hide();
			$("#cstable-con").show();
			
			$("#sc-output").prepend('<div class="head-row" style="box-shadow:0px 0px 0px grey;" id="scrow-'+data+'"><div class="cscells" style="width:50px;">'+data+'</div><div class="cscells" style="width:70px;"><input type="text" value="'+value+'" class="table-fields" id="tscvalue-'+data+'"></div><div class="cscells" style="width:90px;"><input type="text" value="'+thres+'" class="table-fields" id="tscthres-'+data+'"></div><div class="cscells" style="width:70px;"><input type="text" value="'+validity+'" class="table-fields" id="tscvalidity-'+data+'"></div><div class="cscells" style="width:50px;"><select id="tscstatus-'+data+'"><option>on</option><option>on</option><option>off</option></select></div><div class="cscells" style="width:55px;"><div class="ac-update-btn" onclick="update_tsc(this);" id="update_tsc-'+data+'">Update</div></div><div id="delac-'+data+'" class="cscells  delac" style="width:30px;border-right:0px;" onclick="del_sc(this);"><i class="fa fa-trash-alt"></i></div></div>');
			
			alert("Coupon Created");
			}
		});
	}
	
}


function update_tsc(e)
{
	e_id = $(e).attr("id");
	e_array = e_id.split("-");
	coupon_id = e_array[1];
	var value = $("#tscvalue-"+coupon_id).val();
	var thres = $("#tscthres-"+coupon_id).val();
	var validity = $("#tscvalidity-"+coupon_id).val();
	var status = $("#tscstatus-"+coupon_id).val();
	
	if(value=="")
	{
		alert("Coupon Value Cannot be Empty");
	}
	else if(isNaN(value))
	{
		alert("Invalid Coupon Value");
	}
	else if(thres=="")
	{
		alert("Threshold Cannot be Empty");
	}
	else if(isNaN(thres))
	{
		alert("Invalid Threshold Value");
	}
	else if(validity=="")
	{
		alert("Validity Cannot be Empty");
	}
	else if(isNaN(validity))
	{
		alert("Invalid Validity Value");
	}
	else
	{
		$.post("ajax/update_ac.php",{value:value,thres:thres,validity:validity,status:status,coupon_id:coupon_id},function(data){
			
			alert(data);
		});
	}
}

function del_sc(e)
{
	e_id = $(e).attr("id");
	e_array = e_id.split("-");
	coupon_id = e_array[1];
	
	$.post("ajax/del_ac.php",{coupon_id:coupon_id},function(data){
		if(data=="Coupon Deleted")
		{
			alert(data);
			$("#scrow-"+coupon_id).fadeOut();
		}
		else
		{
			alert(data);
		}
	})
}

