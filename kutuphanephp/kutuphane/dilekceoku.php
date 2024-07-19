<?php

if(isset($_SESSION["gorev"]))
{

    include("baglanti.php");
    $id=$_GET["id"];
    $sql="SELECT * FROM dilekce WHERE id=$id";
    $sorgu=mysqli_query($conn,$sql);
    $dilekce=mysqli_fetch_array($sorgu);
    $icerik=$dilekce[1];
    $kullanici=$dilekce[3];
    ?>



    <div class="container mt-5 ">
        <div class="row">
            <div class="col-12">
                <textarea class="rounded bg-secondary text-light p-5" readonly rows="25" cols="150" style="resize:none;"><?php echo $icerik."\n".$kullanici?></textarea>
            </div>
        </div>
    </div>



<?php
}
else
{

    echo "<div class=\"alert alert-danger cent\" role=\"alert\">
    SAYFAYI GÖRÜNTÜLEME YETKİNİZ BULUNMAMAKTADIR
    </div>";
}
?>
