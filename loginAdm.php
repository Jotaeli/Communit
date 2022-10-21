<?php
  include ('connection.php');

  if (isset($_POST['user']) || isset($_POST['pass']))
  {
    if ($_POST['user'] == '' && trim($_POST['user'], ' ') == '')
    {
      echo "Preencha este campo!";
    }
    else if ($_POST['pass'] == '' && trim($_POST['pass'], ' ') == '')
    {
      echo "Prencha este campo!";
    }
    else if (isset($_POST["submit"]))
    {
 
      $userName = $_POST['user'];
      $userPass = $_POST['pass'];
    
      $sqlCode = "SELECT userName FROM adm WHERE userName = '$userName' AND userPass = '$userPass'";
      $sqlQuery = $mysqli->query($sqlCode) or die('Erro no código SQL!' . $mysqli->error);

      $quantity = $sqlQuery->num_rows;

      if($quantity == 1)
      {
        $adm = $sqlQuery->fetch_assoc();
        
        if(!isset($_SESSION))
        {
          session_start();
        }
        
        $_SESSION['adm'] = $adm['userName'];
        
        header("Location: admPage.php");
      }
      else
      {
        echo "<span>Falha ao conectar usuário inválido</span>";
      }
    }
  }
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
      <form method="post" action="" class="form">
        <div class="form_camp">
          <label for="user">
            Login:
          </label>
          <input type="text" name="user" id="user">
        </div>
        <div class="form_camp">
          <label for="pass">
            Senha:
          </label>
          <input type="password" name="pass" id="pass">
        </div>
        <div class="button-submit">
          <button type="submit" name="submit" value="submit">
            Entrar
          </button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>