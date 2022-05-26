<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./postWithComments.css">
        <link rel="stylesheet" href="./post.css">
        <link rel="stylesheet" href="comment.css">
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div id="postWithComments">
            <div>
                <?php
                    $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
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
            <div id="commentList">
                <?php
                    $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
                    $sqlQuery = "SELECT * FROM comments WHERE ARTICLE_ID =".$_GET["postid"];
                    @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
                    $results = mysqli_query($conn, $sqlQuery);

                    while($row = mysqli_fetch_array($results)) {
                        echo
                        "<div class=\"comment\">
                            <div class=\"commentUser\">
                                <a class=\"commentUserLink\" href=\"profilepage.php?user=".$row["USERNAME"]."\"> ".$row["USERNAME"]."</a>
                            </div>
                            <div class=\"commentBody\">
                                <a>".$row["COMMENT"]."</a>
                            </div>
                            <div class=\"commentButtons\">
                                <button class=\"commentReplyButton bn2\">Reply</button>
                            </div>
                            <div class=\"commentReply\">";

                        echo
                            "</div>
                        </div>";

                    }
                ?>
            </div>
        </div>
    </body>
</html>