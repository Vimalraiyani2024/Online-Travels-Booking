<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>cancellation |BusOnlineTicket.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
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
	include_once("operatorheader.php");
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");	
		
	$flag=FALSE;
		$err=FALSE;
		if(isset($_POST['cancel']))
			$flag=true;
			
		error_reporting(E_ALL^E_DEPRECATED);
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="room">
				<h4>Cancel Your Ticket Now</h4>
			</div>
				<div class="grids_of_2">
				<div class="confirm">
					<form id = "way" method="post" action="cancellation_operator.php">
						<table border="1" align="center" width="70%">
							<tr><td><input name="pnr" type="text" placeholder="Enter Reservation Number" size="10" maxlength="10" value="<?php if(!empty($_POST['pnr'])){ echo $_POST['pnr']; } ?>">			
							<td><input name="cancel" type="submit" value="Cancel" /></tr>	
							<tr><td><font color="#FF0000">* Reservation Number In Digit Only (example. 98989898)</font></tr>
						</table>	
			<?php
					
					if(isset($_POST['cancel']))
					{
						include('connect.php');
						$resid = $_POST['pnr'];
						$result = mysql_query("select * from reservation_detail where res_id = '$resid' and confirm='N'") or die(mysql_error());
						if(!mysql_affected_rows())
							echo "<font color='red'> Ticket Already Confirm or Your Reservation Number is Wrong</font>";
						else
						{
							echo "<table border=1><tr><th>Reservation Id <th> Travel Id <th> User Id <th> Reserved Date/Time <th> Dept.s Date/Time<th> Seat No. <th> Amount <th> Select </tr>";
							while($row = mysql_fetch_array($result))
							{
								$pnr = $row['res_id'];
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
									echo "<tr><td>$resid<td>$trid<td>$uid<td>$rdate<td>$deptdate<td>$rseat<td>$amt<td><input type='checkbox' name='select[]' value='".$rseat."'></tr>";
									$f = true;				
								}
								else
									echo "<tr><td colspan='6'>Bus Already Depart </tr>";
							}
								if($f)
									echo "<tr><td><td><td><td colspan='2'><input name='cancels' type='submit' value='Cancel' /></tr>";
							echo "</table>";
						}
					}
						if(isset($_POST['cancels']) && isset($_POST['select']))
						{
							$new = $_POST['pnr'];
							include('connect.php');
							if (!empty($_POST['select']))
							{
							    foreach($_POST['select'] as $value)
    							{
        							echo $value."<br>";
									$result = mysql_query("Delete from reservation_detail Where res_id = '$new' and resSeat = '$value'") or die("Select Ticket");
									$flg = true;
    							}
							}
						}
						else
							echo "Select a Seat to Delete";
						
						if($fl)
							echo "<script> alert('Ticket Canceled')</script>";
					?>
					</form>
				</div>
				</div>
		</div>
		<div class="sidebar">
			 <div class="date_btn">
				<form action="reservation_operator.php" method="post">
					<input type="submit" name="booknow" value="book now" style="width: 82px;">
				</form>
			</div>
			<h4>Bus Features</h4>
			<ul class="s_nav">
				<li><a href="#">Safe Journey</a></li>
				<li><a href="#">Sleaper  Buses</a></li>
				<li><a href="#">AC / Non - AC</a></li>
				<li><a href="#">LCD , WiFi & Many More</a></li>
			</ul>
			<h4>We Accepts Credit/Debit Cards </h4>
			<ul class="s_nav1">
				<li><a class="icon1" href="#"></a></li>
				<li><a class="icon2" href="#"></a></li>
				<li><a class="icon4" href="#"></a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>		
<!--start main -->
<div>
<?php
	include('operatorfooter.php');
?>
</body>
</html>