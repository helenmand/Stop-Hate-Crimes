<?php
   
   
   
    if(isset($_COOKIE['user'])){
        $conn = @mysqli_connect("localhost", "LoginUsers", "LogUsSHC");
        @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
        
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = mysqli_real_escape_string($conn, $_COOKIE['user']);
        $comment = mysqli_real_escape_string($conn, $_POST['postBody']);
        $postid = mysqli_real_escape_string($conn, $_GET["postid"]);

        $query = "SELECT MAX(ID) + 1 FROM comments;";
        $id = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($id);

        $sql="INSERT INTO `comments` (`ID`, `USERNAME`, `COMMENT`, `ARTICLE_ID`) VALUES ('".$row["MAX(ID) + 1"]."', '".$username."', '".$comment."', '".$postid."');";
        mysqli_query($conn, $sql);


        if(isset($_GET["commentid"])){
            $replyid = mysqli_real_escape_string($conn, $_GET["commentid"]);

            $sql="INSERT INTO `comments_on_comments` (`COMMENTS`, `FOLLOWS`) VALUES ('".$replyid."', '".$row["MAX(ID) + 1"]."');";
            mysqli_query($conn, $sql);
        }

        header("Location:./postWithComments.php?postid=".$postid);
    }
    else{
        echo "You are not logged in";
    }

?>