<?php
    include("AdminsConnection.php");
    $username=$_POST['username'];

    $sql="SELECT `USERNAME`, `PASSWORD`, `EMAIL` FROM users WHERE `USERNAME`='".$username."' AND `USERNAME` != 'deleted';";

    $results = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($results);

    if(isset($user)){
    	if($_POST['userbuttons']=="Update"){
    		session_start();
            $_SESSION['us_pw_em']=$user;
            header("Location:./account-settings.php");
    	}
    	else{
			$sql="DELETE FROM `users` WHERE `USERNAME`='".$username."';";
		    $conn->query($sql);

            $sql="UPDATE `complaints` SET `USERNAME`='deleted' WHERE `USERNAME` IS NULL;";
            $conn->query($sql);

            $sql="UPDATE `articles` SET `USERNAME`='deleted' WHERE `USERNAME` IS NULL;";
            $conn->query($sql);

            header("Location:./AdminPage.php");
    	}
    }
    else{
            $error="1";
            header("Location:./AdminPage.php?error=".$error);
    }
?>
