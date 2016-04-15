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
			<h2>Add Notes</h2>
		</div>
		<form method="post">     
			<table>
				<tr>
					<td>Notes</td>
					<td><input type="textarea" name="notes_name" class="form"/></td>
				</tr>
			<tr>
			<td>Student</td>
			<td>
			<?php
			$username = $_SESSION['username'];
			include ('connect.php');
			$query = ("SELECT * FROM staff WHERE username ='$username'");
			$result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['staff_id'];
			}
			
			
			include ('connect.php');
// mysql select query
			$sql = "SELECT * FROM students INNER JOIN staff ON students.class_year = staff.class_year WHERE staff_id = '$id' ";
			$result1 = mysqli_query($connect, $sql);

			if ($result1->num_rows > 0) {
    // output data of each row
				?>
				<select name = "student_name">
					<option selected="selected" disabled='disabled'>Please Select</option>
					<?php
					while($row2 = mysqli_fetch_array($result1)) {
						?>
						<option><?php echo $row2['student_name'];?></option>
						<?php
					}
				} 
				?>
			</select>
			</td>
			</tr>
		</table>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="add" value="add" class="button-success"/></td>

		</tr>
	</table>
	<?php
	if (isset($_POST['add'])) {    
		include ('connect.php');
		$notes_name = $_POST['notes_name'];
		$student_name = $_POST['student_name'];
		if(!empty($notes_name) && !empty($student_name)) {
			$sql = "INSERT INTO notes (notes_name, student_name )
			VALUES ( '$notes_name', '$student_name')";

	
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
