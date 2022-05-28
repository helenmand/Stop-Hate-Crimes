<?php
    if (!isset($_COOKIE['user_category']) and $_COOKIE['user_category']!='admin'){
        header("Location:./index.php");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="AdminPage.css"/>
		<script src="AdminPage.js"></script>
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
							$sql = "SELECT `USERNAME`, `PASSWORD`, `EMAIL` FROM users";
							$result = @mysqli_select_db($conn, $dbname);
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
			<div class="userControlsGridContainer">
				<div class="connectcols1_2 UserNamelabelPosition">
					<label>Username</label><input class="UserInput" type="text" id="Username" Placeholder="User name"/><br>
					<label class="WarningLabel" id="WarningUsername" ></label>
				</div>

				<div class="deletePosition">
					<input class="buttons" type="submit" onclick="" value="Delete">
				</div>
				<div class="UpdatePosition">
					<input class="buttons" type="submit" onclick="UpdateButtonUsers()" value="Update">
				</div>
			</div>
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
							$result = @mysqli_select_db($conn, $dbname);
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
							$result = @mysqli_select_db($conn, $dbname);
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
			<div class="botControlsgridContainer">
				<div class="connectcols1_2">
					<label>Complain ID:</label><br>
					<input class="widthinput"type="text" id="ComplainID" Placeholder="Complain ID"/><br>
					<label class="WarningLabel" id="WarningComplain"></label>
				</div>
				<div>
					<a href="makeSubmission.php"><input class="buttons" type="submit" value="Add"></a>
				</div>
				<div class="buttonsDeleteComArt">
					<input class="buttons " type="submit" value="Delete">
				</div>
				<div class="buttonsUpdateComArt">
					<input class="buttons UpdateComArt" type="submit" onclick="UpdateButtonComplains()" value="Update">
				</div>
			</div>
			<div class="botControlsgridContainer ArticleGridPadding">
				<div class="connectcols1_2">
						<label>Article ID:</label><br>
						<input class="widthinput"type="text" id="ComplainID" Placeholder="Article ID"/><br>
						<label class="WarningLabel" id="WarningArticle"></label>
					</div>
					<div>
						<a href="makeSubmission.php"><input class="buttons" type="submit" value="Add"></a>
					</div>
					<div class="buttonsDeleteComArt">
						<input class="buttons" type="submit" value="Delete">
					</div>
					<div class="buttonsUpdateComArt">
						<input class="buttons UpdateComArt" type="submit" onclick="UpdateButtonComplains()" value="Update">
					</div>
				<div></div>
			</div>
		</div>
	</body>
</html>

