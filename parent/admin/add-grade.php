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
			<h2>Add Grade</h2>
		</div>
		<form method="post" action="">
		<table>
		<tr>
		<td>Student Name</td>
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
			<tr>
			<td>Subject</td>
			<td>
			<?php
			include ('connect.php');
// mysql select query
			$sql = "SELECT * FROM subjects";
			$result1 = mysqli_query($connect, $sql);
			if ($result1->num_rows > 0) {
    // output data of each row
				?>
				<select name = "subject_name">
					<option selected="selected" disabled='disabled'>Please Select</option>
					<?php
					while($row1 = mysqli_fetch_array($result1)) {
						?>
						<option><?php echo $row1['subject_name'];?><br></option>

						<?php
					}
				} 
				?>
			</select>
			</td>
			</tr>
			<tr>
			<td>Grade</td>
			<td>
			<?php
			include ('connect.php');
// mysql select query
			$sql = "SELECT * FROM grades";
			$result1 = mysqli_query($connect, $sql);

			if ($result1->num_rows > 0) {
    // output data of each row
				?>
				<select name = "grade_name">
					<option selected="selected" disabled='disabled'>Please Select</option>
					<?php
					while($row2 = mysqli_fetch_array($result1)) {
						?>
						<option><?php echo $row2['grade_name'];?></option>
						<?php
					}
				} 
				?>
			</select>
			</td>
			</tr>
			</table>
			<input type="submit" id="main_submit" name="submit" value="submit"  />
			<?php if(isset($_POST['submit'])){   
				include ('connect.php');
				$student_name = $_POST['student_name'];
				$subject_name = $_POST['subject_name'] ;
				$grade_name = $_POST['grade_name'] ;
				if(!empty($student_name) && !empty($subject_name) && !empty($grade_name)) {
					$sql = "INSERT INTO grades_subjects (student_name, subject_name, grade_name) VALUES ( '$student_name', '$subject_name', '$grade_name')";

					if(mysqli_query($connect, $sql)){
						echo "<div class='success'>Records added successfully.</div>";
						echo '<script language="javascript">';
						echo '</script>';
						echo '';
						echo '<script language="javascript">';
						echo 'setTimeout(function(){location.href="add-grade.php"} , 1000);  ';
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
