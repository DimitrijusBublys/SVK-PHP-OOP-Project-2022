<?php
    if(isset($_POST["submitpassword"])){ // Formos(<form>) laukelių duomenys
        $currentPassword = $_POST["currentpassword"];
        $password = $_POST["password"];
        $newPassword = $_POST["newpassword"];
        $username = $_POST["username"];
    }

    // Includes

    include("../classes/databaseset.php");
    include("../classes/updatepasswordclass.php");
    include("../classes/updatepasswordcontrol.php");

    // Register

    $update = new UpdateControl($currentPassword, $password, $newPassword, $username);
    $update->updatePassword();

    // Front page redirect

    header("location: ../index.php?success");

?>