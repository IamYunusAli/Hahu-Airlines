<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Hahu Airlines | Update Flights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<script src="jquery.min.js"></script>
<script src="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css" />
  <link rel = "stylesheet" href="css/home.css">
  
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     <a href="home.html">
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
if(!isset($_SESSION['admin_email']))
{
	header("Location : AdminLogin.php");
}
?>
<h1> What would you like to do?</h1>
<br>
<br>
<br>
<form action="AddFlights.php" class="form-inline" method="POST" >
  <button type="button" class="btn btn-danger"><a id="aa" href="AddFlightsPage.php">Add Flights</a></button>
</form>
<br>
<br>
<br>
</br>
<form  class="form-inline" >
  <button type="button" class="btn btn-danger"><a id="aa" href="ViewFlightsAdmin.php">View Flights</a></button>
</form>
</div>

<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>
</body>
</html>