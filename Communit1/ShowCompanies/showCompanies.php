<?php
    require('../connection.php');
    include('../functions.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['companie']))
    {
        die("Acesso negado! <a href=\"../LoginCompanies/loginCompanies.php\">Conecte-se aqui!<a>");
    }

    $sqlQuery = "SELECT companieName, img FROM users";
    $allCompanies = $mysqli->query($sqlQuery);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Empresas online
    </title>
    <link rel="stylesheet" href="sc.css">
</head>
<body>
    
    <main>
        <header>
            <div id="navbar">
                <a href="../LandingPage/index.html">
                    <img id="logo" src="../LandingPage/comunitlogo.png" alt="communitIcon">
                </a>
                <a href="../logout.php">Logout</a>
                <img src="../PageAdm/burguer.svg">
            </div>
        </header>
        <section>
            <h1>Setores online</h1>
            <div id="cards">
                <?php
                    foreach($allCompanies as $info)
                    {
                        $name = $info["companieName"];
                        $link = $info["img"];

                        interprises($name, $link);
                    }
                ?>
            </div>
        </section>
        <footer>
        </footer>
    </main>
</body>
</html>