<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="post-navigation-bar.css">
        <script src="./post-navigation-bar.js"></script>
    </head>
    <body>
        <div class="post-header">
            <a href="/trending/" class="bn2">Trending</a>
            <div class="dropdown">
                <a class="bn2" id="regionDropdownButton">Thessaloniki</a>
                <div class="dropdown-content">
                    <a href="#" onclick="changeRegion('Thessaloniki')">Thessaloniki</a>
                    <a href="#" onclick="changeRegion('Athens')">Athens</a>
                    <a href="# "onclick="changeRegion('Larissa')">Larissa</a>
                    <a href="#" onclick="changeRegion('Serres')">Serres</a>
                </div>
            </div>
            <div class="buttons-right">
                <div class="dropdown">
                    <a class="bn2">▼</a>
                    <div class="dropdown-content">
                        <a href="#">Top</a>
                        <a href="#">Latest</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>