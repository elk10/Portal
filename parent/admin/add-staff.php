<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("Location: login.php");
}
?>
<?php include ('header.php'); ?>
<div id="page-wrapper">
	<div id="page" class="container">
		<div class="title">
			<h2>Add Staff</h2>
		</div>
		<form method="post">
			<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="full_name" class="form"/></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" class="form"/></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td><input type="email" name="email" class="form"/></td>
				</tr>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="form"/></td>
			</tr>
			<tr>
				<td>Select Class</td>
				<td>
					<?php

					include ('connect.php');
					$sql = "SELECT * FROM class";
					$result1 = mysqli_query($connect, $sql);
					if ($result1->num_rows > 0) {
						?>
						<select name = "class_year">
							<option selected="selected" disabled='disabled'>Please Select</option>
							<?php
							while($row1 = mysqli_fetch_array($result1)) {
								?>
								<option><?php echo  $row1['class_year'];?></option>
								<?php


							}
						} 
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="add" value="add" class="button-success"/></td>

			</tr>
		</table>

		<?php
		if (isset($_POST['add'])) {	   
			include ('connect.php');
			
			$full_name = $_POST['full_name'];
			$username=$_POST['username'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$class_year=$_POST['class_year'];

			if(!empty($full_name) && !empty($username) && !empty($email) && !empty($password) && !empty($class_year)) {
				$sql = "INSERT INTO staff ( full_name, username, email, password, class_year, role )
				VALUES ( '$full_name', '$username', '$email',  MD5('$password'), '$class_year', 'admin')";
				if(mysqli_query($connect, $sql)){
					echo "<div class='success'>Records added successfully.</div>";
					echo '<script language="javascript">';
					echo '</script>';
					echo '';
					echo '<script language="javascript">';
					echo 'setTimeout(function(){location.href="add-staff.php"} , 1000);  ';
					echo '</script>';

				} else{
					echo "<div class='error'>ERROR: Could not able to execute $sql. </div>" . mysqli_error($connect);
				}
			}
			else {
				echo '<div class="warning">please insert values</div>';

			}
			mysqli_close($connect);
		}
		?>
	</form>
</div>
</div>
<?php include ('footer.php'); ?>
