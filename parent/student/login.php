<?php 
SESSION_START();
///if form not submitted kill the script 
if ( !isset($_POST['submit']) ) {
include('../header.php');
?>
<div id="page-wrapper">
	<div id="page" class="container">
<?php
echo "<h2>Please log in</h2>";
die("<br><a href='../index.php'><br>Login</a>");
?>
</div>
</div>
<?php
include('../footer.php');	
}

// create variables
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
	echo 'alert("Incorrect username & password combination please try again")';
	echo '</script>';
	echo '';
	echo '<script language="javascript">';
	echo 'window.location = "index.php";';
	echo '</script>';
}
while($row = mysqli_fetch_assoc($result)){
	$password = $row['password'];
	if($password != $hashPassword){
		echo"Incorrect username & password combination please try again......";
		die("<br /><a href='home.php'>Go back</a>");
	}
	else {
//All checks complete session starting
		$_SESSION['username'] = $username;
		header("location: home.php");
		die("");
	}
}
?>