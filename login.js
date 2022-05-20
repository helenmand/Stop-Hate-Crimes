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
		sessionStorage.removeItem('username');
		sessionStorage.removeItem("password");
		sessionStorage.setItem('username',username);
		sessionStorage.setItem("password", password);

		if(username==admin.name && password==admin.password)
		{
			
			window.location="AdminPage.php";
		}
	
		else
		{
			window.location="index.html";
		}
	}
}
