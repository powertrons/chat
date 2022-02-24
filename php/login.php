<?php

session_start();

include("connect.php");

try {

	$response = "";

	if (isset($_POST["email"]) AND isset($_POST["password"])) {
		if ($_POST["email"] != NULL AND $_POST["password"] != NULL) {

			$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
			$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

			$stmt = $pdo->prepare("SELECT username, email, password FROM $users WHERE email=:email;");
			$stmt->bindValue(":email",$email);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {

				$row = $stmt->fetch(PDO::FETCH_OBJ);
				$hash = $row->password;
				$username = $row->username;

				if (password_verify($password, $hash)) {

					$_SESSION["username"] = $username;
					$_SESSION["email"] = $email;
					$_SESSION["password"] = $password;
					$response = "login";

				} else {

					$response = "Senha inválida";

				}
			} else {

				$response = "Email inválido";

			}
			
			$pdo = null;

		}
	}

	echo $response;

} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}
?>