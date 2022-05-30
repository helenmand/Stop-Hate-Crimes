<?php
    if($_POST['submit']=="submit"){

        include("loginUsersConnection.php");

        $sql="SELECT `EMAIL` FROM `users` WHERE `EMAIL`='".$_POST['email']."';";

        $results = mysqli_query($conn, $sql);
        $email = mysqli_fetch_array($results);

        if(!isset($email)){

            if($_COOKIE['user_category']=="user"){

                $sql="UPDATE `users` SET `PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_COOKIE['user']."';";

                if ($conn->query($sql) === TRUE) {

                    header("Location:./account-settings.php");
                }
            }
            else{
                include("AdminsConnection.php");
                session_start();

                if(isset($_SESSION['us_pw_em'])){
                    $sql="UPDATE `users` SET `PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_SESSION['us_pw_em']['USERNAME']."';";

                    $conn->query($sql);
                    header("Location:./AdminPage.php");
                }
                else{
                    $sql="UPDATE `users` SET `PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_COOKIE['user']."';";

                    if ($conn->query($sql) === TRUE) {

                        header("Location:./account-settings.php");
                    }
                }
                session_destroy();
            }
        }
        else{
            header("Location:./account-settings.php?error=1");
        }
    }
?>



