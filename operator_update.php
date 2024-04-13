<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Update Operator|BusOnlineTicket.Com</title>
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
	<div>
<?php
	include_once("adminheader.php");
		$flag=FALSE;
		$err=FALSE;
		if(isset($_POST['register']))
			$flag=true;
			
		error_reporting(E_ALL^E_DEPRECATED);
?>
</div>
<!--start main -->
<div class="userhome">
<?php
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");
?>
<!----start-images-slider---->
	
<!--start main -->
<br><br>
<!--USER DETAILS -->
<div class="user_details" align="center">
		<div class="login_user_right">
			<table>
				<tr> <td><h1> Take it all with you </h1> <br></td></tr>
				<tr><td align="center"><h6>Switch between devices, and pick up wherever you left off.</h6><br></tr>
				<tr><td><img src="images/devices.png" alt="" /></td></tr>
				
			</table>
  		</div>
	<div class="login_user" align="center" >
	
		<form method ="post" action="operator_update.php">
		<table border="1" cellspacing="5"  cellpadding="3">
			<tr><td colspan="2"><h1 align="center"> Upadate Operator </h1></tr>
		
				<tr align ="left"> <td>Name</tr> <tr><td><?php if(isset($_REQUEST['nm'])){ ?><input name="name" type="text" maxlength="50" size="50" placeholder="Enter Your Name Here" value="<?php echo $_REQUEST['nm'];} if(!empty($_POST['name'])){ echo $_POST['name']; } ?>"></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> *Enter Name </font></tr> "; $err=TRUE;}
			?>
			
			
			<tr align ="left"> <td>Address</tr> <tr><td><?php if(isset($_REQUEST['add'])){?><textarea name="address" rows="5" placeholder="Address" ><?php echo $_REQUEST['add'] ; } if(!empty($_POST['address'])){ echo $_POST['address']; } ?></textarea></tr> </tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['address']) or !ereg("^[a-zA-Z0-9]+",$_POST['address'])) { echo " <tr><td><font color=red> *Enter Address </font></tr> "; $err=TRUE;}
			?>
			
		<tr align ="left"> <td>Gender </tr><tr><td><select name="gen"> <option value="male"> Male </option> <option value="female">Female </option></td></tr></tr><tr><td>&nbsp;</tr>
		
			<tr align="left"><td>City </tr> <tr><td><?php if(isset($_REQUEST['ct'])) {?> <input align="middle" name="city" type="text" maxlength="50" size="50" placeholder="Enter Your City" value="<?php echo $_REQUEST['ct'] ; } if(!empty($_POST['city'])){ echo $_POST['city']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['city']) or !ereg("^[a-zA-Z]+",$_POST['city'])) { echo " <tr><td><font color=red> *Enter City </font></tr> "; $err=TRUE;}
			?>
			
			<tr align="left"><td>Mobile No </tr> <tr><td> <?php if(isset($_REQUEST['mob'])){?><input type="text" name="mob" size="10" maxlength="10" placeholder="Mobile Number (Your Username)" value="<?php echo $_REQUEST['mob'] ;} if(!empty($_POST['mob'])){ echo $_POST['mob']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['mob']) or !ereg("^[0-9]+",$_POST['mob'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>
			
			<tr align="left"><td>E-Mail</tr> <tr><td><?php if(isset($_REQUEST['mail'])) {?> <input name="email" type="text" maxlength="50" size="50" placeholder= "Enter E-Mail" value="<?php echo $_REQUEST['mail'];} if(!empty($_POST['email'])){ echo $_POST['email']; } ?>"></tr></tr><tr><td>&nbsp;</tr>
			<?php if($flag) if(empty($_POST['email']) or !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST['email'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>	
			<tr align="center"> <td colspan= "2"><input type="submit" name="update" value="UPDATE"></tr>
		</table>
				<?php
						if(isset($_POST['update']))
						{
								
						include('connect.php');
						$name=$_POST['name'];
						$add=$_POST['address'];
						$gen=$_POST['gen'];
						$city=$_POST['city'];
						$mob=$_POST['mob'];
						$mail=$_POST['email'];
						$pass=$_POST['pw'];
						
						mysql_query("update user_detail set name=$name,gender=$gen,address=$add,city=$city,mobile=$mob,email=$mail where user_id=$mob") or die(mysql_error());
						echo "User Detail Updated Successfully";
						}
				?>
		</form>
	</div>
</div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<!--start main -->
<div>

</div>
</body>
</html>