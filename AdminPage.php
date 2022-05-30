<?php
    if (!isset($_COOKIE['user_category']) and $_COOKIE['user_category']!='admin'){
        header("Location:./index.php");
    }
    else{
        session_start();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="AdminPage.css"/>
	</head>
	<body>
        <?php
            echo "<h3 class='AdminName' id='AdminName'>".$_COOKIE['user']."</h3>";
        ?>
		<div class="topGridContainer">
			<div class="UserlabelPosition">
				<label class="Userslabel">Users</label>
			</div>
			<div class="landingPageButtonPosition">
				<a href="index.php"><input class="landingPageButton" type="submit" value="Landing Page"></a>
			</div>
			<div class="DataUser">
				<table class="table">
					<tr>
						<th class="namecol">
							Name
						</th>
						<th class="psswdcol">
							Password
						</th>
						<th class="emailcol">
							Email
						</th>
					</tr>
					<tr>
						<?php
							include("AdminsConnection.php");
							$sql = "SELECT `USERNAME`, `PASSWORD`, `EMAIL` FROM users WHERE `USERNAME`!='deleted';";

							$results = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($results)){
								echo "<tr><td class='namecol'>" . $row["USERNAME"] . "</td><td class='psswdcol'>" . $row["PASSWORD"] . "</td><td class='emailcol'>" . $row["EMAIL"] . "</td></tr>";
	 						}
						?>
					</tr>
				</table>
			</div>
			<div class="AddButtonPosition">
				<a href="CreateAccount_C.php"><input class="AddButton" type="submit" value="Add"></a>
			</div>
			<form  action="./AdminsInputCheck.php" method="post">
                <div class="userControlsGridContainer">
                    <div class="connectcols1_2 UserNamelabelPosition">
                        <label>Username</label><input class="UserInput" type="text" id="Username" name="username" Placeholder="User name"/><br>
                        <?php
                            if(isset($_GET["error"]) and ($_GET["error"]=="1")){
                                echo "<label class='WarningLabel' id='WarningUsername' >Username not exists</label>";
                            }
                        ?>
                    </div>

                    <div class="deletePosition">
                        <input class="buttons" type="submit" name="userbuttons" value="Delete">
                    </div>
                    <div class="UpdatePosition">
                        <input class="buttons" type="submit" name="userbuttons" value="Update">
                    </div>
                </div>
			</form>
		</div>
		<div class="botGridContainer">
			<div class="UserlabelPosition">
				<label class="Userslabel">Complains</label>
			</div>
			<div class="UserlabelPosition ArticlePadding">
				<label class="Userslabel">Articles</label>
			</div>
			<div class="DataUser">
				<table class="table">
					<tr>
						<th class="namecol">
							ID
						</th>
						<th class="psswdcol">
							Title
						</th>
						<th class="emailcol">
							User
						</th>
					</tr>
						<?php
							$sql = "SELECT `ID`, `TITLE`, `USERNAME` FROM `complaints`;";
							$results = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($results)){
								echo "<tr><td class='namecol'>" . $row["ID"] . "</td><td class='psswdcol'>" . $row["TITLE"] . "</td><td class='emailcol'>" . $row["USERNAME"] . "</td></tr>";
	 						}
						?>
				</table>
			</div>
			<div class="DataUser ArticlePadding">
				<table class="table">
					<tr>
						<th class="namecol">
							ID
						</th>
						<th class="psswdcol">
							Title
						</th>
						<th class="emailcol">
							User
						</th>
						<?php
							$sql = "SELECT `ID`, `TITLE`, `USERNAME` FROM `articles`;";
							//$result = @mysqli_select_db($conn, $dbname);
							$results = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($results)){
								echo "<tr><td class='namecol'>" . $row["ID"] . "</td><td class='psswdcol'>" . $row["TITLE"] . "</td><td class='emailcol'>" . $row["USERNAME"] . "</td></tr>";
	 						}
							mysqli_free_result($results);
	  						mysqli_close($conn);
						?>
					</tr>
				</table>
			</div>
			<form  action="./AdminsInputComplaints.php" method="post">
                <div class="botControlsgridContainer">
                    <div class="connectcols1_2">
                        <label>Complain ID:</label><br>
                        <input class="widthinput"type="text" id="ComplainID" name="complaint" Placeholder="Complain ID"/><br>
                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"]=="2"){
                                        echo "<label class='WarningLabel' id='WarningComplain'>Complaint ID not exists</label>";
                                    }
                                else{
                                    if($_GET["error"]=="3"){
                                        echo "<label class='WarningLabel' id='WarningComplain'>No input Complaint ID</label>";
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div>
                        <input class="buttons" type="submit" name="submit" value="Add">
                    </div>
                    <div class="buttonsDeleteComArt">
                        <input class="buttons " type="submit" name="submit" value="Delete">
                    </div>
                    <div class="buttonsUpdateComArt">
                        <input class="buttons UpdateComArt" type="submit" name="submit"  value="Update">
                    </div>
                </div>
			</form>
			<form  action="./AdminsInputArticles.php" method="post">
                <div class="botControlsgridContainer ArticleGridPadding">
                    <div class="connectcols1_2">
                            <label>Article ID:</label><br>
                            <input class="widthinput"type="text" id="ArticleID" name="article" Placeholder="Article ID"/><br>
                            <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"]=="4"){
                                        echo "<label class='WarningLabel' id='WarningArticle'>Artile ID not exists</label>";
                                    }
                                    else{
                                        if($_GET["error"]=="5"){
                                            echo "<label class='WarningLabel' id='WarningArticle'>No input Article ID</label>";
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div>
                            <input class="buttons" type="submit" name="submit" value="Add">
                        </div>
                        <div class="buttonsDeleteComArt">
                            <input class="buttons" type="submit" id="ArticleDel" name="submit" value="Delete">
                        </div>
                        <div class="buttonsUpdateComArt">
                            <input class="buttons UpdateComArt" type="submit" id="ArticleUpd" name="submit"  value="Update">
                        </div>
                    <div></div>
                </div>
            </form>
		</div>
	</body>
</html>

