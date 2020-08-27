function get_map(element)
{
	var cust_id = $(element).attr("id");
	$.post("ajax/get_map.php",{cust_id:cust_id},function(data){
		alert(data);
		$("#map_output").html(data);
	});
}

document.getElementById('')

function back()
{
	$.get("ajax/getbackcust.php",function(data){
		$.post("ajax/get_map.php",{cust_id:data},function(data){
		$("#map_output").html(data);
		});
	});
}

function open_map(e)
{
	if(e.keyCode=='13')
	{
		var child_id = document.getElementById('child_id').value;
		$.post("ajax/check_under.php",{child_id:child_id},function(data){
			if(data=="yes")
			{
				$.post("ajax/get_map.php",{cust_id:child_id},function(data){
				$("#map_output").html(data);
				$("#child_id").val('');
				});
			}
			else
			{
				alert(data);
				$("#child_id").val('');
			}
		});
	}
}
function myfunction(id){
	if(id){
		$.ajax({
			type:"post",
			data:{id},
			url:"ajax/tree_ajax.php",
			success:function(data){
				
			// while(var dataArray = data.split(',')){
				var dataArray = data.split(',');
				document.getElementById('person-1').textContent = dataArray[0];

				document.getElementById('person-2').textContent = dataArray[1];
				document.getElementById('person-3').textContent = dataArray[2];
				document.getElementById('person-4').textContent = dataArray[3];
				document.getElementById('person-5').textContent = dataArray[4];
				
			}
		});
	} else {
		for(var i = 0; i<=4; i++) {
			document.getElementById(`person-${i+1}`).style.display = 'none';
		}
	}

}


var getDataOnClick = function(id){
	var id = document.getElementById(`${id}`).textContent;
	document.getElementById('topPerson').textContent = id;
	myfunction(id)
}

