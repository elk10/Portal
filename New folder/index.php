<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "portal";

// Create connection
$connect = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


