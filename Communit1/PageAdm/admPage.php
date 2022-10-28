<?php
    require('../connection.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Você não está conectado. <a href=\"../LoginADM/LoginAdm.php\">Conecte-se aqui!</a>");
    }

    $sqlCode = "SELECT * FROM users";
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
                <a href="../LandingPage/index.html">
                    <img id="logo" src="../Landing Page/comunitlogo.png" alt="communit">
                </a>
                <img id="burguer" src="burguer.svg">
            </div>
            <a href="../logout.php">Logout</a>
        </header>
        <section>
            <div id="adcemp">
                <h2 id="adctitle">
                    Adicionar uma empresa
                </h2>
                   <a href="../Registro/register.php">
                    <img id="adcimg" src="mais.svg" alt="img do mais">
                </a>
            </div>
        </section>
        <section>
            <?php
                foreach($allcompanies as $key => $companie)
                {
                
                    echo "
                        <div>
                        <div id='nago'>
                            <h3>
                            <img id='logoal' src=".$companie['6']." alt=\"logo da empresa\">
                            <p id='comp1'> " . $companie['2'] . "</p>
                            <h3>
                        </div>
                        <a id='pencil' href='../EditCompanies/editCompanie.php?id=". $companie['0'] ."'>
                        <img src='editpen.png' alt='img do lápis'>
                        </a>
                        <div style='overflow-x: auto;'>
                            <table>
                                <tr>
                                    <th>
                                        Área de Atuação:
                                    </th>
                                    <td>
                                    ".$companie['4']."
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        CNPJ:
                                    </th>
                                    <td>
                                        ".$companie['3']."
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Localização: 
                                    </th>
                                    <td>
                                        ".$companie['5']."
                                    </td>
                                </tr>
                            </table>
                        </div>
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