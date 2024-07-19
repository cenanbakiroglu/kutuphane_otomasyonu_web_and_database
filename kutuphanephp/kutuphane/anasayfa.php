<?php
include("baglanti.php");
$sql="SELECT * FROM duyurular ORDER BY id desc LIMIT 5";
$sorgu=mysqli_query($conn,$sql);
$k=1;
?>
<div class="container mt-5"><div class="row"><div class="col-1"></div>
<div class="col-10">
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
      <img src="jpg/carouselbg.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block" style="margin-bottom:30%">
        <h1>Kütüphaneye Hoşgeldiniz.</h1>
        <p>Duyuruları görüntülemek için kaydırın.</p>
      </div>
    </div>



<?php  while($duyuru=mysqli_fetch_array($sorgu))
     {
      
      echo "
    <div class=\"carousel-item\">
      <img src=\"jpg/carouselbg.png\" class=\"d-block w-100\" alt=\"...\">
      <div class=\"carousel-caption d-none d-md-block\"  style=\"margin-bottom:30%\">
        <h5 class=\"bg-light text-dark opacity-75 rounded\">$duyuru[1]</h5>
        <p class=\"bg-light text-dark opacity-75 rounded\">$duyuru[2]</p>
      </div>
    </div>
    ";
  
     }

?>


  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="col-1"></div>
</div></div></div></div>



