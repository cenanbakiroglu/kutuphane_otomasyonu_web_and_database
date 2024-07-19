<h2 class="cent">Kitaplarım</h2>

<!-- kullanıcın okuduğu kitapların sorgusu -->


 <table class="table table-striped table-hover">
    <tr>
        <th>Sıra No</th>
        <th>Kitap No</th>
        <th>Kitap adı</th>
        <th>Yazar </th>
        <th>Kitabın Türü</th>
        <th>Kiralanan Tarih</th>
        <th>Teslim Tarih </th>
        <th>Teslim Durumu</th>
    </tr>

<?php

$ksayisi=0;
$kitapsorgu="SELECT kitaplar.id,kitaplar.kitapadi,kitaplar.yazaradi,kitaplar.yazarsoyadi,kitaplar.kitapturu,kayit.kayittarihi,kayit.teslimtarihi,kayit.teslimdurumu FROM  kullanicilar,kitaplar,kayit  WHERE kitaplar.id=kayit.kitapid AND kullanicilar.id=kayit.kullaniciid AND kullanicilar.id=$_SESSION[id] order by kayit.teslimtarihi asc ";
$sorgu=mysqli_query($conn,$kitapsorgu);


  while($kitaplar=mysqli_fetch_array($sorgu))
{
  
  $anlik=getdate();
  $tarih1 = strtotime("$kitaplar[6] 00:00:00");
  $tarih2 = strtotime("$anlik[year]-$anlik[mon]-$anlik[mday] 00:00:00");
  $fark=($tarih1 - $tarih2) / (60*60*24);
  $songun="";
  if($fark<=3 && $kitaplar[7]==1 )
  {
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
     $satirrenk="red";
    
  }
  else if($ksayisi%2==0)
  {
     $satirrenk="";
  }
  else
  {
     $satirrenk="";
  }


  $kitapteslimdurumu="Teslim edilmedi.";
  if($kitaplar[7]=="0")
  {
     $kitapteslimdurumu="Teslim edildi.";
  }
 
    $ksayisi++;
    echo "<tr bgcolor=\"$satirrenk\">";
    echo "<td>$ksayisi</td>";
    echo "<td>$kitaplar[0]</td>";
    echo "<td>$kitaplar[1]</td>";
    echo "<td>$kitaplar[2] $kitaplar[3]</td>";
    echo "<td>$kitaplar[4] </td>";
    echo "<td>$kitaplar[5] </td>";
    echo "<td>$kitaplar[6]<br><font size=2> $songun</font> </td>";
    echo "<td>$kitapteslimdurumu </td>";
    echo "</tr>";
    
}


 if($ksayisi==0)
 {
    echo "<tr> <td colspan=8 class=\"cent\"> <b><u>KAYIT BULUNAMADI</u></b></td></tr>";
 }
 

?>