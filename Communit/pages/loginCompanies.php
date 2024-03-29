<?php
    include __DIR__ . "/loginCompaniesForm.php";
    session_start();

    if (isset($_SESSION['companie']))
    {
        header("Location: showCompanies.php");
    }

    if (isset($_POST['loginCode']))
    {
        if (strlen($_POST['loginCode'] == 0 || strlen($_POST['loginCode'] == "")))
        {
            echo "Informe o código";
        }
        else
        {
            require_once __DIR__ . "/config.php";

            $loginCode = $_POST['loginCode'];
            
            $sqlCode = "SELECT uniqueId, loginCode, status FROM users WHERE loginCode = '{$loginCode}'";
            $sqlQuery = $mysqli->query($sqlCode) or die("Falha na execução do SQL!" . $mysqli->error);
        
            if ($sqlQuery)
            {
                $quantity = $sqlQuery->num_rows;

                if ($quantity === 1)
                {
                    $companieInfo = $sqlQuery->fetch_assoc();
                    if ($companieInfo['status'] === "Offline")
                    {
                        $id = $companieInfo['uniqueId'];
                        $newStatus = "Online";
    
                        $sqlCode = "UPDATE users SET status = '{$newStatus}' WHERE loginCode = '{$companieInfo['loginCode']}'";
                        $sqlQuery = $mysqli->query($sqlCode) or die("Ocorreu um erro com o código SQL" . $mysqli->error);
                
                        $_SESSION['companie'] = $id;             
                        
                        header("Location: showCompanies.php");
                    }
                    else
                    {
                        die("<p>Está empresa já está conectada.</p>");
                    }

                }
                else
                {
                    echo "Falha ao conectar-se! Código inválido";
                }
            }
        }
    }
?>