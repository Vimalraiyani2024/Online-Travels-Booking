<!DOCTYPE HTML>
<html>
<head>
<title>Change Password |BusOnlineTicket.Com</title>
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
<form method ="post" action="cpassword_user.php">

<?php
	include_once("userheader.php");
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");
	
	$flag=FALSE;
	$err=FALSE;
	if(isset($_POST['update']))
			$flag=true;
	
	error_reporting(E_ALL^E_DEPRECATED);
		
	$result = mysql_query("SELECT * from user_detail where user_id = $user") or die("Error");
	while($row=mysql_fetch_array($result))
	{
	//	echo "<h4 align='center'><font color=red><u>Welcome To Our Website ...".$row['name']."<br><hr></font></h4>";
		$name = $row['password'];
	}
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="profile_content">
			<div class="profile">
				<h4 align="center">CHANGE PASSWORD</h4>
				<h2 align="center"><font color="#FF0000">Your User Id : <u><?php echo $user; ?></u></font></h2>
			</div>
			<div class="profile" align="center">
			<br><br>
			<table border="1">
			<tr align="left"> <td>Old Password </tr> <tr><td> <input name="oldpw" type="password" maxlength="25" size="50" placeholder="Enter Old Password"></tr></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['oldpw']) or !ereg("^[a-zA-Z0-9]{1,25}",$_POST['oldpw'])) { echo " <tr><td><font color=red> *Old Password Wrong</font></tr>"; $err=true;}
			?>
			<tr align="left"> <td>New Password </tr> <tr><td> <input name="pw" type="password" maxlength="25" size="50" placeholder="Enter Your Password"></tr></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['pw']) or !ereg("^[a-zA-Z0-9]{1,25}",$_POST['pw'])) { echo " <tr><td><font color=red> *Enter Password </font></tr>"; $err=true;}
			?>
			<tr align="left"> <td>Confirm New Password </tr> <tr><td><input name="cpw" type="password" maxlength="25" size="50" placeholder="Confirm Password"> </tr><tr> <td>&nbsp; </td></tr>
			<?php if($flag) if(empty($_POST['cpw']) or !ereg("^[a-zA-Z0-9]{1,25}",$_POST['cpw']) or $_POST['pw']!=$_POST['cpw']) { echo " <tr><td><font color=red> *Password Must Be Same </font></tr>"; $err=true;}
			?>
			<tr align="center"><td colspan="2"> <input type="submit" name="update" value="Change Password"> </tr>
	
			<tr><td><u><a href="user_profile.php">Edit Profile</a></u></tr>
		</table>
				<?php
				include('connect.php');
				if((isset($_POST['update'])) && !$err)
				{
					$old = $_POST['oldpw'];
					$new = $_POST['pw'];
					$result = mysql_query("select password from user_detail where user_id = '$user'") or die(mysql_error());
					if($r = mysql_fetch_array($result))
					{
						if($r['password']==$old)
						{
							$result = mysql_query("update user_detail set password = '$new' Where user_id = '$user'") or die(mysql_error()); 
					echo "<tr><td> <font color=red> Password Changed Successfully </font></tr>";
						}
						else
						{
							echo "<tr><td> <font color=red> Old Password Not Match </font></tr>";
						}
					}	
				} 
			?>
			</div>
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
					<li><a href="userHome.php">Home</a></li>
					<li><a href="contact_user.php">contact_user Us</a></li>
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

</form>	
</body>
</html>