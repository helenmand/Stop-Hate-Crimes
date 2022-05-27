<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="post-navigation-bar.css">
        <script src="./post-navigation-bar.js"></script>
    </head>
    <body>
        <?php 
            function redirectRegion ($region) {
                $currentUrl = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"))."?pvbregion=".$region;
                if (isset($_GET["pvbcontent"])) {
                    $currentUrl.="&pvbcontent=".$_GET["pvbcontent"];
                }
                return $currentUrl;
            }

            function redirectContent ($content) {
                $currentUrl = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"))."?pvbcontent=".$content;
                if (isset($_GET["pvbregion"])) {
                    $currentUrl.="&pvbregion=".$_GET["pvbregion"];
                }
                return $currentUrl;
            }
        ?>
        <div class="post-header">
            <div class="dropdown">
                <a class="bn2" id="regionDropdownButton">
                    <?php
                    
                        if(isset($_GET["pvbregion"])) {
                            echo $_GET["pvbregion"];
                        } else {
                            echo "Everywhere";
                        }
                    
                    ?>
                </a>
                <div class="dropdown-content">
                    <a href=<?php echo "\"".redirectRegion("Everywhere")."\"" ?>>Everywhere</a>
                    <a href=<?php echo "\"".redirectRegion("Thessaloniki")."\"" ?>>Thessaloniki</a>
                    <a href=<?php echo "\"".redirectRegion("Athens")."\"" ?>>Athens</a>
                    <a href=<?php echo "\"".redirectRegion("Larissa")."\"" ?>>Larissa</a>
                    <a href=<?php echo "\"".redirectRegion("Serres")."\"" ?>>Serres</a>
                </div>
            </div>
            <div class="buttons-right">
                <div class="dropdown">
                    <a class="bn2">
                        <?php
                        
                            if(isset($_GET["pvbcontent"])) {
                                echo $_GET["pvbcontent"];
                            } else {
                                echo "All";
                            }
                    
                        ?>
                    </a>
                    <div class="dropdown-content">
                        <a href=<?php echo "\"".redirectContent("All")."\"" ?>>All</a>
                        <a href=<?php echo "\"".redirectContent("Articles")."\"" ?>>Articles</a>
                        <a href=<?php echo "\"".redirectContent("Complaints")."\"" ?>>Complaints</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>