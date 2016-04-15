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
			<h2>Delete Attendance</h2>
		</div>
	    <form method="post">
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
        <td>Attendance</td>
        <td><input type="date" name="attendance_day" class="form"/></td>
    </tr>

    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="delete" value="delete" class="btn btn-success btn-lg"/></td>

    </tr>
</table>

<?php
if (isset($_POST['delete'])) {    
include ('connect.php');
    $attendance_day= $_POST['attendance_day'];  
           if(!empty($attendance_day) && !empty($class_year)) {
$sql = "DELETE FROM attendance WHERE attendance_day= '$attendance_day'";

           if(mysqli_query($connect, $sql)){
                    echo "<div class='success'>Records deleted successfully.</div>";
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
