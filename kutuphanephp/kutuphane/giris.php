<?php
include('baglanti.php');
$err_kAdi=$err_sifre="";
//--------------------Buton içi işlemler başlangıç.--------------------
if(isset($_POST["btn_giris"]))
{
    //--------------------Kullanıcı adı sorgulama ve atama başlangıç.--------------------
    if(!isset($_POST["kadi"]))
    {
        $err_kAdi="Lütfen kullanıcı adını giriniz.";
    }
    else
    {
        $sorgu="SELECT * FROM kullanicilar WHERE kullaniciadi=\"".$_POST["kadi"]."\"";
        $sorguok=mysqli_query($conn,$sorgu);
        $veriler=mysqli_fetch_array($sorguok);

        //personel sorgu  
        $sorguPers="SELECT * FROM personel WHERE kullaniciadi=\"".$_POST["kadi"]."\"";
        $sorguPersok=mysqli_query($conn,$sorguPers);
        $verilerPers=mysqli_fetch_array($sorguPersok);

        if(isset($veriler))
        {       
             $id=$veriler[0];
             $ad=$veriler[1];
             $soyad=$veriler[2];
             $kAdi=$veriler[3];
             $mail=$veriler[4];
             $sifre=$veriler[5];
             $tel=$veriler[6];
             $adres=$veriler[7];
             $kTarih=$veriler[8];
             
         }
         else if(isset($verilerPers))
         {
           
            $id=$verilerPers[0];
            $ad=$verilerPers[1];
            $soyad=$verilerPers[2];
            $kAdi=$verilerPers[3];
            $mail=$verilerPers[4];
            $sifre=$verilerPers[5];
            $gorev=$verilerPers[6];
            $tel=$verilerPers[7];
            $tcno=$verilerPers[8];
            $adres=$verilerPers[9];
            $ktarih=$verilerPers[10];
         }
         else 
         {
            $err_kAdi="Böyle bir kullanıcı bulunmamaktadır.";
         }
    }



      //--------------------Kullanıcı adı sorgulama ve atama bitiş.--------------------

      //---------------------Şifre sorgulama--------------------
    if(!isset($_POST["sifre"]))
    {
        $err_sifre="Lütfen şifrenizi giriniz.";
    }
    else 
    {
        if(isset($veriler[0]))
        {
             if ($sifre==md5($_POST["sifre"]))
             {
                 $_SESSION["id"]=$id;
                 $_SESSION["ad"]=$ad;
                 $_SESSION["soyad"]=$soyad;
                 $_SESSION["kAdi"]=$kAdi;
                 $_SESSION["mail"]=$mail;
                 $_SESSION["sifre"]=$_POST["sifre"];
                 $_SESSION["tel"]=$tel;
                 $_SESSION["adres"]=$adres;
                
                 header ("location:index.php");
             }
             
             else
             {
                 $err_sifre="Hatalı şifre";
             }
        }
        else if(isset($verilerPers[0]))
        {
            if ($sifre==md5($_POST["sifre"]))
            {
                $_SESSION["id"]=$id;
                $_SESSION["ad"]=$ad;
                $_SESSION["soyad"]=$soyad;
                $_SESSION["kAdi"]=$kAdi;
                $_SESSION["mail"]=$mail;
                $_SESSION["sifre"]=$_POST["sifre"];
                $_SESSION["tel"]=$tel;
                $_SESSION["adres"]=$adres;
                $_SESSION["kTarih"]=$ktarih;
                $_SESSION["tc"]=$tcno;
                $_SESSION["gorev"]=$gorev;
   
                header ("location:index.php");
            }
            
            else
            {
                $err_sifre="Hatalı şifre";
            }
        }
        else
          {
            $err_sifre="Böyle bir kullanıcı bulunmamaktadır.";
          }
      }
      
    }
//--------------------Buton içi işlemler bitiş.--------------------

?>


<div class="container my-5 py-5 rounded"><div class="row"><div class="col-3"></div><div class="col-6">
<form class="form-horizontal" action="#" method="POST">
<div class="form-group">
    <label class="control-label col-sm-2"  >Kullanıcı Adı</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" required name="kadi" id="email" placeholder="Kullanıcı adı">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Şifre</label>
    <div class="col-sm-10">
      <input type="password" name="sifre" class="form-control" required id="pwd" placeholder="Şifre"><br>
      <?php if($err_sifre!="") {echo "<div class=\"alert alert-danger\" role=\"alert\">$err_sifre</div>";}?>
    </div>
  </div>
  <span class="">
  <a href="index.php?sn=sifredegistirme">Şifrenizi mi Unuttunuz?</a>
  </span>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="btn_giris" class="btn btn-primary mt-3" value="Giriş">
    </div>
  </div>
  </div>
  <div class="col-3">
  </div>
  </div>

</form>