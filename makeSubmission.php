<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="makeSubmission.css">
        <script src="makeSubmission.js"></script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <form id="postForm" action="./processPostSubmission.php" method="post">
            <div>
                <?php
                    if($_COOKIE['user_category']=="admin" and isset($_SESSION['post'])){
                        if ($_SESSION['post']=="article"){
                            echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();' checked>";
                        }
                        else{
                            echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();' disabled>";
                        }
                    }
                    else{
                        echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();'>";
                    }
                    ?>
                <label for="Article">Article</label>
            </div>
            <div>
                <?php
                    if($_COOKIE['user_category']=="admin" and isset($_SESSION['post'])){
                        if ($_SESSION['post']=="complaint"){
                            echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();' checked>";
                        }
                        else{
                             echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();' disabled>";
                        }
                    }
                    else{
                            echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();'>";
                        }
                    ?>
                <label for="Complaint">Complaint</label>
            </div>
            <label for="postTitle">Title:</label>
            <?php
                if($_COOKIE['user_category']=="admin" and isset($_SESSION['data'])){
                    echo "<input type='text' id='postTitle' name='postTitle' value='".$_SESSION['data']['TITLE']."'>";
                }
                else{
                    echo "<input type='text' id='postTitle' name='postTitle'>";
                }
            ?>
            <label for="postBody">Body:</label>
            <?php
                if($_COOKIE['user_category']=="admin" and isset($_SESSION['data'])){
                    echo "<textarea form_id='postForm' type='text' id='postBody' name='postBody'>".$_SESSION['data']['CONTENT']."</textarea>";
                }
                else{
                    echo "<textarea form_id='postForm' type='text' id='postBody' name='postBody'></textarea>";
                }
            ?>
            <?php
                if($_COOKIE['user_category']=="admin" and ($_SESSION['post']!=null and $_SESSION['post']=="complaint")){
                    echo "<label for='postRegion' id='postRegionLabel'>Region:</label>";
                    echo "<input type='text' id='postRegion' name='postRegion' value='".$_SESSION['data']['REGION']."'>";
                }
                else{
                    if($_COOKIE['user_category']=="user" or ($_COOKIE['user_category']=="admin" and !isset($_SESSION['post']))) {
                        echo "<label for='postRegion' id='postRegionLabel'>Region:</label>";
                        echo "<input type='text' id='postRegion' name='postRegion'>";
                    }
                }
            ?>
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>
