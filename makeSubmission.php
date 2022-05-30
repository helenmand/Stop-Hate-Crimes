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
                            echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();' checked required>";
                        }
                        else{
                            echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();' disabled required>";
                        }
                    }
                    else{
                        echo "<input type='radio' id='Article' name='postType' value='Article' onchange='hideRegion();' required>";
                    }
                    ?>
                <label for="Article">Article</label>
            </div>
            <div>
                <?php
                    if($_COOKIE['user_category']=="admin" and isset($_SESSION['post'])){
                        if ($_SESSION['post']=="complaint"){
                            echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();' checked required>";
                        }
                        else{
                             echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();' disabled required>";
                        }
                    }
                    else{
                            echo "<input type='radio' id='Complaint' name='postType' value='Complaint' onchange='showRegion();' required>";
                        }
                    ?>
                <label for="Complaint">Complaint</label>
            </div>
            <label for="postTitle">Title:</label>
            <?php
                if($_COOKIE['user_category']=="admin" and isset($_SESSION['data'])){
                    echo "<input type='text' id='postTitle' name='postTitle' value='".$_SESSION['data']['TITLE']."' required>";
                }
                else{
                    echo "<input type='text' id='postTitle' name='postTitle' required>";
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
            if(isset($_SESSION['post'])) {
                if($_SESSION['post']=="complaint"){
                    echo "<label for='postRegion' id='postRegionLabel'>Region:</label>";

                    if(isset($_SESSION['data'])){
                        echo "<input type='text' id='postRegion' name='postRegion' value='".$_SESSION['data']['REGION']."' required>";
                        }
                    else{
                        echo "<input type='text' id='postRegion' name='postRegion' required>";
                    }
                }
            } else{
                    
                echo "<label for='postRegion' id='postRegionLabel'>Region:</label>";
                echo "<input type='text' id='postRegion' name='postRegion' required>";
                
            }
                
                
            ?>
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>
