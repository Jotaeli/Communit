<?php
    session_start();
    include __DIR__ . "/newAdmForm.php";

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado. <a href=\"loginAdm.php\">Conecte-se aqui!</a>");
    }

    if(isset($_POST['userName']) || isset($_POST['userPass']))
    {
        require_once __DIR__ . "/config.php";

        $userName = $_POST['userName'];
        $userPass = $_POST['userPass'];
        $randomId = rand(time(), 10000000);

        $passCrypt = password_hash($userPass, PASSWORD_DEFAULT);

        $sqlCode = "INSERT INTO adm (userName, userPass, id_unique) VALUES ('$userName', '$passCrypt', '{$randomId}')";
        $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
    }
?>