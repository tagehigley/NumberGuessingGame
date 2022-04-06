<?php
    session_start();


?>


<!--
Displays the win screen, user score, and the top ten scores from the database.
Also notes if the user made it into the top ten.
-->
<!DOCTYPE html>

<html lang="en">
<head>
    <title> Congradulations!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        .id_and_scores {
            text-align: center;
        }

        .usernames {
            padding-left: 5px;
            padding-right: 10px;
        }

        tr:nth-child(odd){
            background-color: #ccffff;
        }

        th {
            background-color: white;
        }
    </style>
</head>

    <body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">

    <h1>CONGRATULATIONS!</h1>
    <h2> You won the game!</h2>
    <h3> You're score is: <?php echo $_SESSION["GuessCount"]; ?></h3>

    <br>

    <a href="guessinggamelogin.php">Login screen</a>
    <br>
    <a href="begingame.php">Restart</a>

    <h3>TOP TEN SCORES</h3>

    <?php

        //Gets the top ten scores from the database
        function GetTopTen() {
            $servername = "sql204.epizy.com";
            $username = "epiz_30809349";
            $password = "0khldFoMvYk22";
            $dbname = "epiz_30809349_guessinggame";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                header('Location: guessinggamelogin.php');
                die("Connection error");
            }

            $sql = "SELECT * FROM games ORDER BY game_score ASC LIMIT 10";
            $result = $conn->query($sql);

            $inTopTen = false;

            if ($result->num_rows > 0){

                $count = 1;

                echo "<table style='margin-left: auto; margin-right: auto;'>";
                echo "<tr><th>No.</th><th>Username</th><th>Score</th></tr>";

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td class='id_and_scores'>" . $count . "</td></td><td class='usernames'>" . $row['username'] . "</td><td class='id_and_scores'>" . $row['game_score'] . "</td></tr>";
                    $count++;
                    if ($_SESSION["GameID"] == $row['game_id']){
                        $inTopTen = true;
                    }
                }

                echo "</table>";
                $conn->close();

                if ($inTopTen){
                    echo "<br>You made it in the top ten!";
                }

            }

        }

        //Here to kill the current session
        function DestroySession(){
            // remove all session variables
            session_unset();

            //Destroy the session
            session_destroy();
        }

        GetTopTen();
       // DestroySession();

    ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>



</html>
