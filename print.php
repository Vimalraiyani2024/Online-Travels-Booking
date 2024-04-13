
<style type="text/css">
 .main{
		border: 3px inset #9966FF;
    	border-radius: 15px;
    	border-collapse: separate;	
		background-color:#FFFFCC;
 }
 hr{
 	border: 1px dotted #9966FF;
 }
</style>
<form action="print.php" method="POST" enctype="multipart/form-data" target="_blank">
<body onLoad="javascript:window.print();">
<?php
	include('connect.php');
	session_start();
	if(isset($_SESSION["uid"]))
	{
		$user = $_SESSION["uid"];
	}
	else
		header("location:index.php");
	
	$resid = $_REQUEST['pnr'];
	$total=0;
	$res = mysql_query("select * from reservation_detail where res_id = '$resid'") or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$cus = $row['user_id'];
		$amt = $row['resAmt'];
		$trid = $row['travelId'];
		$total = $total + $amt;
	}
	$i=0;
	$res = mysql_query("select resSeat from reservation_detail where res_id = '$resid'") or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$seat[$i] = $row['resSeat'];
		$i = $i + 1;
	}
	$res = mysql_query("select * from user_detail where user_id = '$cus'") or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$name = $row['name'];
		$gen = $row['gender'];
		$mob = $row['mobile'];
	}
	$res = mysql_query("select * from travel_detail where travelId = '$trid' ") or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$deptdate = $row['deptDateTime'];
		$depttime = date("H:i:s", strtotime($deptdate));
		$routeid = $row['routeId'];
	}
	$res = mysql_query("select * from route_details where routeId = '$routeid'") or die(mysql_error());
	while($row=mysql_fetch_array($res))
	{
		$from = $row['fromcity'];
		$to = $row['tocity'];
	}
?>
	<table width="90%s" align="center">
		<tr><td align="center"><a href="operatorHome.php"> Home</a></tr>
	</table>
                <table width=90%  cellpadding="2" cellspacing="2" border="0" align="center" class="main">
				<tr>
				<td align="left"><a><img src="images/logo.png" alt="" width="200"> </a>
					<td colspan="3" align="center"><h4>Bus Online Ticket.com</h4>
					Nr. RTO Circle, White House, Bhavnagar - 364 001<br>
					Tel : +91 9725 359 755					
					<br /></td>
				</tr>
				<tr><td align="center" colspan="3"><h3><u><i><b>Ticket Print (Passenger Copy)</b><i></u></h3></td></tr>
				<br><br>
				<?php 
				echo "<tr align = 'center'><td><b>$from to $to <td><b> $deptdate	<td><b><u> busonlineticket.com</tr>";
				echo "<tr><td colspan='3'><hr></tr>";
				echo "<tr align = 'center'><td><u><b>Passenger Name <td> <b><u>Seat No <td><b><u>PNR</tr>";
				echo "<tr align='center'><td>$name";
				$seats = "";
				$j=$i;
				for($i=$i;$i>0;$i--)
					$seats = $seats.",".$seat[$i-1];
				echo "<td>$seats<td>$resid</tr><tr><td colspan='3'><hr></tr>";
				echo "<tr align='center'><td><u><b>Departure Time</b>   </u>: $depttime <td><b>Boarding Point Address<td align='right'> <b><i>For, BusOnlineTicket.Com</tr>";
				echo "<tr align='center'><td><u><b>Total Fare  </b> </u>: Rs. $total<td>At Our Nearest Office of $from <td align='right'> Authorised Signatory</tr>";
				
				?>
				</table>
				 <table width=90% border="0" cellpadding="2" cellspacing="2" align="center" class="main">
				<tr>
				<td align="left"><a><img src="images/logo.png" alt="" width="200"> </a>
					<td colspan="3" align="center"><h4>Bus Online Ticket.com</h4>
					Nr. RTO Circle, White House, Bhavnagar - 364 001<br>
					Tel : +91 9725 359 755					
					<br /></td>
				</tr>
				<tr><td align="center" colspan="3"><h3><u><i><b>Ticket Print (Office Copy)</b><i></u></h3></td></tr>
				<br><br>
				<?php 
				echo "<tr align = 'center'><td><b>$from to $to <td><b> $deptdate	<td><b><u> busonlineticket.com</tr>";
				echo "<tr><td colspan='3'><hr></tr>";
				echo "<tr align = 'center'><td><u><b>Passenger Name <td> <b><u>Seat No <td><b><u>PNR</tr>";
				echo "<tr align='center'><td>$name";
				$seats = "";
				for($j=$j;$j>0;$j--)
					$seats = $seats.",".$seat[$j-1];
				echo "<td>$seats<td>$resid</tr><tr><td colspan='3'><hr></tr>";
				echo "<tr align='center'><td><u><b>Departure Time</b>   </u>: $depttime <td><b>Boarding Point Address<td align='right'> <b><i>For, BusOnlineTicket.Com</tr>";
				echo "<tr align='center'><td><u><b>Total Fare  </b> </u>: Rs. $total<td>At Our Nearest Office of $from <td align='right'> Authorised Signatory</tr>";
				?>
				</table>
				</div>
		</form>
		</body>
		</html>