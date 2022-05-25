function writeWelcomeText() {
    let username = sessionStorage.getItem("username");
    let welcomeText;
    if(username == null) {
        welcomeText = "Welcome to our website!<br>This is a safe space ";
    } else {
        welcomeText = "Welcome to our website " + username + "!<br> This is a safe space ";
    }
    console.log("cunt");
    document.getElementById("welcomeText").innerHTML = welcomeText;
}