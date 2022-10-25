<?php
    
    // Code generator for companies
    function codeGenerator($size = 20)
    {
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randomCode = '';

        for($i = 1; $i < $size; $i += 1)
        {
            $randomCode .= $characters[mt_rand(0, 36)];
        }

        return $randomCode;
    }

    // Generator cards for companies
    function interprises($nameCompanie, $linkImage)
    {
        echo "
        <div class='companies'>
            <img src='{$linkImage}' alt='Logo da empresa({$nameCompanie})'>
            <h4>
                {$nameCompanie}
            </h4>
            <button type='submit'>
                <a href='chats.php'>
                    Iniciar conversa
                </a>
            </button>
        </div>";
}
?>