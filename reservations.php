<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lab Project</title>
	<meta name="description" content="example page">
	<meta name="keywords" content="HTML">
	<meta name="author" content="netlab">
	<meta http-equiv="refresh" content="120">
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
		label {
			color: white;
			margin-top: 5px;
			margin-bottom: 5px;
		}
		div.date {
			margin: 0;
			padding: 0;
			padding-left: 20px;
			padding-bottom: .5em;
			display: block;
			color: white;
		}


		div.date label {
			position: absolute;
			top: -20em;
			left: -200em;
			//color: white;
		}


		div.date input {
			margin: 0;
			padding: 0;
			display: inline;
			//color: white;
		}

		span.inst {
			font-size: 75%;
			color: white;
			padding-left: .25em;
		}

		div.date input:active, div.date input:focus, div.date input:hover
		{
		background-color: lightyellow;
		border-color: gray;
		} 
</style>
<link rel="stylesheet" type="text/css" href="styles.css">
	
<?php
	if (isset($_SESSION["num"])) {
		$num=$_SESSION["num"];
		$name=$_SESSION["name1"];
		$sname=$_SESSION["name2"];
		$cnum=$_SESSION["cnum"];
		$hotel=$_SESSION["hotel"];
		$email=$_SESSION["email"];
		$days=$_SESSION["timeDifferenceInDays"];
		$ptype=$_SESSION["pay"];
		$rtype=$_SESSION["room"];
		$day_start = $_SESSION['day_start'];
		$month_start = $_SESSION['month_start'];
		$year_start = $_SESSION['year_start'];
		$day_end = $_SESSION['day_end'];
		$month_end = $_SESSION['month_end'];
		$year_end = $_SESSION['year_end'];
	}
?>
	
	<script type="text/javascript">
		
		function validateInteger(event) {
			var key = window.event ? event.keyCode : event.which;

			if (event.keyCode == 8 //backspace
				|| event.keyCode == 46 //delete
				|| event.keyCode == 37 //left arrow
				|| event.keyCode == 39) //right arrow
			{
				return true;
			}
			else if ( key < 48 || key > 57 ) { //digits
				return false;
			}
			else return true;
		}
	
		//functions to check the imputs
		function validateForm(email, num, cnum,
							  year_start, month_start, day_start, year_end, month_end, day_end) {
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				//var numformat = /^69\d\d\d\d\d\d\d\d$/; same expression as the one below
			var numformat = /^69\d{8}$/;
			var re16digit=/^\d{16}$/;
				//var re16digit=/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47‌​][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\\d{3})\\d{11})$; //same expression as the one above
			{
				alert("Wrong email address!");
				return false;
			}
			else if(!num.match(numformat)) 
			{
				alert("Wrong phone number (must be 69-12345678)!");
				return false;
			}
			else if(!cnum.match(re16digit)) 
			{
				alert("Wrong credit card number (must be 1234-1234-1234-1234)!");
				return false;
			}
			
			if (isNaN(year_start) || isNaN(year_end) || year_start < 2016 || year_end < 2016) {
				alert("Reservations for the year 2016 and later only!");
				return false;
			}
			
			// Now we convert the array to a Date object, which has several helpful methods
			var date1 = new Date(year_start, month_start, day_start);
			var date2 = new Date(year_end, month_end, day_end);

			// We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
			date1_unixtime = parseInt(date1.getTime() / 1000);
			date2_unixtime = parseInt(date2.getTime() / 1000);
			
			// This is the calculated difference in seconds
			var timeDifference = date2_unixtime - date1_unixtime;

			// in Hours
			var timeDifferenceInHours = timeDifference / 60 / 60;

			// and finaly, in days :)
			var timeDifferenceInDays = timeDifferenceInHours  / 24;

			
			if (timeDifferenceInDays <= 0) {
				alert ("Wrong dates!");
				return false;
			}
			else
				alert("You will stay " + timeDifferenceInDays + " days with us!");
				alert("Successful reservation!");
			document.getElementById("timeDifferenceInDays").value = timeDifferenceInDays;
			
				
				return true;
		}

	</script>
</head>
<body>

<header>
	<div id="head" class="nav">
		<ul>
			<li><a href="homesite.html">Main page</a></li>
			<li><a href="#">Hotels - Reservations</a>
			<ul>
				<li><a href="hotels.html">Hotels</a></li>
				<li><a class="active" href="reservations.html">Reservations</a></li>
			</ul>
			<li style="float:right;list-style-type:none;">
				<a href="contact.html">Contact Form</a>
			</li>
		</ul>
	</div>
</header>

<fieldset id="rcorners" style="width:50%; background-color:#333;">
	<h1>My City</h1>
	<h2>Tourist Guide</h2><br><br>  
	<h3>Reservations</h3>
 
