<?php
session_start();

if(!isset($_SESSION["username"]))
{
	header("Location: login.php");
}
include ('header.php'); ?>
<body>
	<div id="site-container">
		<div class="site-inner">
			<div class="student-record">
				<form method="post">
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="user_name" class="form"/></td>
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
						<tr>
							<td>&nbsp;</td>
							<td><input type="submit" name="create" value="add" class="button-success"/></td>

						</tr>
					</table>

					<?php
					if (isset($_POST['create'])) {	   
						include ('connect.php');
			
						$user_name = $_POST['user_name'];
						$username=$_POST['username'];
						$email=$_POST['email'];
						$password=$_POST['password'];
						$student_name=$_POST['student_name'];

						if(!empty($user_name) && !empty($username) && !empty($email) && !empty($password) && !empty($student_name)) {
							$sql = "INSERT INTO users  ( user_name, student_name, username,  email, password )
							VALUES ( '$user_name', '$student_name', '$username', '$email',  MD5('$password'))";

							if(mysqli_query($connect, $sql)){
								echo "Records added successfully.";
							} else{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
							}
						}
						else {
							echo 'please insert values';
						}

						mysqli_close($connect);
					}
					?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>