<?php
    include("AdminsConnection.php");
    $username=$_POST['username'];

    $sql="SELECT `USERNAME`, `PASSWORD`, `EMAIL` FROM users WHERE `USERNAME`='".$username."';";

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

		    if ($conn->query($sql) === TRUE) {
		        header("Location:./AdminPage.php");
		    }
    	}

    }
    else{
            $error="1";
            header("Location:./AdminPage.php?error=".$error);
    }
?>
