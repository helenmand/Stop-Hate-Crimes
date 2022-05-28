<?php
$errors=0;
# Connect to the db

$conn = mysqli_connect('127.0.0.1', 'LoginUsers', 'LogUsSHC');
$dbname = 'STOP_HATE_CRIMES_DB';

if (!$conn) {
    $errors="1";
}

# data base connection IDK PAL
$dbconn = @mysqli_select_db($conn, $dbname);

# Add data to the vars
$username=$_POST['usname'];
$password=$_POST['psword'];
$password_repeat=$_POST['repeatpsword'];
$email=$_POST['email'];


# Checking that the user is unique, plus that passwords match

$sql=mysqli_query($conn,"SELECT * FROM users where EMAIL='".$email."';");
if(mysqli_num_rows($sql)>0)
{
    //Email Id Already Exists
    $errors="2";
}

$sql_2=mysqli_query($conn,"SELECT * FROM users where USERNAME='".$username."';");
if(mysqli_num_rows($sql_2)>0)
{
    //"Username Id Already Exists"
    $errors="3";
}

if ($password != $password_repeat)
{
    //"Passwords do not match";
    $errors="4";
}

# User registration

if ($errors == 0){
    $cat = 'user';
    $query="INSERT INTO `users`(`USERNAME`, `PASSWORD`, `USER_CATEGORIES`, `EMAIL`) VALUES ('".$username."','".$password."', '".$cat."','".$email."');";

    mysqli_query($conn, $query);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = 'You are now logged in!';

    header('location: index.php');
}
else{
    header("Location:./CreateAccount_C.php?error=".$errors);
}
?>
