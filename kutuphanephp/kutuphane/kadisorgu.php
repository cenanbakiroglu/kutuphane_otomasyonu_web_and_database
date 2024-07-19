<?php
$sorgukadi="SELECT kullaniciadi FROM kullanicilar WHERE kullaniciadi=\"".$_POST["kadi"]."\"";
$sorgulakadi=mysqli_query($conn,$sorgukadi);
$kadi2=mysqli_fetch_array($sorgulakadi);

if(empty($_POST["kadi"]))
{
    $kullanici_adi_err="Bu alan boş geçilemez";
}
else if(!preg_match ( '/^[a-z\d_-]{5,20}/i' , $_POST["kadi"] )){
    $kullanici_adi_err="Girdiğiniz kullanıcı adı geçerli formatta değil.";
}

else if(!empty($kadi2))
{
    $kullanici_adi_err="Bu kullanıcı adı daha önce alınmıştır.";
}
// veritabanında aynı kullanıcı adında biri var mı sorgusu eklenecek
else
{
    $kadi=$_POST["kadi"];//kullanıcı adı sorgudan geçip değişkene atanmıştır
}


?> 