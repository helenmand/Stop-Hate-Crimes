<?php
$servername = "127.0.0.1";
$username = "LoginUsers";
$password = "LogUsSHC";
$dbname = "STOP_HATE_CRIMES_DB";

$conn = @mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$result = @mysqli_select_db($conn, $dbname);
?>
