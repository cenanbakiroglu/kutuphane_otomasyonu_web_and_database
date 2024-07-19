<?php
  // Ad soyad alanları için sorgu
  $ad=$_POST["ad"];
  $soyad=$_POST["soyad"];
 
include('turkcekarakter.php');
  
  if(empty($_POST["ad"]))
  {
      $ad_err="Bu alan boş geçilemez";
  }
      else if(!preg_match ( '/^[a-zğüşöçıİĞÜŞÖÇ]{3,20}/i' , $_POST["ad"] ))
  {
      $ad_err="Geçerli formatta değil";
  }
  else
  {
      //$ad=mb_strtolower($ad,'UTF-8');//ad ve soyad tamamen küçük harflerden olacak şekilde çevrilmiştir
      $ad=strtolower_turkce($ad);
      $ad=ucwords($ad);// ad ve soy bilgisindeki her kelimenin ilk harfi büyük harfe çevrilmiştir

  }
    // Ad soyad alanları için sorgu

    if(empty($_POST["soyad"]))
    {
        $soyad_err="Bu alan boş geçilemez";
    }
    else if(!preg_match ( '/^[a-zğüşöçıİĞÜŞÖÇ]{3,20}/i' , $_POST["soyad"] ))
    {
        $soyad_err="Geçerli formatta değil";
    }
    else
    {
        $soyad=strtolower_turkce($soyad);
        //$soyad=mb_strtolower($soyad,'UTF-8');//ad ve soyad tamamen küçük harflerden olacak şekilde çevrilmiştir
        $soyad=ucwords($soyad);// ad ve soy bilgisindeki her kelimenin ilk harfi büyük harfe çevrilmiştir
        
    }

?>