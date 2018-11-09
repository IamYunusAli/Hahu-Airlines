<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Hahu Airlines | Success booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="jquery.min.js"></script>
<script src="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css" />
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
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
        <li><a href="viewFligths.php">FLIGHTS</a></li>
		<?php
		if(isset($_SESSION['user_fname']))
		{
			echo("<li><a href='viewReservations.php'>RESERVATIONS</a></li>");
			echo("<li><a href='logout.php'>LOG OUT</a></li>");			
		}
		else
		{
			echo('<li><a href="loginPage.php">LOG IN</a></li>');
			echo('<li><a href="signUp.html">SIGN UP</a></li>');
		}
		?>
      </ul>
    </div>
  </div>
</nav>


 <div class="jumbotron text-center" >
<h1>Success </h1>
  <?php
	echo("Your booking was successful!<br><a href = 'viewReservations.php'>View Reservations</a>");
  ?>
 </div> 

<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>
</body>
</html>
