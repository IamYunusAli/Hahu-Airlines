<?php
session_start();
$con= mysqli_connect('localhost','root','','airline');
	
	if(!$con){
		die("Connection failed : ".mysqli_connect_error());
	}

	$email = $_POST['email'];
	$password = $_POST['password'];
	$_SESSION['admin_email'] = $email;
	
	
	if(empty($email) || empty ($password)){
		header('Location: AdminErrorPage.php');	
		}
		
		else
		{
		$sql = "SELECT * FROM admin where UserName='$email' and Password='$password' ";
		$result	= $con->query($sql);
		
		if(!$row = $result->fetch_assoc()){
			header('Location: AdminErrorPage.php');
		}
		else
		{
			header('Location: UpdateFlightsPage.php');
		}
		}
?>