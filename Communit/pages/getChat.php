<?php 
    session_start();

    if ($_SESSION['companie'])
    {
        include_once __DIR__ . "/config.php";

        $outgoingId = $_POST['outgoingId'];
        $incomingId = $_POST['incomingId'];
        $output = "";

        $sqlCode = "SELECT * FROM messages  LEFT JOIN users ON users.uniqueId = messages.outgoingMsgId 
        WHERE (outgoingMsgId = {$outgoingId} AND incomingMsgId = {$incomingId}) OR 
        (outgoingMsgId = {$incomingId} AND incomingMsgId = {$outgoingId}) ORDER BY idMsg";
        $sqlQuery = $mysqli->query($sqlCode) or die("");
        $quantity = $sqlQuery->num_rows;

        if($quantity > 0)
        {
            while($info = $sqlQuery->fetch_assoc())
            {
                if($info['outgoingMsgId'] === $outgoingId)
                {
                    $output .= '<div class="msgSend">
                                    <p class="pmsg">' . $info['msg'] . '</p>
                                </div>';
                }
                else
                {
                    $output .= '<div class="msgRec">
                                    <p class="pmsg">' . $info['msg'] . '</p>
                                </div>';
                }
            }
            echo $output;
        }
    }
    else
    {
        header("Location: loginCompanies.php");
    }

?>