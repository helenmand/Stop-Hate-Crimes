<?php
    if($_POST['submit']=="submit")
    {
        if($_COOKIE['user_category']=="user"){

            include("loginUsersConnection.php");

            $sql="UPDATE `users` SET `USERNAME`='".$_POST['Usname']."',`PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_COOKIE['user']."';";

        }
        else{

            include("AdminsConnection.php");
            session_start();

            $sql="UPDATE `users` SET `USERNAME`='".$_POST['Usname']."',`PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_SESSION['us_pw_em']['USERNAME']."';";
        }

        if ($conn->query($sql) === TRUE) {
            if($_COOKIE['user_category']=="user"){
                header("Location:./account-settings.php");// h sthn profile
            }
            else {
                header("Location:./AdminPage.php");
            }
        }

    }
?>
