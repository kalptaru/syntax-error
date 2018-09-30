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
$sqlpri1="SELECT pri1 FROM student where username='$user'";
$pri1=mysqli_query($con,$sqlpri1);
$prio1=mysqli_fetch_array($pri1);
$sql1="SELECT * FROM events WHERE tag='$prio1[0]'";
$p1=mysqli_query($con,$sql1);
$np1=mysqli_num_rows($p1);

$sqlpri2="SELECT pri2 FROM student where username='$user'";
$pri2=mysqli_query($con,$sqlpri2);
$prio2=mysqli_fetch_array($pri2);
$sql2="SELECT * FROM events WHERE tag='$prio2[0]'";
$p2=mysqli_query($con,$sql2);
$np2=mysqli_num_rows($p2);

$sqlpri3="SELECT pri3 FROM student where username='$user'";
$pri3=mysqli_query($con,$sqlpri3);
$prio3=mysqli_fetch_array($pri3);
$sql3="SELECT * FROM events WHERE tag='$prio3[0]'";
$p3=mysqli_query($con,$sql3);
$np3=mysqli_num_rows($p3);

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
                    <?php for($i=0;$i!=$np1;$i++)
                            { $eve=mysqli_fetch_array($p1);?>
                                <div style="height:50px; width:50px; align:center; z-index: 999;" class="<?php echo $eve['location'];?>"> 
                                    <a href="event.php?id=<?php echo $eve['name'];?>"><img src="darkblue.png" style="z-index:999; height:50px;"></a>
                                </div> 
                    <?php   }?> 

                     <?php for($i=0;$i!=$np2;$i++)
                            { $eve=mysqli_fetch_array($p2);?>
                                <div style="height:50px; width:50px; align:center; z-index: 999;" class="<?php echo $eve['location'];?>"> 
                                <a href="event.php?id=<?php echo $eve['name'];?>"><img src="medblue.png" style="z-index:999; height:50px;"></a>
                                </div> 
                    <?php   }?> 

                     <?php for($i=0;$i!=$np3;$i++)
                            { $eve=mysqli_fetch_array($p3);?>
                                <div style="height:50px; width:50px; align:center; z-index: 999;" class="<?php echo $eve['location'];?>"> 
                                <a href="event.php?id=<?php echo $eve['name'];?>"><img src="lightblue.png" style="z-index:999; height:50px;"></a>
                                </div> 
                    <?php   }?> 

            </div>
</body>
</html>

