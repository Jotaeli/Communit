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
?>