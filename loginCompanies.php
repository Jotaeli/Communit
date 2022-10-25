<?php
    require('connection.php');
    include('functions.php');

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['companie']))
    {
        header("Location: showCompanies.php");
    }
    if(isset($_POST['code']))
    {
        if(strlen($_POST['code'] == 0 || strlen($_POST['code'] == "")))
        {
            echo "Preencha o código";
        }
        else
        {
            $code = $_POST['code'];
            
            $sqlCode = "SELECT code FROM companies WHERE code = '$code'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do SQL!" . $mysqli->error);
        
            $quantity = $sqlQuery->num_rows;
        
            if($quantity == 1)
            {
                $allCodes = $sqlQuery->fetch_assoc();
        
                if(!isset($_SESSION))
                {
                    session_start();
                }
        
                $_SESSION['companie'] = $allCodes['code'];
                
                
                header('Location: showCompanies.php');
            }
            else
            {
                echo "Falha ao conectar-se! Código inválido";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>
        Login das empresas
    </title>
</head>
<body>
    <main>
        <header>
            <img src="#" alt="communit">
        </header>
        <section>
            <form action="" method="post" class="container">
                <div>
                    <label for="code">
                        Código
                    </label>
                    <input type="text" name="code" id="code" required>
                </div>
                <div>
                    <button type="submit">
                        Conecte-se                    
                    </button><br>
                    <p>
                        É um usúario administrador?<a href="loginAdm.php">Acesse aqui!</a>
                    </p>
                </div>
            </form>
        </section>
    </main>
</body>
</html>