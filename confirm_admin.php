﻿<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Confirm|BusOnlineTicket.Com</title>
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
<script type="text/javascript">	//	When Click on the RADIO button redirect to new page
				  $(document).ready(function()	{
					$('input[type="radio"]').click(function(){
						if($(this).is(":checked"))	
								$('form#way').submit();
					});
				});
</script>
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
<div>
<?php
	include_once("adminheader.php");
	$flag=FALSE;
		$err=FALSE;
		if(isset($_POST['confirm']))
			$flag=true;
			
		error_reporting(E_ALL^E_DEPRECATED);
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="res_online">
			<h4>Confirm Ticket</h4>
			<p class="para">
			This is the bus online booking website. Enter Confirmation Number of the ticket and confirm your tickets. & Get Print of it.
			</p>
		</div>			
			<div class="span_of_2">		
				<div class="confirm">
			
					<form id = "way" method="post" action="confirm_admin.php">
						<table border="1" align="center" width="50%">
							<tr><td><input name="pnr" type="text" placeholder="Enter Reservation Number" size="10" maxlength="10" value="<?php if(!empty($_POST['pnr'])){ echo $_POST['pnr']; } ?>">			
							<td><input name="confirm" type="submit" value="Confirm" /></tr>	
							<tr><td><font color="#FF0000">* Reservation Number In Digit Only (example. 98989898)</font></tr>
			<?php
					
					if(isset($_POST['confirm']))
					{
						include('connect.php');
						$resid = $_POST['pnr'];
						$result = mysql_query("select * from reservation_detail where res_id = '$resid' and confirm='N'") or die(mysql_error());
						if(!mysql_affected_rows())
							echo "<font color='red'> Bus Already Confirm or Your Reservation Number is Wrong</font>";
						else
						{
							echo "<table border=1><tr><th>Reservation Id <th> Travel Id <th> User Id <th> Reserved Date/Time <th> Dept.s Date/Time<th> Seat No. <th> Amount</tr>";
							while($row = mysql_fetch_array($result))
							{
								$pnr = $row['res_id'];
								$_SESSION['pnr']=$pnr;
								$trid = $row['travelId'];
								$uid = $row['user_id'];
								$rdate = $row['resDateTime'];
								$rseat = $row['resSeat'];
								$amt = $row['resAmt'];
								$res = mysql_query("select deptDateTime from travel_detail where travelId = '$trid'") or die(mysql_error());
								while($row = mysql_fetch_array($res))
									$deptdate = $row['deptDateTime'];
		
								if(date("Y-m-d H:i:s") <= $deptdate)
								{
									echo "<tr><td>$resid<td>$trid<td>$uid<td>$rdate<td>$deptdate<td>$rseat<td>$amt<td></tr>";
									$f = true;				
								}
								else
									echo "<tr><td colspan='6'>Bus Already Depart </tr>";
							}
								if($f)
									echo "<tr><td><td><td><td colspan='2'><input name='confirms' type='submit' value='Confirm & Print' /></tr>";
							echo "</table>";
						}
					}
				echo "</table>";
						if(isset($_POST['confirms']))
						{
						$new = $_POST['pnr'];
							$_SESSION['new'] = $new;
							echo $_SESSION['new'];
							include('connect.php');
							$result = mysql_query("update reservation_detail set confirm = 'Y' Where res_id = '$new'") or die(mysql_error());
							header("location:print_admin.php?pnr=".$new."");
						}
					?>
					</form>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>
</div>		
<?php
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");			
?>	
<!--start footer -->
<?php
	include_once('adminfooter.php');
?>
</body>
</html>