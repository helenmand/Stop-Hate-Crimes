<?php
    if(isset($_POST['username']) and isset($_POST['password']))
    {
        $servername = "127.0.0.1";
        $username = "LoginUsers";
        $password = "LogUsSHC";
        //$username = "NotLoginUsers";
        //$password = "NLogUsSHC";
        $dbname = "STOP_HATE_CRIMES_DB";

        $conn = @mysqli_connect($servername, $username, $password);
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql="SELECT `USERNAME`, `USER_CATEGORIES` FROM `users` WHERE `USERNAME`='".$_POST['username']."' AND `PASSWORD`='".$_POST['password']."';";

        $result = @mysqli_select_db($conn, $dbname);
        $results = mysqli_query($conn, $sql);
        $select = mysqli_fetch_array($results);

        if (isset($select['USERNAME'])) {
            setcookie("user", $_POST['username']);
            if ($select['USER_CATEGORIES']=='admin'){
                setcookie("user_category", "admin");
                header("Location:./AdminPage.php");
            }
            else{
                setcookie("user_category", "user");
                header("Location:./index.php");
            }
        }
        else{
            $error = "1";
            header("Location:./login.php?error=".$error);
        }
    }
?>
