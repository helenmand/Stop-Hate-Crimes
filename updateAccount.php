<?php
    if($_POST['submit']=="submit"){

        if($_COOKIE['user_category']=="user"){

            include("loginUsersConnection.php");

            $sql="UPDATE `users` SET `PASSWORD`='".$_POST['Pwname']."',`EMAIL`='".$_POST['email']."' WHERE `USERNAME`='".$_COOKIE['user']."';";

    		if ($conn->query($sql) === TRUE) {

            	header("Location:./account-settings.php");//h sthn profile
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

		        	header("Location:./account-settings.php");//h sthn profile
		        }
            }
            session_destroy();
    	}
    }
?>



