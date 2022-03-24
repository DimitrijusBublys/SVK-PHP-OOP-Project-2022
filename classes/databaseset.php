<?php

    class DatabaseSet{

        protected function connectRegister(){
            try {
                $username = "root";
                $password = "";
                $database = new PDO("mysql:host=localhost;dbname=oopprojektas", $username, $password);
                return $database;
            }
            catch (PDOException $e){
                echo "Klaida! " . $e->getMessage() . "<br>";
                die();
            }
        }

        protected function connectComment(){
            try {
                $username = "root";
                $password = "";
                $database = new PDO("mysql:host=localhost;dbname=oopprojektas", $username, $date, $comment);
                return $database;
            }
            catch (PDOException $e){
                echo "Klaida! " . "<br>" . $e->getMessage();
                die();
            }
        }

        protected function connectDelete($commentID){
            try {
                $username = "root";
                $password = "";
                $database = new PDO("mysql:host=localhost;dbname=oopprojektas", $commentID);
                return $database;
            }
            catch (PDOException $e){
                echo "Klaida! " . "<br>" . $e->getMessage();
                die();
            }
        }

        protected function keepLogs(){
            try {
                $username = "root";
                $password = "";
                $database = new PDO("mysql:host=localhost;dbname=oopprojektas", $username);
                return $database;
            }
            catch (PDOException $e){
                echo "Klaida! " . "<br>" . $e->getMessage();
                die();
            }
        }

    }

?>