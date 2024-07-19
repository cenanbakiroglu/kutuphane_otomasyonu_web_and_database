<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("baglanti.php");
    $sql="SELECT kitapadi FROM kitaplar";
    $sorgu=mysqli_query($conn,$sql);

    ?>
    <form method="post" action="">
    <input list="posts" name="post">
    <datalist name="liste">
 <?php
    while($veriler=mysqli_fetch_array($sorgu))
    {
        echo "<option value=\"$veriler[0]\">$veriler[0]</option>";
    }

?>
 </datalist>
    </form>
</body>
</html>


  
