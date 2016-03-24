<?php 

ini_set('display_errors','On'); 
require("config.php");
class Uye{
     public function tamAd()
     {
         return "{$this->ad} {$this->soyad}";
     }
    
}

$db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 
$uyeler = $db->query("SELECT `kadi`,`ad`, `soyad`,`sifre`,`uye_resim` FROM `uyeler`");

$uyeler->setFetchMode(PDO::FETCH_CLASS,'Uye');



while($uye = $uyeler->fetch())
{
    echo $uye->tamAd(), '<br/>';
}

?>