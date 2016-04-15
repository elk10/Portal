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
			<h2>Student List</h2>
		</div>
		<?php
		$username = $_SESSION['username'];
			include ('connect.php');
			$query = ("SELECT * FROM staff WHERE username ='$username'");
			$result = mysqli_query($connect, $query);
			while($row = mysqli_fetch_assoc($result)){
				$id = $row['staff_id'];

			}
			$sql = "SELECT * FROM students INNER JOIN staff ON staff.class_year = students.class_year WHERE staff_id = '$id' ";
			$result = mysqli_query($connect, $sql);
				if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>ID</th><th>Student Name</th><th>Date of Birth</th><th>Class</th></tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
        echo '<td>'.$row["student_id"].'</td>';
        echo '<td>'.$row["student_name"].'</td>';
        echo '<td>'.$row["date_of_birth"].'</td>';
        echo '<td>'.$row["class_year"].'</td>';
    }
    echo '</tr>';
} else {
    echo "0 results";
}
   echo '</table>';
		?>
</div>
</div>
<?php include ('footer.php'); ?>
