<?php
session_start();
$fname = @$_POST['firstname'];
$lname = @$_POST['lastname'];
$dob = @$_POST['dob'];
$guests = @$_POST['guests'];
$onInstance = @$_POST['onInstance'];
$returnInstance = @$_POST['returnInstance'];
echo(@$fname." ".@$lname ." ".@$dob. " ". @$guests );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hahu Airlines | Passenger Information</title>
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

<!--Login-->
<div class="jumbotron text-center">
<h1>Passenger Information </h1>
			<div class="row">
			<form action="makeReservation.php" method="post" class="form" role="form">
			<!-- Send flight instance, number of guests, category to reservation page -->
			<input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
			<p>Primary Traveller</p>
			<div class="col-xs-4 col-xs-offset-4">
			<select name="mealpref" class="form-control" placeholder="Meal Preference">
				<option value="Vegetarian">Vegetarian</option>
				<option value="Vegan">Vegan</option>
				<option value="NonVegetarian">Non-Vegetarian</option>
				<option value="GlutenFree">Gluten Free</option>
			</select>
			</div>
			<br />
			<br />
			<?php
				for ($i = 1; $i <= $guests; $i++) {
			?>
			 <label for = "firstname">Traveller: <?echo $i?> </label>
				<div  class = "form-inline">
					<input class="form-control" name="firstname<?echo($i)?>" id = "firstname" placeholder="First Name" type="text" required autofocus />
                    <input class="form-control" name="lastname<?echo($i)?>" id = "lastname" placeholder="Last Name" type="text" required />
				</div>
			<br/>
			<div  class = "form-inline">
			<select name="mealpref<? echo($i) ?>" class="form-control" placeholder="Meal Preference">
				<option value="Vegetarian">Vegetarian</option>
				<option value="Vegan">Vegan</option>
				<option value="NonVegetarian">Non-Vegetarian</option>
				<option value="GlutenFree">Gluten Free</option>
			</select>
			<input class="form-control" name="age<? echo($i)?>" id = "age" placeholder="Age" type="text" required />
				</div>
			
			<?php
				}
			?>
			<input type="hidden" name="firstname" value="<? echo $fname; ?>" />
			<input type="hidden" name="lastname" value="<? echo $lname; ?>" />
			<input type="hidden" name="onInstance" value="<? echo $onInstance; ?>" />
			<input type="hidden" name="returnInstance" value="<? echo $returnInstance; ?>" />
			<input type="hidden" name="dob" value="<? echo $dob; ?>" />
			<input type="hidden" name="guests" value="<? echo $guests; ?>" />
			<br />
			
			<div class = "row" style="text-align:'center'">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Confirm Booking</button>
			</div>
			</div>
			
            </form>
			</div>
</div>



<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>


</body>
</html>

