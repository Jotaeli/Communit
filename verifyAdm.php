<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("É necessário fazer o login para se conectar!
        <span>
            <a href=\"loginAdm.php\">
                Clique aqui!
            </a>
        </span>");
    }
?>