<div id="side">
		<form name="myForm" action="checker.php" onsubmit='return validateForm(
															 	document.getElementById("email").value,
															 	document.getElementById("num").value,
																document.getElementById("cnum").value,
																document.getElementById("year_start").value,
															 	document.getElementById("month_start").value,
															 	document.getElementById("day_start").value, 
														 		document.getElementById("year_end").value,
															 	document.getElementById("month_end").value,
															 	document.getElementById("day_end").value);' method="post">
			<label for="name1">Name:</label>
			<br/>
			<input type="text" name="name1" id="name1" required="required" value="<?php echo (isset($name))?$name:'';?>">
			<br/>
			<label for="name2">Surname:</label>
			<br/>
			<input type="text" name="name2" id="name2" required="required" value="<?php echo (isset($sname))?$sname:'';?>">
			<br/>
			<label for="email">E-mail:</label>
			<br/>
			<input name="email" id="email" required="required" value="<?php echo (isset($email))?$email:'';?>">
			<br/>
			<label for="num">Phone number:</label>
			<br/>
			<input type="text" name="num" id="num" required="required" value="<?php echo (isset($num))?$num:'';?>">
			<br/>
			<label for="hotel">Hotel:</label><br>
			<select id="hotel" name="hotel">
			<option value="hotel1" <?php echo (isset($hotel) && $hotel=="hotel1")?'selected':'';?>>Hotel 1</option>
			<option value="hotel2" <?php echo (isset($hotel) && $hotel=="hotel2")?'selected':'';?>>Hotel 2</option>
			<option value="hotel3" <?php echo (isset($hotel) && $hotel=="hotel3")?'selected':'';?>>Hotel 3</option>
			</select><br/>
			<label>Room type:</label>
			<br/>
			<input type="radio" name="room" value="room1" <?php echo (isset($rtype) && $rtype=="room1")?'checked':'';?>><label>Double room</label>
			<br/>
			<input type="radio" name="room" value="room2" <?php echo (isset($rtype) && $rtype=="room2")?'checked':'';?>><label>Three bed room</label>
			<br/>
			<input type="radio" name="room" value="room3" <?php echo (isset($rtype) && $rtype=="room3")?'checked':'';?>><label>Four bed room</label>
			<br/>
			<label>Payment:</label>
			<br/>
			<input type="radio" name="pay" value="pay1" <?php echo (isset($ptype) && $ptype=="pay1")?'checked':'';?>><label>Cash</label>
			<br/>
			<input type="radio" name="pay" value="pay2" <?php echo (isset($ptype) && $ptype=="pay2")?'checked':'';?>><label>Credit card</label>
			<br/>
			<label for="cnum">Credit card number:</label>
			<br/>
			<input type="text" name="cnum" id="cnum" required="required" value="<?php echo (isset($cnum))?$cnum:'';?>">
			<br/>
			
			<div class="date">
				<div class="label">Arrival date </div>
					<label for="day_start">Start Day, 1 or 2 digit number</label>
					<input type="text" id="day_start" name="day_start" size="2" maxlength="2" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($day_start))?$day_start:'';?>"/> -
					<label for="month_start">Start Month, 1 or 2 digit number</label>
					<input type="text" id="month_start" name="month_start" size="2" maxlength="2" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($month_start))?$month_start:'';?>"/> -
					<label for="year_start">Start Year, 1 or 2 digit number</label>
					<input type="text" id="year_start" name="year_start" size="2" maxlength="4" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($year_start))?$year_start:'';?>"/>
					<span class="inst">(Day-Month-Year)</span>
				</div>
			
			<div class="date">
				<div class="label">Departure date</div>
					<label for="day_end">End day, 1 or 2 digit number</label>
					<input type="text" id="day_end" name="day_end" size="2" maxlength="2" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($day_end))?$day_end:'';?>"/>-
					<label for="month_end">End month, 1 or 2 digit number</label>
					<input type="text" id="month_end" name="month_end" size="2" maxlength="2" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($month_end))?$month_end:'';?>"/> -
					<label for="year_end">End year, 1 or 2 digit number</label>
					<input type="text" id="year_end" name="year_end" size="2" maxlength="4" onkeypress='return validateInteger(event);'
						   value="<?php echo (isset($year_end))?$year_end:'';?>"/>
					<span class="inst">(Day-Month-Year)</span>
				</div>
			<input type="hidden" id="timeDifferenceInDays" name="timeDifferenceInDays">
			<input type="submit" value="Submit"/>
			
		<br/>
	</form>
</div>
 
 
 
 </fieldset>

<footer>
	<fieldset id="footer" style="width:50%; background-color:#333;">
		<div id="left_sidebar">
			<p>To go to the top of this page click.  
			<a id="link" href="#head"> here.</a><br>
			Contact Information: 
			<a id="link" href="mailto: panagiotispr1997@gmail.com"> e-mail </a>.</p></div>
		<div id="right_sidebar"><img id="siteimg" src="https://www.elegantnails.gr/wps/wp-content/uploads/2018/05/syntelestes-istoselidas.png" alt="image" height="70"; width="90";></div>
	</fieldset>
</footer>

</body>
</html>
