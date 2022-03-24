<?php

    class LoginControl extends Login{
        

        private $username;
        private $password;

        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
        }

        public function loginUser(){
            if($this->emptyInput() == false){ // Kažkuriam lauke neįrašyta reikalinga informacija
                header("location: ../index.php?error=emptyinput");
                exit();
            }

            $this->getUserDatabase($this->username, $this->password);

        }

        private function emptyInput(){ // Neįrašytas kuris nors laukas
            $valid;
            if($this->username == NULL) $valid = false;
            else $valid = true;

            return $valid;
        }

    }
?>