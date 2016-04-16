<?php include ('header.php'); ?>
<body>
<div id="page-wrapper">
<div id="page" class="container">
<?php
SESSION_START();
if(!isset($_SESSION['username'])){
    echo"Please log in to continue";
    die("<br /><a href='../index.php'>Log In</a>");
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

echo '<h2>Home</h2>';

echo '<h3>Personal Details:</h3>';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Name:</b> " . $row["student_name"].  "<br>";
        //reverse default mysql date format.
        echo "<b>Date of Birth:</b> " . implode('-', array_reverse(explode( '-', $row['date_of_birth']))).  "<br><br>";
    }
} else {
    echo "0 results";
}
?>

</div>
</div>
<a href="logout.php">Log Out Btn</a>
</body>
</html>