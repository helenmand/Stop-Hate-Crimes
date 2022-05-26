<?php
    setcookie("user", null, time()-3600);
    setcookie("user_category", null, time()-3600);
    header("Location:./index.php");
?>