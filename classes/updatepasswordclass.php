<?php
    class Update extends DatabaseSet{

        protected function updatePasswordDatabase($newPassword, $username){

            $sql = "UPDATE users SET users_password=? WHERE users_name=?"; // Duomenų įrašymo forma
            $statement = $this->connectRegister()->prepare($sql);
            
            $passwordHash = password_hash($newPassword, PASSWORD_BCRYPT); // Slaptažodžio užšifravimas duomenų bazėje

            if($statement->execute(array($passwordHash, $username)) == false){
                $statement = NULL;
                header("location: ../index.php?error=statementfailedupdatepassword");
                exit();
            }

            $statement = NULL;
        }
}
?>