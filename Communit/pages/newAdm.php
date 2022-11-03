<?php
    require __DIR__ . "/config.php";
    include __DIR__ . "/newAdmForm.php";

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado. <a href=\"loginAdm.php\">Conecte-se aqui!</a>");
    }

    if(isset($_POST['userName']) || isset($_POST['userPass']))
    {
        $userName = $_POST['userName'];
        $userPass = $_POST['userPass'];

        $passCrypt = password_hash($userPass, PASSWORD_DEFAULT);

        $sqlCode = "INSERT INTO adm (userName, userPass) VALUES ('$userName', '$passCrypt')";
        $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
    }
?>