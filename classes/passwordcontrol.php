<?php

    class PasswordControl extends PasswordGenerator{

        public $length; // Slaptažodžio ilgis
        public $times; // Kiek kartų išvedamas slaptažodis

        public $upperTimes; // Kiek kartų generuojamas didžiosios raidės simbolis
        public $downTimes; // Kiek kartų generuojamas mažosios raidės simbolis
        public $numberTimes; // Kiek kartų generuojamas numeris
        public $symbolTimes; // Kiek kartų generuojamas kitoks simbolis

        public function __construct($length, $times, $upperTimes, $downTimes, $numberTimes, $symbolTimes){ // Būtina priskirti tik slaptažodžio ilgį ir kiek kartų jis generuojamas
            $this->length = $length;
            $this->times = $times;

            $this->upperTimes = $upperTimes;
            $this->downTimes = $downTimes;
            $this->symbolTimes = $symbolTimes;
            $this->numberTimes = $numberTimes;
        }

        public function generatePassword(){

            if($this->emptyInput() == false){ // Neirašyti duomenys
                header("location: ../index.php?error=emptyinput");
                exit();
            }

            if($this->isNumber() == false){ // Duomenys ne numeriai
                header("location: ../index.php?error=isnotnumber");
                exit();
            }

            if($this->isNegative() == false){ // Yra neigiamų numerių
                header("location: ../index.php?error=negativenumber");
                exit();
            }

            if($this->validLength() == false){ // Per didelis slaptazodis
                header("location: ../index.php?error=passwordtoolong");
                exit();
            }

            /*if($this->numberFloat() == false){ // Numerių reikšmės float
                header("location: ../index.php?error=numberisfloat");
                exit();
            }*/

            $this->passwords($this->length, $this->times, $this->upperTimes, $this->downTimes, $this->symbolTimes, $this->numberTimes);

        }

        private function emptyInput(){
            $valid;
            if($this->length == NULL || $this->times == NULL || $this->upperTimes == NULL ||
            $this->downTimes == NULL || $this->symbolTimes == NULL || $this->numberTimes == NULL) $valid = false;
            else $valid = true;
            
            return $valid;
        }

        private function isNumber(){
            $valid;
            if(is_numeric($this->length) == false || is_numeric($this->times) == false ||
            is_numeric($this->upperTimes) == false || is_numeric($this->downTimes) == false ||
            is_numeric($this->symbolTimes) == false || is_numeric($this->numberTimes) == false ) $valid = false;
            else $valid = true;

            return $valid;
        }

        public function isNegative(){
            $valid;
            if($this->length < 0 || $this->times < 0 || $this->upperTimes < 0 ||
            $this->downTimes < 0 || $this->symbolTimes < 0 || $this->numberTimes < 0) $valid = false;
            else $valid = true;
            
            return $valid;
        }

        private function validLength(){
            $valid;
            if($this->upperTimes + $this->downTimes + $this->symbolTimes + $this->numberTimes < $this->length) $valid = false;
            else $valid = true;

            return $valid;
        }

        /*private function numberFloat(){
            $valid;
            if(is_double($this->length) == false || is_double($this->times) == false ||
            is_double($this->upperTimes) == false || is_double($this->downTimes) == false ||
            is_double($this->symbolTimes) == false || is_double($this->numberTimes) == false) $valid = false;
            else $valid = true;

            return $valid;
        }*/

    }


?>