<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/newadm.css">
    <title>Novo Admin</title>
</head>
<body>
    <main>
        <header>
            <img id="logo" src="../img/comunitlogo.png">
        </header>
        <section>
            <div class="cardna">
                <h1>
                    Novo Admin
                </h1>
                <form action="" method="POST">
                    <div class="blabla">
                        <input type="text" name="userName" id="userName" required>
                        <label for="userName">
                            Nome do usúario:
                        </label>
                    </div class="blabla">
                    <div class="blabla">
                        <input type="password" name="userPass" id="userPass" required>
                        <label for="userPass">
                            Senha:
                        </label>
                    </div>
                    <div class="blabla">
                        <button type="submit" id="buttna">
                            Criar
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>