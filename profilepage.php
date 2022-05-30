<html>
  <head>
    <title>Stop Hate Crimes</title>
    <link rel="stylesheet" href="profilepage.css">
    <link rel="stylesheet" href="./post.css">
    <link rel="stylesheet" href="./post-navigation-bar.css">
    <script src="post.js"></script>
    <script src="./post-navigation-bar.js"></script>
    </head>
  <body>
    <div>
      <?php if(strcmp($_GET["user"], "deleted") == 0) {header("Location:./index.php");} ?>
      <?php include "header.php";?>
    </div>
    <div class="profile">
      <div id="profile-upper">
        <div id="profile-banner-image">
          <?php
            $img_src = "./images/default_bg.jpg";
            if (file_exists("./images/".$_GET["user"]."_bg.png")){
              $img_src = "./images/".$_GET["user"]."_bg.png";
            }
          ?>
          <img src=<?php echo $img_src;?> alt="Banner image">
        </div>
        <div id="profile-i">
          <div id="profile-pic">
          <?php
            $img_src = "./images/default_pfp.png";
            if (file_exists("./images/".$_GET["user"]."_pfp.png")){
              $img_src = "./images/".$_GET["user"]."_pfp.png";
            }
          ?>
          <img src=<?php echo $img_src;?> als="Profile Picture">
          </div>
          <div class="container">
            <div id="username"><?php echo $_GET["user"]?></div>
            <?php 
              if(isset($_COOKIE["user"]) && isset($_GET["user"])) {
                if(strcmp($_COOKIE["user"], $_GET["user"]) == 0) {
                  echo "<a href=\"account-settings.php\">
                    <button class=\"btn\">
                      <img src=\"https://s1.qwant.com/thumbr/0x380/9/e/b0c07453e395b4a1641f0f1c298c27d8f816ab94091223ab1c4ae13d0f43a3/setting.png?u=https%3A%2F%2Ffiles.softicons.com%2Fdownload%2Ftoolbar-icons%2Fmono-general-icons-2-by-custom-icon-design%2Fpng%2F512x512%2Fsetting.png&q=0&b=1&p=0&a=0\">
                    </button>
                  </a>";
                }
              }
            ?>
          </div> 
        </div>
      </div>

      <div id="profile-post">
        <div class="mypostscontainer">
          <h2 class="myposts"><?php echo $_GET["user"]."'s posts"?></h2>
        </div>
        <div class="PVB">
          <?php include "post-navigation-bar.php"?>
        </div>
        <div class="postL" id="postList">
          <?php
            $conn = @mysqli_connect("localhost", "NotLoginUsers", "NLogUsSHC");
            @mysqli_select_db($conn, "STOP_HATE_CRIMES_DB"); 

            if(isset($_GET["pvbcontent"])) {
                $pvbcontent = $_GET["pvbcontent"];
            } else {
                $pvbcontent = "All"; 
            }

            if(isset($_GET["pvbregion"])) {
                $pvbregion = $_GET["pvbregion"];
            } else {
                $pvbregion = "Everywhere"; 
            }

            if(strcmp($pvbcontent, "All") == 0) {
                if(strcmp($pvbregion, "Everywhere") == 0) {
                    $sqlQuery = "SELECT id, username, title, content, date, null as region
                    FROM articles
                    WHERE (USERNAME=\"".$_GET["user"]."\")
                    UNION
                    SELECT null as id, username, title, content, date, region
                    FROM complaints
                    WHERE (USERNAME=\"".$_GET["user"]."\")
                    ORDER BY date DESC
                    LIMIT 10";
                } else {
                    $sqlQuery = "SELECT id, username, title, content, date, null as region
                    FROM articles
                    WHERE (USERNAME=\"".$_GET["user"]."\")
                    UNION
                    SELECT null as id, username, title, content, date, region
                    FROM complaints
                    WHERE region LIKE \"".$pvbregion."\" AND (USERNAME=\"".$_GET["user"]."\")
                    ORDER BY date DESC
                    LIMIT 10";
                }
                
                $results = mysqli_query($conn, $sqlQuery);
                while($row = mysqli_fetch_array($results)) {

                    if($row["region"]) {
                        $usertext = $row["username"];
                        $titletext = $row["title"];
                        $bodytext = $row["content"];
                        include("complaint.php");
                    } else {
                        $usertext = $row["username"];
                        $titletext = $row["title"];
                        $bodytext = $row["content"];
                        $postid = $row["id"];
                        include("post.php");
                    }
                    
                }

            } else if(strcmp($pvbcontent, "Articles") == 0) {
                $sqlQuery = "SELECT * FROM articles WHERE (USERNAME=\"".$_GET["user"]."\") ORDER BY articles.date DESC LIMIT 10";
                $results = mysqli_query($conn, $sqlQuery);
                while($row = mysqli_fetch_array($results)) {
                    $usertext = $row["USERNAME"];
                    $titletext = $row["TITLE"];
                    $bodytext = $row["CONTENT"];
                    $postid = $row["ID"];
                    include("post.php");
                }
            } else if(strcmp($pvbcontent, "Complaints") == 0) {
                if(strcmp($pvbregion, "Everywhere") == 0) {
                    $sqlQuery = "SELECT * FROM complaints WHERE (USERNAME=\"".$_GET["user"]."\") ORDER BY complaints.date DESC LIMIT 10"; 
                } else {
                    $sqlQuery = "SELECT * FROM complaints WHERE region LIKE \"".$pvbregion."\" AND (USERNAME=\"".$_GET["user"]."\")  ORDER BY complaints.date DESC LIMIT 10";
                }
                
                $results = mysqli_query($conn, $sqlQuery);
                while($row = mysqli_fetch_array($results)) {
                    $usertext = $row["USERNAME"];
                    $titletext = $row["TITLE"];
                    $bodytext = $row["CONTENT"];
                    include("complaint.php");
                }
            }

          ?>
        </div>
      </div>
    </div>
  </body>
</html>