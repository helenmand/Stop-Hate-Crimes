<!DOCTYPE html>
<html>
    <head>
        <script src="importHeader.js"></script>
        <link rel="stylesheet" href="makeSubmission.css">
    </head>
    <body>
        <div id="importHeader"></div>
        <form id="postForm">
            <div>
                <form action="commentSubmission.php" method="post" enctype="multipart/form-data">

                <label for="postBody">Comment:</label>
                <textarea form_id="postForm" type="text" id="postBody" name="postBody"> </textarea>
                <input type="submit" value="Submit" id="formSubmitButton">
        </form>
    </body>
</html>