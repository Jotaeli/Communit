<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/stylereg.css">
  <title>
    Registro das Empresas
  </title>
</head>
<body>
  <main>
    <header class="navbar">
        <a href="index.html">
          <img id="logo" src="../img/logocomunit.png" alt="communit">
        </a>
    </header>
    <section class="main">
      <div class="cardreg">
        <h1 id="textemp">
          Registrar Empresas
        </h1>
        <form name="post" action="?post=true" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
              <input type="text" name="companieName" id="companieName" required>
              <label for="companieName" class="labeltext">
                Nome da empresa:
              </label>
            </div>
            <div class="inputBox">
              <label for="atuationArea" id="list">
                Área de atuação:
              </label>
              <select name="atuationArea" id="atuationArea">
                <option value="Programação">
                  Programação
                </option>
                <option value="Nutrição">
                  Nutrição
                </option>
                <option value="Assistência Técnica">
                  Assistência técnica
                </option>
                <option value="Venda de Smartphone">
                  Venda de smartphones
                </option>
                <option value="Nenhuma">
                  Nenhumas das anteriores
                </option>
              </select>
            </div>
            <div class="inputBox">
              <input type="text" name="localization" id="localization">
              <label for="localization" class="labeltext">
                Localização:
              </label>
            </div>
            <div class="inputBox">
              <input type="text" name="cnpj" id="cnpj">
              <label for="cnpj" class="labeltext">
                CNPJ:
              </label>
            </div>
            <div class="inputBox">
            <label for="logo">
                Logo da empresa:
              </label>
              <input type="file" name="img" id="logo" required>
              <p>No máximo 10MB</p>
            </div>
            <div>
                <button id="cadastrar">
                    Cadastrar
                </button>
            </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>