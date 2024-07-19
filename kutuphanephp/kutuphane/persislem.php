<?php
if(@$_SESSION["gorev"]=="müdür")
{
    include("baglanti.php");

   

    ?>




<div class="s003">
      <form action="" method="post">
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" required name="kategori">
                <option value="" selected> Arama kategorisi</option>
                <option value="ad">Adına göre</option>
                <option value="soyad">Soyadına göre</option>
                <option value="tcno">T.C. Kimlik numarasına göre</option>

              </select>
            </div>
          </div>
          <div class="input-field second-wrap">
            <input id="search" type="text" placeholder="Anahtar kelimeler" name="aranan" required/>
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit" name="arama">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
          </div>
        </div>
      </form>
    </div>
<?php
 
 $aranan="";
 if(isset($_POST["arama"]))
 {
   $aranan="AND $_POST[kategori] LIKE \"%$_POST[aranan]%\"";
   echo "<div class=\"container-fluid m-3\"><div class=\"row\"><div class=\"col-5\"></div><div class=\"col-2\"><a href=index.php?sn=persislem><button class=\"btn btn-primary\">Aramayı Temizle</button></a><div class=\"col-5\"></div></div></div></div>";
 }
 $perssql="SELECT id, ad, soyad, tcno, gorev FROM personel WHERE personeldurum=0 $aranan";
 $perssorgu=mysqli_query($conn, $perssql);

?>


    <table class="table table-striped table-hover">
    <tr>
        <td colspan=5><button class="btn btn-success"><a class="link" href="index.php?sn=persekle">Personel Ekle</a></button></td>
    </tr>

    <tr>
        <th>Ad</th>
        <th>Soyad</th>
        <th>TC Kimlik No</th>
        <th>Görev</th>
        <th>İşlem</th>
    </tr>

    <?php
    while($pers=mysqli_fetch_array($perssorgu))

    {
    echo "<tr>";
    echo "<td>$pers[1]</td>";
    echo "<td>$pers[2]</td>";
    echo "<td>$pers[3]</td>";
    echo "<td>$pers[4]</td>";
    echo "<td><a class=\"link\" href=\"perssil.php?id=$pers[0]\"><button class=\"link btn btn-primary\">Sil</button></a>";
    echo "</tr>";

    }

    ?>

    </table>
    <?php
}
else
{
    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
  </div>";
}
?>