<?php
if(!empty($ad) && !empty($mail) && !empty($parola) && !empty($kadi) && !empty($tel)) 
{
    $sql="INSERT INTO kullanicilar VALUES (null,\"$ad\",\"$soyad\",\"$kadi\",\"$mail\",\"$parola\",\"$tel\",\"$adres\", CURRENT_TIMESTAMP,null,0)";
    $sorgu=mysqli_query($conn,$sql);
    if($sorgu)
    {
    $err_kayit= "<img src=\"jpg/uyelik.gif\" height=70 vwidth=70><font color=\"green\" size=5>Aramıza hoşgeldin $ad.</font><img src=\"jpg/uyelik.gif\" height=70 vwidth=70>";
    }
    else{
        $err_kayit="hata".$sql;
    }
}
 else
     {
       $err_kayit="<font color=\"red\" size=5>uups!!! Sanırsam bir sorun oluştu. Lütfen tekrar dene dostum.</font>";
     }

?>