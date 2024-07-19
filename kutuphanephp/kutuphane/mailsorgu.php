<?php
// aynı mail adresine sahip biri var mı sorgusu
$sorgumail2="SELECT mail FROM kullanicilar WHERE mail=\"".$_POST["mail"]."\"";
$sorgulamail2=mysqli_query($conn,$sorgumail2);
$mail2=mysqli_fetch_array($sorgulamail2);

if(empty($_POST["mail"]))
    {
        $mail_err="Bu alan boş geçilemez";
    }
    else if(!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) 
    {
        $mail_err="Geçerli formatta değil";
    }
    else if(!empty($mail2)){
        $mail_err = "Bu e-mail adresi daha önce kullanılmış.";
    }
    else
    {
        $mail=$_POST["mail"];// mail sorgudan başarılı bir şekilde geçip değişeken atanmıştır
    }
?>