
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
<?php
	$flag=FALSE;
		$err=FALSE;
		if(isset($_POST['submit']))
			$flag=true;
			
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
				<li><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li> |
				<li class="active"><a href="feedback.php">Feedback</a></li>
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
				<li><a href="contact.php">Contact Us</a></li>
				<li class="active"><a href="feedback.php">Feedback</a></li>
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

						<p>Bhavnagar - 364 001</p>
				   		<p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
				   </div>
				</div>				
				<div class="contact_right">
				  <div class="contact-form">
				  	<h3>Contact Us</h3>
					    <form method="post" action="feedback.php">
					    	<div>
						    	<input name="name" type="text" class="textbox" placeholder="Name" value="<?php if(!empty($_POST['name'])){ echo $_POST['name']; }?>" > 
								<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> *Enter Name </font></tr> "; $err=TRUE;} ?>
								
						    	<span><input name="email" type="text" class="textbox" placeholder="E-Mail ID  Example : abc@xyz.com" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>"></span>
								<?php if($flag) if(empty($_POST['email']) or !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST['email'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}?>
								
						       	<span><input name="mob" type="text" class="textbox" placeholder="Mobile Number Example : +91 9898989898" value="<?php if(!empty($_POST['mob'])){ echo $_POST['mob']; }?>"></span>
			<?php if($flag) if(empty($_POST['mob']) or !ereg("^[0-9]+",$_POST['mob'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;} ?>
			
						    	<span><textarea name="msg" required="required" placeholder="MESSAGE"><?php echo $_POST['msg'];  ?> </textarea></span>
								<?php if($flag) if(empty($_POST['msg']) or !ereg("^[a-zA-Z0-9]+",$_POST['msg'])) { echo " <tr><td><font color=red> *Enter your Message </font></tr> "; $err=TRUE;}?>
						   		<span><input type="submit" value="submit" name="submit" align="right"></span>
						  </div>
					    </form>
						<?php
							if(isset($_POST['submit']) and !$err)
							{
								include('connect.php');
								$name = $_POST['name'];
								$email = $_POST['email'];
								$mob = $_POST['mob'];
								$msg = $_POST['msg'];
								
								$result = mysql_query("insert into feedback(name,email,mobile,description) values('$name','$email','$mob','$msg')") or die(mysql_error());
								echo "<font size='5px' color='green'>We are thankful to your for giving a feedback to us.</font>";
							}
							
						?>
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