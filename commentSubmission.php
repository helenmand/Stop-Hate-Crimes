<?php
   
   
   
    if(isset($_COOKIE['user'])){
        $conn = @mysqli_connect("localhost", "LoginUsers", "LogUsSHC");
        @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
        
        if (!$conn) {
            die("Connection failed: " . $conn->connect_error);
        }

        $replyid = mysqli_real_escape_string($conn, $_GET["postid"]);
        $username = mysqli_real_escape_string($conn, $_COOKIE['user']);
        $comment = mysqli_real_escape_string($conn, $_POST['postBody']);
        $query = "SELECT MAX(ID) + 1 FROM comments;";
        $id = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($id);
        $sql="INSERT INTO `comments` (`ID`, `USERNAME`, `COMMENT`, `ARTICLE_ID`) VALUES ('".$row["MAX(ID) + 1"]."', '".$username."', '".$comment."', '".$replyid."');";
        mysqli_query($conn, $sql);
        header("Location:./postWithComments.php?postid=".$replyid);
    }
    else{
        echo "You are not logged in";
    }

?>