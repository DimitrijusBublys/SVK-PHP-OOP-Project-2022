<?php

    if(isset($_POST["submit"])){ // Formos(<form>) laukelių duomenys
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
    }

    // Includes

    include("../classes/databaseset.php");
    include("../classes/registerclass.php");
    include("../classes/registercontrol.php");

    // Register

    $register = new RegisterControl($username, $password, $email);
    $register->registerUser();

    // Front page redirect

    header("location: ../index.php?success");

?>