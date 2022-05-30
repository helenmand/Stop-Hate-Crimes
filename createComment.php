<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="makeReply.css">
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <?php
            $redirect = "\"commentSubmission.php?postid=".$_GET["postid"]."\"";
            if(isset($_GET["commentid"])) {
                $redirect = "\"commentSubmission.php?postid=".$_GET["postid"]."&commentid=".$_GET["commentid"]."\"";
            }
        ?>
        <form id="postForm" action=<?php echo $redirect;?> method="post">
            <label for="postBody">Comment:</label>
            <div class="post">
                <form action="commentSubmission.php" method="post" enctype="multipart/form-data">
                <textarea form_id="postForm" type="text" id="postBody" name="postBody" required> </textarea>  
            </div>
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>