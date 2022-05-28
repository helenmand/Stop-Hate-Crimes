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
        <form id="postForm" action="processPostSubmission.php" method="post">
            <div>
                <input type="radio" id="Article" name="postType" value="Article" onchange="hideRegion();">
                <label for="Article">Article</label>
            </div>
            <div>
                <input type="radio" id="Complaint" name="postType" value="Complaint" onchange="showRegion();">
                <label for="Complaint">Complaint</label>
            </div>

            <label for="postTitle">Title:</label>
            <input type="text" id="postTitle" name="postTitle">
            <label for="postBody">Body:</label>
            <textarea form_id="postForm" type="text" id="postBody" name="postBody"> </textarea>
            <label for="postRegion" id="postRegionLabel">Region:</label>
            <input type="text" id="postRegion" name="postRegion">
            <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>