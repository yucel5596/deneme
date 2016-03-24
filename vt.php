<!DOCTYPE HTML>
<?php
require("config.php");


  $db = new PDO('mysql:host=' . $config['db']['host'] . '; charset=utf8; dbname=' . $config['db']['vt_ad'], $config['db']['kadi'],$config['db']['sifre']);
 
$uyeler = $db->query("SELECT `kadi`,`ad`, `soyad`,`sifre`,`uye_resim` FROM `uyeler`");

// print_r($sorgu);

/*$rows = $sorgu->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($rows);
echo '</pre>'; */
  /*  while($uye = $uyeler->fetch(PDO::FETCH_ASSOC))
	{
		echo '<pre>' , var_dump($uye) , '</pre>'; 
		
	} */
	
	$uyeler = $uyeler->fetchAll(PDO::FETCH_OBJ);  

 //die();
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?php foreach($uyeler as $uye): ?>
    <div class="uye">
     <h4> <?php echo $uye->ad . " " . $uye->soyad ; ?> </h4> 
     <p> <?php echo $uye->kadi ; ?></p>	 
    </div> 
<?php endforeach; ?>
</body>
</html>
