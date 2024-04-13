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
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		<div class="h_right">
			<!--start menu -->
			<ul class="menu">
				<br><br>
				<li class="active"><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li> |
				<li><a href="feedback.php">Feedback</a></li>
				<div class="clear"></div>
			</ul>
		
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li class="active"><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="activities.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li> |
				<li><a href="feedback.php">Feedback</a></li>
				</ul>
				<a href="#" id="pull">Menu</a>			</nav>
		</div>
		</div>
</div>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="res_online">
			<img src="images/gallery_bk.jpg" alt="" />
		</div>			
		
<div class="search_table">
	<br><hr>
	<h1 align="center"> Search Result</h1> <br><hr>
<form method ="post" action="search.php">
<table border=1>
<tr><th>Sr. No <th> Travels ID <th>From City <th>ToCity <th> Dept.Time <th> ArrTime <th> Days <th> Fare/seat </tr>
</table>
<?php 
		date_default_timezone_set('Asia/Kolkata');
		include('connect.php');
		$i=1;
		$sd = $_REQUEST['searchdate'];
		$sf = $_REQUEST['searchfrom'];
		$st = $_REQUEST['searchto'];
		$sp = $_REQUEST['searchperson'];
		$sd = date("m/d/Y", strtotime($sd));
		$daystamp = strtotime($sd);	
		$day = date('D', $daystamp);
			
		
		if($sd > date("d/m/Y") && isset($_REQUEST['searchfrom']) && isset($_REQUEST['searchto']) && isset($_REQUEST['searchdate']))
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
					$rs = mysql_query("select * from freq_detail where freqId = $freq") or die("ERROR");
					if(!mysql_affected_rows())
						echo "";	// Freq for The Day is Not
					else
					{	// GENERATE UNIQUE ID FOR TRAVELSID
						$tcity = substr($sf,0,4);
						$fcity = substr($st,0,4);	
						$dt= substr($sd,0,2); $dt1 = substr($sd,3,2); $dt2 = substr($sd,8,2);
						$dd = $dt."".$dt1."".$dt2;
						$fdt = $sd." ".$result['deptTime'];
						$tdt = $sd." ".$result['arrTime'];
						//echo $fdt." - ". $tdt; 
						$str = date('d/m/Y', strtotime('+1 day', strtotime($sd)));
						//echo $str;
						$route = $result['routeId'];
						$trid = $dd."".$fcity."".$tcity."".$result['routeId'] ;
						$rs = mysql_query("select * from travel_detail where travelId = '$trid'") or die("ERROR");
						if(mysql_affected_rows())
							echo "";	// TravelId Is Already Generated
						else
						{
							$fdt = date("Y-m-d H:i:s", strtotime($fdt));
							$tdt = date("Y-m-d H:i:s", strtotime($tdt));
							$rs = mysql_query("insert into travel_detail values('$trid',$route,'$fdt','$tdt')") or die("ERROR");
						}
						echo"<tr>";
						echo "<td>".$i."<td>".$trid."<td>".$result['fromcity']."<td>".$result['tocity']."<td>".$result['deptTime'];
						echo "<td>".$result['arrTime']."<td>".$result['days']."<td>".$result['fare'];
						echo "</tr>";
						$i = $i + 1;
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
<div class="footer_bg">
<div class="wrap">
<div class="footer">
			<div class="copy">
				<p class="link"><span>© All rights reserved | BhavnagarBusBooking <a href="http://google.com/"> ,Bhavnagar</a></span></p>
			</div>
			<div class="f_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</div>
			<div>
				<ul>
					<li><img src="onlinebook.gif" alt="Smiley face" height="42" width="42"></img></li>
					<li><a class="icon2" href="#"></a></li>
					<li><a class="icon3" href="#"></a></li>
					<li><a class="icon4" href="#"></a></li>
					<li><a class="icon5" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
			</div>
			<div class="clear"></div>
</div>
</div>
</div>		
</body>
</html>