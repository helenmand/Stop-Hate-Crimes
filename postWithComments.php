<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./postWithComments.css">
        <link rel="stylesheet" href="./post.css">
        <link rel="stylesheet" href="comment.css">
        <script src="postWithComments.js"></script>
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
                    echo
                    "<div class=\"post\">
                        <div class=\"postUser\">
                            <a class=\"postUserLink\" href=\"profilepage.php?user=".$usertext."\">
                                ".$usertext."
                            </a>
                        </div>
                        <div class=\"postTitle\">
                            <a>".$titletext."</a>
                        </div>
                        <div class=\"postBody\">
                            <a>
                                ".$bodytext."
                            </a>
                        </div>
                        <div class=\"postButtons\">
                            <button class=\"postReplyButton bn1\" onclick=\"openReply(".$postid.");\">
                                Reply
                            </button>
                        </div>
                    </div>";
                ?>
            </div>
            <div id="commentList">
                <?php

                    function produceReply($parentid, $conn) {
                        $sqlQuery = "SELECT * FROM `comments_on_comments` INNER JOIN comments ON follows = comments.id WHERE COMMENTS =".$parentid ;
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
                                <button class=\"commentReplyButton bn2\" onclick=\"openCommentReply(".$row["ARTICLE_ID"].", ".$row["ID"].")\">Reply</button>
                            </div>
                            <div class=\"commentReply\">";

                            produceReply($row["ID"], $conn);

                            echo
                                "</div>
                            </div>";
                        }
                    }

                    $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
                    $sqlQuery = "SELECT * FROM comments WHERE ARTICLE_ID =".$_GET["postid"]." AND ID NOT IN (SELECT FOLLOWS FROM comments_on_comments)";
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
                                <button class=\"commentReplyButton bn2\" onclick=\"openCommentReply(".$row["ARTICLE_ID"].", ".$row["ID"].")\">Reply</button>
                            </div>
                            <div class=\"commentReply\">";
                        

                        produceReply($row["ID"], $conn);

                        echo
                            "</div>
                        </div>";

                    }
                ?>
            </div>
        </div>
    </body>
</html>