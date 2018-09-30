<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define("HOSTNAME","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","evem");
$user = $_SESSION['user'];
$con=mysqli_connect(HOSTNAME,DBUSER,DBPASS) or die("Connection failed".mysqli_error());
$mysqlcon=mysqli_select_db($con, DBNAME);

$sql="DELETE * FROM event WHERE date< (CURDATE())";
$mysql=mysqli_query($sql);

$sqlpri1="SELECT pri1 FROM student WHERE username='$user'";
$pri1=mysqli_query($con,$sqlpri1);
$prio1=mysqli_fetch_array($pri1);
$sql1="SELECT name FROM events WHERE tag='$prio1[0]'";
$p1=mysqli_query($con,$sql1);
$np1=mysqli_num_rows($p1);

$sqlpri2="SELECT pri2 FROM student where username='$user'";
$pri2=mysqli_query($con,$sqlpri2);
$prio2=mysqli_fetch_array($pri2);
$sql2="SELECT name FROM events WHERE tag='$prio2[0]'";
$p2=mysqli_query($con,$sql2);
$np2=mysqli_num_rows($p2);

$sqlpri3="SELECT pri3 FROM student where username='$user'";
$pri3=mysqli_query($con,$sqlpri3);
$prio3=mysqli_fetch_array($pri3);
$sql3="SELECT name FROM events WHERE tag='$prio3[0]'";
$p3=mysqli_query($con,$sql3);
$np3=mysqli_num_rows($p3);

$sql4="SELECT name FROM events WHERE tag!='$prio3[0]' and tag!='$prio2[0]' and tag!='$prio1[0]'";
$p4=mysqli_query($con,$sql4);
$np4=mysqli_num_rows($p4);
$_SESSION['user'] = $user;

?>
<!DOCTYPE html>
<html>
<head>
	<title>home</title>
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
		div.list
			{
				position: absolute;
				top: 110px;
				left: 250px;
				width: 800px;
				height: <?php $k*=100; echo $k;?>px;
				background-color: white;
			}
		div.event
			{
				border-style: solid;
				margin-left: 5px;
				margin-right: 5px;
				margin-top: 5px;
				margin-bottom: 5px;
				border-color: black;
				border-width: 1px;
				border-radius: 5px;
				height: 80px;
				background: #99ebff;
				font-size: 30px;
				font-family: "Trebuchet MS", Helvetica, sans-serif;
			}
		a
			{
				text-decoration:none;
			}
		body 	
  			{ 
	    		background-repeat: no-repeat;
    			background-attachment: fixed;
 				background-position: center; 
 				background-size: cover;
			}
	</style>
</head>
<body background="bg.jpg" style="background-size: cover;">
	<div class="top">
		<div class="logo">
		<img src="logo.png" height="160px" width="160px" style="margin-top: -25px; margin-left:70px;">
		</div>
	</div>
	<div class="list">
		<?php 
			$k=0;
			for($i=0;$i!=$np1;$i++)
				{$ap1=mysqli_fetch_array($p1);
					$k++;
		?>
					<div class="event">
					<a href="event.php?id=<?php echo $ap1[0];?>"><?php echo $ap1[0];?></a>
					</div>
		<?php
				}		
		?>

		<?php
			for($i=0;$i!=$np2;$i++)
				{$ap2=mysqli_fetch_array($p2);
					$k++;
		?>
					<div class="event">
					<a href="event.php?id=<?php echo $ap2[0];?>"><?php echo $ap2[0];?></a>
					</div>
		<?php
				}		
		?>

		<?php
			for($i=0;$i!=$np3;$i++)
				{$ap3=mysqli_fetch_array($p3);
					$k++;
		?>
					<div class="event">
					<a href="event.php?id=<?php echo $ap3[0];?>"><?php echo $ap3[0];?></a>
					</div>
		<?php
				}		
		?>

		<?php
			for($i=0;$i!=$np4;$i++)
				{$ap4=mysqli_fetch_array($p4);
					$k++;
		?>
					<div class="event" >
						<a href="event.php?id=<?php echo $ap4[0];?>"><?php echo $ap4[0];?></a>
					</div>
		<?php
				}		
		?>
	</div>
	<div class="map">
		<a href="map.php"><img src="map.jpg" style="height:160px; position:absolute; left:80%; top:70%; border-style:solid; " ></a>
	</div>

</body>
</html>