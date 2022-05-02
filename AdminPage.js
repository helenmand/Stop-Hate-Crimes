async function getAdminName()
{
	Username=sessionStorage.getItem('username');
	Password=sessionStorage.getItem('password');

	let response = await fetch("./admin.json");
	let object = await response.json();
	let admin = object.admin;

	if (Username==admin.name && Password==admin.password)
	{
		document.getElementById("AdminName").innerHTML=Username;
	}
	else
	{
		window.location="./index.html";
	}
}

function UpdateButtonUsers()
{
	username=document.getElementById("Username").value;
	if (username=="NotExist")
	{
		document.getElementById("WarningUsername").innerHTML="User Not Exist";
	}
	else
	{
		window.location="profilepage.html";
	}
}
function UpdateButtonComplains()
{
	complainid=document.getElementById("ComplainID").value;
	if (complainid=="NotExist")
	{
		document.getElementById("WarningComplain").innerHTML="Complain Not Found";
	}
	else
	{
		window.location="makeSubmission.html";
	}
}
function UpdateButtonArticle()
{
	articleid=document.getElementById("ArticleID").value;
	if (articleid=="NotExist")
	{
		document.getElementById("WarningArticle").innerHTML="Article Not Found";
	}
	else
	{
		window.location="makeSubmission.html";
	}
}
