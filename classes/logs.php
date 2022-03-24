<?php

    class Logs extends DatabaseSet{
        function log($success, $username){
            $date = date("Y-m-d H:i:s");
            $ip = $_SERVER['REMOTE_ADDR'];
            echo $success;
            echo "<br>";
            echo $ip;
            echo "<br>";
            echo $date;
            echo "<br>";
            echo $username;

            $statement = $this->keepLogs()->prepare('INSERT INTO log (users_name, success_login, date, ip) VALUES (?, ?, ?, ?)'); // Duomenų įrašymo forma

            if($statement->execute(array($username, $success, $date, $ip)) == false ){
                $statement = NULL;
                header("location: ../index.php?error=statementfailedsetlogs");
                exit();
            }
            $statement = NULL;

        }
    }
    

?>