function openPost(postid) {
    window.location = "postWithComments.php?postid=" + postid;
}

function openReply(postid) {
    window.location = "createComment.php?postid=" + postid;
}