
<?php

	session_start();
	
	//database information
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
	$password = $_POST["PasswordInput"];

	$sql = "SELECT * FROM user_accounts WHERE account_name = '" . $username . "'";

	$result = $conn->query($sql);

    //Checks to see if the user already exists in the database, if it doesn't the user gets sent to the account creation screen
	//If the user does exist but the password is wrong the user is sent back to the login screen
	if ($result->num_rows > 0){

		$row = mysqli_fetch_assoc($result);
		$conn->close();
		
		if (confirmPassword($password, $row)){
			 $_SESSION["Username"] = $row['account_name'];
			 $_SESSION["ID"] = $row['account_id'];
			 header('Location: begingame.php');

		} else {
			header('Location: guessinggamelogin.php');
		}
		
	} else {
		header('Location: createaccount.php');

	}
		
	//Checks if the password matches the user input password
	function confirmPassword($password, $row){

		$hashPassword = hash('sha256', $password . $row['pass_salt']);	
		
		return ($hashPassword == $row['account_password']) ? true : false;

	}


?>
