<?php

    class PasswordGenerator{

        private $generatedPassword;

        private $charUpper = array("Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P", "A", "S", "D", "F", "G", "H", "J", "K", "L", "Z", "X", "C", "V", "B", "N", "M"); // 26 reikšmės
        private $charDown = array("q", "w", "e", "r", "t", "y", "u", "i", "o", "p", "a", "s", "d", "f", "g", "h", "j", "k", "l", "z", "x", "c", "v", "b", "n", "m"); // 26 reikšmės
        private $charNumbers = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"); // 10 reikšmių
        private $charSymbols = array("`", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+", "|", "[", "]", "{", "}", "'", "/", "?"); // 24 reikšmės

        public function passwords($length, $times, $upperTimes = NULL, $downTimes = NULL, $symbolTimes = NULL, $numberTimes = NULL){

            $length = $this->length;
            $times = $this->times;

            ?>

            <a style = "font-size:20px" href = "../index.php">ATGAL</a>
            <br>
            <br>

            <?php

            for ($i = 0; $i < $times; $i++){ // Ciklas slaptažodžių generavimui

                $upperTimes = $this->upperTimes;
                $downTimes = $this->downTimes;
                $numberTimes = $this->numberTimes;
                $symbolTimes = $this->symbolTimes;


                $charUpper = $this->charUpper;
                $charDown= $this->charDown;
                $charSymbols = $this->charSymbols;
                $charNumbers = $this->charNumbers;

                $generatedPassword = NULL; // Nustatome po kiekvieno ciklo apsisukimo.

                for($j = 0; $j < $length; $j++){ // Ciklas vieno slaptažodžio generavimui

                    $whichFunction = NULL;
                    $whichFunction = rand(1, 4); // Kuris simbolis paskiriamas
        
                    if ($whichFunction == 1 && $upperTimes > 0) { // charUpper
                        $generatedPassword .= $charUpper[rand(0, 25)]; 
                        $upperTimes--;
                    }
                    else if($whichFunction == 1 && $upperTimes == 0) $j--; 
                    // Jeigu atsitiktinis numeris pasirinktas šis, tačiau nebėra kartų, kai galime generuoti šį simbolį, prasukame ciklą, tačiau ilgis lieka tas pats.

                    if ($whichFunction == 2 && $downTimes > 0){ // charDown
                        $generatedPassword .= $charDown[rand(0, 25)];
                        $downTimes--;
                    }
                    else if ($whichFunction == 2 && $downTimes <= 0) $j--;
        
                    if ($whichFunction == 3 && $numberTimes > 0){ // charNumbers
                        $generatedPassword .= $charNumbers[rand(0, 9)];
                        $numberTimes--;
                    }
                    else if ($whichFunction == 3 && $numberTimes <= 0) $j--;
        
                    if ($whichFunction == 4 && $symbolTimes > 0){ // charSymbols
                        $generatedPassword .= $charSymbols[rand(0, 23)];
                        $symbolTimes--;
                    }
                    else if ($whichFunction == 4 && $symbolTimes <= 0) $j--;
        
                }
                ?>
                <body style = "text-align: center; font-family: 'Lato', sans-serif">
                <?php echo $generatedPassword . "<br>"; ?> <!-- Išvedimas -->
                </body>
                <?php
            }
        }
    }

?>