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
$email = $row['email'];
echo"Hello <b>$username</b><br />";
$id = $row['user_id'];

echo "$id <br>";

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
ENGLISH:
<?php
$sql = "SELECT *  FROM subjects INNER JOIN students ON students.student_name = subjects.student_name  INNER JOIN users ON students.student_id = users.student_id WHERE user_id = '$id' ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
 // output data of each row
$i = 0;
    while($row = $result->fetch_assoc()) {
 $i++;
 echo '<li>';
$english_grade = $row['english_grade'];
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
WELSH
<?php
$sql = "SELECT *  FROM subjects INNER JOIN students ON students.student_name = subjects.student_name  INNER JOIN users ON students.student_id = users.student_id WHERE user_id = '$id' ";

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
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<a href="logout.php">Log Out Btn</a>
</body>
</html>