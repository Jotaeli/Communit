<?php 
    session_start();
    include_once __DIR__ . "/config.php";

    $outgoingId = $_SESSION['companie'];
    $sqlCode = "SELECT * FROM users WHERE NOT uniqueId = {$outgoingId}";
    $sqlQuery = $mysqli->query($sqlCode) or die();
    $output = "";

    
        $quantity = $sqlQuery->num_rows;
        
        if($quantity === 1)
        {
            $output .= "Nenhuma empresa está online!";
        }
        else if($quantity > 1)
        {
            while($row = $sqlQuery->fetch_assoc())
            {
                if($row['status'] === "Online")
                {
                    $output .= "
                    <div id='card'>
                        <img src='" . $row['img'] . "' alt='Logo da " . $row['companieName'] . "' id='logoemp'>
                        <p id'nameemp'>
                            " . $row['companieName'] . "
                        </p>
                        <a href='chat.php?id=" . $row['uniqueId'] . "'>
                        <button type='submit' id='buttemp'>
                            Iniciar conversa
                        </button>
                        </a>
                    </div>";
                }
            }
            echo $output;
        }