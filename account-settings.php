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
                            echo "<label for='fnameShows'>".$usersRes['USERNAME']."</label>";
                        ?>
                </div>
                <div class="grid-item">
                
                    <?php
                        $img_src = "./images/default_pfp.png";
                        if (file_exists("./images/".$_COOKIE["user"]."_pfp.png")){
                            $img_src = "./images/".$_COOKIE["user"]."_pfp.png";
                        }
                    ?>

                    <img src=<?php echo $img_src;?> als="Profile Picture">
                </div>
                <div class="grid-item-left">
                        <label for="lname">Password:</label><br>
                        <?php
                            echo "<input type='password' id='Pwname' name='Pwname' value='".$usersRes['PASSWORD']."' required>";
                        ?>
                </div>
                <div class="grid-item-right">
                        <label for="lname">Email:</label><br>
                        <?php
                            echo "<input type='text' id='email' name='email' value='".$usersRes['EMAIL']."' required><br>";
                            if(isset($_GET["error"]) and $_GET["error"]=="1"){
                                echo "<label class='WarningLabel' id='WarningArticle'>Email exists</label>";
                            }
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
