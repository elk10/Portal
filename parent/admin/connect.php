


<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$db = "portal2";

$connect = mysqli_connect($dbhost, $dbusername, $dbpassword, $db); 
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


?>
