<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Personel Düzenle</title>
</head>
<body>



<?php

include("baglanti.php");
$id=$_GET["id"];
$duzenlesql="SELECT * FROM personel where id=$id";
$duzenlesorgu=mysqli_query($conn,$duzenlesql);
$duzenle=mysqli_fetch_array($duzenlesorgu);


if(isset($_POST["kaydet"]))
{







}

?>



    <form action="#" method="post">


    <table class="">
        <tr><td>Ad:</td><td><?php echo $duzenle[1] ?></td></tr>
        <tr><td>Soyad:</td><td><?php echo $duzenle[2] ?></td></tr>
        <tr><td>Kullanıcı Adı:</td><td><?php echo $duzenle[3] ?></td></tr>
        <tr><td>Mail:</td><td><input required type="text" value="<?php echo $duzenle[4] ?>"></td></tr>
        <tr><td>Görev:</td><td><input required type="text" value="<?php echo $duzenle[6] ?>"></td></tr>
        <tr><td>Telefon:</td><td><input required type="text" value="<?php echo $duzenle[7] ?>"></td></tr>
        <tr><td>TC No:</td><td><?php echo $duzenle[8] ?></td></tr>
        <tr><td colspan=2><input required type="submit" name="kaydet" value="Değişiklikleri kaydet"></td></tr>
    </table>
</form>




</body>
</html>