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

		<form action="register.php" method="post" enctype="multipart/form-data">
			
		<div class="gridcontainer">
			<div class="leftposition">
				<label for="username">Username:</label><br>
				<input type="text" id="username" name="usname"><br>
				<label class="warninglabel" id="warningUsername"></label>
			</div>
			<div></div>
				<div class="leftposition top">
					<label for="password">Password:</label><br>
					<input class="passwordplace" type="password" id="password" name="psword">
				</div>
				<div class="rightposition2items top">
					<label class="repeatpassword" for="password">Repeat password:</label><br>
					<input class="repeatpassword" type="password" id="repeatpassword" name="repeatpsword">
				</div>
			
			<div class="leftposition email">
				<label for="email">Email:</label><br>
				<input type="text" id="email" name="email">
			</div>
		</div>
		<div class="buttonposition">
			<input class="ButtonCreate" type="submit" id="buttonCreate" value="Create">
			<?php
				if(isset($_GET["error"])){
					echo "<label class='warningLabel' id='warningOutput'>Error</label>";
				}
			?>
		</div>
	</body>
</html>
