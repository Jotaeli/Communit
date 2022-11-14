<?php
    require_once __DIR__ . "/config.php";

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado! <a href=\"admLogin.php\">Conecte-se aqui!</a>");
    }
    else
    {
        if($_GET['id'] != "" && $_GET['id'] != 0)
        {
            $sqlCode = "SELECT * FROM users WHERE id = '{$_GET['id']}'";
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
                    atuationArea = '{$_POST['atuationArea']}', localization = '{$_POST['localization']}', img = '{$selectedCompanie['img']}' WHERE id = {$_GET['id']}";
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
                    WHERE id = {$_GET['id']}";
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
    <link rel="stylesheet" type="text/css" href="../css/editCompanies.css">
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
                        <input type="text" name="companieName" id="companieName" value="<?= $selectedCompanie['companieName']; ?>">
                        <label for="companieName">
                            Nome da empresa:
                        </label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="cnpj" id="cnpj" value="<?= $selectedCompanie['cnpj']; ?>">
                        <label for="cnpj">
                            CNPJ:
                        </label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="atuationArea" id="atuationArea" value="<?= $selectedCompanie['atuationArea']; ?>">
                        <label for="atuationArea">
                            Área de atuação:
                        </label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="localization" id="localization" value="<?= $selectedCompanie['localization']; ?>">
                        <label for="localization">
                            Localização:
                        </label>
                    </div>
                    <div id="divImg">
                        <label id="imgLab" for="img">
                            Imagem atual:
                        </label>
                        <img src="<?= $selectedCompanie['img']; ?>" alt="Logo atual" id="imgNow"><br>
                        <input type="file" name="img" id="imgFile"><br>
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