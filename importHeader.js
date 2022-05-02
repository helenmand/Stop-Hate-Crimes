document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("./header.html");
    let text = await response.text();
    document.getElementById("importHeader").innerHTML = text;

	response = await fetch("./admin.json");
	let object = await response.json();
	let admin = object.admin;
    
    username=sessionStorage.getItem("username");
	password=sessionStorage.getItem("password");

	if(username==admin.name && password==admin.password)
	{
		adminButton = document.getElementById("adminButton");
		adminButton.style.visibility="visible";
	}
	if (username!=null) {
		document.getElementById("profilePageButton").style.visibility="visible";
	}
});
