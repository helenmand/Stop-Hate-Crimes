document.addEventListener("DOMContentLoaded", async function(){
    let response = await fetch("./landing-page.html");
    let text = await response.text();
    document.getElementById("importLandingPage").innerHTML = text;
    writeWelcomeText();
})