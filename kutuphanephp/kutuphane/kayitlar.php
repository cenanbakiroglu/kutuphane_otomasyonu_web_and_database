<?php

$aranan="";
if(isset($_SESSION["gorev"]))
{
 
    ?>
    
    <div class="s003">
      <form action="" method="post">
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" required name="kategori">
                <option value="" selected> Arama kategorisi</option>
                <option value="kullanicilar.ad">Adına göre</option>
                <option value="kullanicilar.kullaniciadi">Kullanıcı adına göre</option>
                <option value="kayit.id">Kira Koduna göre</option>
                <option value="kitaplar.kitapadi">Kitap adına göre</option>
              </select>
            </div>
          </div>
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Anahtar kelimeler" name="aranan" required/>
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit" name="arama">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
            
          </div>
        </div>
      </form>
    </div>
    
<?php
 $aranan="";
 if(isset($_POST["arama"]))
 {
   $aranan="AND $_POST[kategori] LIKE \"%$_POST[aranan]%\"";
   echo "<div class=\"container-fluid m-3\"><div class=\"row\"><div class=\"col-5\"></div><div class=\"col-2\"><a href=index.php?sn=kayitlar><button class=\"btn btn-primary\">Aramayı Temizle</button></a><div class=\"col-5\"></div></div></div></div>";
 }

    include('baglanti.php');
    $kayitsql="SELECT kayit.id,kullanicilar.ad,kullanicilar.soyad,kullanicilar.kullaniciadi,kitaplar.id,kitaplar.kitapadi,kayit.kayittarihi,kayit.teslimtarihi,kayit.teslimdurumu,personel.ad,personel.soyad FROM kayit,kullanicilar,kitaplar,personel WHERE kayit.kullaniciid=kullanicilar.id AND kayit.kitapid=kitaplar.id AND kayit.calisanid=personel.id $aranan order by kayit.teslimtarihi desc ";
    $kayitsorgu=mysqli_query($conn,$kayitsql);
     echo "<div class\"container\"> <div class=\"row\"><div class=\"col-1\"></div><div class=\"col-12\">";
     include("islemkayit.php");// kiralama teslim alma ekranı 
     echo "</div><div class=\"col-1\"></div></div></div>";
     $kayitsql="SELECT kayit.id,kullanicilar.ad,kullanicilar.soyad,kullanicilar.kullaniciadi,kitaplar.id,kitaplar.kitapadi,kayit.kayittarihi,kayit.teslimtarihi,kayit.teslimdurumu,personel.ad,personel.soyad FROM kayit,kullanicilar,kitaplar,personel WHERE kayit.kullaniciid=kullanicilar.id AND kayit.kitapid=kitaplar.id AND kayit.calisanid=personel.id $aranan order by kayit.teslimtarihi desc ";
    $kayitsorgu=mysqli_query($conn,$kayitsql);
?>


    <div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-sm-12">
    <table class="table table-striped table-hover text-center">
        <tr>
            <th>Sıra No</th>
            <th>Kira Kodu</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Kullanıcı Adı</th>
            <th>Kitap No</th>
            <th>Kitap Adı</th>
            <th>Kiralama Tarihi</th>
            <th>Teslim Tarihi</th>
            <th>Teslim Durumu</th>
            <th>Kayıt Yapan Personel</th>
        </tr>
        <?php
        $sira=1;
            while($kayitlar=mysqli_fetch_array($kayitsorgu))
            {
                
                $anlik=getdate();
                $tarih1 = strtotime("$kayitlar[7] 00:00:00");
                $tarih2 = strtotime("$anlik[year]-$anlik[mon]-$anlik[mday] 00:00:00");
                $fark=($tarih1 - $tarih2) / (60*60*24);
                $songun="";
                
                if($fark<=3 && $kayitlar[8]==1)
                {
                    $renk="red";
                    if($fark==1)
                    {
                       $songun="!!Son $fark gün.!!";
                    }
                    else if($fark==0)
                    {
                       $songun="Kitap son teslim tarihiniz bugün.";
                    }
                    else if($fark<0)
                    {
                       $ceza=-1*($fark*10);
                       $songun="Kitap teslim tarihiniz ".($fark*-1)." gün geçti ceza bedeliniz $ceza TL'dir.";
                    }
                    else
                    {
                       $songun="!!Son $fark gün.!!";  
                    }
                }
                else if($kayitlar[0]%2==0)
                {
                    $renk="";
                }
                else
                {
                    $renk="";
                }

                if($kayitlar[8]==1)
                {
                    $teslimdurumu="Teslim edilmedi.";
                }
                else
                {
                    $teslimdurumu="Teslim edildi.";
                }

            echo "<tr bgcolor=\"$renk\">";
                echo "<td>$sira</td> ";
                echo "<td>$kayitlar[0]</td> ";
                echo "<td>$kayitlar[1]</td> ";
                echo "<td>$kayitlar[2]</td> ";
                echo "<td>$kayitlar[3]</td> ";
                echo "<td>$kayitlar[4]</td> ";
                echo "<td>$kayitlar[5]</td> ";
                echo "<td>$kayitlar[6]</td> ";
                echo "<td>$kayitlar[7]</td> ";
                echo "<td>$teslimdurumu <br> $songun</td> ";
                echo "<td>$kayitlar[9] $kayitlar[10]</td> ";
                echo "</tr> ";
                $sira++;
            }
            ?>
    </table>
    </div></div>
    </div>
    <?php
} 
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
  </div>";
} 
