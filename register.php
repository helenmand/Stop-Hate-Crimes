<?php
extract($_POST);
$errors = array()
include("database.php");

# Connect to the db
$conn = mysqli_connect("127.0.0.1", "admin", "adminsPW");

if (!$conn) {
    echo "1";
    die("Connection failed: " . $conn->connect_error);
}

# Add data to the vars

$username = mysqli_real_escape_string($conn, $_POST['usname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['psword']);

# Checking that the user is unique

$user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";
$results = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($results);

if ($user){
    if ($user['username'] === $username){array_push($errors, "Username already exists.");}
    if ($user['email'] === $email){array_push($errors, "Email already exists.");}
}

# User registration

if (count($errors == 0)){
    $password = md5($password);
    $cat = 'user';
    $query = "INSERT INTO users (USERNAME, PASSWORD, USER_CATEGORIES, EMAIL) VALUES ('$username','$password', '$cat','$email')";
    mysqli_query($conn, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in!";

    header('location: index.php')
}
?>