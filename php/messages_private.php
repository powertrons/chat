<?php 
	session_start();
    if ($_SESSION == NULL) {
        echo "<script> window.location.href = 'index.php'; </script>";
		die();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Chat</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../js/jquery-3.6.0.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
	<body>
		<div class="title">
			<span>
				<a href="../index.php">chat</a>\<?php
					include("../parts/user.php");
				?>
			</span>
		</div>
		<div class="container">
			<div class="content">
                <?php

                    include("connect.php");

                    try {

                        $response = "";

                        $stmt = $pdo->prepare("SELECT name, message, time FROM $messages_private ORDER BY time DESC");
                        $stmt->execute();
                        
                        while($row = $stmt->fetch(PDO::FETCH_OBJ)) {

                            $response = $response . $row->name . ': ' . $row->message . ' | ' . $row->time . "<br>";
                            
                        }

                        $pdo = null;

                        echo $response;

                    } catch(PDOException $e) {
                        echo "ERROR: " . $e->getMessage();
                    }
                ?>
            </div>
        </div>
	</body>
	<script src="../js/script.js"></script>
</html>
