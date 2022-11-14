<?php
    session_start();
    
    if ($_SESSION['companie'])
    {
        include_once __DIR__ . "/config.php";

        $outgoingId = $_POST['outgoingId'];
        $incomingId = $_POST['incomingId'];
        $message = $_POST['message'];

        if (!empty($message))
        {
            $sqlCode = "INSERT INTO messages (incomingMsgId, outgoingMsgId, msg) VALUES ('{$incomingId}', '{$outgoingId}', '{$message}')";
            $sqlQuery = $mysqli->query($sqlCode) or die();
        }
    }
    else
    {
        header("Location: loginCompanies.php");
    }
?>