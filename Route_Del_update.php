<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title> Route Delete/Update |BusOnlineTicket.Com</title>
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
	include_once("adminheader.php");

	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");
?>
</div><br><br>
<!--USER DETAILS -->
<div class="">
	<div class="route_list" align="center">
	<h1><b><u><font size="+2"> Update or Delete Route </u></b></font></h1>
		<form method ="post" action="Route_Del_update.php">
			<?php
						
					
						include('connect.php');
						if(isset($_REQUEST['routeid']))
						{
							$id=$_REQUEST['routeid'];
							$q="delete from route_details where routeId='$id'";
							mysql_query($q)or die(mysql_error());
						}
						$query=mysql_query('select * from route_details');
					echo "<table border=3 cellspacing=5 cellpaddding=5 width=100%>
					     <tr>
						 <th>Route ID
						 <th>Bus ID
						 <th>From City
						 <th>To City
						 <th>Route Distance
						 <th>Departure Time
						 <th>Arrival Time
				         <th>Days
						 <th>Fare
						 <th>Freq ID
						 <th colspan=2>Operation
						 <th>&nbsp;";
						 
						 while($raw=mysql_fetch_array($query))
						{
							echo "<tr border='solid 1px'><td>".$raw['routeId'];
							echo "<td>".$raw['busId'];
							echo "<td>".$raw['fromcity'];
							echo "<td>".$raw['tocity'];
							echo "<td>".$raw['routeDistance'];
							echo "<td>".$raw['deptTime'];
							echo "<td>".$raw['arrTime'];
							echo "<td>".$raw['days'];
							echo "<td>".$raw['fare'];
							echo "<td>".$raw['freqId'];
						 	echo'<td><a href="Route_Del_update.php?routeid='.$raw['routeId'].'">Delete</a></td>';
							echo'<td><a href="Route_Update.php?routei='.$raw['routeId'].'">Update</a></td>';
						}
			
			
			?>
		</form>
</div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<div> <h1>&nbsp;<br>&nbsp;<br>&nbsp;<br></h1></div>
<!--start main -->
<div>
	
</div>
</body>
</html>