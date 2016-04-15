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
					<?php

					include ('connect.php');
					$sql = "SELECT * FROM class";
					$result1 = mysqli_query($connect, $sql);
					if ($result1->num_rows > 0) {
					?>
						<select name = "class_year">
							<?php
							while($row1 = mysqli_fetch_array($result1)) {
								?>
								<option><?php echo  $row1['class_year'];?></option>
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
			
						$full_name = $_POST['full_name'];
						$username=$_POST['username'];
						$email=$_POST['email'];
						$password=$_POST['password'];
						$class_year=$_POST['class_year'];

						if(!empty($full_name) && !empty($username) && !empty($email) && !empty($password) && !empty($class_year)) {
							$sql = "INSERT INTO staff ( full_name, username, email, password, class_year, role )
							VALUES ( '$full_name', '$username', '$email',  MD5('$password'), '$class_year', 'admin')";

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