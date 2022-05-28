<?php

    if(isset($_COOKIE['user'])){
        $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
        @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }

        $replyid = mysqli_real_escape_string($conn, $_GET["postid"]);
        $username = mysqli_real_escape_string($conn, $_COOKIE['user']);
        $comment = mysqli_real_escape_string($conn, $_POST['postBody']);
        $sql="INSERT INTO comments (USERNAME, COMMENT, ARTICLE_ID) VALUES ('$username','$comment','$replyid')";
    }
    else{
        echo "You are not logged in";
    }

?>