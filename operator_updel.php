<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Update/Delete Operator</title>
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
	include_once("adminheader.php");
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
<div class="route_list" align="center">
	<br>
	<h1><b><u><font size="+2"> Update or Delete Operator </u></b></font></h1>
		<form method ="post" action="operator_updel.php">
			<?php
						include('connect.php');
						if(isset($_REQUEST['id']))
						{
							$id=$_REQUEST['id'];
							$q="delete from user_detail where user_id='$id'";
							mysql_query($q)or die(mysql_error());
							header("User_update.php");
						}
						$query=mysql_query('select user_id,name,gender,address,city,mobile,email from user_detail where user_type=2');
						
					echo "<table border='3' cellspacing='5' cellpadding='5' width='100%' bgcolor='yellow'><tr  bgcolor='white'><td>User ID</td>
						 <td>User Name</td>
						 <td>Gender
						 <td> Address
						 <td>City
						 <td>Mobile
						 <td>Email	
						 <td colspan=2 align='center'>Operation </b>";
						 
						 while($raw=mysql_fetch_array($query))
						{
							echo "<tr><td>".$raw['user_id'];
							echo "<td>".$raw['name'];
							echo "<td>".$raw['gender'];
							echo "<td>".$raw['address'];
							echo "<td>".$raw['city'];
							echo "<td>".$raw['mobile'];
							echo "<td>".$raw['email'];
						 	echo'<td align="center"><a href="operator_update.php?id='.$raw['user_id'].'">Delete</a></td>';
							 echo "<td ALIGN=CENTER><a href='operator_update.php?id=".$raw['user_id']."&nm=".$raw['name']."&add=".$raw['address']."&gn=".$raw['gender']."&ct=".$raw['city']."&mob=".$raw['mobile']."&mail=".$raw['email']."'>Update</a></td>";
						}
			?>
		</form>
	</div>
