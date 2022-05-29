<?php
    session_start();

    if($_COOKIE['user_category']=="user" or ($_SESSION['action']!=null and $_SESSION['action']=="add") or ($_COOKIE['user_category']=="admin" and $_SESSION['action']==null)){

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

            $query = "SELECT MAX(ID) + 1 FROM `complaints`;";
            $results = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($results);

            $query = "INSERT INTO `complaints` (`ID`, `TITLE`, `USERNAME`, `CONTENT`, `REGION`, `DATE`) VALUES ('".$row["MAX(ID) + 1"]."', '".$postTitle."',  '".$_COOKIE["user"]."','".$postBody."', '".$postRegion."', '".date('y-m-d h:i:s')."');";
            mysqli_query($conn, $query);
        }
    }
    else{
        include("AdminsConnection.php");

        $postTitle = mysqli_real_escape_string($conn, $_POST["postTitle"]);

        if($_SESSION['post']=="complaint"){

            $sql="UPDATE `complaints` SET `TITLE`='".$postTitle."',`CONTENT`='".$_POST["postBody"]."',`REGION`='".$_POST["postRegion"]."' WHERE `ID`='".$_SESSION['data']['ID']."';";
        }
        else{
            $sql="UPDATE `articles` SET `TITLE`='".$postTitle."',`CONTENT`='".$_POST["postBody"]."' WHERE `ID`='".$_SESSION['data']['ID']."';";
        }

        $conn->query($sql);
    }

    if($_COOKIE['user_category']=="user"){
        header("Location:./feed.php");
    }
    else{
        header("Location:./AdminPage.php");
    }
?>
