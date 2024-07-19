<?php
include("baglanti.php");
$silsql="UPDATE kullanicilar SET kullanicidurum=1,sifre=\"".md5("kütüphane")."\" where id=$_GET[id]";
$silsorgu=mysqli_query($conn,$silsql);

if($silsorgu)
{
    header("location: index.php?sn=kulislem");
}
else
{
    echo "Kayıt silinemedi";
}

?>