<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./login.css"/>
		<title>Stop Hate Crimes</title>
	</head>
	<body>
		<div>
            <?php include "header.php";?>
        </div>
        <form  action="./loginAuthentication.php" method="post">
            <h1 class="headerlogin">Log in</h1>
            <div class="gridcontainer">
                <div class="grid-item">
                    <label class="labelsposition" for="usname">Username</label>
                </div>
                <div class="grid-tem">
                    <input type="text" id="usname" name="username" required>
                </div>
                <div class="grid-item">
                    <label class="labelsposition" for="psword">Password&nbsp;</label>
                </div>
                <div class="grid-item">
                    <input type="password" id="psword" name="password" required><br>
                    <?php
                        if(isset($_GET["error"])){
                            echo "<label class='warningLabel' id='warningOutput'>The username or password is incorrect</label>";
                        }
                    ?>
                </div>
            </div>
            <div class="loginButtonPosition">
                <input class="loginButton" type="submit" value="Log in">
            </div>
        </form>
	</body>
</html> 
