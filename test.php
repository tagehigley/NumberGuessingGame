<!DOCTYPE html>

  <html lang="en">

<head>
    <title>test page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        td {
            border: 1px solid black;
        }

        .id_and_scores {
            text-align: center;
        }

        .usernames {
            padding-left: 5px;
            padding-right: 10px;
        }

        tr:nth-child(odd){
            background-color: lightblue;
        }

        th {
            background-color: white;
        }


    </style>
</head>
    <body>

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

     $sql = "SELECT * FROM games ORDER BY game_score ASC LIMIT 10";
     $result = $conn->query($sql);

     if ($result->num_rows > 0){

         $count = 1;

         echo "<table style='margin-left: auto; margin-right: auto;'>";
         echo "<tr><th>No.</th><th>Username</th><th>Score</th></tr>";

         while ($row = mysqli_fetch_assoc($result)){
             echo "<tr><td class='id_and_scores'>" . $count . "</td></td><td class='usernames'>" . $row['username'] . "</td><td class='id_and_scores'>" . $row['game_score'] . "</td></tr>";
             $count++;
             if ($_SESSION["GameID"] == $row['game_id']){
             }
         }

         echo "</table>";
         $conn->close();

     }

	 ?>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
  
  </html>
   
	  