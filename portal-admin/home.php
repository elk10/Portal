<?php
SESSION_START();
if(!isset($_SESSION['username'])){
	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");
} 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="search.php">
<input type ="text" name="search"/>
<input type ="submit" value="Search">
</form>
<ul class="menu">
	<li><a href="add-student.php">Add new student</a></li>
	<li><a href="edit-student.php">Edit student</a></li>
	<li><a href="delete-student.php">Delete student</a></li>

</ul>
<a href="logout.php">Log Out Btn</a>
</body>
</html>