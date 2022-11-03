<?php
    require __DIR__ . "/config.php";
    include __DIR__ . "/functions.php";
    
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    if(!isset($_SESSION['companie']))
    {
        die("Acesso negado! <a href=\"loginCompanies.php\">Conecte-se aqui!<a>");
    }

    $sqlQuery = "SELECT id, companieName, img FROM users";
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
    <link rel="stylesheet" type="text/css" href="../css/sc.css">
</head>
<body>
    <main>
        <header>
            <div id="navbar">
                <a href="index.html">
                    <img id="logo" src="../img/comunitlogo.png" alt="communitIcon">
                </a>
            </div>
            <img src="../img/burguer.svg">
            <a href="#">
            <img src="../img/burguer.svg">
            </a>
        
            <a href="logout.php">
                Desconectar-se
            </a>
        </header>
        <section>
            <h1>
                Empresa/Setores Online
            </h1>
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
                <p>
                    Direitos reservados @Felipe e @João Lucas
                </p>
        </footer>
    </main>
</body>
</html>