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
			<h2>Add Homework</h2>
		</div>
		<form method="post">     
			<table>
				<tr>
					<td>Homework</td>
					<td><input type="textarea" name="homework_name" class="form"/></td>
				</tr>
				<tr>
					<td>Deadline</td>
					<td><input type="date" name="due_date" class="form"/></td>
				</tr>
				<tr>
					<td>Select Class</td>
					<td>
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
				$homework_name = $_POST['homework_name'];
				$due_date = $_POST['due_date'];
				$class_year= $_POST['class_year'];
				if(!empty($homework_name) && !empty($due_date) && !empty($class_year) ) {
					$sql = "INSERT INTO homework (class_year, homework_name, due_date)
					VALUES ( '$class_year','$homework_name', '$due_date')";
					if(mysqli_query($connect, $sql)){
						echo "<div class='success'>Records added successfully.</div>";
						echo '<script language="javascript">';
						echo '</script>';
						echo '';
						echo '<script language="javascript">';
						echo 'setTimeout(function(){location.href="add-homework.php"} , 1000);  ';
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
