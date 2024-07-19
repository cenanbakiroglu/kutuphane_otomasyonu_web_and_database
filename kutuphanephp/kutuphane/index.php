<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css?v1.4" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- -------------------------------------------------------------------------- -->
    <link rel="stylesheet" href="style.css?v4.1">    
    <title>Kütüphane | Anasayfa</title>
</head>
<body class="">


<!-- HEADER START -->
<header>
    <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?sn=anasayfa"> <img src="jpg/logo.png" class="d-block"  width="50px" alt="Sinop Üniversitesi"></a>
    <button class="navbar-toggler bg-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " aria-current="page" href="?sn=anasayfa">Anasayfa</a>     
        <a class="nav-link" href="?sn=hakkimizda">Hakkımızda</a>
        <a class="nav-link" href="?sn=iletisim">İletişim</a>
        <?php
    session_start();
    if(isset($_SESSION["id"]))
    {
        if(!isset($_SESSION["gorev"]))
        {
          echo "<a class=\"nav-link\" href=\"?sn=kitaplar\">Kitaplar</a>";
          echo "<a class=\"nav-link\" href=\"?sn=dilekce\">Dilek/İstek/Şikayet</a>";
          echo "<span class=\"buton\"><a class=\"nav-link\" href=\"?sn=profil\">".$_SESSION["ad"]." ".$_SESSION["soyad"]."</a>
                 <a class=\"nav-link\" href=\"cikis.php\"> ÇIKIŞ YAP</a></span>";
     
        }
        else if(isset($_SESSION["gorev"]))
        {
          echo " <div class=\"dropdown\">
  <button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">Yönetim</button>
    <ul class=\"dropdown-menu\">
          <li><a class=\"nav-link\" href=\"?sn=kitaplar\">Kitap İşlemleri</a></li>
          <li><a class=\"nav-link\" href=\"?sn=kayitlar\">Kira Kayıtları</a></li>
          <li><a class=\"nav-link\" href=\"?sn=duyuruolustur\">Duyuru işlemleri</a></li>
          <li><a class=\"nav-link\" href=\"?sn=dilekceler\">Dilek/İstek/Şikayet </a></li>
          <li><a class=\"nav-link\" href=\"?sn=kulislem\">Kullanıcı işlemleri</a></li>";
      
         if($_SESSION["gorev"]=="müdür")
         {
          echo "<a class=\"nav-link\" href=\"?sn=persislem\">Personel İşlemleri</a>";
          echo "</ul></div>";
         }
         echo "</ul></div>";
         echo "<span class=\"buton\"><a class=\"nav-link mx-2\" href=\"?sn=profil\">".$_SESSION["ad"]." ".$_SESSION["soyad"]."</a>
         <a class=\"nav-link mx-2\" href=\"cikis.php\"> ÇIKIŞ YAP</a></span>";
         
     
         }
  
    }
    else
    {
     echo" <div class=\"buton\">";
     echo" <a class=\"btn btn-primary\" href=\"?sn=uyelik\">Üye ol</a>&nbsp&nbsp&nbsp&nbsp";
     echo" <a class=\"btn btn-primary\" href=\"?sn=giris\">Giriş yap</a>";
     echo "</div>";
    }

    ?>
      </div>
    </div>
  </div>
</nav>


   
    </div>
    
</header>
<!-- HEADER END -->
<section class="icerik">

<?php

include("icindekiler.php");
?>

</section>


<!-- Footer -->
<footer class="text-center text-white footer">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>


  <!-- Copyright -->
  <div class="text-center text-white p-3 bg-dark">
    © 2023 Copyright:
    <a class="text-white" href="#">Cenan Bakıroğlu & Oğuzhan Kaya</a>
  </div>
  <!-- Copyright -->
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>



</body>
</html>



