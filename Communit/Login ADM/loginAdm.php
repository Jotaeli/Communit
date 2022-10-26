<?php
  require_once ('connection.php');

  if(!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_SESSION['adm']))
  {
    header("Location: admPage.php");
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
            
            header("Location: admPage.php");
          }
        }
        else if (password_verify($adm['userPass'], $userPass))
        {
          $quantity = $sqlQuery->num_rows;
          
          if($quantity == 1)
          {
            $_SESSION['adm'] = $adm['userName'];
            
            header("Location: admPage.php");
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
  <link rel="stylesheet" type="text/css" href="logadm.css">
  <title>Adm login</title>
</head>
<body>
  <main>
    <header>
      <h1 class="title-1">
        <a href="../Landing Page/deflp.html">
          <img id="logo" src="../logonav.png" alt="comunit">
      </a>
      </h1>
    </header>
    <section>
        <div class="cardla">
            <h1>Login Admin</h1>
            <form method="post" action="" class="form">
                <div class="form_camp">
                <label for="user">
                    Login:
                </label>
                <input type="text" name="user" id="user" required>
                </div>
                <div class="form_camp">
                <label for="pass">
                    Senha:
                </label>
                <input type="password" name="pass" id="pass" required>
                </div>
                <div class="button-submit">
                <button id="buttla" type="submit" name="submit" value="submit">
                    Entrar
                </button>
                </div>
            </form>
        </div>
    </section>
  </main>
</body>
</html>