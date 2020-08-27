<?php
$cust = $_POST['cust_id'];
session_start();
include '../../conn.php';

	$sql = "SELECT * FROM customers WHERE customer_id='$cust'";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$cust_name = $row['name'];
	$wallet_balance = $row['wallet_balance'];
	$account_balance = $row['account_balance'];
	$cid = $row['id'];
	
	
	$sql="SELECT c2.parent_id,c2.child_id,c2.level,c2.position,customers.customer_id FROM `closure` c1 INNER JOIN closure c2 ON c1.child_id=c2.child_id AND c1.parent_id='$cid' AND c2.level='1' INNER JOIN customers ON c1.child_id=customers.id";

		$res = mysqli_query($conn,$sql);

		$parent = array();
		$child = array();
		$level = array();
		$position = array();
		$child_name = array();

		while($r=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$parent[] = $r['parent_id'];
			$child[] = $r['child_id'];
			$level[] = $r['level'];
			$position[] = $r['position'];
			$child_name[] = $r['customer_id'];
		}

		
		
function get_map($c_id)
{
	global $con;
	global $parent;
	global $child;
	global $level;
	global $position;
	global $child_name;
	global $cust;
	
	$level1 = array($cust);
	$level2 = array();
	$level3 = array();
	$level4 = array();
	
	$levell1 = array($c_id);
	$levell2 = array();
	$levell3 = array();
	$levell4 = array();
	
	
	for($i=2;$i<=4;$i++)
	{
		if($i==2)
		{
			$c_array = $levell1;
		}
		elseif($i==3)
		{
			$c_array = $levell2;
		}
		elseif($i==4)
		{
			$c_array = $levell3;
		}
		
		for($k=0;$k<=sizeof($c_array)-1;$k++)
		{
			$cur_cust = $c_array[$k];
			$indexes = array_keys($parent, $cur_cust);
			$no_of_child = count($indexes);
			
			if($no_of_child==1)
			{
				$cur_position = $position[$indexes[0]];
				
				if($cur_position=="Left")
				{
					$child1 = $child_name[$indexes[0]];
					$child2 = "";
					$c1 = $child[$indexes[0]];
					$c2 = "";
				}
				else
				{
					$child1 = "";
					$child2 = $child_name[$indexes[0]];
					$c1 = "";
					$c2 = $child[$indexes[0]];
				}
				
			}
			elseif($no_of_child==0)
			{
				$child1 = "";
				$child2 = "";
				$c1 = "";
				$c2 = "";
			}
			else
			{
				for($l=0;$l<=$no_of_child-1;$l++)
				{
					$cur_position = $position[$indexes[$l]];
					
					if($cur_position=="Left")
					{
						$child1 = $child_name[$indexes[$l]];
						$c1 = $child[$indexes[$l]];
					}
					else
					{
						$child2 = $child_name[$indexes[$l]];
						$c2 = $child[$indexes[$l]];
					}
					
				}
			}
			
			if($i==2)
			{
				$level2[] = $child1;
				$level2[] = $child2;
				$levell2[] = $c1;
				$levell2[] = $c2;
			}
			elseif($i==3)
			{
				$level3[] = $child1;
				$level3[] = $child2;
				$levell3[] = $c1;
				$levell3[] = $c2;
			}
			elseif($i==4)
			{
				$levell4[] = $c1;
				$levell4[] = $c2;
				$level4[] = $child1;
				$level4[] = $child2;
			}
		}
	}
	
	
	$total_array = array_merge($level1,$level2,$level3,$level4);
	
	if($total_array[0]==$_SESSION['customer'])
	{
		$font_color = "#0F8141";
	}
	else
	{
		$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[0]'";
		$res = mysqli_query($con,$sql);
		$row2 = mysqli_fetch_array($res);
		$csponser_id = $row2['sponser_id'];
		
		if($csponser_id==$_SESSION['customer'])
		{
			$font_color="#0F67A4";
		}
		else
		{
			$font_color="#404241;";
		}
	}
	
	
echo'<!-- Network Map starts-->
<div id="net-map">
	<center>
		<!--Level 1 start-->
		<div class="user-icon"><i class="fas fa-user-tie" style="color:'.$font_color.'"></i></div>
		<div class="custid_space" style="color:#404241;"><b>'.$total_array[0].'</b></div>
		<div class="stick"></div>
		<div id="first-box">
			<div class="inner-box" style="border-top:2px solid blue;border-left:2px solid blue;"></div>
			<div class="inner-box" style="border-top:2px solid red;border-right:2px solid red;"></div>
		</div>';
		if($total_array[1]=="")
		{
			$display_icon = '<i class="fas fa-times" style="color:#404241;"></i>';
			$cid = '';
		}
		else
		{
			
			$cid = $total_array[1];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[1]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color1="#0F67A4";
			}
			else
			{
				$font_color1="#404241;";
			}
			
			$display_icon = '<i class="fas fa-user-tie" style="color:'.$font_color1.';cursor:pointer;" id="'.$cid.'" onclick="get_map(this);"></i>';
			
		}
		
		if($total_array[2]=="")
		{
			$display_icon2 = '<i class="fas fa-times" style="margin-left:575px;color:#404241;"></i>';
			$cid2 = '';
		}
		else
		{
			
			$cid2 = $total_array[2];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[2]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color2="#0F67A4";
			}
			else
			{
				$font_color2="#404241";
			}
			
			$display_icon2 = '<i class="fas fa-user-tie" style="margin-left:575px;color:'.$font_color2.';cursor:pointer;" id="'.$cid2.'" onclick="get_map(this);"></i>';
			
		}
		
		echo '<!--Level 1 Ends-->	
				<!--Level 2 Starts-->
				<div class="user-icon" style="margin-top:10px;">'.$display_icon.''.$display_icon2.'</div>
				<div class="custid_space" style="color:#404241;"><span><b>'.$cid.'</b></span><span style="margin-left:540px;"><b>'.$cid2.'</b></span></div>';
		if($total_array[3]=="")
		{
			$opcity3 = "0";
			$display_icon3 = '<i class="fas fa-user-tie" style="opacity:'.$opcity3.'"></i>';
			$cid3 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity3 = "1";
			
			$cid3 = $total_array[3];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[3]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color3="#0F67A4";
			}
			else
			{
				$font_color3="#404241";
			}
			
			$display_icon3 = '<i class="fas fa-user-tie" style="opacity:'.$opcity3.';color:'.$font_color3.';cursor:pointer;" id="'.$cid3.'" onclick="get_map(this);"></i>';
			
			
		}
		
		
		if($total_array[4]=="")
		{
			$opcity4 = "0";
			$display_icon4 = '<i class="fas fa-user-tie" style="margin-left:278px;opacity:'.$opcity4.'"></i>';
			$cid4 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity4 = "1";
			
			$cid4 = $total_array[4];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[4]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color4="#0F67A4";
			}
			else
			{
				$font_color4="#404241";
			}
			
			$display_icon4 = '<i class="fas fa-user-tie" style="margin-left:278px;opacity:'.$opcity4.';color:'.$font_color4.';cursor:pointer;" id="'.$cid4.'" onclick="get_map(this);"></i>';
		}
		
		if($total_array[5]=="")
		{
			$opcity5 = "0";
			$display_icon5 = '<i class="fas fa-user-tie"  style="margin-left:278px;opacity:'.$opcity5.'"></i>';
			$cid5 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity5 = "1";
			
			$cid5 = $total_array[5];
			
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[5]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color5="#0F67A4";
			}
			else
			{
				$font_color5="#404241";
			}
			
			$display_icon5 = '<i class="fas fa-user-tie"  style="margin-left:278px;opacity:'.$opcity5.';color:'.$font_color5.';cursor:pointer;" id="'.$cid5.'" onclick="get_map(this);"></i>';
			
		}
		
		if($total_array[6]=="")
		{
			$opcity6 = "0";
			$display_icon6 = '<i class="fas fa-user-tie" style="margin-left:278px;opacity:'.$opcity6.'"></i>';
			$cid6 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity6 = "1";
			
			$cid6 = $total_array[6];
			
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[6]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color6="#0F67A4";
			}
			else
			{
				$font_color6="#404241";
			}
			
			$display_icon6 = '<i class="fas fa-user-tie" style="margin-left:278px;opacity:'.$opcity6.';color:'.$font_color6.';cursor:pointer;" id="'.$cid6.'" onclick="get_map(this);"></i>';
		}
		
		
		echo '<div id="second-box">
				<div class="inner-box" style="width:300px;">
					<div style="width:148px;border-left:2px solid blue;border-top:2px solid blue;float:left;height:100%;opacity:'.$opcity3.'"></div>
					<div style="width:148px;border-right:2px solid red;border-top:2px solid red;float:left;height:100%;opacity:'.$opcity4.'"></div>
				</div>
				<div class="inner-box" style="width:300px;"></div>
				<div class="inner-box" style="width:300px;">
					<div style="width:148px;border-left:2px solid blue;border-top:2px solid blue;float:left;height:100%;opacity:'.$opcity5.'"></div>
					<div style="width:148px;border-right:2px solid red;border-top:2px solid red;float:left;height:100%;opacity:'.$opcity6.'"></div>
				
				</div>
			</div>
			<!--Level 2 Ends-->	
			<!--Level 3 starts-->
			<div class="user-icon" style="margin-top:10px;">'.$display_icon3.''.$display_icon4.''.$display_icon5.''.$display_icon6.'</div>
			
			<div class="custid_space" style="color:#404241;"><span style="opacity:'.$opcity3.'"><b>'.$cid3.'</b></span><span style="margin-left:240px;opacity:'.$opcity4.';"><b>'.$cid4.'</b></span><span style="margin-left:240px;opacity:'.$opcity5.';"><b>'.$cid5.'</b></span><span style="margin-left:240px;opacity:'.$opcity6.'"><b>'.$cid6.'</b></span></div>';
		
		
		if($total_array[7]=="")
		{
			$opcity7 = "0";
			$display_icon7 = '<i class="fas fa-user-tie" style="opacity:'.$opcity7.'"></i>';
			$cid7 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity7 = "1";
			
			$cid7 = $total_array[7];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[7]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color7="#0F67A4";
			}
			else
			{
				$font_color7="#404241";
			}
			
			$display_icon7 = '<i class="fas fa-user-tie" style="opacity:'.$opcity7.';color:'.$font_color7.';cursor:pointer;" id="'.$cid7.'" onclick="get_map(this);"></i>';
			
		}
		
		
		if($total_array[8]=="")
		{
			$opcity8 = "0";
			$display_icon8 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity8.'"></i>';
			$cid8 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity8 = "1";
			
			$cid8 = $total_array[8];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[8]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color8="#0F67A4";
			}
			else
			{
				$font_color8="#404241";
			}
			
			$display_icon8 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity8.';color:'.$font_color8.';cursor:pointer;" id="'.$cid8.'" onclick="get_map(this);"></i>';
		}
		
		
		if($total_array[9]=="")
		{
			$opcity9 = "0";
			$display_icon9 = '<i class="fas fa-user-tie"  style="margin-left:92px;opacity:'.$opcity9.'"></i>';
			$cid9 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity9 = "1";
			
			$cid9 = $total_array[9];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[9]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color9="#0F67A4";
			}
			else
			{
				$font_color9="#404241";
			}
			
			$display_icon9 = '<i class="fas fa-user-tie"  style="margin-left:92px;opacity:'.$opcity9.';color:'.$font_color9.';cursor:pointer;" id="'.$cid9.'" onclick="get_map(this);"></i>';
		}
		
		
		if($total_array[10]=="")
		{
			$opcity10 = "0";
			$display_icon10 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity10.'"></i>';
			$cid10 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity10 = "1";
			
			$cid10 = $total_array[10];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[10]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color10="#0F67A4";
			}
			else
			{
				$font_color10="#404241";
			}
			$display_icon10 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity10.';color:'.$font_color10.';cursor:pointer;" id="'.$cid10.'" onclick="get_map(this);"></i>';
			
		}
		
		if($total_array[11]=="")
		{
			$opcity11 = "0";
			$display_icon11 = '<i class="fas fa-user-tie" style="margin-left:92px;opacity:'.$opcity11.'"></i>';
			$cid11 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity11 = "1";
			$display_icon11 = '<i class="fas fa-user-tie" style="margin-left:92px;opacity:'.$opcity11.'"></i>';
			$cid11 = $total_array[11];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[11]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color11="#0F67A4";
			}
			else
			{
				$font_color11="#404241";
			}
			$display_icon11 = '<i class="fas fa-user-tie" style="margin-left:92px;opacity:'.$opcity11.';color:'.$font_color11.';cursor:pointer;" id="'.$cid11.'" onclick="get_map(this);"></i>';
		}
		
		
		if($total_array[12]=="")
		{
			$opcity12 = "0";
			$display_icon12 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity12.'"></i>';
			$cid12 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity12 = "1";
			
			$cid12 = $total_array[12];
			
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[12]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color12="#0F67A4";
			}
			else
			{
				$font_color12="#404241";
			}
			$display_icon12 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity12.';color:'.$font_color12.';cursor:pointer;" id="'.$cid12.'" onclick="get_map(this);"></i>';
			
		}
		
		if($total_array[13]=="")
		{
			$opcity13 = "0";
			$display_icon13 = '<i class="fas fa-user-tie" style="margin-left:92px;opacity:'.$opcity13.'"></i>';
			$cid13 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity13 = "1";
			
			$cid13 = $total_array[13];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[13]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color13="#0F67A4";
			}
			else
			{
				$font_color13="#404241";
			}
			
			$display_icon13 = '<i class="fas fa-user-tie" style="margin-left:92px;opacity:'.$opcity13.';color:'.$font_color13.';cursor:pointer;" id="'.$cid13.'" onclick="get_map(this);"></i>';
			
		}
		
		if($total_array[14]=="")
		{
			$opcity14 = "0";
			$display_icon14 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity14.'"></i>';
			$cid14 = 'HVMCUST-XXX';
			
		}
		else
		{
			$opcity14 = "1";
			
			$cid14 = $total_array[14];
			
			$sql = "SELECT sponser_id FROM customers WHERE customer_id='$total_array[14]'";
			$res = mysqli_query($con,$sql);
			$row2 = mysqli_fetch_array($res);
			$csponser_id = $row2['sponser_id'];
			
			if($csponser_id==$_SESSION['customer'])
			{
				$font_color14="#0F67A4";
			}
			else
			{
				$font_color14="#404241";
			}
			
			$display_icon14 = '<i class="fas fa-user-tie" style="margin-left:166px;opacity:'.$opcity14.';color:'.$font_color14.';cursor:pointer;" id="'.$cid14.'" onclick="get_map(this);"></i>';
		}
		
		echo '<div id="third-box">
		<div class="inner-box" style="width:200px;">
			<div style="width:98px;height:100%;float:left;border-left:2px solid blue;border-top:2px solid blue;opacity:'.$opcity7.'"></div>
			<div style="width:98px;height:100%;float:left;border-right:2px solid red;border-top:2px solid red;opacity:'.$opcity8.'"></div>
		</div>
		<div class="inner-box" style="width:100px;"></div>
		<div class="inner-box" style="width:200px;">
			<div style="width:98px;height:100%;float:left;border-left:2px solid blue;border-top:2px solid blue;opacity:'.$opcity9.'"></div>
			<div style="width:98px;height:100%;float:left;border-right:2px solid red;border-top:2px solid red;opacity:'.$opcity10.'"></div>
		</div>
		<div class="inner-box" style="width:100px;"></div>
		<div class="inner-box" style="width:200px;">
			<div style="width:98px;height:100%;float:left;border-left:2px solid blue;border-top:2px solid blue;opacity:'.$opcity11.'"></div>
			<div style="width:98px;height:100%;float:left;border-right:2px solid red;border-top:2px solid red;opacity:'.$opcity12.'"></div>
		</div>
		<div class="inner-box" style="width:100px;"></div>
		<div class="inner-box" style="width:200px;">
			<div style="width:98px;height:100%;float:left;border-left:2px solid blue;border-top:2px solid blue;opacity:'.$opcity13.'"></div>
			<div style="width:98px;height:100%;float:left;border-right:2px solid red;border-top:2px solid red;opacity:'.$opcity14.'"></div>
		</div>
	</div>
	
	<!--Level 3 Ends-->
	<!--Level 4 Starts-->
	<div class="user-icon" style="margin-top:10px;">'.$display_icon7.''.$display_icon8.''.$display_icon9.''.$display_icon10.''.$display_icon11.''.$display_icon12.''.$display_icon13.''.$display_icon14.'</div>
	
	
	<div class="custid_space" style="width:100%;;height:30px;">
		
		<div class="cid" style="opacity:'.$opcity7.'">'.$cid7.'</div>
		<div class="cid" style="margin-left:57px;opacity:'.$opcity8.'">'.$cid8.'</div>
		<div class="cid" style="margin-left:30px;opacity:'.$opcity9.'">'.$cid9.'</div>
		<div class="cid" style="margin-left:57px;opacity:'.$opcity10.'">'.$cid10.'</div>
		<div class="cid" style="margin-left:30px;opacity:'.$opcity11.'">'.$cid11.'</div>
		<div class="cid" style="margin-left:57px;opacity:'.$opcity12.'">'.$cid12.'</div>
		<div class="cid" style="margin-left:30px;opacity:'.$opcity13.'">'.$cid13.'</div>
		<div class="cid" style="margin-left:57px;opacity:'.$opcity14.'">'.$cid14.'</div>
	
	
	</div>';
		
		
	
echo '</center></div>';

}




if(empty($_SESSION['his']))
{
	$history = array();
	if($cust!=$_SESSION['customer'])
	{
	$history[] = $cust;
	$_SESSION['his'] = $history;
	}
}
else
{
	$history = $_SESSION['his'];
	
	if($cust!=$_SESSION['customer'])
	{
		$allow = "yes";
		for($i=0;$i<=sizeof($history)-1;$i++)
		{
			if($history[$i]==$cust)
			{
				$allow="no";
				break;
			}
		}
		
		if($allow=="yes")
		{
			$history[] = $cust;
			$_SESSION['his'] = $history;
		}
	}
	
}


get_map($cid);		
		
		
		
		
?>

