<?php 
if(isset($_SESSION["id"]))
{ 
 include('baglanti.php');
 $ad_err=$mail_err=$parola_err=$soyad_err=$err_kayit=$kullanici_adi_err="";
 

   if(isset($_POST["kaydet"]))
   {
      // KULLANICI ADI VAR MI YOK MU SORGUSU
      $sorgukadi="SELECT kullaniciadi FROM kullanicilar WHERE kullaniciadi=\"$_POST[kadi]\" AND id != $_SESSION[id]";
      $sorgulakadi=mysqli_query($conn,$sorgukadi);
      $kadi2=mysqli_fetch_array($sorgulakadi);
      // KULLANICI ADI VAR MI YOK MU SORGUSU
      

      if(!preg_match ( '/^[a-z\d_-]{5,20}/i' , $_POST["kadi"] ))
      {
         $kullanici_adi_err="Girdiğiniz kullanıcı adı geçerli formatta değil.";
      }
      else if(!empty($kadi2))
      {
         $kullanici_adi_err="Bu kullanıcı adı daha önce alınmıştır.";
      }
   
      //MAİL ADRESİ VAR MI YOK MU SORGUSU
      $sorgumail2="SELECT mail FROM kullanicilar WHERE mail = \"$_POST[mail]\" AND id != $_SESSION[id]";
      $sorgulamail2=mysqli_query($conn,$sorgumail2);
      $mail2=mysqli_fetch_array($sorgulamail2);
      if(isset($mail2))
      {
         $mail_err="Bu mail adresi daha önce kullanılmıştır.";
      }
      //MAİL ADRESİ VAR MI YOK MU SORGUSU 

      if(strlen($_POST["sifre"])<8 || strlen($_POST["sifre"])>16)
      {
         $parola_err="Şifreniz en az 8 en fazla 16 karakter içermelidir";
      }

      if(empty($kadi2) && empty($mail2) && empty($kullanici_adi_err) && empty($mail_err) && empty($parola_err))
      {
         $ysifre=md5($_POST["sifre"]);
         $sql="UPDATE kullanicilar SET kullaniciadi=\"$_POST[kadi]\", mail=\"$_POST[mail]\", telefon=\"$_POST[tel]\", adres=\"$_POST[adres]\", sifre=\"$ysifre\" WHERE id=$_SESSION[id]";
         $sqlcalistir=mysqli_query($conn,$sql);
      
      
         if($sqlcalistir)
         {

            $_SESSION["kAdi"]=$_POST["kadi"];
            $_SESSION["mail"]=$_POST["mail"];
            $_SESSION["tel"]=$_POST["tel"];
            $_SESSION["adres"]=$_POST["adres"];
            $_SESSION["sifre"]=$_POST["sifre"];

         }

      }
   
   }  

   ?>
   <div class="container">
      <div class="row mt-5">
         <div class="col-2"></div>
         <div class="col-sm-8">
         

   <table class="table table-striped table-hover text-center">

   <form action="#" method="POST" name="kaydet formu">
   <tr>
      <th colspan=5>Kullanıcı Bilgileri</th>
   </tr>
   <tr>
      <th>Ad</th><td ><?php echo $_SESSION["ad"] ?></td>
   </tr>

   <!-- Ad Soyad -->

   <tr>
      <th>Soyad</th><td ><?php echo $_SESSION["soyad"] ?></td>
   </tr>

   <!-- Kullanıcı adı -->
   <tr>
      <th>Kullanıcı Adı</th><td>
         <?php
       if(isset($_POST["duzenle"]))

       { echo "<input type=\"text\"  name=\"kadi\" value=\"$_SESSION[kAdi]\" required>";} 
       else if (isset($_POST["kaydet"]))
       {
         
         echo $_SESSION["kAdi"];
        if($kullanici_adi_err!="")
        {
         echo "<div class=\"alert alert-danger\" role=\"alert\">$kullanici_adi_err</div>";
        } 
      } 
       else    
       {echo $_SESSION["kAdi"];}
      
       ?></td>
   </tr>


   <!-- e-mail -->
   <tr>
      <th>E-mail</th><td>

      <?php 
      if(isset($_POST["duzenle"]))
      
      { echo "<input type=\"email\"  name=\"mail\" value=\"$_SESSION[mail]\" required>";}
      
      else if (isset($_POST["kaydet"]))
      { echo "$_POST[mail]"."<br>".$mail_err;} 
      
      else
      { echo $_SESSION["mail"];}
      
      ?>
   </td>
   </tr>

   <!-- Telefon -->
   <tr>
      <th>Telefon</th><td><?php 

      if(isset($_POST["duzenle"]))
      
      { echo "<input type=\"text\" name=\"tel\" value=\"$_SESSION[tel]\" required>";}

      else if (isset($_POST["kaydet"]))
      {echo "$_POST[tel]";} 
       else{ echo $_SESSION["tel"] ;} ?></td>
   </tr>


   <!-- Adres -->
   <tr>
      <th>Adres</th><td><?php if(isset($_POST["duzenle"])){ echo "<textarea name=\"adres\" style=\"resize: none;\" rows=\"3\" cols=\"22\" required> $_SESSION[adres]</textarea>";}
       else if (isset($_POST["kaydet"]))
       {echo "$_POST[adres]";} 
      else{ echo $_SESSION["adres"] ;} ?></td>
   </tr>


   <!-- Şifre -->
   <tr>
      <th>Şifre</th><td><?php 
      
      $karaktersayi=strlen($_SESSION["sifre"]);// kullanıcının şifresini gizlemek için karakter  sayısını belirledik.


      if(isset($_POST["duzenle"])){ echo "<input type=\"password\" name=\"sifre\" value=\"$_SESSION[sifre]\" required>";}

      else if (isset($_POST["kaydet"]))
      {echo str_repeat("•",$karaktersayi)."<br>".$parola_err;} 

      else{echo str_repeat("•",$karaktersayi);}?></td>
   </tr>

   
      <?php if(isset($_POST["duzenle"])){ echo "<tr><td colspan=2><input class=\"btn btn-primary\" type=\"submit\" value=\"Kaydet\" name=\"kaydet\"</td></form>"; }

      else { echo "<td colspan=2></form><form action=\"#\" method=\"POST\" > <input class=\"btn btn-primary\" type=\"submit\" value=\"Düzenle\" name=\"duzenle\"></form></td>";} 
   echo "</tr></table>";



   if(!isset($_SESSION["gorev"]))
   {
      echo "</table></div><div class=\"col-2\"></div>";
      include('kitaplarim.php');
   }

   ?> 

</table> 
<div class="col-2"></div>
       </div>
      
      </div>
      </div>

      <?php
}
else
{
   echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    GİRİS YAPINIZ
  </div>";
}
      ?>