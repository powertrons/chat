<?php
    if ($_SESSION ?? NULL) {
        echo $_SESSION["username"];
    } else {
        echo "Anônimo";
    }
?>