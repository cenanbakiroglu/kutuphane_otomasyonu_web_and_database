<?php
include("baglanti.php");
$silsql="UPDATE personel SET personeldurum=1, sifre=\"".md5("kütüphane")."\"where id=$_GET[id]";
$silsorgu=mysqli_query($conn,$silsql);

if($silsorgu)
{
    header("location: index.php?sn=persislem");
}
else
{
    echo "Kayıt silinemedi";
}

?>