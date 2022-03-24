<?php
    class Comments extends DatabaseSet{

        protected function setCommentDatabase($username, $date, $comment){
            
            $statement = $this->connectComment()->prepare('INSERT INTO comments (users_name, date, comment) VALUES (?, ?, ?)'); // Duomenų įrašymo forma

            if($statement->execute(array($username, $date, $comment)) == false ){
                $statement = NULL;
                header("location: ../index.php?error=statementfailedsetcomment");
                exit();
            }
            $statement = NULL;
        }

    }

?>