<?php
    session_start();
    if(isset($_POST["submitComment"])){ // Formos(<form>) laukelių duomenys
        $username = $_SESSION["username"];
        $date = date("Y-m-d H:i:s");
        $comment = $_POST["comment"];
    }

    // Includes
    
    include("../classes/databaseset.php");
    include("../classes/commentclass.php");
    include("../classes/commentcontrol.php");

    // Comment

    $comment = new CommentControl($username, $date, $comment);
    $comment->setComment();

    // Redirect

    header("location: ../index.php?success");
?>