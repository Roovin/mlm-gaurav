$(document).ready(function(){
	$("#add-pro").click(function(){
		$("#product-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();

		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			$("#add-product-container").show();
		}, 3000);

		
	});
	
	
	$("#product-images").click(function(){
		$("#product-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();

		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			$(".pi-container").show();
		}, 3000);

		
	});
	
	
	
	$("#pi-back").click(function(){
		$(".pi-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();
		
		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			
			$("#product-container").show();
		}, 3000);
	});
	
	
	$("#product-database").click(function(){
		$("#product-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();
		
		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			$("#product-data-container").show();
		}, 3000);
	});
	
	$("#pd-back").click(function(){
		$("#product-data-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();
		
		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			
			$("#product-container").show();
		}, 3000);
	});
	
	
	$("#ap-back").click(function(){
		$("#add-product-container").hide();
		$("body").css("background-color","#15191f");
		$(".loading").show();

		setTimeout(function(){ 
			$(".loading").hide();
			$("body").css("background-color","#cdcdcf");
			$("#product-container").show();
		}, 3000);

		
	});
	
	
	
	
	$(document).on("dblclick",'.editable',function(){
		var id = this.id;
		var id_array = id.split("-");
		var column = id_array[0];
		var column_id = id_array[1];
		
		if(column=='name')
		{
			$("#data-loader-image").show();
			$.post("ajax/getcolumnvalue.php",{column:column,column_id:column_id},function(data){
				$("#"+id).html('<input type="text" style="width:100%;height:100%;" value="'+data+'" id="editname-'+column_id+'" onkeydown="editpro(this);">');
				$("#data-loader-image").hide();
				
			})
			
		}
		else if(column=='unit')
		{
			$("#data-loader-image").show();
			$.post("ajax/getcolumnvalue.php",{column:column,column_id:column_id},function(data){
				$("#"+id).html('<select style="width:100%;height:100%;" id="editunit-'+column_id+'" onkeydown="editpro(this);"><option value="">Select Unit</option><option>Kg</option><option>g</option><option>pcs</option><option>Ltr</option></select>');
				$("#data-loader-image").hide();
			});
		}
		else if(column=='category')
		{
			$("#data-loader-image").show();
			
			$.get("ajax/getcat.php",function(data){
				
				$("#"+id).html('<select style="width:100%;height:100%;" id="editcat-'+column_id+'" onchange="editloadsub(this);" onkeydown="editpro(this);">'+data+'</select>');
				
				$("#subcat-"+column_id).html('<select style="width:100%;height:100%;" id="editsubcat-'+column_id+'" onkeydown="editpro(this);"><option>Select Sub Category</option></select>');
				
				
				$("#data-loader-image").hide();
			});				
		}
		else if(column=='stock_a')
		{
			$("#data-loader-image").show();
			$.post("ajax/getcolumnvalue.php",{column:column,column_id:column_id},function(data){
				$("#"+id).html('<input type="text" style="width:100%;height:100%;" value="'+data+'" id="editstocka-'+column_id+'" onkeydown="editpro(this);">');
				$("#data-loader-image").hide();
				
			})
		}
		else if(column=='stock_b')
		{
			$("#data-loader-image").show();
			$.post("ajax/getcolumnvalue.php",{column:column,column_id:column_id},function(data){
				$("#"+id).html('<input type="text" style="width:100%;height:100%;" value="'+data+'" id="editstockb-'+column_id+'" onkeydown="editpro(this);">');
				$("#data-loader-image").hide();
				
			})
		}
	});
	
	
	
	$('#pi-pimage').click(function(){
		
		var btn_value = $("#update-btn").attr("value");
	
		if(btn_value=="0")
		{
			alert("No Product Selected");
		}
		else
		{
			$('#pi-file').click();
		}
	});
	
	
	

});






function changesubcat()
{
	var category = document.getElementById("category").value;
$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#sub-category").html(data);
	});
}


