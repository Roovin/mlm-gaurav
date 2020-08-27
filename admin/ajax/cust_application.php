<?php
include '../connection.php';

$sponser_id = $_POST['sponser_id'];
$cust_name = $_POST['cust_name'];
$cust_father_name = $_POST['cust_father_name'];
$cust_mobile = $_POST['cust_mobile'];
$cust_email = $_POST['cust_email'];
$cust_dob = $_POST['cust_dob'];
$cust_doj = $_POST['cust_doj'];
$cust_paddress = $_POST['cust_paddress'];
$cust_taddress = $_POST['cust_taddress'];
$nom_name = $_POST['nom_name'];
$nom_father_name = $_POST['nom_father_name'];
$nom_mobile = $_POST['nom_mobile'];
$nom_email = $_POST['nom_email'];
$nom_dob = $_POST['nom_dob'];
$nom_relation = $_POST['nom_relation'];
$nom_paddress = $_POST['nom_paddress'];
$nom_taddress = $_POST['nom_taddress'];
$cust_adhar = $_POST['cust_adhar'];
$cust_pan = $_POST['cust_pan'];
$cust_bp = $_POST['cust_bp'];
$cust_hvmcard = $_POST['cust_hvmcard'];
$cust_hvmsno = "0";
$restriction = $_POST['restriction'];
$otp_status = "No";
$otp_date = "";
$bank = $_POST['bank'];
$account = $_POST['account'];
if($account=="")
{
	$account=0;
}
$ifsc = $_POST['ifsc'];
$min_purchase = $_POST['min_purchase'];






