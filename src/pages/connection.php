<?php
  $user = "root";
  $password = "";
  $database = "projeto_tb";
  $host = "localhost";

  $mysqli = new mysqli($host, $user, $password, $database);

  if($mysqli->error)
  {
    die();
  }
?>