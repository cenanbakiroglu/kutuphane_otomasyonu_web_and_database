 <?php
    include('baglanti.php');
    $ISBN=$_POST["ISBN"];
    $kitapadi=$_POST["kitapadi"];
    $yazaradi=$_POST["yazaradi"];
    $yazarsoyadi=$_POST["yazarsoyadi"];
    $yayinevi=$_POST["yayinevi"];
    $kitapturu=$_POST["kitapturu"];
    $basimyil=$_POST["basimyili"];
    $sql="INSERT INTO kitaplar VALUES (null,\"$ISBN\",\"$kitapadi\",\"$yazaradi\",\"$yazarsoyadi\",\"$yayinevi\",\"$kitapturu\",\"$basimyili\")";
    $sorgu=mysqli_query($bagno,$sql);

    if($sorgu)
     {
      echo "başarılı";
     }                          //header ("Location:kitaplar.php");
    else {
      echo "başarısız";
    };
   ?>
