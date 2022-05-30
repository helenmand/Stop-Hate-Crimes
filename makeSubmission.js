function hideRegion() {
    document.getElementById("postRegion").style.visibility = "hidden";
    document.getElementById("postRegionLabel").style.visibility = "hidden";
    document.getElementById("postRegion").removeAttribute("required");
}

function showRegion() {
    document.getElementById("postRegion").style.visibility = "visible";
    document.getElementById("postRegionLabel").style.visibility = "visible";
    document.getElementById("postRegion").required = true;
}