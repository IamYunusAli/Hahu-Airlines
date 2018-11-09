<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hahu Airlines | LogIn</title>
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
</a></div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">HOME</a></li>
        <li><a href="#services">FLIGHTS</a></li>
        <li><a href="viewReservations.php">RESERVATIONS</a></li>
        <li><a href="signUp.html">SIGN UP</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
<h1>Log In </h1>
			<div class="row">
			<form action="login.php" method="post" class="form" role="form">
			<input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
			
			 <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" >
                    <label for = "firstname">Username: </label><input class="form-control" name="username" id = "username" placeholder="Userame" type="text" required autofocus />
                   <label for = "lasttname">Password: </label><input class="form-control" name="password" id = "password" placeholder="Password" type="password" required />
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Log In</button>
			</div>
            </form>
			</div>
</div>



<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>


</body>
</html>

