<?php
    session_start();

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado! <a href=\"admLogin.php\">Conecte-se aqui!</a>");
    }
    else
    {
        if($_GET['id'] != "" && $_GET['id'] != 0)
        {
            require_once __DIR__ . "/config.php";

            $sqlCode = "SELECT * FROM users WHERE uniqueId = '{$_GET['id']}'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Ocorreu um erro com o SQL" . $mysqli->error);

            $selectedCompanie = $sqlQuery->fetch_array();
        }
        else
        {
            echo "Empresa não cadastrada.";
        }

        if(isset($_POST['submit']) == "submit") 
        {
            if ($_POST['companieName'] != $selectedCompanie['companieName'] || 
            $_POST['cnpj'] != $selectedCompanie['cnpj'] || 
            $_POST['atuationArea'] != $selectedCompanie['atuationArea'] || 
            $_POST['localization'] != $selectedCompanie['localization'] ||
            $_FILES)
            {
                if (empty($_FILES['img']['name']))
                {
                    $sqlCode = "UPDATE users SET companieName = '{$_POST['companieName']}', cnpj = '{$_POST['cnpj']}',
                    atuationArea = '{$_POST['atuationArea']}', localization = '{$_POST['localization']}', img = '{$selectedCompanie['img']}'
                     WHERE uniqueId = {$_GET['id']}";
                    $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
                }
                else 
                {
                    $fileUpload = $_FILES['img'];
        
                    $allowedTypes = [
                        "image/png",
                        "image/jpeg",
                        "image/jpg"
                    ];
        
                    $newFileName = time() . mb_strstr($fileUpload['name'], ".");
        
                    if (in_array($fileUpload['type'], $allowedTypes))
                    {
                        if (move_uploaded_file($fileUpload['tmp_name'], __DIR__ . "../img/{$newFileName}"))
                        {
                            $newImgLink = "img/{$newFileName}";
                        }
                    }
                    $sqlCode = "UPDATE users SET companieName = '{$_POST['companieName']}', cnpj = '{$_POST['cnpj']}',
                    atuationArea = '{$_POST['atuationArea']}', localization = '{$_POST['localization']}', img = '{$newImgLink}' 
                    WHERE uniqueId = {$_GET['id']}";
                    $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
                }
                header("Location: admPage.php");
            }
            else
            {
                echo "A edição não aconteceu!";
            }    
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/editemp.css">
    <title>Edição de Empresas</title>
</head>
<body>
    <main>
        <img id="logo" src="../img/comunitlogo.png">
        <section>
            <div class="carddit">
                <h1>
                    Edição
                </h1>
                <form action="?id=<?= $_GET['id']?>" method="POST" enctype="multipart/form-data">
                    <div class="inputBox">
                        <label for="companieName">
                            <!-- Nome da empresa: -->
                        </label>
                        <input type="text" name="companieName" id="companieName" value="<?= $selectedCompanie['companieName']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="cnpj">
                            <!-- CNPJ: -->
                        </label>
                        <input type="text" name="cnpj" id="cnpj" value="<?= $selectedCompanie['cnpj']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="atuationArea">
                            <!-- Área de atuação: -->
                        </label>
                        <input type="text" name="atuationArea" id="atuationArea" value="<?= $selectedCompanie['atuationArea']; ?>"><br>
                    </div>
                    <div class="inputBox">
                        <label for="localization">
                            <!-- Localização: -->
                        </label>
                        <input type="text" name="localization" id="localization" value="<?= $selectedCompanie['localization']; ?>"><br>
                    </div>
                    <label for="img">
                        Imagem atual:
                    </label>
                    <div class="inputBox">
                        <img src="<?= $selectedCompanie['img']; ?>" alt="Logo atual">
                        <input type="file" name="img" id="img"><br>
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