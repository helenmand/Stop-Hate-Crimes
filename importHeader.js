document.addEventListener("DOMContentLoaded", function () {
    fetch("./index.html")
    .then(response => response.text())
    .then(text => document.getElementById("importHeader").innerHTML = text);
});