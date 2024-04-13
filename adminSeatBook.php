<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: SELECT routeId FROM travel_detail WHERE travelId='$tridhttp://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Select Seat|BusOnlineTicket.Com</title>
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
?>
</div>
<div>
<?php 
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
	{
		$user = $_SESSION["uid"];
		$trid = $_SESSION['trid'];
		$sp = $_SESSION['sp'];
	}
	else
		header("location:index.php");
		
	$result = mysql_query("select * from user_detail where user_id = $user") or die("Error");
	while($row=mysql_fetch_array($result))
	{
		echo "<h4 align='center'><font color=red><u>Welcome To Our Website ...".$row['name']."<br><hr></font></h4>";
		$name = $row['name'];
		$gender = $row['gender'];
		$add = $row['address'];
		$city = $row['city'];
		$mob = $row['mobile'];
		$email = $row['email'];
	}	
?>
</div>

<br><br>
<!--USER DETAILS -->
<div class ="user_details">
	<div class ="seat_select_right">
	<table border="1"><tr><td><u><font color="#993333" size="+1">Seat Layout</font></tr></table>
	<table border="1">
	<tr><td colspan="7" align="right"><u><font color="#FF0000" size="+1">Driver</font></tr>
	<form method ="post" action="adminSeatBook.php">
	<?php
	
		include('connect.php');
		//	echo $trid;
		$result =  mysql_query("SELECT routeId FROM travel_detail WHERE travelId='$trid'");
		while($r1 = mysql_fetch_array($result))
			$rid = $r1['routeId'];	
		//	echo $rid;			
		$result = mysql_query("SELECT busId,fare FROM route_details WHERE 	routeId = $rid");
		while($r1 = mysql_fetch_array($result))
		{
			$bid = $r1['busId'];	
			$fare = $r1['fare'];
		}
		//		echo $bid;			
		$result = mysql_query("SELECT * FROM bus_detail WHERE busId =$bid") or die("ERROR");
		while($r1 = mysql_fetch_array($result))
		{
			$bid = $r1['busId'];
			$btype=$r1['busType'];
			$bcapacity=$r1['busCapacity'];
		}	
		echo "<tr>";
				$result = mysql_query("select * from reservation_detail where travelId = '$trid' order by resSeat ASC") or die(mysql_error());
				$k=0;
				while($r1 = mysql_fetch_array($result))
				{	
					$seat[$k] = $r1['resSeat'];
					$k++;
					$len = $k;
				}
				for(;$k<=$bcapacity;$k++)
					$seat[$k] = 0;
				
				$i=2;
				$j=1;
				$k=0;
					for($r=01;$r<=$bcapacity;$r++)
					{	
						if($r==$seat[$k])
						{
							if($r%5==0)
								echo "<td><font><img src='images/book.png' alt='book' /><br>$r</font></tr>";	
							else
								echo "<td><font><img src='images/book.png' alt='book' /><br>$r</font>";		
							
							$k++;
						}
						else if($r%5==0)
						{
							echo "<td><input type='checkbox' name='seat[]' value='$r'/><br>$r</tr>";
						}
						else
						{	
							echo "<td><input type='checkbox' name='seat[]' value='$r'/><br>$r";
						}
						if($i==$r)
						{
							echo "<td><td><td>";
							$i=$i+5;
						}
						
					}								
			echo "</tr><tr></tr><tr><td><img src='images/available.png' alt='available' /><td>Available</tr>
			<td><img src='images/book.png' alt='book' /><td colspan=6>Booked Seat</tr></table>";
	?>		
  	</div>
	<div class="login_user">
		<table border="1" cellspacing="5"  cellpadding="3" align="center">
			<tr><td colspan="2"><h1 align="center"> YOUR BOOKING ACCOUNT </h1></tr>
			<tr><td colspan="2" align="center"> Passenger Details </td></tr> <tr><td><br><hr></tr>
			<tr align ="left"> <td>Name</tr> <tr><td><input name="name" type="text" maxlength="50" size="50" placeholder="Enter Your Name Here" value="<?php echo $name;  ?>"></tr><tr><td><br></tr>
			<?php if($flag) if(empty($_POST['name']) or !ereg("^[a-zA-Z]+",$_POST['name'])) { echo " <tr><td><font color=red> *Enter Name </font></tr> "; $err=TRUE;}
			?>
		<tr align ="left"> <td>Gender </tr> <tr><td> <select name="gen"> <option value="male"> Male </option> <option value="female">Female </option></td></tr></tr><tr><td><br></tr>
			<tr align="left"><td>City </tr> <tr><td> <input align="middle" name="city" type="text" maxlength="50" size="50" placeholder="Enter Your City" value="<?php echo $city; ?>"></tr></tr><tr><td><br></tr>
			<?php if($flag) if(empty($_POST['city']) or !ereg("^[a-zA-Z]+",$_POST['city'])) { echo " <tr><td><font color=red> *Enter City </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"><td>Total Seat : <?php echo $sp ?> </tr></tr><tr><td><br></tr>
			<tr align="left"><td>Mobile No  </tr> <tr><td> <input type="text" name="mob" size="50" maxlength="10" placeholder="Mobile Number (Your Username)" value="<?php echo $mob; ?>"></tr></tr><tr><td><br></tr>
			<?php if($flag) if(empty($_POST['mob']) or !ereg("^[0-9]+",$_POST['mob'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>
			<tr align="left"> <td>E-Mail </tr> <tr><td> <input name="email" type="text" maxlength="50" size="50" placeholder= "Enter E-Mail" value="<?php echo $email ?>"></tr></tr><tr><td><br></tr>
			<?php if($flag) if(empty($_POST['email']) or !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST['email'])) { echo " <tr><td><font color=red> *Enter Mobile Number </font></tr> "; $err=TRUE;}
			?>	
			<tr align="center"><td colspan="2"> <input type="submit" name="book" value="Register"> </tr>
		</table>
	</div>
</div>
<div>
<?php
	include('connect.php');
	$totalseat = 0;
	if(isset($_POST['book']) && !$err)
	{
		if(!empty($_POST['seat']))
		{
			foreach($_POST['seat'] as $selected)
			{
				$totalseat = $totalseat + 1;
			}
		}
		if($totalseat==$sp)
		{
			$pnr = rand(00000000,99999999);
			$_SESSION['pnr'] = $pnr;
			$dat = date("Y-m-d H:i:s");
			foreach($_POST['seat'] as $selected)
			{
				$rs = mysql_query("insert into reservation_detail values('$pnr','$trid','$user','$dat','$selected','$fare','N')") or die(mysql_error());	
			}
			header("location:print_u.php");
		}
		else
		{
			echo "<script>alert('Please Select $sp Seat ');</script>";
		}
	}
?>
</div>
<!--start main -->
<div>
<?php
	include_once("adminfooter.php");
?>
</div>
</div>	
</form>	
</body>
</html>