<?php

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- secure way to transfer password -->
<form action = "login.php" method ="POST">

<table>
<tr>
	<td>Username</td>	
	<td><input type="text" name="username" /></td>
</tr>
<tr>
	<td>Password</td>	
	<td><input type="password" name="password" /></td>
</tr>
<tr>
	<td></td>	
	<td><input type="submit" name="submit" value="log in" /></td>
</tr>
</table>
<a href="logout.php">Log Out Btn</a>

<?php



?>
</form>
</body>
</html>