<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v2.4">

<!-- -------------------------------------------------------------------------- -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kütüphane | Anasayfa</title>
</head>
<body>
    


<!-- HEADER START -->
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="?sn=anasayfa"> <img src="jpg/logo.png" class="d-block"  width="50px" alt="Sinop Üniversitesi"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="?sn=anasayfa">Anasayfa</a>
        <a class="nav-link" href="?sn=kitaplar">Kitaplar</a>
        <a class="nav-link" href="?sn=hakkimizda">Hakkımızda</a>
        <a class="nav-link" href="?sn=iletisim">İletişim</a>
        <?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        if(!isset($_SESSION["gorev"]))
        {
        echo "<span class=\"buton\"><a class=\"nav-link\" href=\"?sn=profil\">".$_SESSION["ad"]." ".$_SESSION["soyad"]."</a>
        <a class=\"nav-link\" href=\"cikis.php\"> ÇIKIŞ YAP</a>";
     
        }
        else if($_SESSION["gorev"]=="Müdür")
        {
            
        }
        









    }
    else
    {
     echo" <div class=\"buton\">";
     echo" <a class=\"btn\" href=\"?sn=uyelik\">Üye ol</a>&nbsp&nbsp&nbsp&nbsp";
     echo" <a class=\"btn\" href=\"?sn=giris\">Giriş yap</a>";
     echo "</div>";
    }
    ?>
      </div>
    </div>
  </div>
</nav>


   
    </div>
    
</header>