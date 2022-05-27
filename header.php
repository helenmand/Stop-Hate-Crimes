<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="header.css">
        <script src="header.js"></script>
    </head>
    <body>
        <div class="header">
            <link rel="stylesheet" href="header.css"></link>
            <a href="index.php" class="logo">
                <button>
                    <img src="images\logo.png" alt="logo">
                </button>
            </a>
            <div class="header-center">
                <?php 
                    if(isset($_COOKIE["user_category"])) {
                        if(strcmp($_COOKIE["user_category"], "admin") == 0)
                            echo "<a class=\"bn1\" href=\"AdminPage.php\" id=\"adminButton\">Admin Page</a>";
                    }
                ?>
                
            </div>
            <div class="header-right">
                <a>
                    <form id="form" action="searchResult.php"> 
                        <input type="search" id="query" name="q" placeholder="Search...">
                        <button type="submit">
                            <img src="images\search-icon.png">
                        </button>
                    </form>
                </a>
                <a id="profilePageButton"
                <?php
                    if(!isset($_COOKIE["user"])) {
                        echo "class=\"hidden\"";
                    } else {
                        echo "href=\"profilepage.php?user=".$_COOKIE["user"]."\"";
                    }
                ?>
                >
                    <button>
                        <img src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg">
                    </button>
                </a>
            </div>
        </div>
    </body>
</html>
