<?php

include("connect.php");

try {

	$response = "";

	$stmt = $pdo->prepare("SELECT name, message, time FROM $messages_public ORDER BY id_message DESC LIMIT 10");
	$stmt->execute();
	
	while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

		$response = $row->name . ' : ' . $row->message . ' | ' . $row->time . '<br>' . $response;

	}

	$pdo = null;

	echo $response;
	
} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}
?>