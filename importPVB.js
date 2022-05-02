document.addEventListener("DOMContentLoaded", function(){
    fetch("./post-navigation-bar.html")
    .then(response => response.text())
    .then(text => document.getElementById("importPVB").innerHTML = text);
})

function changeRegion(newRegion) {
    document.getElementById("regionDropdownButton").innerHTML = newRegion;
}