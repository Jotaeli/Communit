<?php
  include ('connection.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <title>Adm login</title>
</head>
<body>
  <main>
    <header>
      <h1 class="title-1">
        <a href="index.html">
          <img src="../img/logocomunit.png" alt="comunit">
      </a>
      </h1>
    </header>
    <section>
      <form method="post" action="login.php" class="form">
        <div class="form_camp">
          <label for="login">
            Login:
          </label>
          <input type="text" name="login" id="login"
          placeholder="Insira seu nome de usuário">
        </div>
        <div class="form_camp">
          <label for="pass">
            Senha:
          </label>
          <input type="password" name="pass" id="pass"
          placeholder="Insira sua senha">
        </div>
        <div class="button-submit">
          <button type="submit" id="enter">
            Entrar
          </button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>