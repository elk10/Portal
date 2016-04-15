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
				<form method="post" action="" >
					<?php
					include ('connect.php');
// mysql select query
					$sql = "SELECT * FROM students";
					$result1 = mysqli_query($connect, $sql);
					if ($result1->num_rows > 0) {
    // output data of each row
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
					<br>
					<table>
						<tr>
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