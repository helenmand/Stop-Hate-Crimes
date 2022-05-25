<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./postWithComments.css">
        <script src="importPost.js"></script>
        <link rel="stylesheet" href="./post.css">
        <script>importClickedPost();</script>
        <script src="comment.js"></script>
        <link rel="stylesheet" href="comment.css">
        <script>createComments("commentList", 10);</script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div id="postWithComments">
            <div id="postList"></div>
            <div id="commentList"></div>
        </div>
        
    </body>
</html>