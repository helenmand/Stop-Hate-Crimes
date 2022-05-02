function logOutAccount() {
    sessionStorage.removeItem("username");
    sessionStorage.removeItem("password");
}