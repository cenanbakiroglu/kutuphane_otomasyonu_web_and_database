<?php
   if(isset($_SESSION["gorev"]))
{

    
    include("baglanti.php");
    $dilekcesql="SELECT * FROM dilekce";
    $dilekcesorgu=mysqli_query($conn,$dilekcesql);
    
    ?>
    <table class="table table-striped table-hover text-center">
        <tr>
            <th>
                Dilekçe No
            </th>
            <th>
                Dilekçe İçerik
            </th>
            <th>
                İleten
            </th>
            <th>
                Dİlekçe Türü
            </th>
            <th colspan="2">
                İşlemler
            </th>
        </tr>
        <?php
        while($dilekceler=mysqli_fetch_array($dilekcesorgu))
        {
            echo "<tr>";
            echo "<td>$dilekceler[0]</td>";
            echo "<td>".mb_substr($dilekceler[1],0,15, 'UTF-8')."...</td>";
            echo "<td>$dilekceler[3]</td>";
            echo "<td>$dilekceler[2]</td>";
            echo "<td><a href=\"?sn=dilekceoku&id=$dilekceler[0]\"><button class=\"btn btn-primary\">OKU</button></a></td>";
            echo "<td><a href=\"dilekcesil.php?id=$dilekceler[0]\"><button class=\"btn btn-danger\">Sİl</button></a></td>";
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