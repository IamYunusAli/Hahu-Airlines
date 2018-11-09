<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Hahu Airlines | View Flight</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<script src="jquery.min.js"></script>
<script src="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css" />
  <link rel = "stylesheet" href="css/home.css">
  <script src="js/home.js"></script>
 
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header"><a href="home.html">
  <img src="logo.png" alt="LOGO" height="60" width="220" />
</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">HOME</a></li>
		
		<?php
		if(isset($_SESSION['admin_email']))
		{
			echo("<li><a href='updateFlightsPage.php'>UPDATE FLIGHTS</a></li>");
			echo("<li><a href='AdminLogout.php'>LOG OUT</a></li>");			
		}
		else
		{
			echo('<li><a href="AdminLogin.php">LOG IN</a></li>');
		}
		?>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">

<?php

$con= mysqli_connect("localhost","root","","airline");
	
	if(!$con){
		die("Connection failed : ".mysqli_connect_error());
  }
$flight_instance = $_POST['id1'];
$flight_no = $_POST['id2'];
    echo "
            <script type=\"text/javascript\">
           var r = confirm('Are you sure you want to delete the Flight and corresponding Flight Instance?');
           if(r == true)
           {
           		document.write('<center><h1>Flight# '+ $flight_instance + ' has been cancelled'); 		
           }
            </script>
        ";
        
        $sql1 = "DELETE FROM available_seats WHERE InstanceId='$flight_instance'";
        $sql2 = "DELETE FROM flight_instance WHERE InstanceId='$flight_instance' and Flight_no='$flight_no';";
		//$sql2 = "UPDATE flight_instance SET status = 0 WHERE InstanceId = '$flight_instance' and Flight_no='$flight_no';";
    
		
        if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2)) 
        {
		?>
        	<p><h4><a href='updateFlightsPage.php'> Add or View flight</a></h4></p>
		</div>
        <?php
		}
     
     
     
     mysqli_close($con);
  ?>

</div>



<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>

</body>
</html>