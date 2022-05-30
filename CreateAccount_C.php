<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./CreateAccount.css">
        <title>Stop Hate Crimes</title>
	</head>
	<body>
        <div>
            <?php include "header.php";?>
        </div>
		<h1 class="headerCreateAccount">Create Account</h1>
		<div class="gridcontainer">
			<div class="leftposition">
			<form action="./registerC.php" method="post" enctype="multipart/form-data"> <!-- Added -->
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="usname" required><br>
                </div>
                <div></div>
                    <div class="leftposition top">
                        <label for="password">Password:</label><br>
                        <input class="passwordplace" type="password" id="password" name="psword" required>
                    </div>
                    <div class="rightposition2items top">
                        <label class="repeatpassword" for="password">Repeat password:</label><br>
                        <input class="repeatpassword" type="password" id="repeatpassword" name="repeatpsword" required>
                    </div>
                <div class="leftposition email">
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" required><br>
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"]=="1"){
                                $warningmessage="Error with communicate, try later";
                                }
                            else{
                                if($_GET["error"]=="2"){
                                    $warningmessage="Email Id Already Exists";
                                    }
                                else{
                                    if ($_GET["error"]=="3"){
                                        $warningmessage="Username Id Already Exists";
                                        }
                                    else{
                                        if($_GET["error"]=="4"){
                                            $warningmessage="Passwords do not match";
                                            }
                                        }
                                    }
                                }
                            echo "<label class='warninglabel' id='warningUsername'>".$warningmessage."</label>";
                            }
                        ?>
                </div>
            </div>
            <div class="buttonposition">
                    <input class="ButtonCreate" type="submit" id="buttonCreate" value="Create" >
			</form>
		</div>
	</body>
</html>
