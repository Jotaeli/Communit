<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/stylecad.css">
  <title>Adm login</title>
</head>
<body>
  <main>
    <header>
        <a href="#">
          <img id="logo" src="../img/comunitlogo.png" alt="communit">
        </a>
    </header>
    <section>
      <div class="cardcad">
        <h1 id="textadmin">
          Admin
        </h1>
        <form method="POST" action="">
          <div class="inputBox">
            <input type="text" name="user" id="user" required>
            <label for="user">
              Login:
            </label>
          </div>
          <div class="inputBox">
            <input type="password" name="password" id="password" required>
            <label for="password">
              Senha:
            </label>
          </div>
          <div>
            <button type="submit" name="submit" value="submit" id="entrar">
              Entrar
            </button>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>