<?php
$server = "localhost";
$username = "admin";
$password = "admin";
$database = "account";

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
