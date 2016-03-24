<?php 
  $config['db'] = array(
     'host' => 'localhost' ,
      'kadi' => 'root' ,
      'sifre' => '' ,
      'vt_ad' => 'galeri_db' ,
  );


  $db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);

$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sorgu = $db->prepare("SELECT `kadi`,`ad`, `soyad`,`sifre`,`uye_resim` FROM `uyele` WHERE kadi LIKE :ara");

$ara = (isset($_GET['ara'])===true) ? $_GET['ara'] : ''; 
 
$sorgu->bindValue(':ara','%'. $ara .'%',PDO::PARAM_STR);

try{
$sorgu->execute();

$kayitlar = $sorgu->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>' , print_r($kayitlar,true) , '</pre>'; 
} catch(PDOException $e){
   die($e->getMessage());

}
?>