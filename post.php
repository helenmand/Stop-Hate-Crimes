<?php 
echo
"<div class=\"post\">
    <div class=\"postUser\">
        <a class=\"postUserLink\" href=\"profilepage.php?user=".$usertext."\">
            ".$usertext."
        </a>
    </div>
    <div class=\"postTitle\">
        <a>".$titletext."</a>
    </div>
    <div class=\"postBody\">
        <a>
            ".$bodytext."
        </a>
    </div>
    <div class=\"postButtons\">
        <button class=\"postReplyButton bn1\">
            Reply
        </button>
        <button class=\"postViewCommentsButton bn1\" onclick=\"openPost(".$postid.");\">
            View Comments
        </button>
    </div>
</div>";

?>