<?php

session_start();

include("connect.php");

try {

	$response = "";

	if (isset($_POST["request"])) {
		if ($_POST["request"] != NULL) {

            if ($_SESSION ?? NULL) {

                unset($_SESSION["username"]);
                unset($_SESSION["email"]);
                unset($_SESSION["password"]);
                $response = "logout";
                
            }

        }
    }
	echo $response;

} catch(PDOException $e) {
	echo "ERROR: " . $e->getMessage();
}
?>