<?php
    require_once('connection.php');
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado! <a href=\"admLogin.php\">Conecte-se aqui!</a>");
    }
    if($_GET['id'] != "" && $_GET['id'] != 0)
    {
        $sqlCode = "SELECT * FROM companies WHERE id = '{$_GET['id']}'";
        $sqlQuery = $mysqli->query($sqlCode) or die("Ocorreu um erro com o SQL" . $mysqli->error);

        $selectCompanie = $sqlQuery->fetch_array();

        die();
        if ($button == "submit")
        {
            $sqlCode = "UPDATE companies SET companieName = '{$_POST['name']}', cnpj = '{$_POST['cnpj']}', 
            atuationArea = '{$_POST['atuationArea']}', localization = '{$_POST['localization']}', linkImage = {$_POST['linkImage']} 
            WHERE id = '{$_GET['id']}'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
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
    <title>Edição de Empresas</title>
</head>
<body>
    <main>
        <section>
            <form action="" method="post">
                <label for="name">
                    Nome
                </label>
                <input type="text" name="name" id="name" value="<?= $selectCompanie['companieName']; ?>"><br>
                <label for="cnpj">
                    CNPJ
                </label>
                <input type="text" name="cnpj" id="cnpj" value="<?= $selectCompanie['cnpj']; ?>"><br>
                <label for="atuationArea">
                    Área de atuação
                </label>
                <input type="text" name="atuationArea" id="atuationArea" value="<?= $selectCompanie['atuationArea']; ?>"><br>
                <label for="localization">
                    Localização
                </label>
                <input type="text" name="localization" id="localization" value="<?= $selectCompanie['localization']; ?>"><br>
                <label for="linkImage">
                    Logo da empresa
                </label>
                <input type="text" name="linkImage" id="linkImage" value="<?= $selectCompanie['linkImage']; ?>"><br>
                <button type="submit" name="submit" value="submit">
                    Editar
                </button>
                </section>
            </form>
    </main>
</body>
</html>