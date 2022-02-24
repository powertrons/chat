<?php

include("connect.php");

try {

	$result = "";

	$stmt = $pdo->prepare("SELECT name, message, time FROM $messages_private ORDER BY id_message DESC LIMIT 10");
	$stmt->execute();
	
	while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

		$result = $row->name . ' : ' . $row->message . ' | ' . $row->time . '<br>' . $result;

	}

	$pdo = null;

	echo $result;
	
} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}
?>