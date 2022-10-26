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
    <link rel="stylesheet" href="sc.css">
</head>
<body>
    
    <main>
        <header>
            <div id="navbar">
                <a href="../Landing Page/deflp.html">
                    <img id="logo" src="../logonav.png" alt="communitIcon">
                </a>
                <img src="../ADM Page/burguer.svg">
            </div>
        </header>
        <section>
            <h1>Setores online</h1>
            <div id="cards">
                <div id="card">
                    <img id="logoemp" src="logotb.png">
                    <p id="nameemp">Nomeemp</p>
                    <button id="buttemp" >Conversar</button>
                </div>
            </div>
            
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
        </footer>
    </main>
</body>
</html>