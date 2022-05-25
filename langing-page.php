<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./landing-page.css">
        <link rel="stylesheet" href="./post.css">
        <link rel="stylesheet" href="./post-navigation-bar.css">
        <script src="landing-page.js"></script>
        <script src="./importPost.js"></script>
        <script>importRandomPosts(3)</script>
        <script src="./post-navigation-bar.js"></script>
    </head>
    <body>
        <div class="landing-page-header">
            <div class="wrapper">
                <a href="feed.php"><li class="bn1">Feed</li></a>
                <a href="makeSubmission.php"><li class="bn1">Submission</li></a>
                <a href="./login.php"><li class="bn1">Login</li></a>
                <a href="CreateAccount.php"><li class="bn1">Sign Up</li></a>
            </div>
            <div class="text">
                <p id="welcomeText"></p>
                <script>writeWelcomeText();</script>
            </div>
        </div>
        <div class="posts">
            <div class="PVB">
                <?php include "post-navigation-bar.php"?>
            </div>
            <div class="postL" id="postList"></div>
        </div>
    </body>
</html>