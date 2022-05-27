<?php

    if(isset($_GET["pvbregion"]) && isset($_GET["pvbcontent"])) {

    } else if (isset($_GET["pvbregion"])) {
        $sqlQuery = "SELECT * FROM (".$sqlQuery.") WHERE "
    } else if (isset($_GET["pvbcontent"])) {

    } else {

    }

?>