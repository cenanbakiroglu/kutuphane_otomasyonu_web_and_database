<?php
if(isset($_SESSION["gorev"]))
{
    include('baglanti.php');
    $kayithata="";


    if(isset($_POST["teslim"]))
    {

        $kulsql="SELECT id FROM kullanicilar WHERE kullaniciadi=\"$_POST[kkadi]\"";
        $kulsorgu=mysqli_query($conn,$kulsql);
        $kulid=mysqli_fetch_array($kulsorgu);

        if(isset($kulid))
        {
            $esitlemesql="SELECT * FROM kayit where kitapid=$_POST[kkitap] AND kullaniciid=$kulid[0] AND teslimdurumu=1";
            $esitlemesorgu=mysqli_query($conn,$esitlemesql);
            $esitleme=mysqli_fetch_array($esitlemesorgu);

            if(isset($esitleme[0]))
            {
                $teslimsql="UPDATE kayit set teslimdurumu=0, teslimtarihi=CURRENT_DATE WHERE kullaniciid=$kulid[0] AND kitapid=$_POST[kkitap]";

                $teslimsorgu=mysqli_query($conn,$teslimsql);
                if($teslimsorgu)
                {
                    $kayithata="<div class=\"alert alert-success\" role=\"alert\">Teslim alındı.</div>";
                }

                $durumsql="UPDATE kitaplar SET kira=0 WHERE id=$_POST[kkitap]";
                $durumsorgu=mysqli_query($conn,$durumsql);
            }
            else
            {
                $kayithata="<div class=\"alert alert-danger\" role=\"alert\">Kullanıcıda böyle bir kitap bulunmamaktadır.</div>";
            }

        }
        else
        {
            $kayithata="<div class=\"alert alert-danger\" role=\"alert\">Böyle bir kullanıcı yoktur.</div>";
        }
    }
    if(isset($_POST["kayit"]))
    {


        $kulsql="SELECT id FROM kullanicilar WHERE kullaniciadi=\"$_POST[kkadi]\"";
        $kulsorgu=mysqli_query($conn,$kulsql);
        $kulid=mysqli_fetch_array($kulsorgu);

        $kitap="SELECT count(id),kitapdurum FROM kitaplar";
        $kitapsorgu=mysqli_query($conn,$kitap);
        $kitapsayi=mysqli_fetch_array($kitapsorgu);

        $kitapdurumsql="SELECT kitapdurum FROM kitaplar WHERE id=$_POST[kkitap]";
        $kitapdurumsorgu=mysqli_query($conn,$kitapdurumsql);
        $kitapdurum=mysqli_fetch_array($kitapdurumsorgu);

        if(isset($kulid))
        {
            $ksayac=0;
            $kitapsorgu="SELECT kitaplar.id,kitaplar.kitapadi,kitaplar.yazaradi,kitaplar.yazarsoyadi,kitaplar.kitapturu,kayit.kayittarihi,kayit.teslimtarihi,kayit.teslimdurumu FROM  kullanicilar,kitaplar,kayit  WHERE kitaplar.id=kayit.kitapid AND kullanicilar.id=kayit.kullaniciid AND kullanicilar.id=$kulid[0] order by kayit.teslimtarihi asc";
            $sorgu=mysqli_query($conn,$kitapsorgu);
            $fark=20;
            while($kitapsayac=mysqli_fetch_array($sorgu))
            {
                $anlik=getdate();
                $tarih1 = strtotime("$kitapsayac[6] 00:00:00");
                $tarih2 = strtotime("$anlik[year]-$anlik[mon]-$anlik[mday] 00:00:00");
                if($fark>($tarih1 - $tarih2) / (60*60*24))
                {
                    $fark=($tarih1 - $tarih2) / (60*60*24);
                }
                if($kitapsayac[7]==1)
                {
                    $ksayac++;
                }
            
            
            }
                if($kitapsayi[0]>=$_POST["kkitap"])

                {
                    
                         $kitapkirasql="SELECT kira from kitaplar where id=$_POST[kkitap]";
                         $kitapkirasorgu=mysqli_query($conn,$kitapkirasql);
                         $kitapkiradurum=mysqli_fetch_array($kitapkirasorgu);

                         if($ksayac<3 && $fark>=0 && $kitapkiradurum[0]==0 && $kitapdurum[0]==0)
                         {
                             $sql="INSERT INTO kayit VALUES (null,$kulid[0],$_POST[kkitap],$_SESSION[id],CURRENT_DATE,DATE_ADD(CURDATE(), INTERVAL 15 DAY),1)";
                             $sorgu=mysqli_query($conn,$sql);
                             if($sorgu)
                             {
                                 $kayithata="<div class=\"alert alert-success\" role=\"alert\">Kiralandı.</div>";
                                 $durumsql="UPDATE kitaplar SET kira=1 WHERE id=$_POST[kkitap]";
                                 $durumsorgu=mysqli_query($conn,$durumsql);
                             }
                             else
                             {
                               $kayithata="<div class=\"alert alert-danger\" role=\"alert\">Kayıt yapılamadı.</div>";
                             }

                         }
                         else if($kitapdurum[0]!=0)
                         {
                            $kayithata="<div class=\"alert alert-warning\" role=\"alert\">Listeden kaldırılmış kitap</div>";
                         }
                         else if($ksayac>=3)
                         {
                             $kayithata="<div class=\"alert alert-warning\" role=\"alert\">Kullanıcı aynı anda 3'ten fazla kitap kiralayamaz!</div>";
                         }
                         else if($kitapdurum[0]==1)
                         {
                             $kayithata="<div class=\"alert alert-warning\" role=\"alert\">   Kitap müsait değil.  </div>";
                         }
                         else if($fark<0)
                         {
                             $kayithata="<div class=\"alert alert-danger\" role=\"alert\">  Kullanıcıda teslim tarihi geçmiş kitap mevcut. </div>";
                         }
                         else 
                         {
                             $kayithata="<div class=\"alert alert-danger\" role=\"alert\">   Hata.   </div>";
                         }
                     
                }       

                else 
                {
                    $kayithata = "<div class=\"alert alert-secondary\" role=\"alert\">  Böyle bir kitap yoktur. En son eklenen kitabın id numarası: $kitapsayi[0]   </div>";
                }             
        }
        else
        {
            $kayithata="<div class=\"alert alert-secondary\" role=\"alert\">    Böyle bir kulanıcı yoktur.      </div>";
        }
       
    }

    ?>
    <div class="tablo bg-dark mt-5" style="margin:auto;">
    <table>
        <tr><td colspan=2><?php echo $kayithata;?></td></tr>
    <form method="POST" action="#">


    <tr><td>KİRALAYANIN KULLANICI ADI: </td><td><input type="text" name="kkadi" required></td></tr>


    <tr><td>KİRALANAN KİTABIN KAYIT NUMARASI: </td><td><input type="text" name="kkitap" required></td></tr>

    </div>
    </table>
    <div style="display:block; margin-top:20px">
    <input type="submit" class="btn btn-primary" name="kayit" value="KİRALA">
     <input type="submit" class="btn btn-success" name="teslim" value="TESLİM AL">
    </div>
    </form>
    <?php
}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
  </div>";
}
?>