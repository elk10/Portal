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
			<h2>Delete Homework</h2>
		</div>
     <form method="post">   
         <table>
             <tr>
                 <td>Class</td>
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
                <td>Homework</td>
                <td>
                    <?php
                    include ('connect.php');
// mysql select query
                    $sql = "SELECT * FROM homework";
                    $result1 = mysqli_query($connect, $sql);

                    if ($result1->num_rows > 0) {
    // output data of each row
                        ?>
                        <select name = "homework_name">
                            <option selected="selected" disabled='disabled'>Please Select</option>
                            <?php
                            while($row2 = mysqli_fetch_array($result1)) {
                                ?>
                                <option><?php echo $row2['homework_name'];?></option>
                                <?php
                            }
                        } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="delete" value="delete" class="button-success"/></td>

            </tr>
        </table>
        <?php
        if (isset($_POST['delete'])) {    
            include ('connect.php');
            $homework_name = $_POST['homework_name'];
            $class_year= $_POST['class_year'];
            if(!empty($homework_name) && !empty($class_year)) {
                $sql = "DELETE FROM homework WHERE homework_name = '$homework_name'  ";
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

