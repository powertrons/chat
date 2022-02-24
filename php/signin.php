<?php

session_start();

include("connect.php");

try {

	$response = "";

	if (isset($_POST["name"]) AND isset($_POST["username"]) AND isset($_POST["email"]) AND isset($_POST["password"])) {
		if ($_POST["name"] != NULL AND $_POST["username"] != NULL AND $_POST["email"] != NULL AND $_POST["password"] != NULL) {

			$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
			$username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
            $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
			$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

			$stmt = $pdo->prepare("SELECT email FROM $users WHERE email=:email;");
			$stmt->bindValue(":email",$email);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {

					$response = "Já há uma conta com este email";

			} else {

				$stmt = $pdo->prepare("SELECT username FROM $users WHERE username=:username;");
				$stmt->bindValue(":username",$username);
				$stmt->execute();
	
				if ($stmt->rowCount() > 0) {
	
						$response = "Este nome de usuário não está disponível";
	
				} else {
	
					$stmt = $pdo->prepare("INSERT INTO $users (name, username, email, password) VALUES (:name, :username, :email, :password);");
			
					$options = [
						"cost"=> 10
					];
					$password = password_hash($password, PASSWORD_BCRYPT, $options);
		
					$stmt->bindValue(":name",$name);
					$stmt->bindValue(":username",$username);
					$stmt->bindValue(":email",$email);
					$stmt->bindValue(":password",$password);
					$stmt->execute();
		
					$pdo = null;

					$_SESSION["username"] = $username;
					$_SESSION["email"] = $email;
					$_SESSION["password"] = $password;
					$response = "signin";
	
				}
			}
			
		}
	}

	echo $response;

} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}

?>