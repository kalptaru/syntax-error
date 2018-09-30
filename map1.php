<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define("HOSTNAME","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","evem");
$name = $_SESSION['name'];
$con=mysqli_connect(HOSTNAME,DBUSER,DBPASS) or die("Connection failed".mysqli_error());
$mysqlcon=mysqli_select_db($con, DBNAME);
$sql="SELECT * FROM events WHERE name='$name'";
$mysql=mysqli_query($con,$sql);
$eve=mysqli_fetch_array($mysql);

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
		img.map
			{
				position: absolute;
				width: 900px;
                height: 603px;
  				left: 50%;
  				margin: 0 0 0 -470px;
                border-style: solid;
                border-width: 20px;
                z-index: -1;
  			}
        div.map
			{
				position: absolute;
				width: 900px;
                height: 603px;
				top: 135px;
  				left: 50%;
  				margin: 0 0 0 -470px;
                z-index: -1;
                
  			}
  		body 	
  			{ 
	    		background-repeat: no-repeat;
    			background-attachment: fixed;
 				background-position: center; 
 				background-size: cover;
			}
        div.LHC
            {
                position: absolute;
                top: 360px;
                left: 320px;
            }
        div.MAC
            {
                position: absolute;
                top:105px;
                left: 415px;
            }
        div.Thomso
            {
                position: absolute;
                top: 360px;
                left: 430px;
            }
        div.Convocation
            {
                position: absolute;
                top: 200px;
                left: 185px;
            }
        div.Sports
            {
                position: absolute;
                top: 250px;
                left: 400px;
            }
	
		
	</style>
</head>
<body background="bg.jpg">
	<div class="top">
		<div class="logo">
        <img src="logo.png" height="160px" width="160px" style="margin-top: -25px; margin-left:70px;">
		</div>
	</div>
            <div class="map">
                <img src="map.jpg" class=map>
                                <div style="height:50px; width:50px; align:center; z-index: 999;" class="<?php echo $eve['location'];?>"> 
                                    <a href="event.php?id=<?php echo $eve['name'];?>"><img src="darkblue.png" style="z-index:999; height:50px;"></a>
                                </div>  

            </div>
</body>
</html>

