<?php

    class CommentControl extends Comments{

        private $username;
        private $date;
        private $comment;


        public function __construct($username, $date, $comment){
            $this->username = $username;
            $this->date = $date;
            $this->comment = $comment;
        }

        public function setComment(){
            if($this->emptyInput() == false){
                header("location: ../index.php?error=emptyinput");
                exit();
            }
            
            $this->setCommentDatabase($this->username, $this->date, $this->comment);
            
        }

        private function emptyInput(){
            $valid;
            if($this->comment == NULL) $valid = false;
            else $valid = true;

            return $valid;
        }

    }

?>