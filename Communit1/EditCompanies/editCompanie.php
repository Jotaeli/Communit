<?php
    require_once('../connection.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado! <a href=\"../LoginADM/loginAdm.php\">Conecte-se aqui!</a>");
    }

    
    if($_GET['id'] != "" && $_GET['id'] != 0)
    {
        $sqlCode = "SELECT * FROM users WHERE id = '{$_GET['id']}'";
        $sqlQuery = $mysqli->query($sqlCode) or die("Ocorreu um erro com o SQL" . $mysqli->error);

        $selectedCompanie = $sqlQuery->fetch_array();

        if(isset($_POST['submit']) == "submit")
        {
            if ($_POST['companieName'] != $selectedCompanie['companieName'] || 
            $_POST['cnpj'] != $selectedCompanie['cnpj'] || 
            $_POST['atuationArea'] != $selectedCompanie['atuationArea'] || 
            $_POST['localization'] != $selectedCompanie['localization'] || 
            $_POST['img'] != $selectedCompanie['img'])
            {
                $sqlCode = "UPDATE users SET companieName = '{$_POST['companieName']}', cnpj = '{$_POST['cnpj']}',
                atuationArea = '{$_POST['atuationArea']}', localization = '{$_POST['localization']}', img = '{$_POST['img']}'
                WHERE id = {$_GET['id']}";
                $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
            
                header("Refresh: 0");
            }
        }
    }
    else
    {
    echo "Empresa não cadastrada.";
    }
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="editemp.css">
    <title>Edição de Empresas</title>
</head>
<body>
    <img id="logo" src="../logonav.png">
    <main>
        <section>
            <div class="carddit">
                <h1>Edição</h1>
                <form action="" method="POST">
                    <div class="inputBox">
                        <label for="name">
                            Nome
                        </label>
                        <input type="text" name="companieName" id="companieName" value="<?= $selectedCompanie['companieName']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="cnpj">
                            CNPJ
                        </label>
                        <input type="text" name="cnpj" id="cnpj" value="<?= $selectedCompanie['cnpj']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="atuationArea">
                            Área de atuação
                        </label>
                        <input type="text" name="atuationArea" id="atuationArea" value="<?= $selectedCompanie['atuationArea']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="localization">
                            Localização
                        </label>
                        <input type="text" name="localization" id="localization" value="<?= $selectedCompanie['localization']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="img">
                            Logo da empresa
                        </label>
                        <input type="text" name="img" id="img" value="<?= $selectedCompanie['img']; ?>"><br>
                    </div>
                    <button id="edit" type="submit" name="submit" value="submit">
                        Editar
                    </button>
                </form>
            </div>   
        </section>
    </main>
</body>
</html>