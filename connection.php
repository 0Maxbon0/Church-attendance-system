<?php
$servername = "localhost";
$username = "root";
$password = "avamina1";
$database = "Web_Database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>