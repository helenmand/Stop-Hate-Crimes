function getAdminName()
{
	Username=sessionStorage.getItem('Username');
	Password=sessionStorage.getItem('Password');
	if (Username=="Admin" && Password=="DaddyIsHere")
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
}
function UpdateButtonComplains()
{
	complainid=document.getElementById("ComplainID").value;
	if (complainid=="NotExist")
	{
		document.getElementById("WarningComplain").innerHTML="Complain Not Found";
	}
}
function UpdateButtonArticle()
{
	articleid=document.getElementById("ArticleID").value;
	if (articleid=="NotExist")
	{
		document.getElementById("WarningArticle").innerHTML="Article Not Found";
	}
}
