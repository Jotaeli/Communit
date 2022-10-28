<?php
    require('../connection.php');

    if(!isset($_SESSION))
    {
        session_start();
    }

    if(!isset($_SESSION['adm']))
    {
        die("Acesso negado. <a href=\"../LoginADM/loginAdm.php\">Conecte-se aqui!</a>");
    }

    if(isset($_POST['userName']) || isset($_POST['userPass']))
    {
        $userName = $_POST['userName'];
        $userPass = $_POST['userPass'];

        $passCrypt = password_hash($userPass, PASSWORD_DEFAULT);

        $sqlCode = "INSERT INTO adm(userName, userPass) VALUES ('$userName', '$passCrypt')";
        $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="newadm.css">
    <title>Novo Admin</title>
</head>
<body>
    <img id="logo" src="../logonav.png">
    <main>
        <section>
            <div class="cardna">
                <h1>Novo Admin</h1>
                <form action="" method="post">
                    <div class="blabla">
                        <label for="userName">
                            Nome do usúario:
                        </label>
                        <input type="text" name="userName" id="userName" required>
                    </div>
                    <div class="blabla">
                        <label for="userPass">
                            Senha:
                        </label>
                        <input type="password" name="userPass" id="userPass" required>
                    </div>
                    <div class="blabla">
                        <button id="buttna" type="submit">
                            Criar
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>