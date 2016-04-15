<?php
session_start();

if(!isset($_SESSION["username"]))
{
    header("Location: login.php");
}

?>
<?php include ('header.php'); ?>
<body>
    <div id="site-container">
        <div class="site-inner">
            <div class="student-record">
                <form method="post" action="" >
                    <?php
                    include ('connect.php');
// mysql select query
                    $sql = "SELECT * FROM students";
                    $result1 = mysqli_query($connect, $sql);
                    if ($result1->num_rows > 0) {
    // output data of each row
                        ?>
                        <select name = "student_name">
                            <?php
                            while($row1 = mysqli_fetch_array($result1)) {
                                ?>
                                <option><?php echo  $row1['student_name'];?></option>
                                <?php
                            }
                        } 
                        ?>
                    </select>
                    <br>
                    <?php
                    include ('connect.php');
// mysql select query
                    $sql = "SELECT * FROM subjects";
                    $result1 = mysqli_query($connect, $sql);
                    if ($result1->num_rows > 0) {
    // output data of each row
                        ?>
                        <select name = "subject_name">
                            <?php
                            while($row1 = mysqli_fetch_array($result1)) {
                                ?>
                                <option><?php echo $row1['subject_name'];?><br></option>

                                <?php
                            }
                        } 
                        ?>
                    </select>
                    <br>
                    <?php
                    include ('connect.php');
// mysql select query
                    $sql = "SELECT * FROM grades";
                    $result1 = mysqli_query($connect, $sql);

                    if ($result1->num_rows > 0) {
    // output data of each row
                        ?>
                        <select name = "grade_name">
                            <?php
                            while($row2 = mysqli_fetch_array($result1)) {
                                ?>
                                <option><?php echo $row2['grade_name'];?></option>
                                <?php
                            }
                        } 
                        ?>
                    </select>
                    <input type="submit" id="main_submit" name="submit" value="submit" />
                    <?php if (isset($_POST['submit'])) {   
                        include ('connect.php');
                        $student_name = $_POST['student_name'];
                        $subject_name = $_POST['subject_name'] ;
                        $grade_name = $_POST['grade_name'] ;
                        $sql = "INSERT INTO grades_subjects (student_name, subject_name, grade_name) VALUES ( '$student_name', '$subject_name', '$grade_name')";
                       if(mysqli_query($connect, $sql)){
                            echo "Records added successfully.";

                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                        }

                        mysqli_close($connect);
                    }
                    ?>

                </select>
            </form>
        </div>
    </div>
</div>
</body>
</html>