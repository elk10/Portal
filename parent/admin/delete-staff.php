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
			<h2>Delete Staff</h2>
		</div>
		<form method="post">
			<table>
				<tr>
					<td>Name</td>
					<td>
						<?php
						include ('connect.php');
								// mysql select query
						$sql = "SELECT * FROM staff";
						$result1 = mysqli_query($connect, $sql);
						if ($result1->num_rows > 0) {
							?>
							<select name = "full_name">
							<option selected="selected" disabled='disabled'>Please Select</option>
								<?php
								while($row2 = mysqli_fetch_array($result1)) {
									?>
									<option><?php echo $row2['full_name'];?></option>
									<?php
								}
							} 
							?>
						</select>
					</td> 
				</tr>
			</table>
			<table>
				<tr>
					<td><div class="clearfix"></div></td>
					<td><input type="submit" name="delete" value="delete" class="btn btn-success btn-lg"/></td>
				</tr>
			</table>
			<?php
			if (isset($_POST['delete'])) {	 
				include ('connect.php');
				$full_name = $_POST['full_name'];
				    if(!empty($full_name)) {
				$sql = "DELETE FROM staff WHERE full_name = '$full_name'";
				if(mysqli_query($connect, $sql)){
					echo "<div class='success'>Records deleted successfully.</div>";
				} else{
					echo "<div class='error'>ERROR: Could not able to execute $sql. </div>" . mysqli_error($connect);
				}
			}
			else {
				echo '<div class="warning">please select values</div>';
			}

			mysqli_close($connect);
		}
		?>
	</form>
</div>
</div>
<?php include ('footer.php'); ?>
