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
			background: url("https://cdn.theculturetrip.com/wp-content/uploads/2017/09/greece-1594689_1920.jpg") no-repeat center center fixed; 
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
<h1>Page with user's message information</h1>
<h2> User Info </h2>
<center>
<?php
	
	$name=$_POST["name1"];
	$sname=$_POST["name2"];
	$ms=$_POST["message"];
	echo "<table style='border:2px solid black; background-color:lightblue;'>";
		echo "<colgroup>";	
		echo "<col span='1' style='background-color:#0052cc'>";
		echo "</colgroup>";
	echo "<tr><td>"; print "Name is: "; echo "</td> <td>"; print $name; echo "</td></tr>";
	echo "<tr><td>"; print "Surname is: "; echo "</td> <td>"; print $sname; echo "</td></tr>";
		echo "<tr><td>"; print "Message is: "; echo"</td><td>"; print $ms; echo "</td></tr>";
	echo "</table>";
?>
<a class="active" href="homesite.html"><p>---Main Page---</p></a>
</center>

</fieldset>

</body>
</html>