function disable()
{
	$("#category").attr("disabled","disabled");
	$("#new-category").removeAttr("disabled");
	$("#new-sub-cat").attr("checked","checked");
	$("#sub-cat").attr("disabled","disabled");
	$("#sub-cat").removeAttr("checked");
	$("#sub-category").attr("disabled","disabled");
	$("#new-sub-category").removeAttr("disabled");
}

function disable2()
{
	$("#new-category").attr("disabled","disabled");
	$("#sub-cat").removeAttr("disabled");
	$("#category").removeAttr("disabled");
}

function disable3()
{
	$("#sub-category").removeAttr("disabled");
	$("#new-sub-category").attr("disabled","disabled");
}

function disable4()
{
	$("#sub-category").attr("disabled","disabled");
	$("#new-sub-category").removeAttr("disabled");
}


function addpro()
{
	$("#add-product-button").attr("onclick","");
	var product_name = document.getElementById("product_name").value;
	var cat_version = $('input[name=category]:checked').val();
	
	if(cat_version=='old_cat')
	{
		var category = document.getElementById("category").value;
		
		var subcat_version = $('input[name=sub-category]:checked').val();
		
		if(subcat_version=="old-sub")
		{
			var sub_category = document.getElementById("sub-category").value;
		}
		else
		{
			var sub_category = document.getElementById("new-sub-category").value;
		}
		
		
	}
	else
	{
		var category = document.getElementById("new-category").value;
		
		var sub_category = document.getElementById("new-sub-category").value;
		
		var subcat_version = "new-sub";
	}
	
	var product_unit = document.getElementById("product_unit").value;
	var stock_for_a = document.getElementById("stock_a").value;
	var stock_for_b = document.getElementById("stock_b").value;
	
	if(product_name=="" || $.trim( $('#product_name').val() ) == '')
	{
		$("#add-pro-error").html("Please Enter Product Name");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
	}
	else if(category=="" || $.trim(category)=='')
	{
		$("#add-pro-error").html("Please Select/Enter Category");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
		
	}
	else if(sub_category == "" || $.trim(sub_category)=='')
	{
		$("#add-pro-error").html("Please Select/Enter Sub-Category");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
	}
	else if(product_unit=="")
	{
		$("#add-pro-error").html("Please Select a Product-Unit");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
	}
	else if(stock_for_a=="" || $.trim( $('#stock_a').val() ) == '')
	{
		$("#add-pro-error").html("Please Enter a Value of Minimum Stock for A Grade Stores");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		$("#add-pro-error").css("width","400px");
		$("#add-pro-error").css("margin-left","-40px");
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
	}
	else if(stock_for_b=="" || $.trim( $('#stock_b').val() ) == '')
	{
		$("#add-pro-error").html("Please Enter a Value of Minimum Stock for B Grade Stores");
		$("#add-pro-error").css("border","1px solid red");
		$("#add-pro-error").css("color","red");
		$("#add-pro-error").css("width","400px");
		$("#add-pro-error").css("margin-left","-40px");
		
		$("#add-pro-error").show().delay(2000).fadeOut();
		$("#add-product-button").attr("onclick","addpro();");
	}
	
	else
	{
		$("#add-product-loader").show();
		
		
		$.post("ajax/addpro.php",{product_name:product_name,category:category,sub_category:sub_category,product_unit:product_unit,cat_version:cat_version,subcat_version:subcat_version,stock_a:stock_for_a,stock_b:stock_for_b},function(data){
			
			
			$("#add-pro-error").html(data);
			$("#add-pro-error").css("border","1px solid green");
			$("#add-pro-error").css("color","green");
			$("#add-pro-error").show();
			
			if(data=="Product Added Succesfully")
			{
			$("#product_name").val("");
			$("#new-category").val("");
			$("#new-sub-category").val("");
			$("#product_unit").val("");
			$("#sub-category").html("<option>Select Sub Category</option>");
			
			$.get("ajax/getcat.php",function(data2){
				$("#category").html(data2);
				$("#add-product-loader").hide();
				$("#add-product-button").attr("onclick","addpro();");
			});
			
			
			
			}
		});
	}
}


