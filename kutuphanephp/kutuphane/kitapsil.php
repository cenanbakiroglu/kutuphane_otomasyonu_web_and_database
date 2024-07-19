<?php
$id=$_GET["id"];
include("baglanti.php");
$sql="UPDATE kitaplar SET kitapdurum=1 WHERE id=$id";
$sorgu=mysqli_query($conn,$sql);
if($sorgu)
{
    header("Location:index.php?sn=kitaplar");
}
?>