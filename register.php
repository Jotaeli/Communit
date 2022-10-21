<?php
  require('connection.php');
  include('functions.php');

  if(isset($_POST['companieName']) || isset($_POST['atuationArea']) || 
  isset($_POST['localization']) || isset($_POST['cnpj']))
  {
      $companieName = $_POST['companieName'];
      $atuationArea = $_POST['atuationArea'];
      $localization = $_POST['localization'];
      $cnpj = $_POST['cnpj'];
      $code = codeGenerator();
  
      $sqlCode = "INSERT INTO companies(companieName, cnpj, atuationArea, localization, code) 
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
  <link rel="stylesheet" href="../css/login.css">
  <title>
    Registro das Empresas
  </title>
</head>

<body>
  <main>
    <header>
      <h2>
        <a href="index.html">
          <img src="../img/logocomunit.png" alt="communit">
        </a>
      </h2>
    </header>
    <section>
      <form action="" method="post" class="form">
        <div>
          <div>
            <label for="companieName">
              Nome da empresa
            </label>
            <input type="text" name="companieName" id="companieName" required>
          </div>
          <label for="atuationArea">
            Área de atuação
          </label>
          <select name="atuationArea" id="AtuationArea">
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
          <div>
            <label for="localization">
              Localização
            </label>
            <input type="text" name="localization" id="localization">
          </div>
          <div>
          </div>
          <div>
            <label for="cnpj">
              CNPJ
            </label>
            <input type="text" name="cnpj" id="cnpj">
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
            <a href="showCompanies.php">
              <button type="submit">
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