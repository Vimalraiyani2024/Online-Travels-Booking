<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add New Bus|BusOnlineTicket.Com</title>
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
<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css"/>
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
	
	include_once("adminheader.php");

	include('connect.php');
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
				<tr> <td><h1> Our New Buses </h1> <br></td></tr>
				<tr><td align="center"><h6>.</h6><br></tr>
				<tr><td><img src="images/A_2.jpg" alt="" /></td></tr>
				
			</table>
  		</div>
	<div class="login_user">
		<form method ="post" action="Bus_Add.php">
		<table border="1"  cellpadding="3" cellspacing="5" bordercolor="#FFFFFF">
			<tr><td colspan="2"><h1 align="center"> Add a New Bus Detail Here</h1></tr>
			<tr><td colspan="2" align="center">&nbsp;</td></tr> <tr><td>&nbsp;&nbsp;<hr></tr>
			
			<tr align ="left"> <td>BusID</tr> <tr><td><input name="busid" type="text" maxlength="50" size="50" placeholder="Enter Bus Id" value="<?php if(!empty($_POST['name'])){ echo $_POST['name']; } ?>"></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("[0-9]",$_POST['name'])) { echo " <tr><td><font color=red> * ENTER BUS ID</font></tr> "; $err=TRUE;}
			?> 
			
			<tr align ="left"> <td>Bus Type</tr> <tr><td> <select name="bustype"> <option value="sleeping"> SL </option> <option value="seating">ST</option></td></tr></tr><tr><td>&nbsp;
			</tr>
			
			<tr align ="left"> <td>No. of seats</tr> <tr><td><input name="seats" type="text" maxlength="50" size="50" placeholder="TOTAL NUMBER OF SEATS" value="<?php if(!empty($_POST['name'])){ echo 			 			$_POST['name']; } ?>"></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> * ENTER BUS TYPE</font></tr> "; $err=TRUE;}
			?> 
			<tr align="center"> <td colspan= "2"> <input type="submit" name="addbus" value="ADD BUS"></tr>
		</table>
		</form>
			
			<?php
						
						if(isset($_POST['addbus']))
						{
						
							include('connect.php');
							header('Bus_Add.php');
							$id=$_POST['busid']; 
							$type=$_POST['bustype'];  
							$seats=$_POST['seats'];
							mysql_query("insert into bus_detail values('$id','$type','$seats')") or die('RECORD NOT INSERTED');
						}
			
						echo "<tr><td align='center'> RECORD INSERTED SUCCESFULLY";			
			?>
	</div>
</div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<!--start main -->
<div>
<?php
	include('adminfooter.php');
?>
</div>	
</body>
</html>