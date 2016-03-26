<?php 
SESSION_START();
///if form not submitted kill the script 
if ( !isset($_POST['submit']) ) {
	echo "Please log in";
	die("<br><a href='index.php'>Login</a>");
}
// create cariables
$username = $_POST['username'];
$passwordAttempt = $_POST['password'];
$hashPassword = md5 ($passwordAttempt);
// check user input
if ($username == null or $username == "") {
	echo "Enter username";
	die("<br><a href='index.php'>Go Back</a>");
}
if ($passwordAttempt == null or $passwordAttempt == "") {
	echo "Enter password";
	die("<br><a href='index.php'>Go Back</a>");
}
include ('connect.php');
$query =  ("SELECT * FROM staff WHERE username = '$username'");
$result =  mysqli_query($connect, $query);
$hits =  mysqli_affected_rows($connect);
if ($hits <1 ) {
	echo '<script language="javascript">';
	echo 'alert("Incorrect password")';
	echo '</script>';
	echo '';
	echo '<script language="javascript">';
	echo 'window.location = "http://localhost/portal-admin/en/index.php";';
	echo '</script>';
}
while($row = mysqli_fetch_assoc($result)){
	$password = $row['password'];
	if($password != $hashPassword){
		echo"Incorrect username & password combination please try again......";
		die("<br /><a href='/index.php'>Go back</a>");
	}
	else{
//All checks complete session starting
		$_SESSION['username'] = $username;
		header("location: home.php");
		die("");
	}
}
?>