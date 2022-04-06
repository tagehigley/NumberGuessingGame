<?php 

   session_start();
   
?>


<!DOCTYPE html>
 <html lang="en">
<head>
    <title>Guessing Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>

        h3 {
            text-align: center;
        }

    </style>
</head>

  <body>

  
  <div class="container">
      <div class="row">
          <div class="col-12 text-center">
               <h1>Guess a number between 1-100!</h1>
               <br>

                   <form action="" method="post">

                         <p>Guess: <input type="text" name="PlayerGuess" id="playerGuess" /></p>
                         <br>

                         <input type="submit" value="Submit" name="SubmitBtn" id="submitbtn" />
                         <br>

                   </form>

              <a href="begingame.php">Restart game</a>
          </div>
      </div>
  </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


      <?php

     //Updates the database game entry when the game is done
     function UpdateDatabase(){
         $servername = "sql204.epizy.com";
         $username   = "epiz_30809349";
         $password   = "0khldFoMvYk22";
         $dbname     = "epiz_30809349_guessinggame";

         $conn = new mysqli($servername, $username, $password, $dbname);

         if ($conn->connect_error){
             header('Location: guessinggamelogin.php');
             die("Connection error");
         }

         //$sql = "UPDATE games SET game_score = " . $_SESSION["GuessCount"] . " WHERE game_id = " . $_SESSION["GameID"];
         $sql = "INSERT INTO games (username, game_score) VALUES ('" . $_SESSION["Username"] . "', '" . $_SESSION["GuessCount"] . "')";
         $conn->query($sql);
         $conn->close();

         return true;
     }

   
     //Compares the two entered numbers together and returns if the value is too high, too low, or correct
     function CompareNumbers($random, $playerGuess){
		 
		 if ($random > $playerGuess) {
			 echo "<h3>Guess is too low!</h3>";
		 } else if ($random < $playerGuess){
			 echo "<h3>Guess is too high!</h3>";
		 } else if ($random == $playerGuess){
             if (UpdateDatabase()){
                 header('Location: winscreen.php');
             }
		 }
	 } 
	 
	 // Checks the users input and determines if the users input is valid or not
	 //Boolean return
	 function ValidateInput($playerGuess){
			 
			if(is_numeric($playerGuess) && ($playerGuess >= 1) && ($playerGuess <= 100)) {
				return true;
			} else {
				echo "You must enter a valid integer between 1 - 100!";
				return false;
		 }
		 
	 }

	 $random = $_SESSION["Random"];
	 
	 $playerGuess = $_POST["PlayerGuess"];

	 if ($playerGuess){
		if (ValidateInput($playerGuess)) {
			$_SESSION["GuessCount"]++;
			CompareNumbers($random, $playerGuess);

		}
     } 


   ?>
   
   
  </div>
   
 </body>
</html>