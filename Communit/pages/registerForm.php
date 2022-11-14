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
          <img id="logo" src="../img/comunitlogo.png" alt="communit">
        </a>
    </header>
    <section class="main">
      <div class="cardreg">
        <h1 id="textemp">
          Registrar Empresas
        </h1>
        <form name="post" action="?post=true" method="POST" enctype="multipart/form-data">
            <div class="inputBox">
              <input class="inputReal" type="text" name="companieName" id="companieName" required>
              <label for="companieName" class="labeltext">
                Nome da empresa:
              </label>
            </div>
            <div class="inputBox">
              <select class="inputReal" name="atuationArea" id="atuationArea">
                <option value="Nenhuma">
                  Nenhuma
                <option value="Nutrição">
                  Nutrição
                </option>
                <option value="Assistência Técnica">
                  Assistência técnica
                </option>
                <option value="Programação">
                  Programação
                </option>
              </select>
              <label class="labeltext" for="atuationArea" id="atAreaLabel">
                Área de atuação:
              </label>
            </div>
            <div class="inputBox">
              <input class="inputReal" type="text" name="localization" id="localization">
              <label class="labeltext" for="localization">
                Localização:
              </label>
            </div>
            <div class="inputBox">
              <input class="inputReal" type="text" name="cnpj" id="cnpj">
              <label class="labeltext" fr="cnpj">
                CNPJ:
              </label>
            </div>
            <div id="logoADC">
              <label for="logoADD">
                Logo da empresa:
              </label>
              <input type="file" name="img" id="logoADD" required>
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