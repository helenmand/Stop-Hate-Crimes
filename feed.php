<!DOCTYPE html>
<html>
    <head>
        <title>Stop Hate Crimes</title>
        <link rel="stylesheet" href="./feed.css">
        <link rel="stylesheet" href="./post.css">
        <script src="importPost.js"></script>
        <script>importRandomPosts(10);</script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div id="postGroup">
            <div class="PVB">
                <?php include "post-navigation-bar.php"?>
            </div>
            <div id="postList"></div>
        </div>
    </body>
</html>