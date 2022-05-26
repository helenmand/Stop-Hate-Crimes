<!DOCTYPE html>
<html>
    <head>
        <title>Stop Hate Crimes</title>
        <link rel="stylesheet" href="./feed.css">
        <link rel="stylesheet" href="./post.css">
        <script src="post.js"></script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div id="postGroup">
            <div class="PVB">
                <?php include "post-navigation-bar.php"?>
            </div>
            <div id="postList">
                <?php

                    $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
                    $sqlQuery = "SELECT * FROM articles WHERE TITLE LIKE \"%".$_GET["q"]."%\" LIMIT 10";
                    @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
                    $results = mysqli_query($conn, $sqlQuery);

                    while($row = mysqli_fetch_array($results)) {
                        $usertext = $row["USERNAME"];
                        $titletext = $row["TITLE"];
                        $bodytext = $row["CONTENT"];
                        $postid = $row["ID"];
                        include("post.php");
                    }

                ?>
            </div>
        </div>
    </body>
</html>