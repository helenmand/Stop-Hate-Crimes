<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./landing-page.css">
        <link rel="stylesheet" href="./post.css">
        <link rel="stylesheet" href="./post-navigation-bar.css">
        <script src="./post-navigation-bar.js"></script>
        <script src="post.js"></script>
    </head>
    <body>
        <div class="landing-page-header">
            <div class="wrapper">
                <a href="feed.php"><li class="bn1">Feed</li></a>
                <?php
                    if(!isset($_COOKIE["user"])) {
                        echo "<a href=\"./login.php\"><li class=\"bn1\">Login</li></a>";
                        echo "<a href=\"CreateAccount_C.php\"><li class=\"bn1\">Sign Up</li></a>";
                    } else {
                        echo "<a href=\"makeSubmission.php\"><li class=\"bn1\">Submission</li></a>";
                    }
                ?>
                
            </div>
            <?php 
                if(isset($_COOKIE["user"])) {
                    $welcomemessageuser = " ".$_COOKIE["user"];
                } else {
                    $welcomemessageuser = "";
                }
            
            ?>
            <div class="text">
                <p id="welcomeText">Welcome to our website<?php echo $welcomemessageuser ?>!<br>This is a safe space.</p>
            </div>
        </div>
        <div class="posts">
            <div class="PVB">
                <?php include "post-navigation-bar.php"?>
            </div>
            <div class="postL" id="postList">
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
                            UNION
                            SELECT null as id, username, title, content, date, region
                            FROM complaints
                            ORDER BY date DESC
                            LIMIT 3";
                        } else {
                            $sqlQuery = "SELECT id, username, title, content, date, null as region
                            FROM articles
                            UNION
                            SELECT null as id, username, title, content, date, region
                            FROM complaints
                            WHERE region LIKE \"".$pvbregion."\"
                            ORDER BY date DESC
                            LIMIT 3";
                        }
                        
                        $results = mysqli_query($conn, $sqlQuery) or die(mysqli_error($conn));
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
                        $sqlQuery = "SELECT * FROM articles ORDER BY articles.date DESC LIMIT 3";
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
                            $sqlQuery = "SELECT * FROM complaints ORDER BY complaints.date DESC LIMIT 3"; 
                        } else {
                            $sqlQuery = "SELECT * FROM complaints WHERE region LIKE \"".$pvbregion."\"  ORDER BY complaints.date DESC LIMIT 3";
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
