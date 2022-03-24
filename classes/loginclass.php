<?php
    include("../classes/logs.php");
    class Login extends DatabaseSet{

        protected function getUserDatabase($username, $password){
            $statement = $this->connectRegister()->prepare('SELECT users_password FROM users WHERE users_name = ? OR users_email = ?;'); // Duomenų įrašymo forma

            if($statement->execute(array($username, $password)) == false ){
                $statement = NULL;
                header("location: ../index.php?error=statementfailedgetuser");
                exit();
            }

            if($statement->rowCount() == 0) {
                $statement = NULL;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $passwordHash = $statement->fetchAll(PDO::FETCH_ASSOC);
            $passwordCheck = password_verify($password, $passwordHash[0]["users_password"]);

            if($passwordCheck == false) {
                $statement = NULL;
                header("location: ../index.php?error=wrongpassword");
                // ------------------------------------ Logs INCORRECT PASSWORD
                $success = "false";
                $log = new Logs($success, $username);
                $log->log($success, $username);
                exit();
            }
            else if($passwordCheck == true){
                $statement = $this->connectRegister()->prepare('SELECT users_id, users_name, users_password FROM users WHERE users_name = ? OR users_email = ? AND users_password = ?;');

                if($statement->execute(array($username, $username, $password)) == false ){
                    $statement = NULL;
                    header("location: ../index.php?error=statementfailedgetuser");
                    exit();
                }

                $user = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                session_start();
                $_SESSION["userid"] = $user[0]["users_id"];
                $_SESSION["username"] = $user[0]["users_name"];
                $_SESSION["password"] = $user[0]["users_password"];
                // ------------------------------------ Logs CORRECT PASSWORD
                $success = "true";
                $log = new Logs($success, $username);
                $log->log($success, $username);
            }

            $statement = NULL;
        }
}
?>