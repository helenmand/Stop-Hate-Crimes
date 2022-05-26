function openPost(postid) {
    sessionStorage.removeItem("postid");
    sessionStorage.setItem("postid", postid);
    window.location = "postWithComments.php";
}