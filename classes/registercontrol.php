<?php
    class RegisterControl extends Register{

        private $username;
        private $password;
        private $email;

        public function __construct($username, $password, $email){
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
        }

        public function registerUser(){
            if($this->emptyInput() == false){ // Kažkuriam lauke neįrašyta reikalinga informacija
                header("location: ../index.php?error=emptyinput");
                exit();
            }

            if($this->invalidEmail() == false){ // Netinkamas E-Mail adresas
                header("location: ../index.php?error=invalidemail");
                exit();
            }

            if($this->userTaken() == false){ // E-Mail ar slapyvardis užimtas
                header("location: ../index.php?error=usernameoremailtaken");
                exit();
            }

            $this->setUserDatabase($this->username, $this->password, $this->email);

        }

        private function emptyInput(){ // Neįrašytas kuris nors laukas
            $valid;
            if($this->username == NULL || $this->password == NULL || $this->email == NULL) $valid = false;
            else $valid = true;

            return $valid;
        }

        private function invalidEmail(){ // Netinkamas E-Mail adresas
            $valid;
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL) == false) $valid = false;
            else $valid = true;

            return $valid;
        }

        private function userTaken(){ // Slapyvardis arba E-Mail užimtas kito vartotojo
            $valid;
            if($this->checkUser($this->username, $this->email) == false) $valid = false;
            else $valid = true;

            return $valid;
        }

    }
?>