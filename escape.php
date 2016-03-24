<?php 

ini_set('display_errors','On'); 
require("config.php");

$db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 
if(!empty($_GET['uye']))
{  
     $uye = $db->quote($_GET['uye']);  
    $uyeler = $db->query("SELECT * FROM uyeler WHERE id = {$uye}");
    var_dump($uyeler->fetchObject());
}
 






?>