<?php

    $conn = @mysqli_connect("localhost", "LoginUsers", "LogUsSHC");
    @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB"); 

    $postTitle = mysqli_real_escape_string($conn, $_POST["postTitle"]);
    $postBody = mysqli_real_escape_string($conn, $_POST["postBody"]);
    $postRegion = mysqli_real_escape_string($conn, $_POST["postRegion"]);

    if(strcmp($_POST["postType"], "Article") == 0) {

        $query = "SELECT MAX(ID) + 1 FROM articles;";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($results);

        $query = "INSERT INTO `articles` (`ID`, `TITLE`, `USERNAME`, `CONTENT`, `DATE`) VALUES ('".$row["MAX(ID) + 1"]."', '".$postTitle."', '".$_COOKIE["user"]."', '".$postBody."', '".date('y-m-d h:i:s')."');";
        mysqli_query($conn, $query);
    } else if(strcmp($_POST["postType"], "Complaint") == 0) {

        $query = "SELECT MAX(ID) + 1 FROM COMPLAINTS;";
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($results);
        

        $query = "INSERT INTO `complaints` (`ID`, `TITLE`, `USERNAME`, `CONTENT`, `REGION`, `DATE`) VALUES ('".$row["MAX(ID) + 1"]."', '".$postTitle."',  '".$_COOKIE["user"]."','".$postBody."', '".$postRegion."', '".date('y-m-d h:i:s')."');";
        mysqli_query($conn, $query);
    }
    header("Location:./feed.php");

?>