<?php

    if(isset($_POST["submit"])){ // Formos(<form>) laukelių duomenys
        $length = $_POST["length"];
        $times = $_POST["times"];
        $upperTimes = $_POST["upper"];
        $downTimes = $_POST["down"];
        $symbolTimes = $_POST["symbol"];
        $numberTimes = $_POST["number"];
    }

    // Includes

    include("../classes/passwordgenerator.php");
    include("../classes/passwordcontrol.php");

    // Generate

    $generate = new PasswordControl($length, $times, $upperTimes, $downTimes, $symbolTimes, $numberTimes);
    $generate->generatePassword();

?>