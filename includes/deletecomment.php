<?php
    session_start();
    if(isset($_POST["submitDelete"])){ // Formos(<form>) laukelių duomenys
        $commentID = $_POST["commentid"];
    }

    // Includes
    
    include("../classes/databaseset.php");
    include("../classes/deletecommentclass.php");

    // Comment

    $delete = new DeleteComment($commentID);
    $delete->deleteCommentDatabase($commentID);
    

    // Redirect

    header("location: ../index.php?success");
?>