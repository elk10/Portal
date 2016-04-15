<?php include ('header.php'); ?>
<body>
<div id="site-container">
<div class="site-inner">
<div class="student-record">
<?php
SESSION_START();
if(!isset($_SESSION['username'])){
	echo"Please log in to continue";
	die("<br /><a href='index.php'>Log In</a>");
}
$username = $_SESSION['username'];
include ('connect.php');
$query = ("SELECT * FROM users WHERE username ='$username'");
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
$id = $row['user_id'];

}


$sql = "SELECT * FROM students INNER JOIN users ON students.student_id = users.student_id WHERE user_id = '$id'";
$result = $connect->query($sql);
$student_name = $row['student_name'];

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["student_id"]. " - lname: " . $row["student_name"].  "<br><br>";
    }
} else {
    echo "0 results";
}
?>





<ul>
<strong>English</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_id = users.student_id WHERE user_id = '$id' AND subject_name = 'English'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$english_grade = $row['grade_name'];
echo $english_grade;
echo '</li>';

        //echo "Result: " . $row["subject_name"]. " - lname: " . $row["grade_name"].  "<br>";
    }
} else {
    echo "0 results";
}
?>
</ul>
<ul>
<strong>Welsh</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_id = users.student_id WHERE user_id = '$id' AND subject_name = 'Welsh'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$english_grade = $row['grade_name'];
echo $english_grade;
echo '</li>';

        //echo "Result: " . $row["subject_name"]. " - lname: " . $row["grade_name"].  "<br>";
    }
} else {
    echo "0 results";
}


?>
</ul>
</div>
</div>
</div>

<a href="logout.php">Log Out Btn</a>
</body>
</html>