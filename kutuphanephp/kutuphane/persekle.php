<?php
if(@$_SESSION["gorev"]=="müdür")
{ 
    include('baglanti.php');
    $ad_err=$mail_err=$parola_err=$kullanici_adi_err=$soyad_err="";
    $err_kayit="";

    $countsql="SELECT count(id) from personel";
    $countsorgu=mysqli_query($conn,$countsql);
    $count=mysqli_fetch_array($countsorgu);



    if(isset($_POST["ok"]))
    {
        $_POST["sifre"]=md5($_POST["sifre"]);

        include('adsoyadsorgu.php');
if (empty($ad_err) && empty($soyad_err))
{
    $sql="INSERT INTO personel VALUES (null,\"$_POST[ad]\",\"$_POST[soyad]\",\"$_POST[kadi]\",\"$_POST[mail]\",\"$_POST[sifre]\",\"$_POST[gorev]\",\"$_POST[tel]\",\"$_POST[tc]\",\"$_POST[adres]\", CURRENT_TIMESTAMP,0)";
    $sorgu=mysqli_query($conn,$sql);
    if($sorgu)
    {
    $err_kayit= "<img src=\"jpg/uyelik.gif\" height=70 vwidth=70><font color=\"green\" size=5>Aramıza Hoşgeldin $ad.</font><img src=\"jpg/uyelik.gif\" height=70 width=70>";
    }
    else
    {
    $err_kayit="<div class=\"alert alert-success\" role=\"alert\">Hata</div>";
}
  
        }
    }



?>




<div class="container rounded    mt-3 p-3 bg-secondary">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 bg-white rounded">

    <table>
        <tr>
            <td colspan=2><center>
                <?php
                echo $err_kayit;
                ?>
            </center></td>
        </tr>
        <tr>
            <td>
    <table border=0 >
    <form action="#" method="post">


    <tr><th colspan=2><center>KÜTÜPHANE PERSONEL KAYIT FORMU</center> <hr></th></tr>


    <tr><th>Ad</th><td><input type="text" name="ad" required><?php echo "<br><font color=\"red\" size=2>".$ad_err."</font>";  ?></td></tr>

    <tr><th>Soyad</th><td><input type="text" name="soyad" required ><?php echo "<br><font color=\"red\" size=2>".$soyad_err."</font>";  ?></td></tr>


    <tr><th>Kullanıcı Adı</th><td><input required type="text" name="kadi" readonly value="<?php echo "memur".$count[0]?>"><?php  echo "<br><font color=\"red\" size=2>".$kullanici_adi_err."</font>"; ?></td></tr>


    <tr><th>E-mail</th><td><input required type="email" name="mail"><?php echo "<br><font color=\"red\" size=2>".$mail_err."</font>";  ?></td></tr>


    <tr><th>Telefon</th><td><input type="tel" pattern="[0-9]{10}" name="tel" placeholder="(___)(_______)" required></td></tr>


    <tr><th>TC No:</th><td><input type="text" name="tc" required></td></tr>


    <tr><th>Görev:</th><td><input type="text" name="gorev" value="Memur" readonly required></td></tr>


    <tr><th>Adres</th><td><textarea style="resize:none; width:187px" name="adres" required></textarea></td></tr>


    <tr><th>Parola</th><td><input type="text" value="12345678" readonly name="sifre"></td></tr>



    <tr><td colspan=2><center><input type="submit" value="KAYIT" name="ok" class="btn btn-primary m-3" style="margin-left:180px;"></center></td></tr>
    
    </form>
    </table>
    </td>
    <td width=350>
        <center>
            <h6>!DİKKAT EDİNİZ!</h6>
            <font size=2>
            <br>
            <u>KULLANICI ADINIZ OTOMATİK OLARAK ATANACAKTIR;</u>
            <br>
            <u>PAROLANIZ: 12345678 OLARAK ATANACAKTIR,<br> DAHA SONRA DEĞİŞTİRİNİZ</u><br>


            <u>TELEFON NUMARANIZI BAŞINDA 0 OLMADAN 10 HANELİ OLARAK GİRİNİZ</u>
        </font>
        </center>
    </td>
    </tr>
    </table>
    </div>    </div>
</div>
    <?php
}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
    </div>";
}
  ?>