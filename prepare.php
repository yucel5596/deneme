<?php 

ini_set('display_errors','On'); 
require("config.php");

$db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 
if(!empty($_GET['uye']))
{  
  $uye = $db->prepare("SELECT * FROM uyeler WHERE id = :uye_id AND ad = :ad");
    
    $uye->execute([
        'uye_id'=>$_GET['uye'],
        'ad'=>$_GET['ad'],
    ]);
    
    var_dump($uye->fetchObject());
    
    
}
 






?>