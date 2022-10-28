<?php
    $user = "root";
    $pass = "";
    $host = "localhost";
    $database = "communit";

    $mysqli = new mysqli($host, $user, $pass, $database);

    if($mysqli->connect_error)
    {
        die("Falha na conexão" . $mysqli->connect_error);
    }
?>