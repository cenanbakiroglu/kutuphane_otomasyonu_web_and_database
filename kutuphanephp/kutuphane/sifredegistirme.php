<?php 
include("baglanti.php");
$err="";
$form= "<div class=\"container-fluid mt-5\"><div class=\"row\"><div class=\"col-3\"></div><div class=\"col-6\">
<form class=\"form-horizontal\" action=\"#\" method=\"POST\">
<div class=\"form-group\">
    <label class=\"control-label col-sm-2\">Kullanıcı Adı</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" class=\"form-control\" required name=\"kadi\" placeholder=\"Kullanıcı adı\">
    </div>
  </div>
  <div class=\"form-group mt-4\">
    <label class=\"control-label col-sm-2\" for=\"email\">E-mail</label>
    <div class=\"col-sm-10\">
      <input type=\"email\" name=\"mail\" class=\"form-control\" required id=\"email\" placeholder=\"E-mail\"><br>
    </div>
  </div>
  <div class=\"form-group\">
    <label class=\"control-label col-sm-2\" for=\"kod\">Kod</label>
    <div class=\"col-sm-10\">
      <input type=\"text\" class=\"form-control\" required name=\"kod\" placeholder=\"Kod\"><br>
    </div>
  </div>
  <div class=\"form-group\">
    <div class=\"col-sm-offset-2 col-sm-10\">
      <input type=\"submit\" name=\"dogrula\" class=\"btn btn-primary\" value=\"Bilgileri Doğrula\">
    </div>
  </div>
  </div>
  <div class=\"col-3\">
  </div>
  </div>

</form>";

if(isset($_POST["dogrula"]))
{
    $kulsql="SELECT kullaniciadi,mail,kod FROM kullanicilar WHERE kullaniciadi=\"$_POST[kadi]\"";
    $kulsorgu=mysqli_query($conn,$kulsql);
    
    
        while($kulbilgi=mysqli_fetch_array($kulsorgu))
        {
            $kadi=$kulbilgi[0];
            $mail=$kulbilgi[1];
            $kod=$kulbilgi[2];
        }
    
    if(isset($kadi))
    {
        
        
        if($mail==$_POST["mail"] && $kod==$_POST["kod"])
        {$form= "<div class=\"container-fluid mt-5\"><div class=\"row\"><div class=\"col-3\"></div><div class=\"col-6\">
            <form class=\"form-horizontal\" action=\"#\" method=\"POST\">
            <div class=\"form-group\">
                <label class=\"control-label col-sm-2\">Kullanıcı Adı</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" class=\"form-control\" value=\"$_POST[kadi]\" readonly name=\"kadi\">
                </div>
              </div>
              <div class=\"form-group mt-4\">
                <label class=\"control-label col-sm-2\" for=\"pwd\">Şifre</label>
                <div class=\"col-sm-10\">
                  <input id=\"pwd\" type=\"password\" name=\"parola\" class=\"form-control\" required placeholder=\"Şifre\"><br>
                </div>
              </div>
              <div class=\"form-group\">
              <label class=\"control-label col-sm-2\" for=\"pwd\">Şifre</label>
              <div class=\"col-sm-10\">
                <input id=\"pwd\" type=\"password\" name=\"parola_tekrar\" class=\"form-control\" required placeholder=\"Şifre tekrar\"><br>
              </div>
            </div>
              <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-10\">
                  <input type=\"submit\" name=\"degistirme\" class=\"btn btn-primary\" value=\"ŞİFREYİ DEĞİŞTİR\">
                </div>
              </div>
              </div>
              <div class=\"col-3\">
              </div>
              </div>
            
            </form>";

        }
        else if($kod!=$_POST["kod"])
        {
            $err="<div class=\"alert alert-danger\" role=\"alert\">Girdiğinz kod hatalı. Lütfen kütüphane görevlisinden yeni bir kod talep ediniz.</div>";
        }
        else
        {
            $err="<div class=\"alert alert-danger\" role=\"alert\">Girdiğiniz mail adresi hatalı. Lütfen sistemde kayıtlı olan mail adresinizi giriniz.</div>";
        }
    }
    else
    {
        $err="<div class=\"alert alert-danger\" role=\"alert\">Girdiğiniz kullanıcı adı hatalı. Lütfen sistemde kayıtlı olan kullanıcı adınızı giriniz.</div>";
    }
}
else if(isset($_POST["degistirme"]))
{
    $form="";
    $parola_err="";//parolasorgu.php sayfa içindeki err değişkeni
    include("parolasorgu.php");
    if(empty($parola_err))
    {
        $form="";
        $yenisifresql="UPDATE kullanicilar SET sifre=\"$parola\", kod=\"\" WHERE kullaniciadi=\"$_POST[kadi]\"";
        $yenisifresorgu=mysqli_query($conn,$yenisifresql);
        if($yenisifresorgu)
        {
            
            echo "<div class=\"alert alert-info\" role=\"alert\">Şifreniz güncellendi.</div>";
            header("refresh:3; url=index.php");
        }
        else
        {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Şifreniz güncellenirken hata oluştu.</div>";
            header("refresh:3; url=index.php?sn=sifredegistirme");
        }
    }
    else
    {
            echo $parola_err;
            header("refresh:3; url=index.php?sn=sifredegistirme");
    }
    
}

echo $err.$form;