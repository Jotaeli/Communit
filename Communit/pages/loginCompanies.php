<?php
    require __DIR__ . "/config.php";
    include __DIR__ . "/functions.php";
    include __DIR__ . "/loginCompaniesForm.php";

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
            
            $sqlCode = "SELECT code FROM users WHERE code = '$code'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do SQL!" . $mysqli->error);
        
            $quantity = $sqlQuery->num_rows;
        
            if($quantity == 1)
            {
                $allCodes = $sqlQuery->fetch_assoc();
        
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