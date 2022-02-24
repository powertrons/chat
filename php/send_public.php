<?php

session_start();

include("connect.php");

try {

	if (isset($_POST["message"])) {
		if ($_POST["message"] != NULL) {

			if ($_SESSION ?? NULL) {
				
				$name = $_SESSION["username"];

			} else {

				$name = "Anônimo";

			}

			$message = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");

			$stmt = $pdo->prepare("INSERT INTO $messages_public (name, message) VALUES (:name, :message);");
			$stmt->bindValue(":name",$name);
			$stmt->bindValue(":message",$message);
			$stmt->execute();

			$pdo = null;

		}
	}
	
} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}
?>