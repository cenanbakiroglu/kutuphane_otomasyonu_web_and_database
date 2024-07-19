<?php
include('baglanti.php');
$id=$_GET["id"];
$sql="DELETE FROM dilekce WHERE id=$id";
$sorgu=mysqli_query($conn,$sql);
if($sorgu)
{
    echo "Dilekçe silindi.";
    header("refresh:2; url=index.php?sn=dilekceler");
}
else
{
    echo "Bir hata oluştu";
    header("refresh:2; url=index.php?sn=dilekceler");
}
?>