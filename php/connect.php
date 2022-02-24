<?php

try {

	$db_hostname = "localhost";
	$db_name = "bd";
	$db_dns = "mysql:host={$db_hostname};dbname={$db_name}";
	$db_username = "root";
	$db_password = "";

	$users = "users";
	$messages_public = "messages_public";
	$messages_private = "messages_private";

	$pdo = new PDO($db_dns, $db_username, $db_password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}

?>