function checkinput()
{
	username=document.getElementById("usname").value;
	password=document.getElementById("psword").value;
	
	if(password.length<4 || username.length<4)
	{
		document.getElementById("warningOutput").innerHTML="User's name or password is not correct";
	}
	
	else
	{
		if(username=="Admin" && password=="DaddyIsHere")
		{
			window.location="AdminPage.html";
			sessionStorage.setItem('Username',username);
		}
	
		else
		{
			window.location="landing-page.html";
		}
	}
}
