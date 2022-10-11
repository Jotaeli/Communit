<?php
include('connection.php');

if (isset($_POST['register'])) 
{
  if (!isset($_POST['companie'])) 
  {
    echo "
    <script>
     alert('Insira o nome da empresa')
    </script>";
  } 
  else if (!isset($_POST['area'])) 
  {
    echo "
    <script>
      alert('Selecione a área de atuação')
    </script>";
  }
  else if (!isset($_POST['locality'])) 
  {
    echo "
    <script>
      alert('Insira a localização da empresa')
    </script>";
  } 
  else if (!isset($_POST['cnpj'])) 
  {
    echo "
    <script>
      alert('Insira o CNPJ da empresa')
    </script>";
  } 
  else 
  {

    // $companie = $mysqli->real_escape_string($_POST['companie']);
    // $atuation_area = $mysqli->real_escape_string($_POST['area']);
    // $locality = $mysqli->real_escape_string($_POST['locality']);
    // $cnpj = $mysqli->real_escape_string($_POST['cnpj']);

    $companie = $_POST['companie'];
    $atuation_area = $_POST['area'];
    $locality = $_POST['locality'];
    $cnpj = $_POST['cnpj'];

    $sql_code = "INSERT INTO companies (name_companie, atuation_area, locality, cnpj)
    VALUES ('$companie', '$atuation_area', '$locality', $cnpj)";
    $sql_query = $mysqli->query($sql_code) or die('Ocorreu um erro com o MySql' . $mysqli->error);

  }
} 
else 
{

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
            <label for="companies">
              Nome da empresa
            </label>
            <input type="text" name="companie" placeholder="Insira o nome da empresa">
          </div>
          <label for="area">
            Área de atuação
          </label>
          <select name="area" id="area">
            <option value="1">
              Programação
            </option>
            <option value="2">
              Nutrição
            </option>
            <option value="3">
              Conserto de smartphones
            </option>
            <option value="4">
              Nenhumas das anteriores
            </option>
          </select>
          <div>
            <label for="locality">
              Localização
            </label>
            <input type="text" name="locality" required>
          </div>
          <div>
          </div>
          <div name="cnpj">
            <label for="cnpj">
              CNPJ
            </label>
            <input type="text" name="cnpj" required>
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
            <a href="online.php">
              <button type="submit" name="register">
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