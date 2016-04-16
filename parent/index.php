<?php
include('header.php');
?>

<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Login</h2>
		</div>
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
		</form>
	</div>
</div>

<?php include ('footer.php'); ?>
