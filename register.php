<?php
extract($_POST);
$errors = array();

# Connect to the db

$conn = mysqli_connect('127.0.0.1', 'LoginUsers', 'LogUsSHC');
$dbname = 'STOP_HATE_CRIMES_DB';

if (!$conn) {
    echo "1";
    die("Connection failed: " . $conn->connect_error);
}

# data base connection IDK PAL
$dbconn = @mysqli_select_db($conn, $dbname);

# Add data to the vars

$username = mysqli_real_escape_string($conn, $_POST['usname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_1 = mysqli_real_escape_string($conn, $_POST['psword']);
$password_2 = mysqli_real_escape_string($conn, $_POST['repeatpsword']);

# Checking that the user is unique, plus that passwords match

$sql=mysqli_query($conn,"SELECT * FROM users where EMAIL='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}

$sql_2=mysqli_query($conn,"SELECT * FROM users where USERNAME='$username'");
if(mysqli_num_rows($sql_2)>0)
{
    echo "Username Id Already Exists"; 
	exit;
}

if ($password_1 != $password_2)
{
    echo "Passwords do not match";
    exit;
}
else
{
    $password = $password_1;
}
# User registration

if (count($errors == 0)){
    $password = md5($password);
    $cat = 'user';
    $query = "INSERT INTO users (USERNAME, PASSWORD, USER_CATEGORIES, EMAIL) VALUES ('$username','$password', '$cat','$email')";
    mysqli_query($conn, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = 'You are now logged in!';

    header('location: index.php');
    }
?>