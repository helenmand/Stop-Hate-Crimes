document.addEventListener("DOMContentLoaded", function(){
    fetch("./landing-page.html")
    .then(response => response.text())
    .then(text => document.getElementById("importLandingPage").innerHTML = text);
})