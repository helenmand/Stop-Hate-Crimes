<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./postWithComments.css">
        <link rel="stylesheet" href="./post.css">
        <script src="comment.js"></script>
        <link rel="stylesheet" href="comment.css">
        <script>createComments("commentList", 10);</script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div id="postWithComments">
            <div>
                <?php
                    $conn = @mysqli_connect("localhost", "admin", "adminsPW");
                    $sqlQuery = "SELECT * FROM articles WHERE ID =".$_GET["postid"];
                    @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
                    $results = mysqli_query($conn, $sqlQuery);
                    
                    $row = mysqli_fetch_array($results);

                    $usertext = $row["USERNAME"];
                    $titletext = $row["TITLE"];
                    $bodytext = $row["CONTENT"];
                    $postid = $row["ID"];
                    include("post.php");
                ?>
            </div>
            <div id="commentList"></div>
        </div>
        
    </body>
</html>