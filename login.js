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
		window.location="??.html";
	}
}
