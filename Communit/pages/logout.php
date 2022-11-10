<?php
    session_start();

    if (isset($_SESSION['companie']))
    {
        include_once __DIR__ . "/config.php";
        $logoutId = $_GET['logoutId'];
        if ($logoutId)
            $status = "Offline";
            
            $sqlCode = "UPDATE users SET status = '{$status}' WHERE uniqueId = '{$_SESSION['companie']}'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);

            if($sqlQuery)
            {
                unset($_SESSION['companie']);
                header("Location: index.html");
            }
    }
    else if (isset($_SESSION['adm']))
    {
        unset($_SESSION['adm']);
        header("Location: index.html");
    }
    else
    {
        header("Location: index.html");
    }
?>