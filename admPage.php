<?php
    require('connection.php');
    include('verifyAdm.php');

    $sqlCode = "SELECT * FROM companies";
    $sqlQuery = $mysqli->query($sqlCode) or die("Erro com SQL" . $mysqli->error);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Adm Login
    </title>
</head>
<body>
    <main>
        <header>
        </header>
        <section>
        </section>
        <footer>
        </footer>
    </main>
</body>
</html>