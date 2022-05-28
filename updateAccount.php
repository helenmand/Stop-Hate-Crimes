<?php
    if($_POST['submit']=="submit")
    {
        include("loginUsersConnection.php");

        //UPDATE `users` SET `USERNAME`='spiros09',`PASSWORD`='allakse',`EMAIL`='spiros09@gmail.com' WHERE `USERNAME`='spiros09';
        $sql="UPDATE `users` SET `USERNAME`='".$_POST['Usname']."',`PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_COOKIE['user']."';";

        if ($conn->query($sql) === TRUE) {
            if($_COOKIE['user_category']=="user"){
                header("Location:./account-settings.php");
            }
            else{
                header("Location:./AdminPage.php");
            }
        } else {
            header("Location:./account-settings.php");
        }
    }
    else{
        header("Location:./account-settings.php");
    }
?>
