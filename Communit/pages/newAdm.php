<?php
    require('connection.php');

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Admin</title>
</head>
<body>
    <main>
        <header>

        </header>
        <section>
            <form action="" method="post">
                <div>
                    <label for="userName">
                        Nome do usúario:
                    </label>
                    <input type="text" name="userName" id="userName" required>
                </div>
                <div>
                    <label for="userPass">
                        Senha:
                    </label>
                    <input type="password" name="userPass" id="userPass" required>
                </div>
                <div>
                    <button type="submit">
                        Criar
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>