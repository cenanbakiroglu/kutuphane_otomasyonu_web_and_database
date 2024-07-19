
<?php 
include('baglanti.php');
$ad_err=$mail_err=$parola_err=$kullanici_adi_err=$soyad_err="";
$err_kayit="Üye kaydı için doldurulan formdaki bilgileri giriniz";
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



<div class="container mt-5 bg-secondary rounded">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 m-5 bg-white rounded">
<table>
    <tr>
        <th colspan=2><center><?php
echo $err_kayit;
?></center>  </tr>
    <tr><th>
<table border=0 >
<form action="#" method="post">


<tr><th colspan=2><center>KÜTÜPHANE ÜYE KAYIT FORMU</center> <hr></th></tr>


<tr><th>Ad</th><td><input type="text" name="ad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$ad_err."</font>";  ?></td></tr>


<tr><th>Soyad</th><td><input type="text" name="soyad" class="giris"><?php echo "<br><font color=\"red\" size=2>".$soyad_err."</font>";  ?></td></tr>


<tr><th>Kullanıcı Adı</th><td><input type="text" name="kadi" class="giris" ><?php  echo "<br><font color=\"red\" size=2>".$kullanici_adi_err."</font>"; ?></td></tr>


<tr><th>E-mail</th><td><input type="text" name="mail" class="giris"><?php echo "<br><font color=\"red\" size=2>".$mail_err."</font>";  ?></td></tr>


<tr><th>Telefon</th><td><input type="text" name="tel" class="giris" placeholder="(___)(_______)" required></td></tr>


<tr><th>Adres</th><td><textarea  name="adres" class="giris" required></textarea></td></tr>


<tr><th>Parola</th><td><input type="password" name="parola" class="giris"></td></tr>
<tr><th>Parola Tekrar</th><td><input type="password" name="parola_tekrar" class="giris"><?php echo "<br><font color=\"red\" size=2>".$parola_err."</font>";  ?></td></tr>


<tr><td colspan=2><center><input type="submit" value="KAYIT" name="ok" class="btn btn-primary" style="margin-left:180px;"></center></td></tr>
<tr><td colspan=2><center><?php
?></center></td></tr>
</form>
</table>
</td>
</tr>
</table>
</div>
<div class="col-3"></div>
    </div>
</div>