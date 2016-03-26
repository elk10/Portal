<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<ul class="menu">
	<li><a href="add-student.php">Add new student</a></li>
	<li><a href="edit-student.php">Edit student</a></li>
	<li><a href="delete-student.php">Delete student</a></li>

</ul>
<div class="student-record">
	<form method="post">
<table>
	<tr>
		<td>Student ID</td>
		<td><input type="text" name="student_id" class="form"/></td>
	</tr>

	<tr>
		<td>First Name</td>
		<td><input type="text" name="fname" class="form"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="lname" class="form"/></td>
	</tr>
	<tr>
		<td>Date of birth</td>
		<td><input type="text" name="date_of_birth" class="form"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="add" value="add" class="btn btn-success btn-lg"/></td>

	</tr>
</table>

<?php
if (isset($_POST['add'])) {	   
include ('connect.php');
	$student_id= $_POST['student_id'];	
	$fname= $_POST['fname'];					
	$lname=$_POST['lname'];
	$date_of_birth=$_POST['date_of_birth'];

$sql = "INSERT INTO students (student_id, fname, lname, date_of_birth)
VALUES ('$student_id', '$fname', '$lname', '$date_of_birth')";
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
mysqli_close($connect);
}
?>
</body>
</html>