<?php

@$sn=$_GET["sn"];

 switch($sn)
{
    case "anasayfa": include('anasayfa.php'); break;
    case "profil": include('profil.php'); break;
    case "kitaplar": include('kitaplar.php'); break;
    case "hakkimizda": include('hakkimizda.php'); break;
    case "iletisim": include('iletisim.php'); break;
    case "uyelik": include('uyelik.php'); break;
    case "giris": include('giris.php'); break;
    case "kirala": include('islemkayit.php'); break;
    case "kayitlar": include('kayitlar.php'); break;
    case "persislem": include('persislem.php'); break;
    case "persekle": include('persekle.php'); break;
    case "kulislem": include('kulislem.php'); break;
    case "kulekle": include('kulekle.php'); break;
    case "kulsifresifirlama": include('kulsifresifirlama.php'); break;
    case "sifredegistirme": include('sifredegistirme.php'); break;
    case "dilekceler": include('dilekceler.php'); break;
    case "dilekce": include('dilekce.php'); break;
    case "dilekceoku": include('dilekceoku.php'); break;
    case "duyuruolustur": include('duyuruolustur.php'); break;

    default : include('anasayfa.php'); break;
}
?>