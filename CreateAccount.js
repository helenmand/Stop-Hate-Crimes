function checkUsername()
{
	username=document.getElementById("username").value;
	
	if (username=="UserExist")
	{
		document.getElementById("warningUsername").innerHTML="This username exists";
	}
	else
	{
		window.location="landing-page.html";
	}
}
