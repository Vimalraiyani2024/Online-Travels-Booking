<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Booking|BusOnlineTicket.Com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<!---strat-date-piker---->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
		  <script>
				  $(function() {
				    $( "#datepicker,#datepicker1" ).datepicker();
					$( "#datepicker,#datepicker2" ).datepicker();
				  });
		  </script>
<!---/End-date-piker---->
<script type="text/javascript">	//	When Click on the RADIO button redirect to new page
				  $(document).ready(function()	{
					$('input[type="radio"]').click(function(){
						if($(this).is(":checked"))	
								$('form#way').submit();
					});
				});
</script>
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
	include_once("userheader.php");
?>
</div>
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="res_online">
			<h4>basic information</h4>
			<p class="para">
			This is the bus online booking website. you can book your bus ticket from here.
			Select your city & Date of journey for search & Book your tickets Now.
			</p>
		</div>			
			<div class="span_of_2">
				<div class="span2_of_1">
					<form id = "way" method="post" action="reservation_user.php">
						<table border="1" align="center" width="1000px">
							<tr align="left">
								<td colspan="4"><h4 align="center">Book Your Tickets </h4>
							<!--	<td><input type="radio" value="oneway" name="searchtype" checked="checked"> <td>One Way
								<td><input type="radio" value="roundtrip" name="searchtype"><td>Round Trip -->
							</tr>
							<tr><td>&nbsp;<br><td>&nbsp;<br><td>&nbsp;<br><td><td></tr>
							<tr>
							<td><h4>From City : </h4> 
							<td><select name="from" id="country" onChange="change_country(this.value)" class="frm-field required">
							<?php
								include('connect.php');
								$result=mysql_query("select distinct(fromcity) from route_details") or die("Data not fetch");
								while($row=mysql_fetch_array($result))
								{
									$r = $row['fromcity'];
									echo "<option value=$r>".$row['fromcity']."</option>";
								}
							?>
							</select>
							</tr>
							<tr>
							<td><h4>To City : </h4>
							<td><select  name="to" id="country" onChange="change_country(this.value)" class="frm-field required">
							<?php
								include('connect.php');
								$result=mysql_query("select distinct(tocity) from route_details") or die("Data not fetch");
								while($row=mysql_fetch_array($result))
								{
									$r = $row['tocity'];
									echo "<option value=$r>".$row['tocity']."</option>";
								}
							?>
							</select>
							</tr>	
							<tr>
							<td><h4>Depart Date :</h4>
							<td><input name="date" class="date" id="datepicker1" type="text" value="<?php echo date("d-m-Y")?>" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'DD/MM/YY';}">
							</tr> 
						<!--	<td><h4>Return Date :</h4>
							<td><input class="date" name ="rdate" id="datepicker2" type="text" value="<?php echo date("d-m-Y"); ?>" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'DD/MM/YY';}"> -->
							<td><h4>Passanger : </h4>
							<td><select name="sperson" id="country" onChange="change_country(this.value)" class="frm-field required">
							<option value="1">1</option>
				            <option value="2">2</option>         
				            <option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
		        			</select>
							</tr>	
							<tr><td colspan="2"><input name="booknow" type="submit" value="BOOK NOW" /></tr>		
						</table>
					</form>
					</div>		
			</div>
				<div class="clear"></div>
			</div>
	</div>
</div>
</div>		
<?php
	session_start();
	if(isset($_SESSION["uid"]))
		$user = $_SESSION["uid"];
	else
		header("location:index.php");
	if(isset($_POST['booknow']))
	{
		$searchfrom = $_POST['from'];
		$searchto = $_POST['to'];
		$searchdate = $_POST['date'];
		$searchperson = $_POST['sperson'];
		$_SESSION['sp'] = $_POST['sperson'];
		header("location:user_booking_search.php?searchfrom=".$searchfrom."&searchto=".$searchto."&searchdate=".$searchdate."&searchperson=".$searchperson."");
	}
?>	

<!--start main -->
<?php
	include_once('userfooter.php');
?>
</body>
</html>
