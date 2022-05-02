function writeWelcomeText() {
    console.log(1);
    let username = sessionStorage.getItem("username");
    let welcomeText;
    if(username == null) {
        welcomeText = "Welcome to our website!<br>This is a safe space ";
    } else {
        welcomeText = "Welcome to our website " + username + "!<br> This is a safe space ";
    }
    document.getElementById("welcomeText").innerHTML = welcomeText;
}