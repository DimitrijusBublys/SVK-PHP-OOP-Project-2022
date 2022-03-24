<?php

    class DeleteComment extends DatabaseSet{

        private $commentID;


        public function __construct($commentID){
            $this->commentID = $commentID;
        }

        public function deleteCommentDatabase($commentID){

            $sql = "DELETE FROM comments WHERE comment_id=$commentID";
            $statement = $this->connectComment()->prepare($sql); // Duomenų trinimo forma
            

            if($statement->execute(array($commentID)) == false ){
                $statement = NULL;
                header("location: ../index.php?error=statementfaildeletecomment");
                exit();
            }
            $statement = NULL;
        }

    }

?>