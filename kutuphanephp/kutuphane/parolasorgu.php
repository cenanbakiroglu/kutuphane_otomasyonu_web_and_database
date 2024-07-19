<?php

 if(empty($_POST["parola"]) || empty($_POST["parola_tekrar"]))
 {
     $parola_err="Bu alan boş geçilemez";
 }
 else if($_POST["parola"]!=$_POST["parola_tekrar"])
 {
     $parola_err="Parolalar uyuşmuyor";
 }
 else if(strlen($_POST["parola"])<8 || strlen($_POST["parola"])>16)
 {
     $parola_err="Parolanız 8 ile 16 karakterden oluşmalıdır";
 }
 else
 {
     $parola=md5($_POST["parola"]);//şifre kriptolanarak bir değişkene atanmıştır.
 
 }


?>