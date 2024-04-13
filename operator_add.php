<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add Operator |BusOnlineTicket.Com</title>
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
				    $( "#datepicker,#datepicker1" ).datepicker();
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
		$flag=FALSE;
		$err=FALSE;
		if(isset($_POST['register']))
			$flag=true;
			
		error_reporting(E_ALL^E_DEPRECATED);
	?>
<!-- start header -->
<div>
<?php
	include('connect.php');
	include_once("adminheader.php");
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");
?>
</div>
<!----start-images-slider---->
	
<!--start main -->
<br><br>
<!--USER DETAILS -->
<div class="user_details">
		<div class="login_user_right">
			<table>
				<tr> <td><h1> Take it all with you </h1> <br></td></tr>
				<tr><td align="center"><h6>Switch between devices, and pick up wherever you left off.</h6><br></tr>
				<tr><td><img src="images/devices.png" alt="" /></td></tr>
				<tr> <td><br<hr><h1> Make It yours </h1> <br></td></tr>
				<tr><td align="center"><h6>Set up your profile and preferences just the way you like.</h6><br></tr>
				<tr><td><img src="images/profiles_2.png" alt="" /></td></tr>
				
			</table>
  		</div>
	<div class="login_user">
		<form method ="post" action="operator_add.php">
		<table border="1" cellspacing="5"  cellpadding="3">
			<tr><td colspan="2"><h1 align="center"> CREATE NEW OPERATOR </h1></tr>
			<tr><td colspan="2" align="center"> Login With Your Mobile Number</td></tr> <tr><td>&nbsp;&nbsp;<hr></tr>
			
			<tr align ="left"> <td>Name</tr> <tr><td><input name="name" type="text" maxlength="50" size="50" placeholder="Enter Your Name Here" value="<?php if(!empty($_POST['name'])){ echo $_POST['name']; } ?>"></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> *Enter Name </font></tr> "; $err=TRUE;}
			?>
			<tr align ="left"> <td>Address</tr> <tr><td> <textarea name="address" rows="5" placeholder="Address" value="<?php if(!empty($_POST['address'])){ echo $_POST['address']; } ?>"></textarea></tr> </tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['address']) or !ereg("^[a-zA-Z0-9]+",$_POST['address'])) { echo " <tr><td><font color=red> *Enter Address </font></tr> "; $err=TRUE;}
			?>
		<tr align ="left"> <td>Gender </tr> <tr><td> <select name="gen"> <option value="male"> Male </option> <option value="female">Female </option></td></tr></tr><tr><td>&nbsp;</tr>
			<tr align="left"><td>City </tr> <tr><td> <input align="middle" name="city" type="text" maxlength="50" size="50" placeholder="Enter Your City" value="<?php if(!empty($_POST['city'])){ echo $_POST['city']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['city']) or !ereg("^[a-zA-Z]+",$_POST['city'])) { echo " <tr><td><font color=red> *Enter City </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td>Mobile No  </tr> <tr><td> <input type="text" name="mob" size="10" maxlength="10" placeholder="Mobile Number (Your Username)" value="<?php if(!empty($_POST['mob'])){ echo $_POST['mob']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['mob']) or !ereg("^[0-9]+",$_POST['mob'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"> <td>E-Mail </tr> <tr><td> <input name="email" type="text" maxlength="50" size="50" placeholder= "Enter E-Mail" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['email']) or !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST['email'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>	
			<tr align="left"> <td>Password </tr> <tr><td> <input name="pw" type="password" maxlength="25" size="50" placeholder="Enter Your Password"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['pw']) or !ereg("^[a-zA-Z0-9]{1,25}",$_POST['pw'])) { echo " <tr><td><font color=red> *Enter Password </font></tr>"; $err=true;}
			?>
			<tr align="left"> <td>Confirm Password </tr> <tr><td><input name="cpw" type="password" maxlength="25" size="50" placeholder="Confirm Password"> </tr><tr> <td>&nbsp; </td></tr>
			<?php if($flag) if(empty($_POST['cpw']) or !ereg("^[a-zA-Z0-9]{1,25}",$_POST['cpw']) or $_POST['pw']!=$_POST['cpw']) { echo " <tr><td><font color=red> *Password Must Be Same </font></tr>"; $err=true;}
			?>
			<tr align="center"><td colspan= "2"><input type="submit" name="register" value="Register"></tr>
		</table>
				<?php
				
						
								
						if(isset($_POST['register']))
						{
								
						include('connect.php');
						$name=$_POST['name'];
						$add=$_POST['address'];
						$gen=$_POST['gen'];
						$city=$_POST['city'];
						$mob=$_POST['mob'];
						$mail=$_POST['email'];
						$pass=$_POST['pw'];
								/*res=mysql_query("select user_id from user_detail where mob='$mob' ") or die(mysql_error());
								if(res)
									echo "Mobile Number allready exist";
								else*/
							mysql_query("insert into user_detail values('$mob',2,'$name','$gen','$add','$city','$mob','$mail','$pass')") or die(mysql_error());
							echo "RECORD INSERTED SUCCESFULLY";
								
						}
				?>
		</form>
	</div>
</div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<!--start main -->
<div class="footer_bg">
<div class="wrap">
<div class="footer">
			<div class="copy">
				<p class="link"><span>© All rights reserved | BhavnagarBusBooking <a href="http://google.com/"> ,Bhavnagar</a></span></span></p>
			</div>
			<div class="f_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</div>
			<div class="soc_icons">
				<ul>
					<li><a class="icon1" href="www.facebook.com"></a></li>
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