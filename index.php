<?php
    session_start();
    date_default_timezone_set("Europe/Vilnius");
?>

<!DOCTYPE html>
<html>
    <head>

        <meta charset = "UTF-8">
        <title>OOP Projektas</title>
        <link href = "https://fonts.googleapis.com/css2?family=Lato&display=swap" rel = "stylesheet">

    </head>

    <body style = "text-align: center; font-family: 'Lato', sans-serif">


        <?php 
            if(isset($_SESSION["userid"]))
            {
            // PRISIJUNGUS
            setcookie("User", "CookieName", time() + 86400);
            // Komentarams generuoti
            try {
                $username = "root";
                $password = "";
                $database = new PDO("mysql:host=localhost;dbname=oopprojektas", $username, $password); // PDO
            }
            catch (PDOException $e){
                echo "Klaida! " . $e->getMessage() . "<br>";
                die();
            }
        ?>

        <a style = "font-size:20px" href = "includes/logout.php">ATSIJUNGTI</a>
        <h1>Prisijungęs vartotojas: <?php echo $_SESSION["username"]; ?> </h1>
        <br>

        <h1>Pakeisti slaptažodį</h1>
        <form action = "includes/updatepassword.php" method = "POST">
            <input type = "hidden" name = "currentpassword" value = "<?php echo $_SESSION["password"] ?>">
            <input type = "hidden" name = "username" value = "<?php echo $_SESSION["username"] ?>">
            <input type = "password" name = "password" placeholder = "Slaptažodis">
            <br><br>
            <input type = "password" name = "newpassword" placeholder = "Naujas slaptažodis">
            <br><br>
            <button style = "cursor: pointer" type = "submitpassword" name = "submitpassword">Keisti slaptažodį</button>
        </form>
        <br>
            
        <h1>Komentarai</h1>
        <?php

            $sql = "SELECT * FROM comments";
            $statement = $database->query($sql);
            foreach($statement as $stat){
        ?>
                <br>
                <div style = "width:600px; height:120px; margin: auto; border: 1px solid; padding: 10px; white-space: nowrap; overflow:hidden; text-overflow: ellipsis; position: relative">
                <?php
                echo $stat["date"];
                echo "<br>"; 
                echo $stat["comment"];
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo $stat["users_name"];

                if($_SESSION["username"] == $stat["users_name"])
                {
                    
            echo"   <form action = 'includes/deletecomment.php' method = 'POST'>
                        <input type = 'hidden' name = 'commentid' value = '".$stat['comment_id']."'>
                        <input type = 'hidden' name = 'username' value = '".$stat['users_name']."'>
                        <input type = 'hidden' name = 'date' value = '".$stat['date']."'>
                        <input type = 'hidden' name = 'comment' value = '".$stat['comment']."'>
                        <button style = 'cursor: pointer; position: absolute; top:0px; right: 0px' type = 'submitDelete' name = 'submitDelete'>Ištrinti</button>
                    </form>";
                    
                }
                ?>
                </div>
                <br>

                <?php
            }
            
        ?>
        <h1>Komentuoti</h1>
        <form action = "includes/comments.php" method = "POST">
            <textarea style = "width:400px; height:80px; resize:none;" name = "comment"></textarea>
            <br>
            <button style = "cursor: pointer" type = "submitComment" name = "submitComment">Komentuoti</button>
        </form>

        <?php
            }
            else
            {
            // NEPRISIJUNGUS
            setcookie("User", "CookieName", time() - 86400);
        ?>

        <h1>Prisijungti</h1>
        <form action = "includes/login.php" method = "POST">
            <input type = "text" name = "username" placeholder = "Slapyvardis">
            <br><br>
            <input type = "password" name = "password" placeholder = "Slaptažodis">
            <br><br>
            <button style = "cursor: pointer" type = "submit" name = "submit">Prisijungti</button>
        </form>


        <h1>Užsiregistruoti</h1>
        <form action = "includes/register.php" method = "POST">
            <input type = "text" name = "username" placeholder = "Slapyvardis">
            <br><br>
            <input type = "password" name = "password" placeholder = "Slaptažodis">
            <br><br>
            <input type = "text" name = "email" placeholder = "E-Mail">
            <br><br>
            <button style = "cursor: pointer" type = "submit" name = "submit">Užsiregistruoti</button>
        </form>

        <h1>Slaptažodžių generavimas</h1>
        <p style = "font-size: 14px">Eiliškumas: <br> Slaptažodžio ilgis, slaptažodžio generavimo kartai, didžiųjų raidžių simbolių kiekis, mažųjų raidžių simbolių kiekis, kitokie simboliai, numeriai.</p>
        <form action = "includes/password.php" method = "POST">
            <input type = "text" name = "length" placeholder = "Ilgis">
            <br><br>
            <input type = "text" name = "times" placeholder = "Kartai">
            <br><br>
            <input type = "text" name = "upper" placeholder = "ABCD">
            <br><br>
            <input type = "text" name = "down" placeholder = "abcd">
            <br><br>
            <input type = "text" name = "symbol" placeholder = "!@#$">
            <br><br>
            <input type = "text" name = "number" placeholder = "0123">
            <br><br>
            <button style = "cursor: pointer" type = "submit" name = "submit">Generuoti</button>
        </form>

        <?php
            }
        ?>
        


    </body>
</html>