﻿<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Add New Route|BusOnlineTicket.Com</title>
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
	include('adminheader.php');
	
?>
</div>
	
<!--start main -->
<br><br>
<!--USER DETAILS -->
<div class="user_details">
		<div class="login_user_right">
			<table>
				<tr> <td><h1> Take it all with you </h1> <br></td></tr>
				<tr><td align="center"><h6>Switch between devices, and pick up wherever you left off.</h6><br></tr>
				<tr><td><img src="images/devices.png" alt="" /></td></tr>
				
			</table>
  		</div>
		<div class="login_user">
	<form method ="post" action="Route_Add.php">
		<table border="1" cellspacing="5"  cellpadding="3">
			<tr><td colspan="2"><h1 align="center">ADD ROUTE DETAILS</h1></tr>
			<tr><td colspan="2" align="center"></td></tr> <tr><td>&nbsp;&nbsp;<hr></tr>
			
			<tr align ="left"> <td>Route ID</tr> <tr><td><input name="routeid" type="text" maxlength="50" size="50" placeholder="Enter Route Id" value="<?php if(!empty($_POST['name'])){ echo $_POST['routeid']; } ?>"></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['routeid']) or !ereg("^[a-zA-Z]+",$_POST['routeid'])) { echo " <tr><td><font color=red> *Enter Route ID</font></tr> "; $err=TRUE;}
			?>
			
		<tr align ="left"> <td colspan="2">Bus Id </tr> <tr><td><select  name="busid" id="bus_id" onChange="change_country(this.value)" class="frm-field required">
					<?php
						include('connect.php');
						$result=mysql_query("select distinct(busId) from bus_detail") or die(mysql_error());
						while($row=mysql_fetch_array($result))
						{
							$r = $row['busId'];
							echo "<option value=$r>".$row['busId']."</option>";
						}
					?>
					</select>
				</tr><tr><td></tr>
			<tr align="left"> <td colspan="2"> From City </tr> <tr><td> <input align="middle" name="fromcity" type="text" maxlength="50" size="50" placeholder="Enter From City" value="<?php if(!empty($_POST['fromcity'])){ echo $_POST['fromcity']; } ?>"></tr></tr><tr><td></tr>
			
			<?php if($flag) if(empty($_POST['fromcity']) or !ereg("^[a-zA-Z]+",$_POST['fromcity'])) { echo " <tr><td><font color=red> *Enter From City </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td colspan="2">To City</tr> <tr><td> <input type="text" name="tocity" size="30" maxlength="30" placeholder="Enter To-City" value="<?php if(!empty($_POST['tocity'])){ echo $_POST['tocity']; } ?>"></tr></tr><tr><td></tr>
			<?php if($flag) if(empty($_POST['tocity']) or !ereg("^[a-zA-Z]+",$_POST['tocity'])) { echo " <tr><td><font color=red>Enter to City </font></tr> "; $err=TRUE;}
			?>
			<td>Route Distance</tr> <tr><td colspan="2"> <input name="rdistance" type="text" maxlength="25" size="50" placeholder="Enter Route Distance"></tr></tr><tr><td> </tr>
			<?php if($flag) if(empty($_POST['rdistance']) or !ereg("^[0-9]{1,5}",$_POST['rdistance'])) { echo " <tr><td><font color=red> *Enter Route Distance </font></tr>"; $err=true;}
			?>
			<tr><td>Depart Time
			<tr><td> <select name="depttime" id="dtime" onChange="change_country(this.value)" class="frm-field required">
							<?php
							$starttime = '00:00:00';
							$time = new DateTime($starttime);
							$interval = new DateInterval('PT30M');
							$temptime = $time->format('H:i:s');

							do {
							   echo "<option value='$temptime'>$temptime</option>";
							   $time->add($interval);
							   $temptime = $time->format('H:i:s');
							} while ($temptime !== $starttime);
							?>
							</select>
							
							
					    <tr><td>Arrive Time
						<tr><td> <select name="arrtime" id="atime" onChange="change_country(this.value)" class="frm-field required">
							<?php
							$starttime = '00:00:00';
							$time = new DateTime($starttime);
							$interval = new DateInterval('PT30M');
							$temptime = $time->format('H:i:s');

							do {
							   echo "<option value='$temptime'>$temptime</option>";
							   $time->add($interval);
							   $temptime = $time->format('H:i:s');
							} while ($temptime !== $starttime);
							?>
							</select>
					    
			
			<tr align="left"><td>Days to Journey</tr> <tr><td><input name="days" type="text" maxlength="25" size="50" placeholder="No. of Days To Journey"> </tr><tr> <td>&nbsp; </td></tr>
			<?php if($flag) if(empty($_POST['days']) or !ereg("^[0-9]{1,2}",$_POST['days']) or $_POST['days']!=$_POST['days']) { echo " <tr><td><font color=red>Enter Days to Journey</font></tr>"; $err=true;}
			?>
			
					<tr align="left"><td>Fare</tr> <tr><td><input name="fare" type="text" maxlength="25" size="50" placeholder="Ticket Price	"> </tr><tr> <td>&nbsp; </td></tr>
			<?php if($flag) if(empty($_POST['fare']) or !ereg("^[0-9]{1,4}",$_POST['fare']) or $_POST['fare']!=$_POST['fare']) { echo " <tr><td><font color=red>Enter Days to Journey</font></tr>"; $err=true;}
			?>
			
			<tr align ="left"> <td colspan="2">Freq ID</tr> <tr><td><select  name="freqid" id="fid" onChange="change_country(this.value)" class="frm-field required">
					<?php
						include('connect.php');
						$result=mysql_query("select freqId from freq_detail") or die(mysql_error());
						while($row=mysql_fetch_array($result))
						{
							$r = $row['freqId'];
							echo "<option value=$r>".$row['freqId']."</option>";
						}
					?>
					</select>
				
			<tr align="center"><td colspan= "2"><input type="submit" name="register" value="Register"></tr>
		</table>
				<?php
				
						
								
						if(isset($_POST['register']))
						{
								
						include('connect.php');
						$rid=$_POST['routeid'];
						$bid=$_POST['busid'];
						$fcity=$_POST['fromcity'];
						$tocity=$_POST['tocity'];
						$dist=$_POST['rdistance'];
						$dtime=$_POST['depttime'];
						$atime=$_POST['arrtime'];
						$days=$_POST['days'];
						$fare=$_POST['fare'];
						$fid=$_POST['freqid'];
								/*res=my							
								ql_query("select user_id from user_detail where mob='$mob' ") or die(mysql_error());
								if(res)
									echo "Mobile Number allready exist";
								else*/
							mysql_query("insert into route_details values('$rid','$bid','$fcity','$tocity','$dist','$dtime','$atime','$days','$fare','$fid')") or die(mysql_error());
							echo "ROUTE INSERTED SUCCESFULLY";
								
						}
				?>
		</form>
		</div>
</div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<!--start main -->
<div>
<?php
	
?>
</div>		
</body>
</html>