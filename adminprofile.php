<!DOCTYPE HTML>
<html>
<head>
<title>Edit Profile |BusOnlineTicket.Com</title>
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
<form method ="post" action="adminprofile.php">
<?php
	include_once("adminheader.php");
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
		$name = $row['name'];
		$gender = $row['gender'];
		$add = $row['address'];
		$city = $row['city'];
		$mob = $row['mobile'];
		$email = $row['email'];
	}
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="profile_content">
			<div class="profile">
				<h4 align="center">EDIT YOUR PROFILE</h4>
				<h2 align="center"><font color="#FF0000">Your User Id : <u><?php echo $mob; ?></u></font></h2>
			</div>
			<div class="profile" align="center">
			<br>
			<table border="1">
			<tr align ="left"> <td>Name</tr> <tr><td><input name="name" type="text" maxlength="50" size="50" placeholder="Enter Your Name Here" value="<?php echo $name;  ?>"></tr><tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> *Enter Name </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td>Address </tr> <tr><td> <textarea align="left" name="add" rows="5" cols="40" placeholder="Enter Your City"><?php echo $add; ?></textarea></tr></tr>
			<?php if($flag) if(empty($_POST['city']) or !ereg("^[a-zA-Z]+",$_POST['city'])) { echo " <tr><td><font color=red> *Enter City </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td>City </tr> <tr><td> <input align="middle" name="city" type="text" maxlength="50" size="50" placeholder="Enter Your City" value="<?php echo $city; ?>"></tr></tr>
			<?php if($flag) if(empty($_POST['city']) or !ereg("^[a-zA-Z]+",$_POST['city'])) { echo " <tr><td><font color=red> *Enter City </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td>Mobile No  </tr> <tr><td> <input type="text" name="mob"  size="50" maxlength="10" placeholder="Mobile Number (Your Username)" value="<?php echo $mob; ?>"></tr></tr>
			<?php if($flag) if(empty($_POST['mob']) or !ereg("^[0-9]+",$_POST['mob'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"> <td>E-Mail </tr> <tr><td> <input name="email" type="text" maxlength="50" size="50" placeholder= "Enter E-Mail" value="<?php echo $email ?>"></tr></tr><tr><td><br></tr>
			<?php if($flag) if(empty($_POST['email']) or !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST['email'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>	
			<tr align="center"><td colspan="2">  <input type="submit" name="update" value="Update Profile">  </tr>
			<tr><td><u><a href="cpassword_admin.php">Change Password</a></u></tr>
			<?php
				include('connect.php');
				if((isset($_POST['update'])) && !$err)
				{
					$nam = $_POST['name'];
					$ad = $_POST['add'];
					$city = $_POST['city'];
					$mob = $_POST['mob'];
					$mail = $_POST['email'];
					echo $nam;
					echo $ad;
					echo $city;
					echo $mob;
					echo $mail;
					$result = mysql_query("update user_detail set name=$nam and address='$ad' and city='$city' and mobile='$mob' and email='$mail' Where user_id = '$user'") or die(mysql_error()); 
					echo "<tr><td> <font color=red> Profile Update Successfully </font></tr>";
				} 
			?>
		</table>

			</div>
		</div>
	</div>
</div>
</div>
<!--start main -->
<?php
	include_once("adminfooter.php");
?>	
</form>
</body>
</html>
