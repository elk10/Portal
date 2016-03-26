<?php
SESSION_START();
if(!isset($_SESSION['username'])){
	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");
}
$username = $_SESSION['username'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<a href="student-record.php">Access</a>
<br>
<a href="logout.php">Log Out Btn</a>
</body>
</html>