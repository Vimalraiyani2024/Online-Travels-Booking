<!DOCTYPE HTML>
<html>
<head>
<title>Contact|BusOnlineTicket.Com</title>
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
				<li><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li class="active"><a href="contact.php">Contact Us</a></li> |
				<li><a href="feedback.php">Feedback</a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li class="active"><a href="contact.php">Contact Us</a></li> |
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
		<div class="contact">				
				<div class="contact_left">
					<div class="contact_info">
			    	 	<h3>Find Us Here</h3>
			    	 		<div class="map">
					   			
					   		</div>
      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						<p> </p>
						<p></p>
						<p>Bhavnagar - 364 001</p>
						<p>Tel : +91 XXXXXXXXXXXX</p>
				 	 	<p>Email: <a href="#">#@#.###</a></p>
				   		<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
				   </div>
				</div>				
				<div class="contact_right">
				  <div class="contact-form">
				  
											  <img src="images/contact-us.jpg" width="100%" align="center" alt="" />
				  	<h3>Contact Us</h3>
					<hr>
				<div align="right">
				     	<h3>BARODA :</h3>
						<p>##########</p>
						<p>######,</p>
						<p>Baroda - 391 110</p>
				   		<p>Tel : +91 ###########</p>
				 	 	<p>Email: <a href="#">############</a></p>
				  <div align="left">
				 	 	<p>##########</p>
						<p>######,</p>
						<p>Ahmedabad - 380 001</p>
				   		<p>Tel : +91 ###########</p>
				 	 	<p>Email: <a href="#">############</a></p>
				  </div>
				    </div>		
				   </div>
  				</div>		
  				<div class="clear"></div>		
		  </div>
	</div>
</div>
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
			<div class="soc_icons">
				<ul>
					<li><a class="icon1" href="#"></a></li>
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