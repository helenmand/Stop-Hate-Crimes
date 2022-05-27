<?php
$servername = "127.0.0.1";
$username = "admin";
$password = "adminsPW";
$dbname = "STOP_HATE_CRIMES_DB";

$conn = @mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>
