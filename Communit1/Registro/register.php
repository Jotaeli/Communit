<?php
  require('../connection.php');
  include('../functions.php');

  if(!isset($_SESSION))
  {
    session_start();
  }

  if(!isset($_SESSION['adm']))
  {
    die("Você não está conectado. <a href=\"../LoginADM/loginAdm.php\">Conecte-se aqui!</a>");
  }

  if(isset($_POST['companieName']) || isset($_POST['atuationArea']) || 
    isset($_POST['localization']) || isset($_POST['cnpj']))
  {
      $companieName = $_POST['companieName'];
      $atuationArea = $_POST['atuationArea'];
      $localization = $_POST['localization'];
      $cnpj = $_POST['cnpj'];
      $code = codeGenerator();
  
      $sqlCode = "INSERT INTO users (companieName, cnpj, atuationArea, localization, code) 
      VALUES ('$companieName', '$cnpj', '$atuationArea', '$localization', '$code')";
      $sqlQuery = $mysqli->query($sqlCode) or die('Ocorreu um erro com o MySql' . $mysqli->error);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="stylereg.css">
  <title>
    Registro das Empresas
  </title>
</head>

<body>
  <main>
    <header class="navbar">
        <a href="../LandingPage/index.html">
          <img id="logo" src="../LandingPage/comunitlogo.png" alt="communit">
        </a>
    </header>
    <section class="main">
      <div class="cardreg">
        <h1 id="textemp">
          Registrar Empresas
        </h1>
      <form action="" method="POST">
        <div class="inputBox">
          <input type="text" name="companieName" id="companieName" required>
          <label class="labeltext" for="companieName">
            Nome da empresa
          </label>
        </div class="inputBox">
          <label id="list" for="atuationArea">
            Área de atuação
          </label>
          <select name="atuationArea" id="areas">
            <option value="Programação">
              Programação
            </option>
            <option value="Nutrição">
              Nutrição
            </option>
            <option value="Assistência Técnica">
              Assistência técnica
            </option>
            <option value="Nenhuma">
              Nenhumas das anteriores
            </option>
          </select>
          <div class="inputBox">
            <input type="text" name="localization" id="localization">
            <label class="labeltext" for="localization">
              Localização
            </label>
          </div>
          <div>
            <input type="text" name="cnpj" id="cnpj">
            <label for="cnpj" class="labeltext">
              CNPJ
            </label>
          </div>
          <div>
            <p>
              <input type="checkbox" required>
              Li e concordo com os
              <a href="#">
                Termos
              </a> e
              <a href="#">
                Condições
              </a>
            </p>
          </div>
          <div>
            <a href="../PageAdm/admPage.php">
              <button id="cadastrar" type="submit">
                  Cadastrar
              </button>
            </a>
          </div>
        </div>
      </form>
    </section>
  </main>
</body>
</html>