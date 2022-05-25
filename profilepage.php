<html>
    <head>
      <title>Stop Hate Crimes</title>
        <link rel="stylesheet" href="profilepage.css"><link>
        <script src="./importPost.js"></script>
        <script>importRandomPosts(3)</script>
        <link rel="stylesheet" href="./post.css">
        <link rel="stylesheet" href="./post-navigation-bar.css">
      </div>
    
    </head>
    <body>
      <div>
            <?php include "header.php";?>
      </div>
      <div class="profile">
        <div id="profile-upper">
          <div id="profile-banner-image">
            <img src="https://wallpapercave.com/wp/wp7671629.png" alt="Banner image">
          </div>
          <div id="profile-i">
            <div id="profile-pic">
              <img src="https://st.depositphotos.com/1779253/5140/v/600/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg" als="Profile Picture">
            </div>
            <div class="container">
              <div id="username">Demo User</div>
              <a href="account-settings.php">
                <button class="btn">
                  <img src="https://s1.qwant.com/thumbr/0x380/9/e/b0c07453e395b4a1641f0f1c298c27d8f816ab94091223ab1c4ae13d0f43a3/setting.png?u=https%3A%2F%2Ffiles.softicons.com%2Fdownload%2Ftoolbar-icons%2Fmono-general-icons-2-by-custom-icon-design%2Fpng%2F512x512%2Fsetting.png&q=0&b=1&p=0&a=0">
                </button>
              </a>
            </div> 
          </div>
        </div>

        <div id="profile-post">
          <div class="postL" id="postList">
            <div class="myposts">
              <h2>My Posts</h2>
            </div>
            <div class="PVB">
                <?php include "post-navigation-bar.php"?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>