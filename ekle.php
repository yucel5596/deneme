<?php 

ini_set('display_errors','On'); 
require("config.php");

$db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 


if(!empty($_POST))
{  
  $kadi = $_POST['kadi'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
   
    
    $uye = $db->prepare("INSERT INTO uyeler(kadi,ad,soyad) values(:kadi, :ad, :soyad)");
    if($kadi != "" && $ad!="" && $soyad != "")
    $uye->execute([
        'kadi'=>$kadi,
        'ad'=>$ad,
        'soyad'=>$soyad,
    ]);
    else 
        echo "Tüm Alanları doldurunuz!";
    
  //  var_dump($uye->fetchObject());
    
    
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Document</title>
 </head>
 <body>
     <form action="ekle.php" method="post" autocomplete="off">
         <input type="text" name="kadi" placeholder="Kullanıcı Adı"/><br/>
          <input type="text" name="ad" placeholder="Ad"/><br/>
           <input type="text" name="soyad" placeholder="Soyad"/><br/>
         <input type="submit" value="kaydol"/>
     </form>
 </body>
 </html> 
 