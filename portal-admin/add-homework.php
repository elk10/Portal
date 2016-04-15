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
                            <td>Homework</td>
                            <td><input type="textarea" name="homework_name" class="form"/></td>
                        </tr>
                           <tr>
                            <td>Deadline</td>
                            <td><input type="date" name="due_date" class="form"/></td>
                        </tr>
                        </table>

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
                            <?php
                            while($row1 = mysqli_fetch_array($result)) {
                                ?>
                                <option><?php echo $row1['class_year'];?></option>
                                <?php
                            }
                        } 
                        ?>
                        </select>
                        </table>
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
                        if(!empty($homework_name) && !empty($class_year)) {
                            $sql = "INSERT INTO homework (class_year, homework_name, due_date)
                                VALUES ( '$class_year','$homework_name', '$due_date')";

                            if(mysqli_query($connect, $sql)){
                                echo "Records added successfully.";
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                            }
                        }
                        else {
                            echo 'please insert values';
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