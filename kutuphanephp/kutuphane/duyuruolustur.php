<?php
if(isset($_SESSION["gorev"]))
{
 include("baglanti.php");
 if(isset($_POST["olustur"]))
 {
$duyurusql="INSERT INTO duyurular VALUES (NULL,\"$_POST[baslik]\",\"$_POST[icerik]\")";
$duyurusorgu=mysqli_query($conn,$duyurusql);
if($duyurusorgu)
{
    echo "<div class=\"alert alert-success text-center\" role=\"alert\">Başarılı.</div>";
}
else {echo "Hata";}
}
?>
<div class="container my-5 py-5 rounded"><div class="row"><div class="col-3"></div><div class="col-6">
<form class="form-horizontal" action="" method="POST">
<div class="form-group">
    <label class="control-label col-sm-2 fw-bold" >Başlık</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" required name="baslik" placeholder="Başlık">
    </div>
  </div>
<div class="form-group">
    <label class="control-label col-sm-2 fw-bold" >İçerik</label>
    <div class="col-sm-10">
      <textarea class="form-control" required name="icerik" placeholder="İçeriği buraya giriniz."></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="olustur" class="btn btn-primary mt-3" value="Duyuru Oluştur">
    </div>
  </div>
  </div>
  <div class="col-3">
  </div>
  </form>
  </div>  </div>

<div class="container-fluid"><div class="row"><div class="col-12">
<table  class="table table-striped table-hover text-center">
<tr> <th> Duyuru NO</td><th>Başlık</th> <th>İçerik</th><th></th></tr>

<?php
$sql="SELECT * FROM duyurular ORDER BY id desc LIMIT 5";
$sorgu=mysqli_query($conn,$sql);

while($duyuru=mysqli_fetch_array($sorgu))
{
    echo "<tr><td> $duyuru[0] </td><td>$duyuru[1]</td> <td>$duyuru[2]</td><td><a href=\"duyurusil.php?id=$duyuru[0]\"><button class=\"btn btn-danger\"> Sİl </button><td></tr>";
}
?>
</table>


</div></div></div>






<?php

}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
    </div>";
}