<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
	<title></title>
	<meta charset="UTF-8">
	<meta name="description" content="example page">
	<meta name="keywords" content="HTML">
	<meta name="author" content="netlab">
	<style>
		html { 
			background: url("https://santorinidave.com/files/2016/09/best-santorini-cave-hotels-with-pool.jpg") no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		h3 {
			color: white;
			text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px #0052cc;
			text-align: center;
		} 
		#footer {
			margin: auto;
			border: 1px solid white;
			float: left;
			margin-top: 50px;
			margin-bottom: 10px;
			color:  white;
		}
		siteimg {
			float: right;
			shape: poly;
			margin-top: auto;
		}
		#left_sidebar {
			float:left;
		}
		#right_sidebar {
			float:right;
		}
		#map {
			margin-top: 150px;
		}
		#link {
			color:  #0052cc;
		}
		#side {
			background-color: #111;
			margin: auto;
			margin-top: 13px;
			padding: 15px;
			width: 400px;
			height: 800px;
			border: 1px solid black;
			float: center;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="styles.css">
	
</head>
	
<body>

	<fieldset  id="rcorners" style="width:50%; background-color:#333;">
	<h1>Page with user's information</h1>
	<h2> User Info: </h2>
	<center>
	<?php
		$num = $_SESSION['num'] = $_POST["num"];
		$name = $_SESSION['name1'] = $_POST["name1"];
		$sname = $_SESSION['name2'] = $_POST["name2"];
		$cnum = $_SESSION['cnum'] = $_POST["cnum"];
		$hotel = $_SESSION['hotel'] = $_POST["hotel"];
		$email = $_SESSION['email'] = $_POST["email"];
		$days = $_SESSION['timeDifferenceInDays'] = $_POST["timeDifferenceInDays"];
		$ptype = $_SESSION['pay'] = $_POST["pay"];
		$rtype = $_SESSION['room'] = $_POST["room"];

		$day_start = $_SESSION['day_start'] = $_POST["day_start"];
		$month_start = $_SESSION['month_start'] = $_POST["month_start"];
		$year_start = $_SESSION['year_start'] = $_POST["year_start"];
		$day_end = $_SESSION['day_end'] = $_POST["day_end"];
		$month_end = $_SESSION['month_end'] = $_POST["month_end"];
		$year_end = $_SESSION['year_end'] = $_POST["year_end"];

		if ($hotel == "hotel1")
		{
			$hn = "Hotel 1";
			if ($rtype == "room1" )
			{	
				$rn = "Double room";
				$pr = 20;
			}
			if ($rtype == "room2" )
			{	
				$rn = "Three bed room";
				$pr = 40;
			}
			if ($rtype == "room3" )
			{	
				$rn = "Four bed room";
				$pr = 60;
			}
		}
		if ($hotel == "hotel2")
		{
			$hn = "Hotel 2";
			if ($rtype == "room1" )
			{	
				$rn = "Double room";
				$pr = 30;
			}
			if ($rtype == "room2" )
			{	
				$rn = "Three bed room";
				$pr = 50;
			}
			if ($rtype == "room3" )
			{	
				$rn = "Four bed room";
				$pr = 70;
			}
		}
		}
		if ($hotel == "hotel3")
		{
			$hn = "Hotel 3";
			if ($rtype == "room1" )
			{	
				$rn = "Double room";
				$pr = 15;
			}
			if ($rtype == "room2" )
			{	
				$rn = "Three bed room";
				$pr = 20;
			}
			if ($rtype == "room3" )
			{	
				$rn = "Four bed room";
				$pr = 35;
			}
		}
		}
		$fpr = $pr * $days;
		if ($ptype == "pay1")
		{
			$pt = "Cash";
		}
		if ($ptype == "pay2")
		{
			$pt = "Credit card";
		}

		echo "<table style='border:2px solid black; background-color:lightblue;'>";
		echo "<colgroup>";	
		echo "<col span='1' style='background-color:#0052cc'>";
		echo "</colgroup>";
		echo "<tr><td>"; print "Your name is: "; echo "</td> <td>"; print $name; echo "</td></tr>";
		echo "<tr><td>"; print "Your surname is: "; echo "</td> <td>"; print $sname; echo "</td></tr>";
		echo "<tr><td>"; print "Your email address is: "; echo "</td> <td>"; print $email; echo "</td></tr>";
		echo "<tr><td>"; print "Your phone number is: "; echo"</td><td>"; print $num; echo "</td></tr>";
		echo "<tr><td>"; print "The payment method is: "; echo "</td> <td>"; print $pt; echo "</td></tr>";
		echo "<tr><td>"; print "Your credit card number is: "; echo "</td> <td>"; print $cnum; echo "</td></tr>";
		echo "<tr><td>"; print "The hotel you chose is: "; echo"</td><td>"; print $hn; echo "</td></tr>";
		echo "<tr><td>"; print "The room type is: "; echo "</td> <td>"; print $rn; echo "</td></tr>";
		echo "<tr><td>"; print "Days of staying are : "; echo "</td> <td>"; print $days; echo "</td></tr>";
		echo "<tr><td>"; print "Cost per day: "; echo "</td> <td>"; print $pr; echo "</td></tr>";
		echo "<tr><td>"; print "The cost in total is: "; echo "</td> <td>"; print $fpr; echo "</td></tr>";
		echo "</table>";
	?>
	<form action="demo_form.asp">
	<input type="submit" value="Submit"/>
	</form>
	<form action="reservations.php">
    <input type="submit" value="Change Info">
</form>
	
	</center>
	</fieldset>
</body>
</html>