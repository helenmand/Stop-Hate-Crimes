function getAdminName()
{
	Username=sessionStorage.getItem('Username');
	document.getElementById("AdminName").innerHTML=Username;
}



