<?php include ('header.php'); ?>
<body>
<div id="page-wrapper">
<div id="page" class="container-student">
<?php
SESSION_START();
if(!isset($_SESSION['username'])){
    echo"Please log in to continue";
     die("<br /><a href='../index.php'><br />Log In</a>");
}
$username = $_SESSION['username'];
include ('connect.php');
$query = ("SELECT * FROM users WHERE username ='$username'");
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
$id = $row['user_id'];

}


$sql = "SELECT * FROM students INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id' ";
$result = $connect->query($sql);


echo '<h2>Grades:</h2>';
?>
<ul class="grade-list">
<strong>English:</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id' AND subject_name = 'English'";

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
<ul class="grade-list">
<strong>Welsh:</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id' AND subject_name = 'Welsh'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$welsh_grade = $row['grade_name'];
echo $welsh_grade;
echo '</li>';

        //echo "Result: " . $row["subject_name"]. " - lname: " . $row["grade_name"].  "<br>";
    }
} else {
    echo "0 results";
}


?>
</ul>
<ul class="grade-list">
<strong>History:</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id' AND subject_name = 'History'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$history_grade = $row['grade_name'];

echo $history_grade;
echo '</li>';

        //echo "Result: " . $row["subject_name"]. " - lname: " . $row["grade_name"].  "<br>";
    }
} else {
    echo "0 results";
}


?>
</ul>
<ul class="grade-list">
<strong>Mathematics:</strong>
<?php
$sql = "SELECT *  FROM grades_subjects INNER JOIN students ON students.student_name = grades_subjects.student_name  INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id' AND subject_name = 'Mathematics'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$math_grade = $row['grade_name'];
echo $math_grade;
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
<a href="logout.php">Log Out Btn</a>
</body>
</html>