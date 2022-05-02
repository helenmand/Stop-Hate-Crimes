async function checkinput()
{
	let response = await fetch("./admin.json");
	let object = await response.json();
	let admin = object.admin;

	username=document.getElementById("usname").value;
	password=document.getElementById("psword").value;
	
	if(password.length<4 || username.length<4)
	{
		document.getElementById("warningOutput").innerHTML="User's name or password is not correct";
	}
	
	else
	{
		sessionStorage.removeItem('Username');
		sessionStorage.removeItem("Password");
		sessionStorage.setItem('Username',username);
		sessionStorage.setItem("Password", password);

		if(username==admin.name && password==admin.password)
		{
			
			window.location="AdminPage.html";
		}
	
		else
		{
			window.location="index.html";
		}
	}
}
