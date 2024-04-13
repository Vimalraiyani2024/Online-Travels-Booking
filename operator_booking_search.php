<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Booking|BusOnlineTicket.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
		  <script>
				  $(function() {
				    $( "#datepicker,#datepicker1" ).datepicker();
					$( "#datepicker,#datepicker2" ).datepicker();
				  });
				  
		  </script>
<!---/End-date-piker---->
<link type="text/css" rel="stylesheet" href="css/JFGrid.css" />
<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
		<script type="text/javascript" src="js/JFCore.js"></script>
		<script type="text/javascript">	//	When Click on the RADIO button redirect to new page
				  $(document).ready(function()	{
					$('input[type="radio"]').click(function(){
						if($(this).is(":checked"))	
								$('form#booked').submit();
					});
				});
		</script>
		<script type="text/javascript" src="js/JFForms.js"></script>
		<!-- Set here the key for your domain in order to hide the watermark on the web server -->
		<script type="text/javascript">
			(function() {
				JC.init({
					domainKey: ''
				});
				})();
		</script>
<!--nav-->
<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
</script>
</head>
<body>
<!-- start header -->
<div>
<?php
	include_once("operatorheader.php");
?>
</div>
<div class="username">
<?php 
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];	
	else
		header("location:index.php");
		
	$result = mysql_query("select * from user_detail where user_id = $user") or die("Error");
	while($row=mysql_fetch_array($result))
	{
		echo "<font color=red>Welcome : : : ".$row['name']."</font>";
	}
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="res_online">
			<h4>basic information</h4>
			<p class="para">			This is the bus online booking website. you can book your bus ticket from here.

Select Your Journey trip from the below Travels and Make your journey Best with us.
</p>
		</div>			
		
<div class="search_table">
	<br><hr>
	<h1 align="center"> Search Result</h1> <br><hr>
<form id="booked" method ="post" action="operator_booking_search.php">
<table border=1>
<tr><th>Select Service<th> Trip Code <th>Start Point <th>End Point <th> Dept.Time <th> ArrTime <th> Days <th> Fare/seat <th> Details</tr>
</table>
<?php 	
		date_default_timezone_set('Asia/Kolkata');
		include('connect.php');
		$sd = $_REQUEST['searchdate'];
		$sf = $_REQUEST['searchfrom'];
		$st = $_REQUEST['searchto'];
		$sp = $_REQUEST['searchperson'];
		$searchperson = $sp;
		$dt= substr($sd,0,2); $dt1 = substr($sd,3,2); $dt2 = substr($sd,8,2); $dt3 = substr($sd,6,4); 
		$day = date('D',mktime(0,0,0,$dt1,$dt,$dt2));
	//	echo $day;
		if($sd > date("d-m-Y") && isset($_REQUEST['searchfrom']) && isset($_REQUEST['searchto']) && isset($_REQUEST['searchdate']))
		{
			echo "<table border=1>";	
			$r1=mysql_query("select * from route_details where fromcity = '$sf' and tocity = '$st'") or die("<tr><td>no result</tr>");
			if(!mysql_affected_rows())
			{
				echo "<tr><td colspan=6 align='center'><font color=red> Sorry! There were no Route Found For Your Search</font></tr></table>";
			}
			else
			{
				while($result = mysql_fetch_array($r1))
				{			
					$freq = $result['freqId'];
					$rs = mysql_query("select * from freq_detail where freqId = $freq and $day=1") or die("ERROR");
					if(!mysql_affected_rows())
						echo "";	// Freq for The Day is Not
					else
					{	// GENERATE UNIQUE ID FOR TRAVELSID
						$tcity = substr($sf,0,4);
						$fcity = substr($st,0,4);	
						$dd = $dt."".$dt1."".$dt2;
						$fdt = $sd." ".$result['deptTime'];
				//		echo $sd."-".$fdt;
						$tdt = $sd." ".$result['arrTime'];
						$dy = $result['days'];
						$curdate = date("Y-m-d H:i:s", strtotime("+30 minutes", strtotime(date("Y-m-d H:i:s"))));;
						for ($x=$dy; $x<=$dy; $x++) 
						{
							$str = date("d/m/Y", strtotime("+ $dy days", strtotime($sd)));;
		//					echo $str;	// NOT WORKING
						}	
					
						$route = $result['routeId'];
						$trid = $dd."".$fcity."".$tcity."".$result['routeId'] ;
						$rs = mysql_query("select * from travel_detail where travelId = '$trid'") or die("ERROR");
						if(mysql_affected_rows())
							echo "";	// TravelId Is Already Generated
						else
						{
							$fdt = date("Y-m-d H:i:s", strtotime($fdt));
					//		echo $fdt;
							$tdt = date("Y-m-d H:i:s", strtotime($tdt));
							$rs = mysql_query("insert into travel_detail values('$trid',$route,'$fdt','$tdt')") or die("ERROR");
						}
						echo"<tr>";
						echo "<td><input type='radio' name='busselect' value='".$trid."'><td>".$trid."<td>".$result['fromcity']."<td>".$result['tocity']."<td>".$result['deptTime'];
						echo "<td>".$result['arrTime']."<td>".$result['days']."<td>".$result['fare']."<td><a href='search.php'><font color=red>Details</font></a>";
						echo "</tr>";
					}
				}
					echo "</table>";
			}
		} 		
		else
		{
			echo "<tr><td colspan=6><font color=red> Sorry! There were no results found for  - Please Modify your Search in the search box above.</font></tr></table>";
		}
?>
</form>
</div>
<!--start main -->
<div>
<?php
	include_once("operatorfooter.php");
?>
</div>
<?php
	if(isset($_POST['busselect']))
	{
		session_start();
		$_SESSION['trid'] = $_POST['busselect'];
		header('location:operatorSeatBook.php');
	}
?>	
</body>
</html>