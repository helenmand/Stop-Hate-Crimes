window.addEventListener("load", function() {
	username=sessionStorage.getItem("Username");
	password=sessionStorage.getItem("Password");
	/*console.log("Before If");*/
	
	if(username=="Admin" && password=="DaddyIsHere" && adminButton.style.visibility=="hidden")
		{
			adminButton.style.visibility="visible";
			
			/*console.log("ADMIN");*/
		}

}, false);
