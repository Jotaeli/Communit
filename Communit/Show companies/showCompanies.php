<?php
    require('connection.php');
    include('functions.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['companie']))
    {
        die("Acesso negado! <a href=\"loginCompanies.php\">Conecte-se aqui!<a>");
    }

    $sqlQuery = "SELECT companieName, linkImage FROM companies";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <main>
        <header>
            <a href="index.html">
                <img src="../img/logocomunit.png" alt="communitIcon">
            </a>
            <nav>
                <ul>
                    <li>
                        <a href="#">
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            Desconectar-se
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <section>
            <?php
                foreach($allCompanies as $info)
                {
                    $name = $info["companieName"];
                    $link = $info["linkImage"];

                    interprises($name, $link);
                }
            ?>
        </section>
        <footer>
                <p>
                    Direitos reservados
                </p>
        </footer>
    </main>
</body>
</html>