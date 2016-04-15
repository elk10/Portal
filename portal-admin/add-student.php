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
			<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
		</form>
				<form method="post">     
					<table>
						<tr>
							<td>Student Name</td>
							<td><input type="text" name="student_name" class="form"/></td>
						</tr>
						<tr>
							<td>Date of birth</td>
							<td><input type="date"  name="date_of_birth" class="form"/></td>
						</tr>
					</table>

					<?php
					$username = $_SESSION['username'];
					include ('connect.php');
					$query = ("SELECT * FROM staff WHERE username ='$username'");
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['staff_id'];
					}
					$sql = "SELECT * FROM staff INNER JOIN class ON staff.class_year = class.class_year WHERE staff_id = '$id' ";
					$result = mysqli_query($connect, $sql);
					if ($result->num_rows > 0) {
						?>
						<select name = "class_year">
							<option selected="selected" disabled='disabled'>Please Select</option>
							<?php
							while($row1 = mysqli_fetch_array($result)) {
								?>
								<option><?php echo $row1['class_year'];?></option>
								<?php
							}
						} 
						?>
					</select>
				</table>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="add" value="add" class="button-success"/></td>

				</tr>
			</table>

			<?php
			if (isset($_POST['add'])) {	   
				include ('connect.php');
				$student_name = $_POST['student_name'];
				$date_of_birth= $_POST['date_of_birth'];
				$class_year= $_POST['class_year'];
				if(!empty($student_name) && !empty($date_of_birth)) {
					$sql = "INSERT INTO students (class_year, student_name, date_of_birth)
					VALUES ( '$class_year','$student_name', '$date_of_birth')";

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