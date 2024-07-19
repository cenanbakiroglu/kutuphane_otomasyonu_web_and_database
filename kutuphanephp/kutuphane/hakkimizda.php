<?php
include("baglanti.php");
if(isset($_POST["guncelle"]))
{
    $guncellesql="UPDATE kutupbilgiler SET hakkimizda=\"$_POST[hakkimizda]\" WHERE id=1";
    $guncellesorgu=mysqli_query($conn,$guncellesql);
}

$hakkimizdasql="SELECT hakkimizda FROM kutupbilgiler";
$hakkimizdasorgu=mysqli_query($conn,$hakkimizdasql);
$hakkimizda=mysqli_fetch_array($hakkimizdasorgu);
?>
<div class="container-fluid p-5 border mt-5"><div class="row">

    <?php
if(isset($_POST["duzenle"]))
{
    echo "<form action=\"\" method=\"POST\">
    <div class=\"col-10\"> <textarea name=\"hakkimizda\" rows=\"10\" cols=\"200\" style=\"resize: none;\" class=\"bg-light rounded\" required> $hakkimizda[0]</textarea></div>


    <div class=\"col-2\"><input type=\"submit\" class=\"btn btn-primary\" name=\"guncelle\" value=\"Güncelle\"></div>


    </form></div></div>";
    
}
else
{
 echo "$hakkimizda[0]";
    if(isset($_SESSION["gorev"]))
    {
        echo "<form method=\"POST\" action=\"#\">
        <div class=\"col-10\"><input type=\"submit\" class=\"btn btn-primary\" name=\"duzenle\" value=\"Düzenle\"></div>
        </form></div></div>";
    }
}

?>
