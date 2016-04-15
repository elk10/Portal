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
			<h2>Add Abscences</h2>
		</div>
		<form method="post" action="" >
			<table>
				<tr>
					<td>Student</td>
					<td>
						<?php
						include ('connect.php');
// mysql select query
						$sql = "SELECT * FROM students";
						$result1 = mysqli_query($connect, $sql);
						if ($result1->num_rows > 0) {
    // output data of each row
							?>
							<select name = "student_name">
								<option selected="selected" disabled='disabled'>Please Select</option>
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
				<td>Attendance</td>
				<td><input type="date"  name="attendance_day" class="form"/></td>
			</tr>

			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="add" value="add" class="btn btn-success btn-lg"/></td>

			</tr>
		</table>

		<?php
		if (isset($_POST['add'])) {    
			include ('connect.php');
			$attendance_day= $_POST['attendance_day'];  
			$student_name = $_POST['student_name'];

			if(!empty($student_name) && !empty($attendance_day)) {
				$sql = "INSERT INTO attendance (student_name, attendance_day)
				VALUES ('$student_name', '$attendance_day')";

				if(mysqli_query($connect, $sql)){
					echo "<div class='success'>Records added successfully.</div>";
					echo '<script language="javascript">';
					echo '</script>';
					echo '';
					echo '<script language="javascript">';
					echo 'setTimeout(function(){location.href="add-attendance.php"} , 1000);  ';
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
