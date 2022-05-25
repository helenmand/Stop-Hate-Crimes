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
            <div>
                <input type="radio" id="post" name="postType" value="post">
                <label for="post">Post</label>
            </div>
            <div>
                <input type="radio" id="report" name="postType" value="report">
                <label for="report">Report</label>
            </div>

            <label for="postTitle">Title:</label>
            <input type="text" id="postTitle" name="postTitle">
            <label for="postBody">Body:</label>
            <textarea form_id="postForm" type="text" id="postBody" name="postBody"> </textarea>
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>