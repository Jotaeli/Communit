<?php
  session_start();
  include_once __DIR__ . "/loginAdmForm.php";

  if (isset($_SESSION['adm']))
  {
    header("Location: admPage.php");
  }
  else
  {
    if (isset($_POST['user']) || isset($_POST['password']))
      {
        if ($_POST['user'] == '' && trim($_POST['user'], ' ') == '')
        {
          echo "Insira seu nome!";
        }
        else if ($_POST['password'] == '' && trim($_POST['password'], ' ') == '')
        {
          echo "Insira sua senha!";
        }
        else if (isset($_POST["submit"]))
        {
          require_once __DIR__ . "/config.php";

          $userName = $_POST['user'];
          $userPass = $_POST['password'];
        
          $sqlCode = "SELECT uniqueId, userName, userPass FROM adm WHERE userName = '$userName'";
          $sqlQuery = $mysqli->query($sqlCode) or die('Erro no código SQL!' . $mysqli->error);
          
          if ($sqlQuery)
          {
            $adm = $sqlQuery->fetch_assoc();
    
            if($adm['userPass'] == $userPass)
            {
              $quantity = $sqlQuery->num_rows;
              
              if($quantity == 1)
              {
                $_SESSION['adm'] = $adm['uniqueId'];
                
                header("Location: admPage.php");
              }
            }
            else if (password_verify($adm['userPass'], $userPass))
            {
              $quantity = $sqlQuery->num_rows;
              
              if($quantity == 1)
              {
                $_SESSION['adm'] = $adm['uniqueId'];
                
                header("Location: admPage.php");
              }
            }
            else 
            {
            echo "<span>Falha ao conectar usuário inválido</span>";
            }
          }
        }
      }
  }
?>