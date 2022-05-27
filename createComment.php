<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="makeSubmission.css">
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <form id="postForm">
            <label for="postBody">Comment:</label>
            <div class="post">
                <form action="commentSubmission.php" method="post" enctype="multipart/form-data">
                <textarea form_id="postForm" type="text" id="postBody" name="postBody"> </textarea>  
            </div>
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>