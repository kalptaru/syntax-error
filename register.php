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
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$pri1=$_POST['pri1'];
$pri2=$_POST['pri2'];
$pri3=$_POST['pri3'];
$sql="SELECT * FROM student WHERE username='$name'";
$mysql=mysqli_query($con,$sql);
$total=mysqli_num_rows($mysql);
if($total!=0)
{
	header("Location: register_u.html");
}
elseif($pass1!=$pass2)
{
	header("Location: register_p.html");
}
else
{
	$hashed_password = md5($pass1);
	$mysql="insert into student (username,pass,pri1,pri2,pri3) values ('$name','$hashed_password','$pri1','$pri2','$pri3')";
	$mysqlins=mysqli_query($con, $mysql);
	$_SESSION['user'] = $name;
	header("Location: home.php");
}
?>