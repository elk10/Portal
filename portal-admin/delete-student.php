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
							<td>
								<?php
								include ('connect.php');
								// mysql select query
								$sql = "SELECT * FROM students";
								$result1 = mysqli_query($connect, $sql);
								if ($result1->num_rows > 0) {
									?>
								<select name = "student_id">
									<?php
									while($row2 = mysqli_fetch_array($result1)) {
									?>
									<option><?php echo $row2['student_id']. " " .  $row2['student_name'];?></option>
									<?php
										}
									} 
									?>
								</select>
							</td>
							<td><input type="submit" name="delete" value="delete" class="btn btn-success btn-lg"/></td>
						</tr>
					</table>
					<?php
					if (isset($_POST['delete'])) {	 
						include ('connect.php');
						$student_id = $_POST['student_id'];
						$sql = "DELETE FROM students WHERE student_id = '$student_id'";
						if(mysqli_query($connect, $sql)){
							echo "Records removed successfully.";
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