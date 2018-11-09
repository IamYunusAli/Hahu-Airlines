<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hahu Airlines | View Flights</title>
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
    <div class="navbar-header">
    <a href="home.html">
  <img src="logo.png" alt="LOGO" height="60" width="220" />
</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="viewFlights.php">FLIGHTS</a></li>
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

<div class="jumbotron text-center">
<form action="viewFlights.php">
<div class="container">
   

<h1>Hahu Airlines
  <br>
  <strong>ሀሁ አየር መንገድ</strong>
</h1>
  <p>Where would you like to fly??<br>
    ወደየት በረራ ማድረግ ይፈልግሉ？？？
  </p>
  
    <label class="radio-inline">
      <input type="radio" name="optradio" value="roundtrip">Round Trip <br> ደርሶ መልስ
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio" value="oneway">One way <br> አንድ መስመር
    </label>
  
</div>
  <br>
<div class="form-inline" >
  <select name="Guests" class="form-control"  placeholder="Guests" required>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>

 </select>

	  
	  
   <select name="From" class="form-control" placeholder="From" required>
    <option value="Dallas">Dallas</option>
<option value="Chicago">Chicago</option>
    <option value="New York">New York</option>
	<option value="Los Angeles">Los Angeles</option>

	
  </select>
   <select name="To" class="form-control"  placeholder="To" required>
    <option value="Chicago">Chicago</option>
    <option value="Los Angeles">Los Angeles</option>
	<option value="New York">New York</option>
    <option value="Dallas">Dallas</option>

  </select>
  
  <button type="submit" class="btn btn-danger">Search Flights</button>
</div>
</form>
<?php
   if(isset($_GET['optradio']))
  {
	$fromAirport = $_GET['From'];
	$toAirport = $_GET['To'];
	echo("<h3>Showing flights from ".$fromAirport." to ".$toAirport."</h3>");
  }
  ?>
</div>
<div id="services" class="container-fluid text-center">
 <?php
  if(isset($_GET['optradio']))
  {
	$fromAirport = $_GET['From'];
	$toAirport = $_GET['To'];
	$link = mysqli_connect('localhost', 'root', '', 'airline');
	$sql = "SELECT fi.InstanceId, f.flight_no, fi.DepartureDate, fi.DepartTime, fi.ArriveTime, fa.cityName, ta.cityName, fi.Status, fi.fare FROM flight f JOIN flight_Instance fi ON f.flight_no =  fi.Flight_no JOIN Airport ta ON f.to_airport_id = ta.AirportId JOIN Airport fa ON f.from_airport_id = fa.AirportId WHERE fa.cityName = '".$fromAirport."' AND ta.cityName = '".$toAirport."';";
	$result = mysqli_query($link,$sql);

	if (mysqli_num_rows($result)>0)
	{
		if(strcmp($_GET['optradio'],"oneway")==0)
		{
			echo("<h2>Flights</h2>");
		}
		else if(strcmp($_GET['optradio'],"roundtrip")==0)
		{	
			echo("<h2>Onward Flights</h2>");
		}
		echo("<table id='onwardFlight' class='table table-hover' name='onwardflight' data-toggle='table' data-pagination='true' data-search='true'  data-fixed-columns='true'
       data-fixed-number='2'>");
		echo("<thead><th style=\"display: none;\"></th><th>Flight Number</th><th data-sortable='true'>Date</th><th data-sortable='true'>Departure Time</th><th data-sortable='true'>Arrival Time<th>From</th><th>To</th><th>Fare</th></thead><tbody>");
	while(($row = mysqli_fetch_row($result))!=null)
	{
		$onwardFlightStatus = $row[7];
		if($onwardFlightStatus != 0)
		{
			echo("<tr><td id='InstanceId' style=\"display: none;\">".$row[0]."</td><td>"
		. $row[1]. "</td><td>" .$row[2]. "</td><td>" .$row[3]. "</td><td>" .$row[4]. "</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[8]."</td></tr>");
		}
	}
		echo("</tbody></table>");
	}
	else
	{
		echo("We are sorry! We do not have any onward flights for this route.");
		echo ($sql);
	}
	

	if(strcmp($_GET['optradio'], "roundtrip")==0)
	{
		echo("</br>");
		$sql1 = "SELECT fi.InstanceId, f.flight_no, fi.DepartureDate, fi.DepartTime, fi.ArriveTime, fa.cityName, ta.cityName, fi.status, fi.fare FROM flight f JOIN flight_Instance fi ON f.flight_no =  fi.Flight_no JOIN Airport ta ON f.to_airport_id = ta.AirportId JOIN Airport fa ON f.from_airport_id = fa.AirportId WHERE fa.cityName = '".$toAirport."' AND ta.cityName = '".$fromAirport."';";
	$result1 = mysqli_query($link,$sql1);

	if (mysqli_num_rows($result1)>0)
	{
	    echo("<h2>Return Flights</h2>");
		echo("<table id='returnFlight' class='table table-hover' name='returnFlight' data-toggle='table' data-pagination='true' data-search='true'>");
		echo("<thead><th style=\"display: none;\"></th><th>Flight Number</th><th>Date</th><th data-sortable='true'>Departure Time</th><th data-sortable='true'>Arrival Time</th><th>From</th><th>To</th><th>Fare</th></thead><tbody>");
	while(($row1 = mysqli_fetch_row($result1))!=null)
	{
		$returnFlightStatus = $row1[7];
		if($returnFlightStatus!=0)
		{
			echo("<tr><td id='InstanceId' style=\"display: none;\" >". $row1[0] ."</td><td>". $row1[1]. "</td><td>" .$row1[2]. "</td><td>" .$row1[3]. "</td><td>" .$row1[4]. "</td><td>".$row1[5]."</td><td>".$row1[6]."</td><td>".$row1[8]."</td></tr>");
	    }
	}
		echo("</tbody></table>");
	}
	else
	{
		echo("We are sorry! We do not have any return flights for this route.");
		echo ($sql1);
	}
	
	}
  }
  else
  {
	echo("Please select where you would like to fly.");  
  }
  ?>
  <button  id="bookFlights">Book Flight</button>
</div>

<script>
$(document).ready(function(){
var onwardInstnceId = null;
var returnInstanceId = null;
$('#bookFlights').hide();
$('#onwardFlight').on('click-row.table', function(e, row, $element){$('#onwardFlight').find('tbody tr.active').removeClass('active'); $element.addClass('active'); onwardInstanceId = $element.find('#InstanceId').html(); $('#bookFlights').show();});
$('#returnFlight').on('click-row.table', function(e, row, $element){$('#returnFlight').find('tbody tr.active').removeClass('active'); $element.addClass('active');  returnInstanceId = $element.find('#InstanceId').html();});

$('#bookFlights').click(function post(path, parameters) {
    var form = $('<form></form>');

    form.attr("method", "post");
    form.attr("action", "bookFlight.php");
        var field1 = $('<input></input>');
		var field2 = $('<input></input>');

        field1.attr("type", "text");
        field1.attr("name", "OnwardInstanceID");
        field1.attr("value", onwardInstanceId);
		
		field2.attr("type", "text");
        field2.attr("name", "ReturnInstanceID");
        field2.attr("value", returnInstanceId);

        form.append(field1);
				form.append(field2);
    

    $(document.body).append(form);
    form.submit();
});
});
</script>


<footer class="container-fluid text-center">
  <p>&copy; Hahu Airlines. All Rights Reserved </p>
</footer>
</body>
</html>

