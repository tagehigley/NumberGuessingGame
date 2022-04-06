<?php
   session_start();
   
?>

<!DOCTYPE html>


<html lang="en">
<head>
    <title> Guessing Game Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                 <h1> Sign in! </h1>

                 <form action="detectuser.php" method="post">
                     <div class="row">
                         <div class="col-6 d-flex justify-content-end">
                             <p>Username:  </p>
                         </div>

                         <div class="col-6 d-flex justify-content-start">
                            <input type="text" name="UsernameInput"/>
                         </div>
                     </div>



                     <div class="row">
                         <div class="col-6 d-flex justify-content-end">
                            <p>Password: </p>
                         </div>

                         <div class="col-6 d-flex justify-content-start">
                            <input type="password" name="PasswordInput"/>
                         </div>
                     </div>

                <input style="margin-top: 5px;" type="submit" value="Submit"/>

                <p>No account? Create one <a href="createaccount.php">here!</a></p>

                 </form>
            </div>
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>