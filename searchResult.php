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
                    @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB"); 

                    if(isset($_GET["pvbcontent"])) {
                        $pvbcontent = $_GET["pvbcontent"];
                    } else {
                        $pvbcontent = "All"; 
                    }

                    if(isset($_GET["pvbregion"])) {
                        $pvbregion = $_GET["pvbregion"];
                    } else {
                        $pvbregion = "Everywhere"; 
                    }

                    if(strcmp($pvbcontent, "All") == 0) {
                        if(strcmp($pvbregion, "Everywhere") == 0) {
                            $sqlQuery = "SELECT id, username, title, content, date, null as region
                            FROM articles
                            WHERE TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\"
                            UNION
                            SELECT null as id, username, title, content, date, region
                            FROM complaints
                            WHERE TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\"
                            ORDER BY date DESC
                            LIMIT 10";
                        } else {
                            $sqlQuery = "SELECT id, username, title, content, date, null as region
                            FROM articles
                            WHERE TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\"
                            UNION
                            SELECT null as id, username, title, content, date, region
                            FROM complaints
                            WHERE region LIKE \"".$pvbregion."\" AND (TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\")
                            ORDER BY date DESC
                            LIMIT 10";
                        }
                        
                        $results = mysqli_query($conn, $sqlQuery);
                        while($row = mysqli_fetch_array($results)) {

                            if($row["region"]) {
                                $usertext = $row["username"];
                                $titletext = $row["title"];
                                $bodytext = $row["content"];
                                include("complaint.php");
                            } else {
                                $usertext = $row["username"];
                                $titletext = $row["title"];
                                $bodytext = $row["content"];
                                $postid = $row["id"];
                                include("post.php");
                            }
                            
                        }

                    } else if(strcmp($pvbcontent, "Articles") == 0) {
                        $sqlQuery = "SELECT * FROM articles WHERE TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\" ORDER BY articles.date DESC LIMIT 10";
                        $results = mysqli_query($conn, $sqlQuery);
                        while($row = mysqli_fetch_array($results)) {
                            $usertext = $row["USERNAME"];
                            $titletext = $row["TITLE"];
                            $bodytext = $row["CONTENT"];
                            $postid = $row["ID"];
                            include("post.php");
                        }
                    } else if(strcmp($pvbcontent, "Complaints") == 0) {
                        if(strcmp($pvbregion, "Everywhere") == 0) {
                            $sqlQuery = "SELECT * FROM complaints WHERE TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\" ORDER BY complaints.date DESC LIMIT 10"; 
                        } else {
                            $sqlQuery = "SELECT * FROM complaints WHERE region LIKE \"".$pvbregion."\" AND (TITLE LIKE \"%".$_GET["q"]."%\" OR content LIKE \"%".$_GET["q"]."%\")  ORDER BY complaints.date DESC LIMIT 10";
                        }
                        
                        $results = mysqli_query($conn, $sqlQuery);
                        while($row = mysqli_fetch_array($results)) {
                            $usertext = $row["USERNAME"];
                            $titletext = $row["TITLE"];
                            $bodytext = $row["CONTENT"];
                            include("complaint.php");
                        }
                    }

                ?>
            </div>
        </div>
    </body>
</html>