<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./login.css"/>
		<script src="./login.js"></script>
		<title>Stop Hate Crimes</title>
	</head>
	<body>
		<div>
            <?php include "header.php";?>
        </div>
		<h1 class="headerlogin">Log in</h1> 
		<div class="gridcontainer">
			<div class="grid-item">
				<label class="labelsposition" for="usname">Username</label>
			</div>
			<div class="grid-tem">
				<input type="text" id="usname" name="username">
			</div>
			<div class="grid-item">
				<label class="labelsposition" for="psword">Password&nbsp;</label>
			</div>
			<div class="grid-item">
				<input type="password" id="psword" name="password"><br>
				<label class="warningLabel" id="warningOutput"></label>
			</div>
		</div>
		<div class="loginButtonPosition">
			<input class="loginButton" type="submit" onclick="checkinput()" value="Log in">
		</div>
	
	</body>
</html> 