document.addEventListener("DOMContentLoaded", async function () {
    let response = await fetch("./header.html");
    let text = await response.text();
    document.getElementById("importHeader").innerHTML = text;
    
    username=sessionStorage.getItem("Username");
	password=sessionStorage.getItem("Password");
	
	if(username=="Admin" && password=="DaddyIsHere")
	{
		adminButton = document.getElementById("adminButton");
		adminButton.style.visibility="visible";
	}
	else if (username!=null) {
		document.getElementById("profilePageButton").style.visibility="visible";
	}
});
