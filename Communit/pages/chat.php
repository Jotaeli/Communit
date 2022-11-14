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
    <link rel="stylesheet" type="text/css" href="../css/chat.css">
    <title>Chat</title>
</head>
<body>
    <main>
        <header class="head">
            <?php
                include_once __DIR__ . "/config.php";
                
                $userId = $_GET['id'];
                $sqlCode = "SELECT companieName, img, status FROM users WHERE uniqueId = '{$userId}'";
                $sqlQuery = $mysqli->query($sqlCode) or die("Erro no código SQL" . $mysqli->error);

                $companie = $sqlQuery->fetch_assoc();
            ?>
            <a href="showCompanies.php">
                <img src="../img/goback.png" id="go-back">
            </a>
            <img src="<?= $companie['img'] ?>" alt="logo da empresa" id="h-img">
            <p id="title-emp">
                <?= $companie['companieName'] ?>
            </p>
        </header>
        <section class="messages">

        </section>
        <form action="" method="POST" class="typingArea">
            <input type="text" name="outgoingId" value="<?= $_SESSION['companie']; ?>" hidden>
            <input type="text" name="incomingId" value="<?= $userId; ?>" hidden>
            <input type="text" name="message" class="inputMsg" placeholder="Insira sua mensagem aqui...">
            <button id="arrow"><img src="../img/seta1.png" id="arrow-img"></button>
        </form>
    </main>
    <script src="js/chat.js"></script>
</body>
</html>