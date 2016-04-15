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
			<h2>Edit Student</h2>
		</div>
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
						if(!empty($student_id) && !empty($student_name) && !empty($date_of_birth)) {
						$sql = "UPDATE students SET student_id= '$student_id', student_name='$student_name', date_of_birth= '$date_of_birth' WHERE student_id = '$student_id'";
						
						if(mysqli_query($connect, $sql)){
							echo "<div class='success'>Records edited successfully.</div>";
						} else {
							echo "<div class='error'>ERROR: Could not able to execute $sql. </div>" . mysqli_error($connect);
						} 
					} else {
							echo '<div class="warning">please insert/select values</div>';
						}
						mysqli_close($connect);
					}
					?>
				</form>
</div>
</div>
<?php include ('footer.php'); ?>
