<?php
    if(!isset($_COOKIE['user'])){
        header("Location:./index.php");
    }
    else{
        session_start();
        if(!isset($_SESSION['us_pw_em'])){
            include("loginUsersConnection.php");
            $sql="SELECT `USERNAME`, `PASSWORD`, `EMAIL` FROM `users` WHERE `USERNAME`='".$_COOKIE['user']."' ;";

            $results = mysqli_query($conn, $sql);
            $usersRes = mysqli_fetch_array($results);
        }
        else{
            $usersRes=$_SESSION['us_pw_em'];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stop Hate Crimes</title>
        <link rel="stylesheet" href="./account-settings.css">
        <script src="./account-settings.js"></script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div class="settings-header">
            <h2>Account Settings</h2>
        </div>
        <form action="./updateAccount.php" method="post">
            <div class="grid-container">
                <div class="grid-item-left">
                        <label for="fname">Username:</label><br>
                        <?php
                            echo "<input type='text' id='Usname' name='Usname' value='".$usersRes['USERNAME']."'>";
                        ?>
                </div>
                <div class="grid-item">
                    <img src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg">
                </div>
                <div class="grid-item-left">
                        <label for="lname">Password:</label><br>
                        <?php
                            echo "<input type='password' id='Pwname' name='Pwname' value='".$usersRes['PASSWORD']."'>";
                        ?>
                </div>
                <div class="grid-item-right">
                        <label for="lname">Email:</label><br>
                        <?php
                            echo "<input type='text' id='email' name='email' value='".$usersRes['EMAIL']."'>";
                        ?>
                </div>
                <div class="grid-item-left">
                    <div class="form-button-item-left">
                        <a href="./account-settings.php" class="bn2" name="submit" value="reset">Reset</a>
                    </div>
                </div>
                <div class="grid-item-right">
                    <div class="form-button-item-right">
                        <input class="bn2" type="submit" name="submit" value="submit">
                    </div>
                </div>
            </div>
        </form>
        <div class="logout-button">
            <a href="logOutAction.php" class="bn2-logout">Log out</a>
        </div>
    </body>
</html>
