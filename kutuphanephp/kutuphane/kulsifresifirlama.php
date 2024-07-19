<?php
include("baglanti.php");
$id=$_GET["id"];
$newpass=rand(10000000,99999999);
$kulsifresifirlamasql="UPDATE kullanicilar SET kod=\"$newpass\" WHERE id=$id";
$kulsifresifirlamasorgu=mysqli_query($conn,$kulsifresifirlamasql);
if($kulsifresifirlamasorgu)
{
    echo " <h2>KODU TESLİM ETMEK İÇİN 5 SANİYENİZ VAR <br> ŞİFRE SIFIRLAMA KODU SADECE KULLANICIYA VERİLMELİDİR. <br> Güncel KOD </h2><h1>$newpass</h1>";
   
    header("refresh:5; url=index.php?sn=kulislem");
}
else
{
    echo "BİR HATA OLUŞTU LÜTFEN TEKRAR DENEYİNİZ.";
    header("refresh:3; url=index.php?sn=kulislem");
}
?>