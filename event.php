<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define("HOSTNAME","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","evem");
$user=$_SESSION['user'];
$con=mysqli_connect(HOSTNAME,DBUSER,DBPASS) or die("Connection failed".mysqli_error());
$mysqlcon=mysqli_select_db($con, DBNAME);
$name=$_GET['id'];
$sql="SELECT * FROM events WHERE name='$name'";
$mysql=mysqli_query($con,$sql);
$eve=mysqli_fetch_array($mysql);
$_SESSION['name'] = $name;
$_SESSION['user'] = $user;
?>
<!DOCTYPE html>
<html>
<head>
	<title>EveM</title>
	<style>
		div.top
			{
				position: fixed;
				top: 0px;
				width: 100%;
				height: 110px;
				background: #141452;
				z-index: 999;
			}
		div.logo
			{
				right: 0px;
				height: 110px;
				width: 300px;
				background-color: white;
			}
		div.register
			{
				background-color: #99ebff;
				position: absolute;
				width: 900px;
				top: 190px;
  				height: 500px;
  				left: 40%;
  				margin: 0 0 0 -450px;
  				font-size: 30px;
  			}
  		body 	
  			{ 
	    		background-repeat: no-repeat;
    			background-attachment: fixed;
 				background-position: center; 
 				background-size: cover;
			}
		div.details
			{
				margin-left: 50px;
				margin-top: 30px;
			}
	
		
	</style>
</head>
<body background="bg.jpg">
	<div class="top">
		<div class="logo">
		<img src="logo.png" height="160px" width="160px" style="margin-top: -25px; margin-left:70px;">
			</div>
	</div>
	<div class="register">
		<div class="details">
			<h1 style="margin-left:30px;"><?php echo $eve['name'];?></h1>
			<h5>Time:<?php echo $eve['time'];?></h5>
			<h5>Date:<?php echo $eve['date'];?></h5>
			<h5>Venue:<?php echo $eve['venue'];?></h5>
		</div>
		<div>
			<img src="poster.jpg" style="position:absolute; left:600px; height:300px; top:100px; border-style:solid;">
		</div>
	</div>
	<div class="map">
		<a href="map1.php"><img src="map.jpg" style="height:160px; position:absolute; left:80%; top:70%; border-style:solid; " ></a>
	</div>


</body>
</html>

