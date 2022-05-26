<!DOCTYPE html>
<html>
    <head>
        <title>Stop Hate Crimes</title>
        <link rel="stylesheet" href="./account-settings.css">
        <script src="./account-settings.js"></script>
    </head>
    <body>
        <div>
            <?php include "header.php";?>
        </div>
        <div class="settings-header">
            <h2>Account Settings</h2>
        </div>
        <div class="grid-container">
            <div class="grid-item-left">
                <form>
                    <label for="fname">Username:</label><br>
                    <input type="text" id="fname" name="fname" value="username123">
                </form>
            </div>
            <div class="grid-item">
                <img src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg">
            </div>
            <div class="grid-item-left">
                <form>
                    <label for="lname">Password:</label><br>
                    <input type="password" id="lname" name="lname" value="user-password">
                </form>
            </div>  
            <div class="grid-item-right">
                <form>
                    <label for="lname">Email:</label><br>
                    <input type="text" id="lname" name="lname" value="user@gmail.com">
                </form>
            </div>
            <div class="grid-item-left">
                <div class="form-button-item-left">
                    <a href="" class="bn2">Reset</a>
                </div>
            </div>
            <div class="grid-item-right">
                <div class="form-button-item-right">
                    <a href="" class="bn2">Submit</a>
                </div>
            </div>
        </div>
        <div class="logout-button">
            <a href="logOutAction.php" class="bn2-logout" onclick="logOutAccount();">Log out</a>
        </div>
    </body>
</html>