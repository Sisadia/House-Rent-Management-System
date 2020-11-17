<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header("Location: homepage.html");
	exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		 <link rel="stylesheet" type="text/css" href="wstyle.css">
	</head>
	<body class="loggedin">

	<ul>
    <li> <a href="logout.php">  logout </a></li> 
	<li> <a href="profile.php">  Profile </a></li>
	<li> <a href="bookinfo.php"> Booked House </a></li>
    <li> <a href="home.php">Home </a></li>

</ul>
	<br><br>
		<div class="content">
			<h1 align="center">Welcome, Admin!</h1>
		</div>
	</body>
</html>
