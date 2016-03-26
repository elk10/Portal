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
        <td>Attendance</td>
        <td><input type="date" name="attendance_day" class="form"/></td>
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


$sql = "INSERT INTO attendance (attendance_day)
VALUES ('$attendance_day')";
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