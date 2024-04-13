<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Confirm Ticket</title>
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
	include_once("userheader.php");
?>
</div>
<!--start main -->
<div class="userhome">
<?php
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
	{
		$user = $_SESSION["uid"];
		$pnrno = $_SESSION["pnr"];
	}
	else
		header("location:index.php");
		
	$result = mysql_query("select * from user_detail where user_id = $user") or die("Error");
//	echo "<table>";
	while($row=mysql_fetch_array($result))
	{
/*		echo "<tr><td> Name : <td>".$row['name']."</tr>";
		echo "<tr><td> Address : <td>".$row['address']."</tr>";
		echo "<tr><td> City : <td>".$row['city']."</tr>";
		echo "<tr><td> Mobile No. : <td>".$row['mobile']."</tr>";
		echo "<tr><td> E-mail : <td>".$row['email']."</tr>"; */
//		echo "WELCOME " .$row['name'];
		$name = $row['name'];
	}
//	echo "</table>";
?>
<?php /*
			<div class="menu_icons">
				<ul>
					<li><a><img src="images/onlinebook.gif" alt="booking"></img></a></li>
					<li><a><img src="images/editprofile.png" alt="booking"></img></a></li>
					<li><a class="" href="#"></a></li>
					<li><a class="" href="#"></a></li>
					<li><a class="" href="#"></a></li>
					<div class="clear"></div>
				</ul>	
			</div>
			<div class="clear"></div>
			*/ ?>
			
		<br><h1 align='center'> Welcome To  Bus Online Booking </h1>
		<p>Thank You For Book Your Ticket.
			Your Reservation Number Is Mail to Your email Id And also To Your Mobile Number.
			Please Confirm it at our Nearest Office.</p> 

		<p>	Your Confirmation / Reservation Number Is : <?php echo $pnrno ?></p>
		
</div>
<!--start main -->
<div>
<?php
	include('userfooter.php');
?>
</div>		
</body>
</html>