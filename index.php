<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Home|BusOnlineTicket.Com</title>
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
				    $( "#datepicker,#datepicker_main" ).datepicker();
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
	error_reporting(E_ALL^E_DEPRECATED);

?>
<!-- start header -->
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		<div class="h_right">
			<!--start menu -->
			<ul class="menu">
				<br><br>
				<li class="active"><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li> |
				<li><a href="feedback.php">Feedback</a></li>
				<div class="login" align="center">
				<br>
				<form action="index.php" method="post">
					<table align="right">
						<tr> <td align="center"> <input name="userName" type="text" class="textbox" placeholder="USERNAME" size="25" maxlength="10"></td>
						<td><td align="center"> <input name="passWord" type="password" class="textbox" placeholder="PASSWORD" size="25" maxlength="10"></td>
						<td><td align="right"><input type="submit" value="LOG IN" name="signin"  size="20"/> </td></tr>
						<tr align="left"><td><a href="google.com">Forgot Password?</a><td> <td><a href="user_create.php">Create an Account</a></tr>
					</table>
					</form>	
				</div>
				<div class="clear"></div>
			</ul>
		
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li class="active"><a href="index.php">Home</a></li> |
				<li><a href="gallery.php">Gallery</a></li> |
				<li><a href="about.php">About Us</a></li> |
				<li><a href="contact.php">Contact Us</a></li> |
				<li><a href="feedback.php">Feedback</a></li>
				</ul>
				<a href="#" id="pull">Menu</a>			</nav>
		</div>
	</div>
</div>
</div>
<!----start-images-slider---->
		<div class="images-slider">
			<!-- start slider -->
		    <div id="fwslider">
					<div class="slider_container">
		            <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/slider-bg.jpg" alt="" />
		            </div>
					 <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/A_1.jpg" alt="" />
		            </div>
					 <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/A_2.jpg" alt="" />
		            </div>
					 <div class="slide"> 
		                <!-- Slide image -->
		                    <img src="images/A_3.jpg" alt="" />
		            </div>
		            <!-- /Duplicate to create more slides -->
		            <div class="slide">
		                <img src="images/banner1.jpg"/>
		            </div>
		            <!--/slide -->
		        </div>
		        <div class="timers"> </div>
		        <div class="slidePrev"><span> </span></div>
		        <div class="slideNext"><span> </span></div>
	
		    <!--/slider -->
				
			</div>
		</div>
<!--start main -->
<br><br>
<div class="main_bg">
<div class="wrap">
	<div class="online_reservation">
	<div class="b_ticket">
			<h4>Search For A Online Booking</h4>
		</div>
		<div class="reservation">
			<ul>
				<li class="span1_of_1">
					<h5>From City : </h5>
					<!----------start section_room----------->
					<div class="section_room">				
					<form action="index.php" method="post">
					<select name="from" id="country" onChange="change_country(this.value)" class="frm-field required">
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
				
					
					</div>	
				</li>
				<li class="span1_of_1">
					<h5>To City : </h5>
					<!----------start section_room----------->
					<div class="section_room">
					<select>From</select>
					<select  name="to" id="country" onChange="change_country(this.value)" class="frm-field required">
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
					
					</div>	
				</li>

				<li  class="span1_of_1 left">
					<h5>Journy Date:</h5>
					<div class="book_date">
							<input name="date" class="date" id="datepicker_main" type="text" value="<?php echo date("d/m/y")?>" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'DD/MM/YY';}">
						
					</div>		
				</li>
				<li class="span1_of_2 left">
					<h5>Adults:</h5>
					<!----------start section_room----------->
					<div class="section_room">
						<select name="sperson" id="country" onChange="change_country(this.value)" class="frm-field required">
							<option value="1">1</option>
				            <option value="2">2</option>         
				            <option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
		        		</select>
					</div>					
				</li>
				<li class="span1_of_3">
					<div class="date_btn">
							<input name="search" type="submit" value="Search" />
					</div>
				</li>
				<div class="clear"></div>
			</ul>
		</div>
		
		<div class="clear"></div>
		</div>
	</form>
	</div>
	<!--start grids_of_3 -->
	<div class="place"> 
			<br><br><h5 align="center">PLACE TO VISIT</h5>
	</div>
	<div class="grids_of_3">
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic2.jpg" alt=""/>
					
				</a>	
			</div>
			<h4><a href="images/pic2.jpg">AHMEDABAD</a></h4>
			<p>Founded by Sultan Ahmad Shah in 1411 AD, Ahmedabad, in the state of Gujarat, has grown into one of the most important modern cities of India. Straddling the Sabarmati river, this prosperous city of six million is a delight for archeologists, anthropologists, architects, histsorians, sociologists, traders, bargain hunters, and plain tourists. </p>
		</div>
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic1.jpg" alt="" />
				</a>
			</div>
			<h4><a href="#">BARODA</a></h4>
			<p>Modern Baroda is a great and fitting memorial to its late ruler, Sayaji Rao Gaekwad III (1875-1939 AD). It was the dream of this able administrator to make Baroda an educational, industrial and commercial centre and he ensured that his dream would come true.
Baroda is situated on the banks of the river Vishwamitri (whose name is derived from the great saint Rishi Vishwamitra).From Vadpatra it derived its present name Baroda or Vadodara.</p>
		</div>
		<div class="grid1_of_3">
			<div class="grid1_of_3_img">
				<a href="details.html">
					<img src="images/pic3.jpg" alt="" />
				</a>
			</div>
			<h4><a href="#">MUMBAI</a></h4>
			<p>Mumbai, which was previously known as Bombay is a major metropolitan city of India. It is the state capital of Maharashtra . Mumbai city is known as the business capital of India, it being the country's principal financial and communications centre. The city has the largest and the busiest port handling India's foreign trade and a major Interntional airport. India's largest Stock Exchange which ranks as the third largest in the world, is situated in Mumbai. Here, trading of stocks is carried out in billions of rupees everyday.</p>
		</div>
		<div class="clear"></div>
	</div>	
</div>
</div>		

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
<?php
	if(isset($_POST['signin']))
	{
		$uid = $_POST['userName'];
		$pw = $_POST['passWord'];
		include('connect.php');
		$result = mysql_query("Select * from user_detail where user_id = $uid and password=$pw");
		if($result)
		{
			if (mysql_num_rows($result) == 1)
			{		
				while($row=mysql_fetch_array($result))
				{
					session_start();	
					$_SESSION["uid"] = $row["user_id"];
					$utype = $row["user_type"];
					if(isset($_SESSION["uid"])) 	
					{
						if($utype==1)			
							header("location:adminHome.php");
						if($utype==0)
							header("location:userHome.php");
						if($utype==2)
							header("location:operatorHome.php ");
					}
				}
			}
		}
		else
		{
			echo "<script>alert('UserName or Password Is Incorrect	');</script>";
		}
		
	}
	
	if(isset($_POST['search']))
	{
		$searchfrom = $_POST['from'];
		$searchto = $_POST['to'];
		$searchdate = $_POST['date'];
		$searchperson = $_POST['sperson'];
		header("location:search.php?searchfrom=".$searchfrom."&searchto=".$searchto."&searchdate=".$searchdate."&searchperson=".$searchperson."");
	}
?>	
</body>
</html>