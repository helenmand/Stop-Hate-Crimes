<?php
    session_start();
    include("AdminsConnection.php");

     if($_POST['article']!=null or $_POST['submit']=="Add"){
        $_SESSION['post']="article";

        if($_POST['submit']=="Add"){
            $_SESSION['action']="add";
            header("Location:./makeSubmission.php");
        }
        else{
            if($_POST['submit']=="Update"){
                $_SESSION['action']="Update";

                $sql="SELECT `ID` FROM `articles` WHERE `ID`=".$_POST['article'].";";

                $results = mysqli_query($conn, $sql);
                $article = mysqli_fetch_array($results);

                if(isset($article)){
                    $sql="SELECT `ID`, `TITLE`, `CONTENT` FROM `articles` WHERE `ID`=".$_POST['article'].";";

                    $results = mysqli_query($conn, $sql);
                    $articleData = mysqli_fetch_array($results);

                    $_SESSION['data']=$articleData;
                    header("Location:./makeSubmission.php");
                }
                else{
                    $error="4";
                    header("Location:./AdminPage.php?error=".$error);
                }
            }
            else{
                $sql="SELECT `ID` FROM `articles` WHERE `ID`=".$_POST['article'].";";

                $results = mysqli_query($conn, $sql);
                $article = mysqli_fetch_array($results);

                if(isset($article)){
                    $sql="DELETE FROM `articles` WHERE `ID`=".$article['ID'].";";

                    $conn->query($sql);

                    header("Location:./AdminPage.php");
                }
                else{
                    $error="4";
                    header("Location:./AdminPage.php?error=".$error);
                }
            }
        }
    }
    else{
        $error="5";
        header("Location:./AdminPage.php?error=".$error);
    }
?>
