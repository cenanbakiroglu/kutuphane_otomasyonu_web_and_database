<?php
include("baglanti.php");
$duyurusql="DELETE FROM duyurular WHERE id=$_GET[id]";
$duyurusorgu=mysqli_query($conn,$duyurusql);
if($duyurusorgu)
{
    echo "Duyuru silme işlemi başarılı.";
    header("refresh:2; url=index.php?sn=duyuruolustur");
}
else
{
    echo "Bir hata oluştu.";
    header("refresh:2; url=index.php?sn=duyuruolustur");
}
?>