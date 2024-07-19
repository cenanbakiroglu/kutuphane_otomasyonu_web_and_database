<?php
include("baglanti.php");
if(isset($_POST["guncelle"]))
{
    $guncellesql="UPDATE kutupbilgiler SET telefon=\"$_POST[telefon]\",fax=\"$_POST[fax]\",adres=\"$_POST[adres]\" WHERE id=1";
    $guncellesorgu=mysqli_query($conn,$guncellesql);
}

$iletisimsql="SELECT telefon,fax,adres FROM kutupbilgiler";
$iletisimsorgu=mysqli_query($conn,$iletisimsql);
$iletisim=mysqli_fetch_array($iletisimsorgu);
if(isset($_POST["duzenle"]))
{
   ?>
   <div class="container m-5"><div class="row"><div class="col-6 rounded p-3">
    <table style="width:100%" class="text-center">
        <form method="POST" action="#">
        <tr><td><h3>Telefon</h3></td></tr>
        <tr><td><input type="text" name="telefon"  value="<?php echo $iletisim[0] ?>" placeholder="(___)______" required></td></tr>
        <tr><td><h3>Fax</h3></td></tr>
        <tr><td><input type="text" name="fax"  value="<?php echo $iletisim[1] ?>" placeholder="(___)______" required></td></tr>
        <tr><td><h3>Adres</h3></td></tr>
        <tr><td><textarea name="adres" cols="30" rows="5" style="resize:none;" required><?php echo $iletisim[2] ?></textarea></h2></td></tr>
        <tr><td><input class="mt-2 btn btn-primary" type="submit" name="guncelle" value="Güncelle"></td></tr>
        </form>
    </table>
    
    
   <?php
    
}
else
{
    ?>
     <div class="container mx-auto my-5 p-5  fs-3 border"><div class="row "><div class="col-6">
    <table style="width:100%">
        <tr><th>Telefon</th></tr>
        <tr><td><?php echo $iletisim[0] ?></td></tr>
        <tr><th>Fax</th></tr>
        <tr><td><?php echo $iletisim[1] ?></td></tr>
        <tr><th>Adres</th></tr>
        <tr><td><?php echo $iletisim[2] ?></td></tr>
    </table>
    
    <?php
        if(isset($_SESSION["gorev"]))
        {
            echo "<form method=\"POST\" action=\"#\">
            <input class=\"mt-2 btn btn-primary\" type=\"submit\" name=\"duzenle\" value=\"Düzenle\">
            </form>";
        }
}
?>
</div><div class="col-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1048.1324949107081!2d35.07593086964709!3d42.009580788695864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x408f6d61b4872da1%3A0x3ad47c6382d1ad33!2sSinop%20%C3%9Cniversitesi%20Merkez%20K%C3%BCt%C3%BCphanesi!5e0!3m2!1str!2str!4v1682336758493!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div></div></div>
