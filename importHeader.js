document.addEventListener("DOMContentLoaded", function () {
    fetch("./header.html")
    .then(response => response.text())
    .then(text => document.getElementById("importHeader").innerHTML = text);
});