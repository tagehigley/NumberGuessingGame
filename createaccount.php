<?php

  session_start();
  
?>


<!DOCTYPE html>

<html lang="en>
  <head">
      <title>Create an account</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>

          td {
              border: 1px solid black;
          }


      </style>

      <script>
  
  <!-- Checks for all of the fields to be filled and that the passwords match -- revisit this and improve it -->
  function checkInfo(){
	  

	  if ((document.getElementById('Password').value == document.getElementById('PasswordConfirmed').value)
		   && (document.getElementById('Password').value != "") && (document.getElementById('Username').value != "")) {
        document.getElementById('Submitbtn').disabled = false;
		
		} else {
			document.getElementById('Submitbtn').disabled = true;
        }

  }

  </script>
  
  </head>
  
  
  <body>

  <div class="container">
      <div class="row"t>
          <div class="col-12 text-center">
              <div class="row">
                 <h1> Create an account! </h1>
              </div>


              <div class="row">
                 <form action="sendnewaccount.php" method="post">
                     <div class="row">
                        <div class="col-6 d-flex justify-content-end">
                            <p>Username:  </p>
                        </div>

                        <div class="col-6 d-flex justify-content-start">
                          <input type="text" name="UsernameInput" id="Username" />
                        </div>

                     </div>

                     <div class="row">
                         <div class="col-6 d-flex justify-content-end">
                            <p>Password: </p>
                         </div>

                         <div class="col-6 d-flex justify-content-start">
                            <input type="password" name="PasswordInput" id="Password" />
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-6 d-flex justify-content-end">
                             <p>Confirm password: </p>
                         </div>

                         <div class="col-6 d-flex justify-content-start">
                            <input type="password" name="PasswordInputConfirmed" id="PasswordConfirmed" onchange=checkInfo()></p>
                         </div>
                     </div>

                   <br>
                   <input type="submit" value="Submit" id="Submitbtn" disabled="true"/>

                </form>
              </div>
          </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>