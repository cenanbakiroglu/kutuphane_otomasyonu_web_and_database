<?php
if(isset($_SESSION["id"]))
{

    include("baglanti.php");
    if(isset($_POST["ok"]))
    {
        
        $sql="INSERT INTO dilekce VALUES(null,\"$_POST[icerik]\",\"$_POST[tur]\",\"$_SESSION[kAdi]\")";
        $sorgu=mysqli_query($conn,$sql);
        if($sorgu)
        {
            echo "<div class=\"alert alert-success cent\" role=\"alert\">
            $_POST[tur] belgeniz ulaştırıldı.
          </div>";
            header("refresh:3; url=index.php");
        }
    }
    ?>

    <div class="container mt-5 border border-3"><div class="row"><div class="col-3"></div><div class="col-6">
<table cellpadding="20">
    <form action="" method="POST">
        <tr><th>İÇERİK</th><td colspan="2"><textarea style="resize:none;" cols="60" rows="15" name="icerik" placeholder="İÇERİĞİ BURAYA YAZINIZ..." required></textarea></td></tr>
        <tr><th>DİLEKÇE TÜRÜ</th><td>
            <select name="tur" required> 
                <option value="" selected></option>
                <option value="ŞİKAYET">ŞİKAYET</option>
                <option value="DİLEKÇE">DİLEKÇE</option>
                <option value="İSTEK">İSTEK</option>
                
            </select></td><td class="text-danger fw-bold">DİLEKÇE TÜRÜNÜ MUTLAKA DOĞRU BELİRTİNİZ</td></tr>
            <tr><td colspan="3"><input type="submit" name="ok"  class="btn btn-primary" value="GÖNDER"></td></tr>
        </form>
    </table>
    </div>
    <div class="col-3"></div></div></div>
    <?php
}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
  </div>";
}
?>
