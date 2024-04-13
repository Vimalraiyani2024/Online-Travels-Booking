<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Home|BusOnlineTicket.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
		  <script>
				  $(function() {
				    $( "#datepicker,#datepicker_main" ).datepicker();
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
<?php
		error_reporting(E_ALL^E_DEPRECATED);
?>
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
				<li><a href="reservation.php">Online Booking</a></li> |
				<li><a href="cancellation.php">Cancellation</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li>
				<div class="login" align="center">
				<br>
				<form action="index.php" method="post">
					<table align="right">
						<tr> <td align="center"> <input name="userName" type="text" class="textbox" placeholder="USERNAME" size="25" maxlength="10"></td>
						<td><td align="center"> <input name="passWord" type="password" class="textbox" placeholder="PASSWORD" size="25" maxlength="10"></td>
						<td><td align="right"><input type="submit" value="LOG IN" name="signin"  size="20"/> </td></tr>
						<tr align="left"><td><a href="google.com">Forgot Password?</a><td> <td><a href="user_create.php">Create an Account</a></tr>
					</table>
					</form>	
				</div>
				<div class="clear"></div>
			</ul>
		
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li class="active"><a href="index.php">Home</a></li> |
				<li><a href="reservation.php">Online Booking</a></li> |
				<li><a href="cancellation.php">Cancellation</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="activities.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li>
				</ul>
				<a href="#" id="pull">Menu</a>			</nav>
		</div>
	</div>
</div>
</div>
