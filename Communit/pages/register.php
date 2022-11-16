<?php
  session_start();
  include_once __DIR__ . "/registerForm.php";

  if (!isset($_SESSION['adm']))
  {
    die("Você não está conectado. <a href=\"loginAdm.php\">Conecte-se aqui!</a>");
  }

  if (isset($_POST['companieName']) || isset($_POST['atuationArea']) || 
      isset($_POST['localization']) || isset($_POST['cnpj']))
  {
    require_once __DIR__ . "/config.php";
    include_once __DIR__ . "/functions.php";

    $getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

    if ($_FILES && !empty($_FILES['img']['name']))
    {
        $folder = __DIR__ . "./img";

        if(!file_exists($folder) || !is_dir($folder))
        {
            mkdir($folder, 0755);
        }

        $fileUpload = $_FILES['img'];

        $allowedTypes = [
            "image/png",
            "image/jpeg",
            "image/jpg",
        ];

        $newFileName = time() . mb_strstr($fileUpload['name'], ".");

        if (in_array($fileUpload['type'], $allowedTypes))
        {
            if (move_uploaded_file($fileUpload['tmp_name'], __DIR__ . "../img/{$newFileName}"))
            {
                $randomId = rand(time(), 10000000);
                $companieName = $_POST['companieName'];
                $cnpj = $_POST['cnpj'];
                $atuationArea = $_POST['atuationArea'];
                $localization = $_POST['localization'];
                $imgLink = "img/{$newFileName}";
                $loginCode = codeGenerator();
                $status = "Offline";

                $sqlCode = "INSERT INTO users (uniqueId, companieName, cnpj, atuationArea, localization, img, status, loginCode) 
                VALUES ('$randomId', '$companieName', '$cnpj', '$atuationArea', '$localization', '$imgLink', '$status', '$loginCode')";
                $sqlQuery = $mysqli->query($sqlCode) or die('Ocorreu um erro com o MySql' . $mysqli->error);
                
                header("Location: admPage.php");
            }
            else
            {
                echo "<p>Erro inesperado!</p>";
            }
        }
        else
        {
            echo "<span>Arquivo não permitido!</span>";
        }
    }
  }
?>
