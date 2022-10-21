<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['companie']))
    {
        die("É necessário utilizar o código para se conectar!
        <span>
            <a href=\"loginCompanies.php\">
                Tela de login
            </a>
        </span>");
    }
?>