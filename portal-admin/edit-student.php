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
							<td>Student ID</td>
							<td><input type="text" name="student_id" class="form"/></td>
						</tr>

						<tr>
							<td>Student Name</td>
							<td><input type="text" name="student_name" class="form"/></td>
						</tr>
						<tr>
							<td>Date of birth</td>
							<td><input type="date" name="date_of_birth" class="form"/></td>
						</tr>
						<tr>
							<td>&nbsp;</td>

							<td><input type="submit" name="update" value="update" class="btn btn-success btn-lg"/></td>
						</tr>
					</table>
					<?php
					if (isset($_POST['update'])) {
						include ('connect.php');
						$student_id = $_POST['student_id'];
						$student_name = $_POST['student_name'];
						$date_of_birth=$_POST['date_of_birth'];

						$sql = "UPDATE students SET student_id= '$student_id', student_name='$student_name', date_of_birth= '$date_of_birth' WHERE student_id = '$student_id'";
						
						if(mysqli_query($connect, $sql)){
							echo "Records edited successfully.";
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
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