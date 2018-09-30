<?php
session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define("HOSTNAME","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","evem");
$con=mysqli_connect(HOSTNAME,DBUSER,DBPASS) or die("Connection failed".mysqli_error());
$mysqlcon=mysqli_select_db($con, DBNAME); 
$name=$_POST['name'];
$time=$_POST['time'];
$date=$_POST['date'];
$venue=$_POST['venue'];
$tag=$_POST['tag'];
$location=$_POST['location'];
$mysql="insert into events (name,venue,time,date,location,tag) values ('$name','$venue','$time','$date','$location','$tag')";
$mysqlins=mysqli_query($con, $mysql);
header("Location: index.html");
?>