<?php 
 include('baglanti.php');
 $ad_err=$mail_err=$parola_err=$soyad_err=$err_kayit=$kullanici_adi_err="";
$sqlhata = "";

 if(isset($_POST["onay"]))
 {
  // KULLANICI ADI VAR MI YOK MU SORGUSU
    $sorgukadi="SELECT kullaniciadi FROM kullanicilar WHERE kullaniciadi=\"$_POST[kadi]\" AND id != $_SESSION[id]";
    $sorgulakadi=mysqli_query($conn,$sorgukadi);
    $kadi2=mysqli_fetch_array($sorgulakadi);
  // KULLANICI ADI VAR MI YOK MU SORGUSU
 

  if(!preg_match ( '/^[a-z\d_-]{5,20}/i' , $_POST["kadi"] ))
  {
      $kullanici_adi_err="Girdiğiniz kullanıcı adı geçerli formatta değil.";
  }
  else if(!empty($kadi2))
  {
      $kullanici_adi_err="Bu kullanıcı adı daha önce alınmıştır.";
  }
 
 //MAİL ADRESİ VAR MI YOK MU SORGUSU
 $sorgumail2="SELECT mail FROM kullanicilar WHERE mail = \"$_POST[mail]\" AND id != $_SESSION[id]";
 $sorgulamail2=mysqli_query($conn,$sorgumail2);
 $mail2=mysqli_fetch_array($sorgulamail2);
 if(isset($mail2))
 {
   $mail_err="Bu mail adresi daha önce kullanılmıştır.";
 }
 //MAİL ADRESİ VAR MI YOK MU SORGUSU 
 }

 if(!empty($_POST["onay"]))
 {
   
 if($_SESSION["sifre"]==$_POST["sifre"] && empty($kadi2) && empty($mail2))
 {
   $ysifre=md5($_POST["sifre"]);
    $sql="UPDATE kullanicilar SET kullaniciadi=\"$kadi3\", mail=\"$mail3\", telefon=\"$tel3\", adres=\"$adres3\", sifre=\"$sifre3\" WHERE id=$_SESSION[id]";
    $sqlcalistir=mysqli_query($conn,$sql);
    
    
 if($sqlcalistir)
 {
   $sqlhata="Başarılı.";
 }
 else
 {
   $sqlhata="Düzenleme gerçekleştirilemedi.";
 }
 }
 }


?>

<h2 class="cent">Kayıtlı Bilgilerim</h2>

<table class="tab">

<form action="#" method="POST" name="kaydet formu">

<tr>
   <td>Ad :</td><td class="soluk"><?php echo $_SESSION["ad"] ?></td>
</tr>

<tr>
   <td>Soyad :</td><td class="soluk"><?php echo $_SESSION["soyad"] ?></td>
</tr>

<tr>
   <td>Kullanıcı Adı :</td><td>
      <?php
    if(isset($_POST["duzenle"]))
    
    { echo "<input type=\"text\" required name=\"kadi\" value=\"$_SESSION[kAdi]\">";} 
    else if (isset($_POST["kaydet"]))
    {
      echo "$_POST[kadi]"."<br>".$kullanici_adi_err.$sqlhata;} 
    else    
    {echo $_SESSION["kAdi"];}
    
    ?></td>
</tr>

<tr>
   <td>E-mail :</td><td>
      
   <?php 
   if(isset($_POST["duzenle"]))
   
   { echo "<input type=\"email\" required name=\"mail\" value=\"$_SESSION[mail]\">";}
   
   else if (isset($_POST["kaydet"]))
   { echo "$_POST[mail]"."<br>".$mail_err.$sqlhata;} 
  
   else
   { echo $_SESSION["mail"];}
   
   ?>
   
</td>
</tr>

<tr>
   <td>Telefon :</td><td><?php 
   
   if(isset($_POST["duzenle"]))
   
   { echo "<input type=\"text\" name=\"tel\" value=\"$_SESSION[tel]\">";}

   else if (isset($_POST["kaydet"]))
   {echo "$_POST[tel]";} 
    else{ echo $_SESSION["tel"] ;} ?></td>
</tr>

<tr>
   <td>Adres :</td><td><?php if(isset($_POST["duzenle"])){ echo "<textarea name=\"adres\"> $_SESSION[adres]</textarea>";}
    else if (isset($_POST["kaydet"]))
    {echo "$_POST[adres]";} 
   else{ echo $_SESSION["adres"] ;} ?></td>
</tr>

<tr>
   <td>Şifre :</td><td><?php if(isset($_POST["duzenle"])){ echo "<input type=\"text\" name=\"sifre\" value=\"$_SESSION[sifre]\">";}
   
   else if (isset($_POST["kaydet"]))
   {echo "$_POST[sifre]";} 

   else{ echo $_SESSION["sifre"] ;}?></td>
</tr>

<tr>
   <?php if(isset($_POST["duzenle"])){ echo "<td><input class=\"btn\" type=\"submit\" value=\"Kaydet\" name=\"kaydet\"</td></form>"; }
    
   else { echo "<td></form><form action=\"#\" method=\"POST\" > <input type=\"submit\" value=\"Düzenle\" name=\"duzenle\"></form></td>";} 
echo "</tr></table>";

if(isset($_POST["kaydet"]))
{
echo   "<h1 class=\"cent\">Şifre gir</h1> 
         <form method=\"POST\" action=\"#\">
    <input class=\"tab\" type=\"text\" name=\"sifre\">
    <input type=\"submit\" value=\"Onayla\" name=\"onay\">
</form>";
}


?> 
   
    <h2 class="cent">Kitaplarım</h2>

    <!-- kullanıcın okuduğu kitapların sorgusu -->
    <?php
   //  $kitaplarım="SELECT kitaplar.kitapadi,kayit.teslimtarihi,kayit.teslimdurumu FROM kayit,kitaplar WHERE kayit.kullaniciid=$_SESSION[id] AND kayit.kitapid=kitaplar.id";
    ?>
    
    <!-- <table border=1>
        <tr>
            <td> Sıra No</td>
            <td> Kitap No</td>
            <td> Kitap adı</td>
            <td> Yazar </td>
            <td> Kitabın Türü</td>
        </tr>

    <?php
   /* $ksayisi=0;
    $kitapsorgu="SELECT kitaplar.id,kitaplar.kitapadi,kitaplar.yazaradi,kitaplar.yazarsoyadi,kitaplar.kitapturu FROM  kullanicilar,kitaplar,kayit WHERE kitaplar.id=kayit.kitapid AND kullanicilar.id=kayit.kullaniciid AND kullanicilar.id=".$_SESSION["id"];
    $sorgu=mysqli_query($conn,$kitapsorgu);
    if(isset($sorgu))
    {
    while($kitaplar=mysqli_fetch_array($sorgu))
    {
        $ksayisi++;
        echo "<tr>";
        echo "<td>$ksayisi</td>";
        echo "<td>$kitaplar[0]</td>";
        echo "<td>$kitaplar[1]</td>";
        echo "<td>$kitaplar[2] $kitaplar[3]</td>";
        echo "<td>$kitaplar[4] </td>";
        echo "</tr>";
        
    }
}
     else
     {
        echo "<tr> <td colspan=5> KAYIT BULUNAMADI</td></tr>";
     }*/

    ?>
    </table> -->
