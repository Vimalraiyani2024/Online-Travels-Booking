<html lang="en">
<head>
<meta charset="utf-8">
<title>Show Hide Dropdown Using CSS</title>
<style type="text/css">
    ul{
        padding: 0;
        list-style: none;
    }
    ul li{
        float:left;
        width: 100px;
        text-align: center;
        line-height: 21px;
    }
    ul li a{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #000000;
        text-decoration: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;
    }
   ul li ul li a{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #000000;
        text-decoration: none;
    }
    ul li ul lia:hover{
        color: #fff;
        background: #939393;
    }
    ul li ul li ul{
        display: none;
    }
    ul li ul li:hover ul{
        display: block; /* display the dropdown */
    }

    ul li ul{
        display: none;
    }
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
	 
</style>
</head>
<div class="header_bg">
<div class="wrap">
	<div class="header">
		<div class="logo">
			<a href="userHome.php"><img src="images/logo.png" alt=""></a>
		</div>
		<div class="h_right">
			<!--start menu -->
			<ul class="menu">
				<br><br>
				<li><a href="adminHome.php">Home</a></li> 
				<li><a href="reservation_admin.php">Online Booking</a></li> 
				<li><a href="cancellation_admin.php">Cancellation</a></li> 
				<li><a href="adminprofile.php">Edit Profile</a></li> 
				<li><a href="#">Manage &#9662;</a>
				<ul>
					<li><a href=""> Operator </a>
					<ul>
						<li><a href="operator_add.php"> Add </a></li>
						<li><a href="operator_updel.php"> Update/Delete </a></li>
					</ul>
					</li>
					<li><a href=""> Bus </a>
					<ul>
						<li><a href="Bus_Add.php"> Add </a></li>
						<li><a href="Up_delbus.php"> Update/Delete </a></li>
					</ul>
					</li>
					<li><a href=""> Route </a> 
					<ul>
						<li><a href="Route_Add.php"> Add </a></li>
						<li><a href="Route_Del_update.php"> Update/Delete </a></li>
					</ul>
					</li>
					<li><a href="print_adminticket.php"> Print Ticket </a></li>
					<li><a href="feedback_list.php"> Feedback </a></li>
				</ul>
				</li>
				<li><a href="logout.php">Logout</a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="top-nav">
		<nav class="clearfix">
				<ul>
				<li><a href="adminHome.php">Home</a></li> |
				<li><a href="reservation_admin.php">Online Booking</a></li> |
				<li><a href="cancellation_admin.php">Cancellation</a></li> |
				<li><a href="adminprofile.php">Edit Profile</a></li> |
				<li><a href="logout.php">Logout</a></li>
				</ul>
				<a href="#" id="pull">Menu</a>			</nav>
		</div>
	</div>
</div>
</div>
</html>