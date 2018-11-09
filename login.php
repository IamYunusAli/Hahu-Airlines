<?php

session_start();
$email = $_POST['username'];
$password = $_POST['password'];
$link = mysqli_connect('localhost', 'root', '', 'airline');

$sql = "SELECT password, firstname, lastname FROM user WHERE username = '".$email."';";
echo $sql;
$result = mysqli_query($link,$sql);
if($result)
{
	$row = mysqli_fetch_row($result);

	if($row!=null && strcasecmp($row[0], $password) == 0)
	{
		$_SESSION['user_fname'] = $row[1];
		$_SESSION['user_lastname'] = $row[2];
		$_SESSION['username'] = $email;
		session_write_close();
		echo "Authenticated";
		
				if(isset($_POST['redirurl'])) 
				{
					$url = $_POST['redirurl']; 
					header("Location:$url");
				}
				else
				{
					
					header("Location: viewReservations.php");
				}
	}
	else
	{
		$_SESSION['error_msg'] = "Login Failed.";
		session_write_close();
		header("Location: errorPage.php");
	}
}
else
	{
		$_SESSION['error_msg'] = "Login Failed.";
		session_write_close();
		header("Location: errorPage.php");
	}
?>