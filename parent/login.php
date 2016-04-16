<?php 
SESSION_START();
///if form not submitted kill the script 
if ( !isset($_POST['submit']) ) {
	echo "Please log in";
	die("<br><a href='index.php'>Login</a>");
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
$query =  ("SELECT username, password, role FROM users WHERE username = '$username' UNION ALL SELECT username,  password, role FROM staff WHERE username = '$username' ");
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
	$role = $row['role'];
	if($password != $hashPassword){
		echo"Incorrect username & password combination please try again......";
		die("<br /><a href='home.php'>Go back</a>");
	}
	else if($role == 'admin') {
//All checks complete session starting
		$_SESSION['username'] = $username;
		header("location: admin/home.php");
		die("");
	}
	else if ($role == 'user') {
		$_SESSION['username'] = $username;
		header("location: student/home.php");
		die("");
	}
}
?>