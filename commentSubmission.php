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

        $username = mysqli_real_escape_string($conn, $_POST['usname']);
        $comment = mysqli_real_escape_string($conn, $_POST['postBody']);
        $art_id =  mysqli_real_escape_string($conn, $_GET['postid']);
        $sql="INSERT INTO comments (USERNAME, COMMENT, ARTICLE_ID) VALUES ('$username','$comment','$email')";
    }

?>