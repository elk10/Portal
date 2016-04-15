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
			<h2>Add User</h2>
		</div>
		<form method="post">
					<table>
						<tr>
							<td>Full Name</td>
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
						<td>Allocate Student</td>
						<td>
					<?php

					include ('connect.php');
					$sql = "SELECT * FROM students ";
					$result1 = mysqli_query($connect, $sql);
					if ($result1->num_rows > 0) {
					?>
						<select name = "student_name">
							<?php
							while($row1 = mysqli_fetch_array($result1)) {
								?>
								<option><?php echo $row1['student_name'];?></option>
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
						$full_name=$_POST['full_name'];
						$student_name=$_POST['student_name'];
						$username = $_POST['username'];
						$email=$_POST['email'];
						$password=$_POST['password'];
			

						if(!empty($username) && !empty($full_name) && !empty($email) && !empty($password) && !empty($student_name)) {
							$sql = "INSERT INTO users  ( username, student_name, full_name,  email, password, role )
							VALUES ( '$username', '$student_name', '$full_name', '$email',  MD5('$password'), 'user')";

				
					if(mysqli_query($connect, $sql)){
						echo "<div class='success'>Records added successfully.</div>";
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
