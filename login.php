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
$pass=$_POST['pass'];
$sql="SELECT pass FROM student WHERE username= '$name'";
$arr=mysqli_query($con,$sql);
$row=mysqli_fetch_array($arr);
$password=$row[0];
$hashed_pass= md5($pass);
if($password==$hashed_pass)

{
	$_SESSION['user'] = $name;	
	header("Location: home.php");
}
else
{
	header("Location: login.html");
}
?>