var posts;

function importPost(post) {
    fetch("./postimport.html")
    .then(response => response.text())
    .then(text=> document.getElementById("postList").innerHTML += 
    text.replace("USERTEXT", post.user)
    .replace("TITLETEXT", post.title)
    .replace("BODYTEXT", post.body)
    .replace("OPENPOSTPOSTID", post.id));
}

function returnPostById(id) {
    for(var post of posts) {
        if(post.id == id) {
            return post;
        }
    }
}

function openPost(postid) {
    sessionStorage.removeItem("postid");
    sessionStorage.setItem("postid", postid);
}

async function fetchData() {
    let response = await fetch("./post.json");
    let data = await response.json();
    return data.post;
}

async function importRandomPosts(numberOfPosts) {
    posts = await fetchData();
    var idArray = Array.from({length:numberOfPosts}, () => Math.floor(Math.random()*posts.length));
    for(var id of idArray) {
        importPost(returnPostById(id));
    }
}

async function importClickedPost() {
    posts = await fetchData();
    importPost(returnPostById(sessionStorage.getItem("postid")));
}