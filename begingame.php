<?php
     session_start();
     $_SESSION["Random"] = rand(1,100);

     $_SESSION["GuessCount"] = 0;

   
?>

<!DOCTYPE html>

	<html lang="en">
     <head>
         <title> Welcome!</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     </head>
		<body>
			
			<!-- Change the user to the username -->
			<div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1> Welcome <?php echo $_SESSION["Username"] ?>!</h1>

                        <p>Click the Start Game button below to start the game!</p>

                        <form action="guessinggame.php" method="POST">
                            <input type="submit" value="Start Game">
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



            <?php

            $servername = "sql204.epizy.com";
            $username   = "epiz_30809349";
            $password   = "0khldFoMvYk22";
            $dbname     = "epiz_30809349_guessinggame";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error){
                header('Location: guessinggamelogin.php');
                die("Connection error");
            }

            $sql = "SELECT * FROM `games` ORDER BY game_id DESC LIMIT 1";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $row = mysqli_fetch_assoc($result);

                $_SESSION["GameID"] = ($row['game_id'] + 1);

            }

            $conn->close();
            ?>
			
		</body>
	</html>