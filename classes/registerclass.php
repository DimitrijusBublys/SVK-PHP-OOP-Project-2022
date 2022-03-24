<?php
    class Register extends DatabaseSet{

        protected function checkUser($username, $email){ 
            $statement = $this->connectRegister()->prepare('SELECT users_name FROM users WHERE users_name = ? OR users_email = ?;'); // Duomenų ieškojimo forma

            if($statement->execute(array($username, $email)) == false){ 
                $statement = NULL;
                header("location: ../index.php?error=statementfailedcheckuser");
                exit();
            }
            $valid;

            if($statement->rowCount() > 0) $valid = false; // Jeigu randame E-Mail ar slapyvardį
            else $valid = true;

            return $valid;

        }

        protected function setUserDatabase($username, $password, $email){
            $statement = $this->connectRegister()->prepare('INSERT INTO users (users_name, users_password, users_email, IP) VALUES (?, ?, ?, ?);'); // Duomenų įrašymo forma

            $passwordHash = password_hash($password, PASSWORD_BCRYPT); // Slaptažodžio užšifravimas duomenų bazėje
            $ip = $_SERVER['REMOTE_ADDR'];

            if($statement->execute(array($username, $passwordHash, $email, $ip)) == false ){
                $statement = NULL;
                header("location: ../index.php?error=statementfailedsetuser");
                exit();
            }
            $statement = NULL;
        }
}
?>