<?php
if(isset($_SESSION["id"]))
{ 
    include("turkcekarakter.php");
    include('baglanti.php');
    if(isset($_POST["kayit"]))
    {
    $kitapadi= ucwords(strtolower_turkce($_POST["kitapadi"]));
    $yazaradi=ucwords(strtolower_turkce($_POST["yazaradi"]));
    $yazarsoyadi=ucwords(strtolower_turkce($_POST["yazarsoyadi"]));
    $yayinevi=ucwords(strtolower_turkce($_POST["yayinevi"]));
    $kitapturu=ucwords(strtolower_turkce($_POST["kitapturu"]));
    $basimyili=$_POST["basimyili"];
    
    

    $sql="INSERT INTO kitaplar VALUES (null,\"$kitapadi\",\"$yazaradi\",\"$yazarsoyadi\",\"$yayinevi\",\"$kitapturu\",\"$basimyili\",\"0\",0)";
    $sorgu=mysqli_query($conn,$sql);

    if($sorgu)
     {
      $icerik="Okuyucularımızın dikkatine!!! <br> $yazaradi $yazarsoyadi adlı yazarın, $kitapadi adlı kitabı kütüphanemize gelmiştir. Tüm okuyucularımıza duyurulur. ";
      $duyurusql="INSERT INTO duyurular VALUES(null,\"$kitapadi\",\"$icerik\")";
      $duyurusorgu=mysqli_query($conn,$duyurusql);
      if($duyurusorgu)
      {
        echo "<div class=\"alert alert-success\" role=\"alert\">
      Kayıt başarılı
    </div>";
      }
      
     }                        
    else {
      echo "<div class=\"alert alert-danger\" role=\"alert\">
      Kayıt yapılamadı
    </div>";
    }

}

?>


<div class="s003">
      <form action="" method="post">
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="kategori" required >
                <option value="" selected>Arama kategorisi</option>
                <option value="kitapadi">Kitap adına göre</option>
                <option value="yazaradi">Yazar adına göre</option>
                <option value="yazarsoyadi">Yazar soyadına &nbsp;&nbsp; göre</option>
                <option value="kitapturu">Türe göre</option>
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
      echo "<div class=\"container-fluid m-3\"><div class=\"row\"><div class=\"col-5\"></div><div class=\"col-2\"><a href=index.php?sn=kitaplar><button class=\"btn btn-primary\">Aramayı Temizle</button></a><div class=\"col-5\"></div></div></div></div>";
    }
    ?>
   


<?php
   if(isset($_SESSION["gorev"]))
    {
        echo "<div class=\"container-fluid mt-5 \">
        <div class=\"row\">
          <div class=\"col-sm-4\">";
        echo "<div>";
        echo    "<form name=\"kayit\" method=\"POST\" action=\"#\">";
        echo     "<table class=\"table table-striped table-hover\" style=\"text-align:center;\" >";
        echo          "<tr><th colspan=2 style=\"font-size:20px;\" required>Kitap Bilgileri</th></tr>";
        echo     "<tr><td>  Kitap adı:</td><td> <input type=\"text\" name=\"kitapadi\" required></td></tr>";
        echo     "<tr> <td> Yazar adı: </td><td><input type=\"text\" name=\"yazaradi\" required></td></tr>";
        echo     "<tr> <td> Yazar soyadı:</td><td> <input type=\"text\" name=\"yazarsoyadi\" required></td></tr>";
        echo     "<tr> <td> Yayınevi: </td><td><input type=\"text\" name=\"yayinevi\" required></td></tr>";
        echo     "<tr>  <td> Kitap türü: </td><td><input type=\"text\" name=\"kitapturu\" required></td></tr>";
        echo     "<tr> <td> Basım yılı:</td><td> <input type=\"text\" name=\"basimyili\" required></td></tr>";
        echo     "<tr><td colspan=2><input class=\"btn btn-primary\" type=\"submit\" value=\"Kaydet\" name=\"kayit\"></td></tr>";
        echo      "</table>";
        echo      "</form></div>";
        echo      "</div>";
    }
    ?>


   
    <div class="<?php if(isset($_SESSION["gorev"])){echo "col-sm-8 bg-light";} else { echo "col-sm-12 bg-light"; }?>">
    <table class="table table-striped table-hover">
    <tr><th colspan=9 style="text-align:center; font-size:30px">Kitaplar</th></tr>        
    <tr>
                <th>ID</th>
                <th>KİTAP ADI</th>
                <th>YAZAR ADI</th>
                <th>YAZAR SOYADI</th>
                <th>YAYINEVİ</th>
                <th>KİTAP TÜRÜ</th>
                <th>BASIM YILI</th>
                <th>KİRALIK DURUMU</th>
                
                <?php if(isset($_SESSION["gorev"])) { echo "<th>İŞLEM</th>";} ?>
</tr>
<?php
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------





$sql="SELECT * FROM kitaplar WHERE kitapdurum=0 $aranan";
$sorgu=mysqli_query($conn,$sql);
$say=1;
$renk=1;
while($dizi=mysqli_fetch_array($sorgu))
{ 
    if($dizi[7]=="1")
    {
        $kira="Müsait değil";
    }
    else 
    {
        $kira="Müsait";
    }     
    echo "<tr>";
    echo "<td> $say </td>";
    echo "<td> $dizi[1] </td>";
    echo "<td> $dizi[2] </td>";
    echo "<td> $dizi[3] </td>";
    echo "<td> $dizi[4] </td>";
    echo "<td> $dizi[5] </td>";
    echo "<td> $dizi[6] </td>";
    echo "<td> $kira </td>";
    if(isset($_SESSION["gorev"]))
    {
      echo "<td><button class=\"link btn btn-primary\"><a class=\"link\" href=\"kitapsil.php?id=$dizi[0]\">Sil</a></button>";
    }
    
    echo "</tr>";
    $say++;
}
?>
</table>

    </div>
  </div>
</div>
        <hr>
        <!-- <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>KİTAP ADI</th>
                <th>YAZAR ADI</th>
                <th>YAZAR SOYADI</th>
                <th>YAYINEVİ</th>
                <th>KİTAP TÜRÜ</th>
                <th>BASIM YILI</th>
                <th>KİRALIK DURUMU</th>
</tr>
<?php
// $sql="SELECT * FROM kitaplar";
// $sorgu=mysqli_query($conn,$sql);

// $renk=1;
// while($dizi=mysqli_fetch_array($sorgu))
// { 
//     if($dizi[8]==1)
//     {
//         $kira="Müsait değil";
//     }
//     else 
//     {
//         $kira="Müsait";
//     }     
//     echo "<tr>";
//     echo "<td> $dizi[0] </td>";
//     echo "<td> $dizi[1] </td>";
//     echo "<td> $dizi[2] </td>";
//     echo "<td> $dizi[3] </td>";
//     echo "<td> $dizi[4] </td>";
//     echo "<td> $dizi[5] </td>";
//     echo "<td> $dizi[6] </td>";
//     echo "<td> $dizi[7] </td>";
//     echo "<td> $kira </td>";
//     echo "</tr>";
// }
?>
</table> -->
<?php
}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    Lütfen giriş yapınız
  </div>";
}



?>