$sql = "SELECT * FROM customers WHERE pan='$cust_pan'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count==0 || $restriction=="released")
{
	$sql2 = "SELECT * FROM customers WHERE adhar='$cust_adhar'";
	$res2 = mysqli_query($con,$sql2);
	$count2 = mysqli_num_rows($res2);
	
	if($count2==0 || $restriction=="released")
	{
		$sql3 = "SELECT * FROM customers WHERE mobile='$cust_mobile'";
		$res3 = mysqli_query($con,$sql3);
		$count3 = mysqli_num_rows($res3);
		
		if($count3==0 || $restriction=="released")
		{
			$sql = "SELECT id FROM customers WHERE customer_id='$sponser_id' AND status='approved'";
			$res = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($res);
			
			$count20 = mysqli_num_rows($res);
			
			if($count20>0)
			{
				$cid = $row['id'];

				$sql1 = "SELECT id FROM closure WHERE parent_id='$cid' AND position='Left'";
				$res1 = mysqli_query($con,$sql1);
				$left_nodes_num = mysqli_num_rows($res1);

				$sql2 = "SELECT id FROM closure WHERE parent_id='$cid' AND position='Right'";
				$res2 = mysqli_query($con,$sql2);
				$right_nodes_num = mysqli_num_rows($res2);

				if($right_nodes_num>$left_nodes_num)
				{
					$branch = "Left";
				}
				else
				{
					$branch = "Right";
				}
				
				
				$parent = array();
				$child = array();
				$level = array();
				$position = array();

				$sql = "SELECT c2.parent_id,c2.child_id,c2.level,c2.position FROM `closure` c1 INNER JOIN closure c2 ON c1.child_id=c2.child_id AND c1.parent_id='$cid' AND c1.position='$branch'";

				$res = mysqli_query($con,$sql);

				while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
				{
					$parent[] = $r['parent_id'];
					$child[] = $r['child_id'];
					$level[] = $r['level'];
					$position[] = $r['position'];
				}
				
				$loop_size = sizeof($parent)-1;
				if($loop_size>=0)
				{
					for($i=0;$i<=$loop_size;$i++)
					{
						if($parent[$i]==$cid && $level[$i]==1)
						{
							$direct_child = $child[$i];
						}
					}
					
					
					$level2 = 0;
					$branching = array(array($direct_child));
					
					while(1)
							{
								$execution = $branching[$level2];
								$execution_size = sizeof($execution);
								$new_nodes = array();
								$parent_node = "";
								
								for($i=0;$i<=$execution_size-1;$i++)
								{
									$node = $execution[$i];
									$count = 0;
									for($k=0;$k<=$loop_size;$k++)
									{
										if($parent[$k]==$node && $level[$k]=="1")
										{
											$count++;
										}
									}
									
									if($count<2)
									{
										$parent_node=$node;
										break;
									}
									else
									{
										for($p=0;$p<=$loop_size;$p++)
										{
											if($parent[$p]==$node && $level[$p]=="1" && $position[$p]=="Right")
											{
												$right_node = $child[$p];
												
											}
											
											if($parent[$p]==$node && $level[$p]=="1" && $position[$p]=="Left")
											{
												$left_node = $child[$p];
												
											}
										}
										$new_nodes[] = $right_node;
										$new_nodes[] = $left_node;
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
									$branching[] = $new_nodes;
								}

								$level2++;
								}
								else
								{
									break;
								}	
							}
					
					
				$add_position = "Right";	
				for($p=0;$p<=$loop_size;$p++)
				{
					if($parent[$p]==$parent_node && $level[$p]=="1" && $position[$p]=="Right")
						{
							$add_position = "Left";
							break;
						}
											
					elseif($parent[$p]==$node && $level[$p]=="1" && $position[$p]=="Left")
					{
						$add_position = "Right";
						break;		
					}

				}	
					
				}
				else
				{
					$parent_node=$cid;
					$add_position = $branch;
				}
				
				
				$sql = "SELECT MAX(id) FROM customers";
				$res = mysqli_query($con,$sql);
				$row2 = mysqli_fetch_array($res);
				$max_id = $row2['MAX(id)'];

				$next_id = $max_id+1;


				$cus_id = 'HVMCUST-'.$next_id;

				$sql = "INSERT INTO customers (customer_id,sponser_id,name,father_name,mobile,email,dob,doj,address_permanent,address_temp,adhar,pan,business_type,hvmcard,hvmcard_sno,status,tds,other_charges,account_balance,wallet_balance,password,pan_file,id_file,otp_status,otp_date,bank,account_number,ifsc_code,min_purchase_status) VALUES('$cus_id','$sponser_id','$cust_name','$cust_father_name','$cust_mobile','$cust_email','$cust_dob','$cust_doj','$cust_paddress','$cust_taddress','$cust_adhar','$cust_pan','$cust_bp','$cust_hvmcard',$cust_hvmsno,'approved',0,0,0,0,'hvm123','','','$otp_status','$otp_date','$bank',$account,'$ifsc','$min_purchase')";
				$res = mysqli_query($con,$sql);
			
			
				$sql = "SELECT MAX(id) FROM customers";
				$res = mysqli_query($con,$sql);
				$row2 = mysqli_fetch_array($res);
				$latest_child = $row2['MAX(id)'];



				$upper_relations = array();
				$upper_positions = array();
				$upper_level = array();
				$sql = "SELECT parent_id,position,level FROM closure WHERE child_id='$parent_node'";
				$res = mysqli_query($con,$sql);
				while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
				{
					$upper_relations[] = $r['parent_id'];
					$upper_positions[] = $r['position'];
					$upper_level[] = $r['level'];
				}


				$upper_relations = array_diff($upper_relations, array($parent_node));
				$upper_positions = array_filter($upper_positions);
				$upper_level = array_filter($upper_level);

				$sql = "INSERT INTO closure (parent_id,child_id,level,position) VALUES";

				for($i=0;$i<=sizeof($upper_positions)-1;$i++)
				{
					$next_level = $upper_level[$i]+1;
					
					$sql .= " ($upper_relations[$i],$latest_child,$next_level,'$upper_positions[$i]'),";
				}


				$sql .= "($parent_node,$latest_child,1,'$add_position'),($latest_child,$latest_child,0,'')";
				$res = mysqli_query($con,$sql);


				
				$sql = "INSERT INTO nominee (customer_id,name,father_name,mobile,email,dob,relation,address_permanent,address_temp) VALUES('$cus_id','$nom_name','$nom_father_name','$nom_mobile','$nom_email','$nom_dob','$nom_relation','$nom_paddress','$nom_paddress')";
				
				$res = mysqli_query($con,$sql);
				
				
				echo "Customer Added to the Network";
				
			}
			else
			{
			  echo "Sponser ID not Approved Yet";
			}
			
			
			
		}
		else
		{
			echo "Account With This Mobile Number Already Exists";
		}
		
	}
	else
	{
		echo "Account With This Adhar Already Exists";
	}
}
else
{
	echo "Account With This PAN Card Already Exists";
}




?>