<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="student-record">
    <form method="post" action="add.php">
<table>

    <tr>
        <td>Subject Name</td>
        <td><input type="text" name="subject_name" class="form"/></td>
    </tr>

    <tr>
        <td>Grade Name </td>
    
        <td><input type="text" name="grade_name" class="form"/></td>
    </tr>
    <tr>
        <td>Student Name</td>
        <td><input type="text" name="student_name" class="form"/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="add" value="add" class="btn btn-success btn-lg"/></td>

    </tr>
</table>

<?php
if (isset($_POST['add'])) {    
include ('connect.php');

    $subject_name= $_POST['subject_name'];  
    $grade_name= $_POST['grade_name'];                 
    $student_name=$_POST['student_name'];


//$sql = "INSERT INTO subjects (subject_name, grade_name, student_name) VALUES ( '$subject_name', '$grade_name', '$student_name')";
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
mysqli_close($connect);
}

?>


</form>





<script>

document.getElementByName("invoice").reset();
</script>




<form method="post" action="" >
<?php
include ('connect.php');
// mysql select query
$sql = "SELECT * FROM subjects ";
$result1 = mysqli_query($connect, $sql);
if ($result1->num_rows > 0) {
    // output data of each row
    ?>
    <select name = "select">
    <?php
    while($row1 = mysqli_fetch_array($result1)) {
        ?>
    <option><?php echo $row1['subject_name'];?></option>

        <?php

 
    }
} 
?>
        </select>
           <?php

include ('connect.php');
// mysql select query
$sql = "SELECT * FROM subjects";
$result1 = mysqli_query($connect, $sql);

if ($result1->num_rows > 0) {
    // output data of each row
    ?>
    <select name = "select2">
    <?php
    while($row2 = mysqli_fetch_array($result1)) {
        ?>
    <option value="<?php echo $row2[0];?>"><?php echo $row2[2];?></option>

        <?php

 
    }
} 
?>
        </select>
 
 <input type="submit" id="main_submit" name="submit" value="submit" />


<?php if (isset($_POST['submit'])) {   
include ('connect.php');
$select = $_POST['select'] ;
echo $select;
$select2 = $_POST['select2'] ;
//S$sql = "INSERT INTO dupa (test, subject_grade) VALUES ( '$select', '$select2')";


if(mysqli_query($connect, $sql)){

//header("Refresh: 1; url=add-grade.php");
    echo "Records added successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}

mysqli_close($connect);
}


?>

        </select>
</form>
</body>
</html>