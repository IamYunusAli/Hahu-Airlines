<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Hahu Airlines | Error Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<script src="jquery.min.js"></script>
<script src="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\js\bootstrap.min.js"></script>
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com\bootstrap\3.3.5\css\bootstrap.min.css" />
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="home.html">
  <img src="logo.png" alt="LOGO" height="60" width="220" />
</a>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
<h1>Error </h1>
  <?php
  if(isset($_SESSION['error_msg']))
  {
	  $error_message = $_SESSION['error_msg'];
  }
  else
	  $error_message = "An error occured on the previous page";
  echo "<h3>". $error_message. "</h3>";
  echo "<a href='AdminLoginPage.php'>Try Again</a>";
  ?>
 </div>   
</div>

<footer class="container-fluid text-center">
    <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>

</body>
</html>