<?php
        function strtolower_turkce($metin)
        {
            $bul     = array("I","Ğ","Ü","Ş","İ","Ö","Ç");
            $degis  = array("ı","ğ","ü","ş","i","ö","ç");
            $metin    = str_replace($bul, $degis, $metin);
            $metin    = mb_strtolower($metin);
            return $metin;
        }
?>