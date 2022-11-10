<?php
    session_start();

    if (!isset($_SESSION['companie']))
    {
        header("Location: loginCompanies.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="chat.css">
    <title>Chat</title>
</head>
<body>
    <main>
        <header>
            <?php
                include_once __DIR__ . "/config.php";
                
                $userId = $_GET['id'];
                $sqlCode = "SELECT companieName, img, status FROM users WHERE uniqueId = '{$userId}'";
                $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);

                $companie = $sqlQuery->fetch_assoc();
            ?>
            <a href="showCompanies.php">Botão de voltar</a>
            <img src="<?= $companie['img'] ?>" alt="logo da empresa">
            <p>
                <?= $companie['companieName'] ?>
            </p>
        </header>
        <section id="chat">
            
        </section>
        <form action="" method="POST" class="typingArea">
            <input type="text" name="outgoingId" value="<?= $_SESSION['companie']; ?>" hidden>
            <input type="text" name="incomingId" value="<?= $userId; ?>" hidden>
            <input type="text" name="message" class="inputMsg" placeholder="Insira sua mensagem aqui...">
            <button>enviar</button>
        </form>
    </main>
    <script src="js/chat.js"></script>
</body>
</html>