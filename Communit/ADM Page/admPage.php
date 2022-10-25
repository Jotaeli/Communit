<?php
    require('connection.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Você não está conectado. <a href=\"loginAdm.php\">Conecte-se aqui!</a>");
    }

    $sqlCode = "SELECT * FROM companies";
    $sqlQuery = $mysqli->query($sqlCode) or die("Erro com SQL" . $mysqli->error);

    $allcompanies = $sqlQuery->fetch_all();

    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admp.css">
    <title>
        Main Page ADM
    </title>
</head>
<body>
    <main>
        <header>
            <div id="navbar">
                <a href="index.html">
                    <img id="logo" src="../Landing Page/comunitlogo.png" alt="communit">
                </a>
                <img id="burguer" src="burguer.svg">
            </div>
        </header>
        <section>
            <div id="adcemp">
                <h2 id="adctitle">
                    Adicionar uma empresa
                </h2>
                   <a href="register.php"><img id="adcimg" src="mais.svg" alt="img do mais"></a>
            </div>
        </section>
        <section>
            <?php
                foreach($allcompanies as $key => $companie)
                {
                    echo "
                    <div>
                        <h3>
                        <img src=\"   \" alt=\" logo aleatória \">
                        " . $companie['1'] . "
                        <h3>
                        <a href='editCompanie.php?id=". $companie['0'] ."'>
                        <img src='#' alt='img do lápis'>
                        </a>
                        <table>
                            <tr>
                                <th>
                                    Área de Atuação:
                                </th>
                                <td>
                                ".$companie['3']."
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    CNPJ:
                                </th>
                                <td>
                                    ".$companie['2']."
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Localização: 
                                </th>
                                <td>
                                    ".$companie['4']."
                                </td>
                            </tr>
                        </table>
                        <hr>
                    </div>";
                }
            ?>
        </section>
        <footer>
        </footer>
    </main>
</body>
</html>