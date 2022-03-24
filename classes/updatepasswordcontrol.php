<?php

    class UpdateControl extends Update{
        
        private $currentPassword;
        private $password;
        private $newPassword;
        private $username;

        public function __construct($currentPassword, $password, $newPassword, $username){
            $this->currentPassword = $currentPassword;
            $this->password = $password;
            $this->newPassword = $newPassword;
            $this->username = $username;
        }

        public function updatePassword(){
            if($this->emptyInput() == false){ // Kažkuriam lauke neįrašyta reikalinga informacija
                header("location: ../index.php?error=emptyinput");
                exit();
            }

            if($this->wrongPassword() == false){
                header("location: ../index.php?error=wrongpassword");
                exit();
            }

            if($this->samePassword() == false){
                header("location: ../index.php?error=samepassword");
                exit();
            }

            $this->updatePasswordDatabase($this->newPassword, $this->username);

        }

        private function emptyInput(){ // Neįrašytas kuris nors laukas
            $valid;
            if($this->password == NULL || $this->newPassword == NULL) $valid = false;
            else $valid = true;

            return $valid;
        }

        private function wrongPassword(){
            $valid;
            if(password_verify($this->password, $this->currentPassword) == false) $valid = false;
            else $valid = true;

            return $valid;
        }

        private function samePassword(){
            $valid;
            if(password_verify($this->newPassword, $this->currentPassword) == true) $valid = false;
            else $valid = true;

            return $valid;
        }

    }
?>