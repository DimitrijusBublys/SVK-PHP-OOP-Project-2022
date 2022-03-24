<?php

    if(isset($_POST["submit"])){ // Formos(<form>) laukelių duomenys
        $username = $_POST["username"];
        $password = $_POST["password"];
    }

    // Includes

    include("../classes/databaseset.php");
    include("../classes/loginclass.php");
    include("../classes/logincontrol.php");

    // Register

    $login = new LoginControl($username, $password);
    $login->loginUser();

    // Front page redirect

    header("location: ../index.php?success");

?>