function load_sub()
{
	
	var category = document.getElementById("filter-cat").value;
$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#filter-subcat").html(data);
	});
	
}


function filter_product()
{
	var product_name = document.getElementById('filter-pname').value;
	var category = document.getElementById('filter-cat').value;
	var subcat = document.getElementById('filter-subcat').value;
	
	$("#data-loader-image").show();
	$.post("ajax/filter_product.php",{product_name:product_name,category:category,subcat:subcat},function(data){
		
		$.post("ajax/filter_total.php",{product_name:product_name,category:category,subcat:subcat},function(data2){
			
			var new_next_value = "next-0-10-"+data2;
			$("#next-button").attr("value",new_next_value);
			var new_prev_value = "prev-0-10-"+data2;
			$("#prev-button").attr("value",new_prev_value);
			$("#next-button").css("color","#2a3b4f");
			$("#prev-button").css("color","grey");
			$("#filter-output").html(data);
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
	var product_name = document.getElementById('filter-pname').value;
	var category = document.getElementById('filter-cat').value;
	var subcat = document.getElementById('filter-subcat').value;

	$("#data-loader-image").show();
	$.post("ajax/paging.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,product_name:product_name,category:category,subcat:subcat},function(data){
		
		if(data!=""){
		var new_upper_limit = parseInt(upper_limit) + 10;
		var new_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button").attr("value",new_id);
		$("#filter-output").html(data);
		
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
	var product_name = document.getElementById('filter-pname').value;
	var category = document.getElementById('filter-cat').value;
	var subcat = document.getElementById('filter-subcat').value;
	
	$("#data-loader-image").show();
	$.post("ajax/paging_prev.php",{upper_limit:upper_limit,lower_limit:lower_limit,total_elements:total_elements,product_name:product_name,category:category,subcat:subcat},function(data){
		
		if(upper_limit>0)
		{
		var new_upper_limit = parseInt(upper_limit) - 10;
		var new_id = "prev-"+new_upper_limit+"-10-"+total_elements;
		$("#prev-button").attr("value",new_id);
		
		
		var new_next_id = "next-"+new_upper_limit+"-10-"+total_elements;
		$("#next-button").attr("value",new_next_id);
		$("#next-button").css("color","#2a3b4f");
		
		$("#filter-output").html(data);
		}
		else
		{
			$(element).css("color","grey");
		}
		$("#data-loader-image").hide();
	});
}


function editloadsub(element)
{
	var div_id = $(element).attr("id");
	var div_id_array = div_id.split("-");
	var column_id = div_id_array[1];
	var category = $(element).val();
	$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#editsubcat-"+column_id).html(data);
	});
}


function editpro(ele)
{
	if(event.key === 'Enter') {
        var box_id = $(ele).attr("id");
		var box_id_array = box_id.split("-");
		var column = box_id_array[0];
		var column_id = box_id_array[1];
		var box_value = $(ele).val();
		
		if(column=='editname')
		{
			var column_name = "name";
			if(box_value=="")
			{
				alert("Please Enter a Product Name");
			}
			else
			{
			$.post("ajax/editpro.php",{column_id:column_id,value:box_value,column_name:column_name},function(data){
				$("#name-"+column_id).html(box_value);
			});
			}
		}
		if(column=='editunit')
		{
			var column_name = "unit";
			if(box_value=="")
			{
				alert("Please Select a Unit");
			}
			else
			{
			$.post("ajax/editpro.php",{column_id:column_id,value:box_value,column_name:column_name},function(data){
				$("#unit-"+column_id).html(box_value);
			});
			}
		}
		if(column=="editcat" || column=="editsubcat")
		{
			var column1 = "category";
			var column2 = "subcat";
			var value1 = $("#editcat-"+column_id).val();
			var value2 = $("#editsubcat-"+column_id).val();
			
			if(value1=="")
			{
				alert("Please Select a Category");
			}
			else if(value2=="")
			{
				alert("Please Select a Sub Category");
			}
			else
			{
			
			$.post("ajax/editpro.php",{column_id:column_id,value1:value1,value2:value2,column1:column1,column2:column2,column_name:column},function(data){
				$("#category-"+column_id).html(value1);
				$("#subcat-"+column_id).html(value2);
			});
			}
			
		}
		
		if(column=='editstocka')
		{
			var column_name = "stock_a";
			if(box_value=="")
			{
				alert("Please Enter a Value of Stock for A Grade Stores");
			}
			else
			{
			$.post("ajax/editpro.php",{column_id:column_id,value:box_value,column_name:column_name},function(data){
				$("#stock_a-"+column_id).html(box_value);
			});
			
			}
			
		}
		
		if(column=='editstockb')
		{
			var column_name = "stock_b";
			if(box_value=="")
			{
				alert("Please Enter a Value of Stock for B Grade Stores");
			}
			else
			{
			$.post("ajax/editpro.php",{column_id:column_id,value:box_value,column_name:column_name},function(data){
				$("#stock_b-"+column_id).html(box_value);
			});
			
			}
			
		}
	}
}

function deletepro(element)
{
	var element_id = $(element).attr("id");
	var element_id_array = element_id.split("-");
	var column_id = element_id_array[1];
	
	$.post("ajax/deletepro.php",{column_id:column_id},function(data){
		alert(data);
		filter_product();
	});
}


function pi_select()
{
	var category = document.getElementById('pi-cat').value;
	$.post("ajax/getsubcat.php",{category:category},function(data){
		$("#pi-subcat").html(data);
	});	
}

function load_products()
{
	var subcat = document.getElementById('pi-subcat').value;
	$.post("ajax/getproducts.php",{subcat:subcat},function(data){
		$("#pi-products").html(data);
	});
}


function searchproduct()
{
	var cat = document.getElementById('pi-cat').value;
	var subcat = document.getElementById('pi-subcat').value;
	var product = document.getElementById('pi-products').value;
	
	if(cat=="")
	{
		alert("Please Select a Category");
	}
	else if (subcat=="")
	{
		alert("Please Select a Sub Category");
	}
	else if (product=="")
	{
		alert("Please Select a Product");
	}	
	else
	{
		$.post("ajax/searchpro.php",{cat:cat,subcat:subcat,product:product},function(data){
			var result = data;
			var resultarray = result.split("#");
			var name = resultarray[0];
			var descr = resultarray[1];
			var image = resultarray[2];
			var id = resultarray[3];
			
			$("#pi-pname").html(name);
			$("#pi-pdesc").val(descr);
			$("#pi-pimage").html('<img src="./images/products/'+image+'" width="100%" height="100%">');
			$("#update-btn").attr("value",id);
			
		});
	}	
}

function setImage() {
	$("#pi-pimage").html('<img src="./images/database_loader.gif" width="100%">');
	
  var file = $("#pi-file").prop("files")[0];
  var product_id = $("#update-btn").attr("value");
  var type = file['type'];
  if(type=='image/jpeg' || type=='image/jpg' || type=='image/png')
  {
    var formdata = new FormData();
	formdata.append("file", file);
	formdata.append("product_id", product_id);
	var ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandler, false);
	ajax.open("POST", "ajax/uploadpi.php");
	ajax.send(formdata);
  }
  else
  {
	  alert("File Not Supported");
	  completeHandler("load");
  }
}

function completeHandler(event){
	var product_id = $("#update-btn").attr("value");
		
	$.post("ajax/getimagepi.php",{product_id:product_id},function(data){
		$("#pi-pimage").html('<img src="./images/products/'+data+'" width="100%" height="100%">');
	});	
}

function updatedesc()
{
	var product_id = $("#update-btn").attr("value");
	var descr = $("#pi-pdesc").val();
	
	$.post("ajax/updatedescpi.php",{product_id:product_id,descr:descr},function(data){
		alert(data);
	});
}


