
<?php

		session_start();
		
		$servername = "sql204.epizy.com";
		$username   = "epiz_30809349";
		$password   = "0khldFoMvYk22";
		$dbname     = "epiz_30809349_guessinggame";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error){
			header('Location: guessinggamelogin.php');
			
			die("Connection error");
		} 
		
		$username = $_POST["UsernameInput"];
		
		if (!checkUserNameExists($conn, $username)){
			
			$password = $_POST["PasswordInput"];

			$salt = rand(1, 10000);
			$hashedPassword = hash('sha256', $password . $salt);
			$sql = "INSERT INTO user_accounts (account_name, account_password, pass_salt) VALUES ('" . $username . "', '" . $hashedPassword . "', '" . $salt . "')";

			
			if ($conn->query($sql) === TRUE){
				$_SESSION["Username"] = $username;
				$conn->close();
				header('Location: begingame.php');

			} else {
				$conn->close();
				header('Location: createaccount.php');
			}
		}
		
		//Checks if a username already exists in the database, if it does, return true;
		function checkUsernameExists($conn, $username){
			$sql = "SELECT " . $username . " FROM user_accounts WHERE account_name = " . $username;
			
			$result = $conn->query($sql);
			
			return ($result->num_rows > 0) ? true : false;
			
			
		}


?>

