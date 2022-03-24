<?php

    session_start();
    session_unset();
    session_destroy();
    setcookie($_SESSION["username"], "", time() - 86400);
    // Front page redirect

    header("location: ../index.php?loggedout");

?>