<?php 
SESSION_START();

if(!isset($_SESSION['username'])){

	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");

}


$username = $_SESSION['username'];

include ('connect.php');

?>
<a href="logout.php">Log Out Btn</a>