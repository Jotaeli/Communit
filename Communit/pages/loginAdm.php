<?php
  require_once __DIR__ . "/config.php";
  include_once __DIR__ . "/admForm.php";

  if(!isset($_SESSION))
  {
    session_start();
  }

  if (isset($_SESSION['adm']))
  {
    header("Location: admPage.php");
  }

  if (isset($_POST['user']) || isset($_POST['password']))
    {
      if ($_POST['user'] == '' && trim($_POST['user'], ' ') == '')
      {
        echo "Preencha este campo!";
      }
      else if ($_POST['password'] == '' && trim($_POST['password'], ' ') == '')
      {
        echo "Prencha este campo!";
      }
      else if (isset($_POST["submit"]))
      {
        $userName = $_POST['user'];
        $userPass = $_POST['password'];
      
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