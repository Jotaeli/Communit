<?php
    
    // Code generator for companies
    function codeGenerator($size = 20)
    {
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randomCode = '';

        for($i = 1; $i < $size; $i += 1)
        {
            $randomCode .= $characters[mt_rand(0, 35)];
        }

        return $randomCode;
    }

    // Generator cards for companies
    function interprises($nameCompanie, $img)
    {
        echo "
        <div id='card'>
            <img src='{$img}' alt='Logo da empresa({$nameCompanie})' id='logoemp'>
            <p id='nameemp'>{$nameCompanie}</p>
            <a href='ChatApp - CodingNepal/chat.php'> 
                <button type='submit' id='buttemp'>
                    Iniciar conversa
                </button>
            </a>
        </div>";
}
?>