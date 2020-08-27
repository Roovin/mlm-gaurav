<?php
ini_set('max_execution_time', 30000000);
include '../connection.php';

$sponser_id = $_POST['sponser_id'];
$parent_id = $_POST['parent_id'];

function find_under_nodes($start_node)
{
	global $con;
	$level = 0;
			$right = array(array($start_node));
			
			while(1)
			{
				
				$execution = $right[$level];
				$execution_size = sizeof($execution);
				
				$new_nodes = array();
				for($i=0;$i<=$execution_size-1;$i++)
				{
					$node = $execution[$i];
					$sql = "SELECT customer_id FROM customers WHERE parent_id='$node' AND status='approved'";
					$res = mysqli_query($con,$sql);

					while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
					{
					$new_nodes[] = $r['customer_id'];
					}
					
				}
				
				$new_nodes = array_filter($new_nodes);

				if(sizeof($new_nodes)==0)
				{
						break;
				}
				else
				{
					$right[] = $new_nodes;
				}

				$level++;	
			}
			
			return $right;
}



function total_nodes($nodes_array)
{
	$generation_count = sizeof($nodes_array);
			$total_nodes = 0;
			for($k=0;$k<=$generation_count-1;$k++)
			{
				$generation_array = $nodes_array[$k];
				$generation_array_size = sizeof($generation_array);
				
				for($p=0;$p<=$generation_array_size-1;$p++)
				{
					$total_nodes++;
				}
			}
			
			return $total_nodes;
}



function find_parent_node($start_node)
{
	global $con;
	$level = 0;
	$right = array(array($start_node));
	
	while(1)
			{
				
				$execution = $right[$level];
				$execution_size = sizeof($execution);
				
				$new_nodes = array();
				$parent_node = "";
				for($i=0;$i<=$execution_size-1;$i++)
				{
					$node = $execution[$i];
					$sql = "SELECT * FROM customers WHERE parent_id='$node' AND status='approved'";
					$res = mysqli_query($con,$sql);
					$count = mysqli_num_rows($res);
					
					if($count<2)
					{
						$parent_node = $node;
						break;
						
					}
					else
					{

					while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
					{
					$new_nodes[] = $r['customer_id'];
					}
					}
				}
				
				if($parent_node=="")
				{
				
				$new_nodes = array_filter($new_nodes);

				if(sizeof($new_nodes)==0)
				{
						break;
				}
				else
				{
					$right[] = $new_nodes;
				}

				$level++;
				}
				else
				{
					break;
				}
			}
			return $parent_node;
	
}




$sql = "SELECT status FROM customers WHERE customer_id='$sponser_id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$status = $row['status'];

if($status=="approved")
{
	if($parent_id=="")
	{
	/**	
		
		$sql = "SELECT * FROM customers WHERE parent_id='$sponser_id' AND status='approved'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);
		
		if($count==0)
		{
			$parent_id = $sponser_id;
			$position = "Right";
			
			echo $parent_id.'#'.$position;
		}
		elseif($count==1)
		{
			$parent_id = $sponser_id;
			$position = "Left";
			
			echo $parent_id.'#'.$position;
		}
		elseif($count>=2)
		{
			//echo "Search for the Shortest Node";
			
			$sql2 = "SELECT customer_id FROM customers WHERE parent_id='$sponser_id' AND position='Right' AND status='approved'";
			$res2 = mysqli_query($con,$sql2);
			$row = mysqli_fetch_array($res2);
			$right_cust_id = $row['customer_id'];
			
			$right_nodes = find_under_nodes($right_cust_id);
			$total_right_nodes = total_nodes($right_nodes);
			
			
			
			
			$sql2 = "SELECT customer_id FROM customers WHERE parent_id='$sponser_id' AND position='Left' AND status='approved'";
			$res2 = mysqli_query($con,$sql2);
			$row = mysqli_fetch_array($res);
			$left_cust_id = $row['customer_id'];
			
			$left_nodes = find_under_nodes($left_cust_id);
			$total_left_nodes = total_nodes($left_nodes);
			
			
			
			if($total_left_nodes>=$total_right_nodes)
			{
				$parent_node = find_parent_node($right_cust_id);
				$sql3 = "SELECT * FROM customers WHERE parent_id='$parent_node' AND position='Right' AND status='approved'";
				$res3 = mysqli_query($con,$sql3);
				
				$count2 = mysqli_num_rows($res3);
				
				if($count2==0)
				{
					$position="Right";
				}
				else
				{
					$position="Left";
				}
				
				echo $parent_node.'#'.$position;
				
			}
			elseif($total_right_nodes>$total_left_nodes)
			{
				$parent_node = find_parent_node($left_cust_id);
				
				$sql3 = "SELECT * FROM customers WHERE parent_id='$parent_node' AND position='Right' AND status='approved'";
				$res3 = mysqli_query($con,$sql3);
				$count2 = mysqli_num_rows($res3);
				
				if($count2==0)
				{
					$position="Right";
				}
				else
				{
					$position="Left";
				}
				
				
					echo $parent_node.'#'.$position;
				
			}
			
			
			
			
			
		}
		
	**/	
	}
	else
	{
		//echo "Search Karo Parent ID sponser k under h ya nahi";
		$sponsers_childs = find_under_nodes($sponser_id);
		$status = "nf";
		for($i=0;$i<=sizeof($sponsers_childs)-1;$i++)
		{
			$current_array = $sponsers_childs[$i];
			
			for($p=0;$p<=sizeof($current_array)-1;$p++)
			{
				$current_node = $current_array[$p];
				
				if($current_node==$parent_id)
				{
					$status = "f";
					break;
				}
				
			}
			
			if($status=="f")
			{
				break;
			}
		}
		
		
		if($status=="f")
		{
			$sql4 = "SELECT * FROM customers WHERE parent_id='$parent_id' AND status='approved'";
			$res4 = mysqli_query($con,$sql4);
			$count = mysqli_num_rows($res4);
			
			if($count==0)
			{
				$position = "Right";
				echo $parent_id.'#'.$position;
			}
			elseif($count==1)
			{
				$sql5 = "SELECT position FROM customers WHERE parent_id='$parent_id' AND status='approved'";
				$res5 = mysqli_query($con,$sql5);
				$row5 = mysqli_fetch_array($res4);
				$aquired_position = $row5['position'];
				
				if($aquired_position=="Left")
				{
					$position = "Right";
				}
				elseif($aquired_position=="Right")
				{
					$position = "Left";
				}
				echo $parent_id.'#'.$position;
			}
			elseif($count==2){
				echo "Parent Already Occupied";
			}                                                                                                                        
		}
		else
		{
			echo "Parent is Not Under Sponsor ID";
		}
		
		
	}
	
	
	
}
else
{
	echo "Sponsor ID is not Approved Yet";
}

?>