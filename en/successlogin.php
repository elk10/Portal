


<?php

SESSION_START();

if(!isset($_SESSION['username'])){

	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");

}


$username = $_SESSION['username'];

include ('connect.php');

$query = ("SELECT * FROM users WHERE username ='$username'");
$result = mysqli_query($connect, $query);

while($row = mysqli_fetch_assoc($result)){

$email = $row['email'];

echo"Hello <b>$username</b><br />";


}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="student-record.php">Add student record</a>
<a href="logout.php">Log Out Btn</a>
</body>
</html>