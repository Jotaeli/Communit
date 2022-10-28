<?php
  include "../connection.php";

  if(!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_SESSION['adm']))
  {
    header("Location: ../PageAdm/admPage.php");
  }
    
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
      
        $sqlCode = "SELECT userName, userPass FROM adm WHERE userName = '$userName'";
        $sqlQuery = $mysqli->query($sqlCode) or die('Erro no código SQL!' . $mysqli->error);
        
        $adm = $sqlQuery->fetch_assoc();

        if($adm['userPass'] == $userPass)
        {
          $quantity = $sqlQuery->num_rows;
          
          if($quantity == 1)
          {
            $_SESSION['adm'] = $adm['userName'];
            
            header("Location: ../PageAdm/admPage.php");
          }
        }
        else if (password_verify($adm['userPass'], $userPass))
        {
          $quantity = $sqlQuery->num_rows;
          
          if($quantity == 1)
          {
            $_SESSION['adm'] = $adm['userName'];
            
            header("Location: ../PageAdm/admPage.php");
          }
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
  <link rel="stylesheet" href="stylecad.css">
  <title>Adm login</title>
</head>
<body>
  <main>
    <header>
      <a href="index.html">
        <img id="logo" src="../LandingPage/comunitlogo.png" alt="comunit">
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
              Usuário
            </label>
          </div>
          <div class="inputBox">
            <input type="password" name="pass" id="pass" required>
            <label for="pass">
              Senha
            </label>
          </div>
          <div>
            <button type="submit" name="submit" value="submit" id="entrar">
              Entrar
            </button>
          </div>
      </div>
      </form>
    </section>
  </main>
</body>
</html>