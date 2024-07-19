<?php 
include('baglanti.php');
$ad_err=$mail_err=$parola_err=$kullanici_adi_err=$soyad_err="";
$err_kayit="Bu kitap kurdu da kim? Tanışmaya ne dersin?</h3>";
if(isset($_POST["ok"]))
{
    $tel=$_POST["tel"];
    $adres=$_POST["adres"];
    include('adsoyadsorgu.php');
    include('kadisorgu.php');
    include('mailsorgu.php');
    include('parolasorgu.php');
    include('kayit.php');
}
       
?>
<div class="container mt-5 rounded border border-3"><div class="row"><div class="col-3"></div><div class="col-6">
<table>
    <tr>
        <td colspan=2><?php
echo "<h3>$err_kayit</h3>";
?> </tr>
    <tr><td>
<table border=0 >
<form action="#" method="post">


<tr><td colspan=2>KÜTÜPHANE ÜYE KAYIT FORMU<hr></td></tr>


<tr><th>Ad</th><td><input type="text" name="ad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$ad_err."</font>";  ?></td></tr>

<tr><th>Soyad</th><td><input type="text" name="soyad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$soyad_err."</font>";  ?></td></tr>


<tr><th>Kullanıcı Adı</th><td><input type="text" name="kadi" class="giris" ><?php  echo "<br><font color=\"red\" size=2>".$kullanici_adi_err."</font>"; ?></td></tr>


<tr><th>E-mail</th><td><input type="text" name="mail" class="giris"><?php echo "<br><font color=\"red\" size=2>".$mail_err."</font>";  ?></td></tr>


<tr><th>Telefon</th><td><input type="text" name="tel" class="giris" placeholder="(___)(_______)" required></td></tr>


<tr><th>Adres</th><td><textarea  name="adres" class="giris" style="resize:none; border:2px solid black; border-radius:5px;" rows="3" cols="22" required></textarea></td></tr>


<tr><th>Parola</th><td><input type="password" name="parola" class="giris"></td></tr>
<tr><th>Parola Tekrar</th><td><input type="password" name="parola_tekrar" class="giris"><?php echo "<br><font color=\"red\" size=2>".$parola_err."</font>";  ?></td></tr>


<tr><td colspan=2><input type="submit" value="KAYIT OL" name="ok" class="uyeol btn btn-primary" style="margin-left:180px;"></td></tr>
<tr><td colspan=2>
</td></tr>
</form>
</table>
</td>

<td width=250>
    
        <h6>!DİKKAT EDİNİZ!</h6>
        
        <br>
        <u>KULLANICI ADINIZI OLUŞTURURKEN;</u>
        <br>
        1. Büyük harf ve Türkçe karakter kullanmayınız.
        <br>
        2. En az 5, en fazla 20 karakter kullanınız.
        <br>
        <u>PAROLANIZI OLUŞTURURKEN:</u>
        <br>
        1. En az 8, en fazla 16 karakterden oluşturmalısnız.
        <br>
        2. Parola ve parola tekrar kısmına eş şifreler girmeye dikkat ediniz.
     
    
</td>
</tr>
</table>
<div class="col-3"></div>
</div></div></div>