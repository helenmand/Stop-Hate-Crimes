document.addEventListener("DOMContentLoaded", async function(){
    let response = await fetch("./landing-page.html");
    let text = await response.text();
    document.getElementById("importLandingPage").innerHTML = text;
    writeWelcomeText();
})

function writeWelcomeText() {
    let username = sessionStorage.getItem("username");
    let welcomeText;
    if(username == null) {
        welcomeText = "Welcome to our website!<br>This is a safe space ";
    } else {
        welcomeText = "Welcome to our website " + username + "!<br> This is a safe space ";
    }
    document.getElementById("welcomeText").innerHTML = welcomeText;
}