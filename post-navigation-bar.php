<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="post-navigation-bar.css">
        <script src="./post-navigation-bar.js"></script>
    </head>
    <body>
        <?php 
            function redirectRegion ($region) {
                $currentUrl = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"))."?pvbregion=".str_replace(" ","_",$region);
                if (isset($_GET["pvbcontent"])) {
                    $currentUrl.="&pvbcontent=".$_GET["pvbcontent"];
                }
                if(isset($_GET["user"])) {
                    $currentUrl.="&user=".$_GET["user"]; 
                }
                if(isset($_GET["q"])) {
                    $currentUrl.="&q=".$_GET["q"]; 
                }
                return $currentUrl;
            }

            function redirectContent ($content) {
                $currentUrl = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"))."?pvbcontent=".$content;
                if (isset($_GET["pvbregion"])) {
                    $currentUrl.="&pvbregion=".$_GET["pvbregion"];
                }
                if(isset($_GET["user"])) {
                    $currentUrl.="&user=".$_GET["user"]; 
                }
                if(isset($_GET["q"])) {
                    $currentUrl.="&q=".$_GET["q"]; 
                }
                return $currentUrl;
            }
        ?>
        <div class="post-header">
            <div class="dropdown">
                <a class="bn2" id="regionDropdownButton">
                    <?php
                    
                        if(isset($_GET["pvbregion"])) {
                            echo str_replace("_"," ",$_GET["pvbregion"]);
                        } else {
                            echo "Everywhere";
                        }
                    
                    ?>
                </a>
                <div class="dropdown-content">
                    <?php 

                        $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
                        @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB");
                        $query = "SELECT DISTINCT region FROM complaints";
                        $results = mysqli_query($conn, $query);
                        echo "<a href=".redirectRegion("Everywhere").">Everywhere</a>";
                        while($row = mysqli_fetch_array($results)) {
                            
                            echo "<a href=".redirectRegion($row["region"]).">".$row["region"]."</a>";
                        }

                    ?>
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