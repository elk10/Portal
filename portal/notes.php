<?php include ('header.php'); ?>
<body>
<div id="site-container">
<div class="site-inner">
<div class="student-record">
<?php

include ('connect.php');

$query = ("SELECT * FROM users");
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
$id = $row['user_id'];
}

$sql = "SELECT * FROM notes, students INNER JOIN users ON students.student_name = users.student_name WHERE user_id = '$id'  ";
$result = $connect->query($sql);


echo '<h2>Special Notes:</h2>';
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo  $row["notes_name"] . "<br>";
        //reverse default mysql date format.
        
    }
} else {
    echo "0 results";
}
?>

</div>
</div>
</div>
<a href="logout.php">Log Out Btn</a>
</body>
</html>